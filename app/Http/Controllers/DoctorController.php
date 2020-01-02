<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Examination;
use App\AppointmentBooking;
use App\Patient;
use App\Room;
use App\User;
use App\Doctor;
use App\EyeVisitTabs;
use App\InputTabs;
use App\EyeVisitData;
use App\UserAccessLevel;

class DoctorController extends Controller
{
    public function appointments(Request $request)
    {
        return view('admin.doctor.appointmentView');
    }

    public function patients(Request $request,$all=null)
    {
        $user = auth()->user();
        return view('admin.doctor.patientList',['user'=>$user,'all'=>$all]);
    }

    public function patientsAjax(Request $request,$all=null)
    {
        $user = auth()->user();
        $limit = 10;
        $start = isset($_POST["start"])?$_POST["start"]:0;
		$length = isset($_POST["length"])?$_POST["length"]:$limit;
		$search = isset($_POST["search"])?$_POST["search"]:[];
        $draw = isset($_POST["draw"])?$_POST["draw"]:1;
        if(!empty($all)) {
            $patientModel = DB::table('patients'); 
            if(!empty($search['value'])) {
                $searchString= strtolower($search['value']);
                $patientModel->orWhere('name', 'like', '%' . $searchString . '%')
                             ->orWhere('surname', 'like', '%' . $searchString . '%')
                             ->orWhere('email', 'like', '%' . $searchString . '%')
                             ->orWhere('dob', 'like', '%' . $searchString . '%')
                             ->orWhere('phone', 'like', '%' . $searchString . '%');
            }
        } else {
            $appointments = DB::table('appointement_booking')
                        ->select('appointement_booking.patient_id')
                        ->where('doctro_name', '=', $user->id)->get();
            $patientsId = [];
            array_map(function($item) use (&$patientsId) {
                $patientsId[] = $item->patient_id; // object to array
            }, $appointments->toArray());
            $patientModel = Patient::whereIn('id', $patientsId);
            if(!empty($search['value'])) {
                $searchString = strtolower($search['value']);
                $patientModel->
                        where(function($q) use ($searchString){
                            $q->where('name', 'like', '%' . $searchString . '%')
                            ->orWhere('surname', 'like', '%' . $searchString . '%')
                            ->orWhere('email', 'like', '%' . $searchString . '%')
                            ->orWhere('dob', 'like', '%' . $searchString . '%')
                            ->orWhere('phone', 'like', '%' . $searchString . '%');
                        });
            }
        }
        
        $totalCount = $patientModel->count();
        $patients = $patientModel->skip($start)->take($length)->orderBy('surname', 'ASC')->get();
        $i=$start+1;
        $include =0;
        if((auth()->user()->role_type=='1') || (auth()->user()->role_type=='3')){        
            $include =1;
        } else if(auth()->user()->role_type =='2'){
            $accessData = UserAccessLevel::where(['user_id'=>auth()->user()->id])->first();
            $menuData = json_decode($accessData->access_level,true);
            if(isset($menuData[6]['write'])){
                $include =1;
            }
        }
        $returnArray['data'] = [];
        foreach ($patients as $patient) {
            if (!empty($patient->surname) && !empty($patient->name) && !empty($patient->phone) && !empty($patient->dob) && !empty($patient->place_of_birth) && !empty($patient->province_of_birth) && !empty($patient->fiscal_code) && !empty($patient->place_of_living) && !empty($patient->province_of_living) && !empty($patient->number_of_the_address) && !empty($patient->address) && !empty($patient->postal_code)){
                $checked='<i class="fa fa-check-square" aria-hidden="true"></i>';
            } else {
                $checked='<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
            }
            $action ='<a class="btn btn-info btn-sm" href="'.url("medico/modifica-paziente/".$patient->id).'" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            if($include == 1){
                $returnArray['data'][]=[
                    $i,
                    (!empty($patient->surname)?$patient->surname:'NA'),
                    (!empty($patient->name)?$patient->name:'NA'),
                    (!empty($patient->email)?$patient->email:'NA'),
                    (!empty($patient->phone)?$patient->phone:'NA'),
                    (!empty($patient->dob)?$patient->dob:'NA'),
                    $checked,
                    $action
                ];
            }else{
               $returnArray['data'][]=[
                    $i,
                    (!empty($patient->surname)?$patient->surname:'NA'),
                    (!empty($patient->name)?$patient->name:'NA'),
                    (!empty($patient->email)?$patient->email:'NA'),
                    (!empty($patient->phone)?$patient->phone:'NA'),
                    (!empty($patient->dob)?$patient->dob:'NA'),
                    $checked
                ]; 
            }
            $i++;
        }
        
        $returnArray['draw'] = $draw;
        $returnArray['recordsTotal'] = $totalCount;
        $returnArray['recordsFiltered'] = $totalCount;
        return json_encode($returnArray);
    }

    public function ResponseData()
    {
        $examinationEvent = Examination::all();
        $roomsEvent = Room::all();
        $exams = [];
        $rooms = [];
        $user = auth()->user();
        array_map(function($item) use (&$exams) {
            $exams[$item['id']] = $item['title']; // object to array
        }, $examinationEvent->toArray());
        array_map(function($item) use (&$rooms) {
            $rooms[$item['id']] = $item['room_name']; // object to array
        }, $roomsEvent->toArray());
        $tenDaysBack = date('Y-m-d', strtotime('-90 days', time()));
        $appoint = DB::table('appointement_booking')
                     ->select('*')
                     ->where('start_date', '>=', $tenDaysBack)
                     ->where('doctro_name', '=', $user->id);
        $result = $appoint->get();
        $data =[];
        $DoctorDetail = User::where(['id'=>$user->id])->first();
        foreach($result as $row)
        {
            $recurrence = '';
            $patientWhere = ['id'=>$row->patient_id];
            $recurrence = $row->recurrence;
            
            $patient = Patient::where($patientWhere)->first();
            $emaildat='';
            if(!empty($patient->dob)){
                $emaildat=' - ('.(isset($patient->dob)?$patient->dob:'').')';
            }
            $eventDescription = "<div><div>Nome del dottore : ".$DoctorDetail->surname.' '.$DoctorDetail->name."</div>";
             $eventDescription .= "<div>cognome del paziente : ".$patient->surname."</div>";
            $eventDescription .= "<div>Nome paziente : "." ".$patient->name.", Data di nascita :".$patient->dob."</div>";
            $eventDescription .= "<div>Inizio : ".$row->starteTime.", Fine : ".$row->endtime."</div>";
            $eventDescription .= "<div>Specialità : ".$exams[$row->examination_id].", Tipologia visita : ".$rooms[$row->room_id]."</div></div>";
            $titlePat = ', Paziente: '.$patient->surname.' '.$patient->name.$emaildat;
            $data[] = array(
                              'id'   => $row->id,
                              'title'   => 'Medico: '.(($row->is_cancel == 1)?$DoctorDetail->surname.' '.$DoctorDetail->name.'- Annullato':$DoctorDetail->surname.' '.$DoctorDetail->name).$titlePat,
                              'start'   => date('Y-m-d H:i',strtotime($row->start_date)),
                              'end'   => date('Y-m-d H:i',strtotime($row->end_date)),
                              'color' => !empty($row->examination_color)?$row->examination_color:'',
                              'examination_id' => $row->examination_id,
                              'starttime' => $row->starteTime,
                              'endtime' => $row->endtime,
                              'room_id' => $row->room_id,
                              'doctor_id' => $row->doctro_name,
                              'patient_name' => (isset($patient->name)?$patient->name:''),
                              'visit_motive' => (isset($row->visit_motive)?$row->visit_motive:''),
                              'patient_email' => $patient->surname.' '.$patient->name.$emaildat,
                              'patient_phone' => (isset($patient->phone)?$patient->phone:''),
                              'patient_id' => (isset($patient->id)?$patient->id:''),
                              'is_cancel' => $row->is_cancel,
                              'recurrence' => $recurrence,
                              'description' => $eventDescription,
                              'icon' => '  <i class="eventtooltip fa fa-info-circle" aria-hidden="true"></i> '
                         );
        }

        echo  json_encode($data);       
    }

    public function eyevisit(Request $request,$patid, $appid) {
        $eyeVisitTabs = EyeVisitTabs::where(['status'=>1])->get();
        $inputTabs = InputTabs::where(['status'=>1])->get();
        $patientData = Patient::where(['id'=>$patid])->select('patients.surname','patients.name')->first();
        $eyeVisitInputTabs = [];
        array_map(function($item) use (&$eyeVisitInputTabs) {
            if($item['tab_id'] == 3) {
                $eyeVisitInputTabs[$item['tab_id']][$item['refrazione_section']][] = $item;
            } else {
                $eyeVisitInputTabs[$item['tab_id']][] = $item;
            }
        }, $inputTabs->toArray());
        $appointmentData  = DB::table('appointement_booking')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')                     
                            ->select('appointement_booking.*', 'users.surname','users.name','users.phone','users.email')                     
                            ->where('appointement_booking.id', '=', $appid)->first();
        $eyeDataPat=EyeVisitData::where('appointment_id', $appid)->select('eye_visit_data.eye_visit')->first();
        if($request->method() == 'POST') {
            $eyeData['eye_visit'] = json_encode(Input::get('eye_visit'));
            $mage = EyeVisitData::firstOrNew(['appointment_id'=>$appid], $eyeData);
            if($mage->exists){
                EyeVisitData::where('id', $mage->id)->update($eyeData);
            } else {
                $mage->save();
            }
            return redirect('/medico/eyevisit/'.$patid.'/'.$appid)->with('success',"I dati sono stati aggiornati correttamente.");
        }
        return view('admin.doctor.eyeVisit', ['appointmentData' => $appointmentData,'eyeVisitTabs'=>$eyeVisitTabs,'eyeVisitInputTabs'=>$eyeVisitInputTabs,'eyeDataPat'=>$eyeDataPat,'patid'=>$patid,'patientData'=>$patientData]);
    }
}
