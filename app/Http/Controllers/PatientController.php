<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Patient;
use App\User;
use App\Privacy;
use App\Patienthistory;
use App\Comment;
use App\Managepatient;
use DateTime;
use DatePeriod;
use DateInterval;
use App\AppointmentBooking;
use App\Examination;
use App\AppointmentMedicine;
use App\Surgery;

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
                    return redirect('/admin/aggiungi-paziente')->with('error',"il paziente con questo ID email esiste già."); 
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
                return redirect('/admin/paziente')->with('success',"Il paziente è stato aggiunto correttamente."); 
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
                            ->where('patient_id', '=', $id)
                            ->orderBy('appointement_booking.start_date','DESC')->get();
        
        if($request->method() == 'POST') {
            if(!empty(Input::get('email'))) {
                $patientData = Patient::where(['email'=>Input::get('email')])->first();
                if(isset($patientData->id)) {
                    if($patientData->id != $id){
                        return redirect('/admin/modifica-paziente/'.$id)->with('error',"il paziente con questo ID email esiste già."); 
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
            if(!empty(Input::get('minor_patient'))) {
                $patient->minor_patient  =  Input::get('minor_patient');
            }
            $patient->added_by               =     $user->id;
            $patient->updated_by             =     $user->id;
            if(!empty(Input::get('relative'))) {
                $patient->relative_info             =     json_encode(Input::get('relative'));
            }
            if($patient->save()){
                return redirect('/admin/paziente')->with('success',"il paziente è stato aggiornato con successo."); 
            }
        }
        $privacy = Privacy::where(['id'=>1])->first();
    	return view('admin.editPatient', ['patientData' => $patientData, 'appointments' => $appointments, 'privacy'=>$privacy]);
    }

    public function SavePrivacy(Request $request) {
        $patient = Patient::find(Input::get('pat_id'));
        $patient->privacy  =  json_encode(Input::get('privacy'));
        if($patient->save()){
            echo 'success';
        }
        exit;
    }

    public function eyevisit(Request $request, $appid) {
        $appointmentData  = DB::table('appointement_booking')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')                     
                            ->select('appointement_booking.*', 'users.name','users.phone','users.email')                     
                            ->where('appointement_booking.id', '=', $appid)->first();
        if($request->method() == 'POST') {
            $patient = Patient::find(Input::get('pat_id'));
            $patient->eye_visit  =  json_encode(Input::get('eye_visit'));
            if($patient->save()){
                return redirect('/admin/eyevisit/'.$appid)->with('success',"I dati sono stati aggiornati correttamente."); 
            }
        }
        return view('admin.eyeVisit', ['appointmentData' => $appointmentData]);
    }

    public function managepatient() {
        $user = auth()->user();
        $examination = Examination::all();
        $existingPat = Managepatient::where(['manage_date'=>date('Y-m-d',time())])->first();
        $patientsOfTheDay = DB::table('appointement_booking')
                            ->join('patients', 'appointement_booking.patient_id', '=', 'patients.id')                     
                            ->select('appointement_booking.id as appointid','appointement_booking.starteTime','appointement_booking.endtime', 'patients.*')                     
                            ->where(DB::raw("DATE_FORMAT(appointement_booking.start_date, '%Y-%m-%d')"), '=', date('Y-m-d',time()))->get()->keyBy('id');
        $patientFirst = [];
        if(empty($existingPat)){
            foreach ($patientsOfTheDay as $pat) {
                $patientFirst[] =[
                    'id'=>$pat->id,
                    'updated_by'=>$user->id,
                    'update_date'=>date('Y-m-d H:i:s', time()),
                    'color'=>''
                ];
            }
        }
        return view('admin.patientManagement', ['patients' => $patientsOfTheDay,'existingPat'=>$existingPat,'user'=>$user,'patientFirst'=>$patientFirst,'examination'=>$examination]);
    }

    public function dailypatientupdate() {
        $user = auth()->user();
        if(!empty(Input::get('section_type'))) {
            if(!empty(Input::get('patients'))){
                $patvalue=json_encode(Input::get('patients'));
            } else {
                $patvalue=null;
            }
            $managePatientData[Input::get('section_type')]  =  $patvalue;
            
            $managePatientData['manage_date'] = date('Y-m-d',time());
            $mage = Managepatient::firstOrNew(['manage_date'=>date('Y-m-d',time())], $managePatientData);
            if(isset($mage->id)){
                Managepatient::where('id', $mage->id)->update($managePatientData);
                echo 'success';
            } else {
                $mage->save();
                echo 'success';
            }
            if(!empty(Input::get('appid'))) {
                $sectionArray=[
                    'first' => 'Pazienti del giorno',
                    'second' => 'Check In',
                    'third' => 'Ambulatorio',
                    'fourth' => 'Esami',
                    'fifth' => 'Check Out'
                ];
                $message = '<strong>'.$user->name."</strong> spostato nella sezione <strong>".$sectionArray[Input::get('section_type')]."</strong>";
                $patientHistory = new Patienthistory();
                $patientHistory->appointment_id  =  Input::get('appid');
                $patientHistory->message  =  $message;
                $patientHistory->save();
            }
        }
        exit;
    }

    public function getpatient(Request $request, $appid) {
        $comments= DB::table('comments')
                    ->join('users', 'comments.commented_by', '=', 'users.id')
                    ->select('users.name as commentname','comments.*')
                    ->where('comments.appointment_id','=',$appid)
                    ->get();
        
        $patientshistory = Patienthistory::where(['appointment_id'=>$appid])->orderBy('id', 'ASC')->get();
        $medicines = AppointmentMedicine::where(['appointment_id'=>$appid])->first();     
        $appointment = DB::table('appointement_booking')
                            ->join('patients', 'appointement_booking.patient_id', '=', 'patients.id')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')
                            ->join('examination', 'appointement_booking.examination_id', '=', 'examination.id')
                            ->join('room', 'appointement_booking.room_id', '=', 'room.id')                  
                            ->select('appointement_booking.id as appointid','appointement_booking.starteTime','appointement_booking.endtime', 'patients.*','users.name as doctorname','users.id as doctorid','users.email as doctoremail','examination.title as examtitle','room.room_name')                     
                            ->where('appointement_booking.id', '=', $appid)->first();
        return view('admin.patientDetail', ['appointment' => $appointment,'comments'=>$comments,'patientshistory'=>$patientshistory,'medicines'=>$medicines]);
    }

    public function savecomment(Request $request){
        $user = auth()->user();
        $comment = new Comment();
        $comment->appointment_id  =  Input::get('appid');
        $comment->commented_by  =  $user->id;
        $comment->comment     =  Input::get('comment');
        if($comment->save()) {
            $message = '<strong>'.$user->name."</strong> commento aggiunto.";
            $patientHistory = new Patienthistory();
            $patientHistory->appointment_id  =  Input::get('appid');
            $patientHistory->message  =  $message;
            $patientHistory->save();
            setlocale(LC_TIME, 'it_IT');
            echo $user->name.' '.strftime('%d %B %Y %I:%M', time());
        }
        exit;
    }

    public function savemedicine(Request $request) {
        if(!empty(Input::get('medicine'))) {
            $data['medicine'] =json_encode(Input::get('medicine'));
            $appMed=AppointmentMedicine::firstOrCreate(['appointment_id' => Input::get('app_id')], $data);
            if($appMed->wasRecentlyCreated !=1) {
                AppointmentMedicine::where('appointment_id', Input::get('app_id'))->update(['medicine' => json_encode(Input::get('medicine'))]);   
            }
            echo 'success';
            
        }
        exit;
    }

    public function intervento(Request $request,$type = 1) {
        $surgeryList= DB::table('surgeries')
                    ->join('patients', 'surgeries.patient_id', '=', 'patients.id')
                    ->where(['surgery_type'=>$type])
                    ->select('surgeries.*','patients.surname','patients.name as patientname','patients.email')
                    ->get();
        return view('admin.intervento', ['surgeryList' => $surgeryList, 'type'=>$type]);
    }

    public function saveintervento(Request $request) {
        $surgery = new Surgery();
        $surgery->patient_id      =  Input::get('pat_id');
        $surgery->doctor_id      =  Input::get('doc_id');
        $surgery->name  =  Input::get('surgery_name');
        $surgery->time  =  Input::get('surgery_duration');
        $surgery->surgery_date  =  Input::get('surgery_date');
        $surgery->surgery_type  =  Input::get('surgery_type');
        if($surgery->save()){
            echo 'success';
        }
        exit;
    }

    public function EditIntervento(Request $request,$surid) {
        $surgeryData = Surgery::where(['id'=>$surid])->first();
        $doctorData = User::where(['id'=>$surgeryData['doctor_id']])->select('users.name as docname','users.email as docemail','users.surname as docsurname')->first();
        $patientData = Patient::where(['id'=>$surgeryData['patient_id']])->first();
        if($request->method() == 'POST') {
            $surgery = Surgery::find($surid);
            $surgery->name  =  Input::get('surgery_name');
            $surgery->time  =  Input::get('surgery_duration');
            $surgery->surgery_date  =  Input::get('surgery_date');
            $surgery->surgery_type  =  Input::get('surgery_type');
            $surgery->diagnosis = Input::get('diagnosis');
            $surgery->surgery = Input::get('surgery');
            $surgery->eye = Input::get('eye');
            $surgery->medical_number = Input::get('medical_number');
            $surgery->local_examination = Input::get('local_examination');
            $surgery->description  =  Input::get('desc');
            $surgery->operating_record  =  Input::get('operating_record');
            $surgery->clinical_diary = Input::get('clinical_diary');
            $surgery->intervention_number = Input::get('intervention_number');
            if($surgery->save()) {
                return redirect('/admin/intervento')->with('success',"Le informazioni sulla chirurgia sono state salvate correttamente."); 
            }
        }
        return view('admin.editintervento', ['surgeryData' => $surgeryData,'doctorData'=>$doctorData,'patientData'=>$patientData]);
    }
}
