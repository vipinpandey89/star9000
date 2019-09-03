<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Patient;
use App\User;
use DateTime;
use DatePeriod;
use DateInterval;


class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::all();
        return view('admin.patientList',['patients'=>$patients]);
    }

    public function AddPatient(Request $request)
    {
        $user = auth()->user();
        if($request->method() == 'POST') {
            if(!empty(Input::get('email'))) {
                $patientData = Patient::where(['email'=>Input::get('email')])->first();
                if(isset($patientData->id)) {
                    return redirect('/admin/add-patient')->with('error',"il paziente con questo ID email esiste già."); 
                }
            }
            $patient = new Patient();
            $patient->surname  =  Input::get('surname');
            $patient->email  =  Input::get('email');
            $patient->name  =  Input::get('name');
            $patient->phone  =  Input::get('phone');
            $patient->dob  =  Input::get('dob');
            $patient->description  =  Input::get('description');
            $patient->added_by               =     $user->id;
            $patient->updated_by             =     $user->id;
            if($patient->save()){
                return redirect('/admin/patient')->with('success',"Il paziente è stato aggiunto correttamente."); 
            }
        }
    	return view('admin.addPatient');
    }

    public function EditPatient(Request $request,$id)
    {
        $user = auth()->user();
        $patientData = Patient::where(['id'=>$id])->first();
        
        $appointments  = DB::table('appointement_booking')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')
                            ->join('examination', 'appointement_booking.examination_id', '=', 'examination.id')
                            ->join('room', 'appointement_booking.room_id', '=', 'room.id')                     
                            ->select('appointement_booking.*', 'users.name','examination.title','room.room_name')                     
                            ->where('patient_id', '=', $id)->get();
        
        if($request->method() == 'POST') {
            if(!empty(Input::get('email'))) {
                $patientData = Patient::where(['email'=>Input::get('email')])->first();
                if(isset($patientData->id)) {
                    if($patientData->id != $id){
                        return redirect('/admin/edit-patient/'.$id)->with('error',"il paziente con questo ID email esiste già."); 
                    }
                }
            }
            $patient = Patient::find($id);
            $patient->surname  =  Input::get('surname');
            $patient->email  =  Input::get('email');
            $patient->name  =  Input::get('name');
            $patient->phone  =  Input::get('phone');
            $patient->dob  =  Input::get('dob');
            $patient->description  =  Input::get('description');
            $patient->added_by               =     $user->id;
            $patient->updated_by             =     $user->id;
            if(!empty(Input::get('relative'))) {
                $patient->relative_info             =     json_encode(Input::get('relative'));
            }
            if($patient->save()){
                return redirect('/admin/patient')->with('success',"il paziente è stato aggiornato con successo."); 
            }
        }
    	return view('admin.editPatient', ['patientData' => $patientData, 'appointments' => $appointments]);
    }
}
