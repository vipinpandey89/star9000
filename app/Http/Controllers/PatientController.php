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
use App\EyeVisitTabs;
use App\InputTabs;
use App\EyeVisitData;
use Excel;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        return view('admin.patientList',['user'=>$user]);
    }

    public function getMainPatientList() {
        $patients = Patient::all();
        $returnArray = [];
        $i=1;
        foreach ($patients as $patient) {
            if (!empty($patient->surname) && !empty($patient->name) && !empty($patient->email) && !empty($patient->phone) && !empty($patient->dob)){
                $checked='<i class="fa fa-check-square" aria-hidden="true"></i>';
            } else {
                $checked='<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
            }
            $action ='<a class="btn btn-info btn-sm" href="'.url("admin/modifica-paziente/".$patient->id).'" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
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
            $i++;
        }
        return json_encode($returnArray);
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
            $patient->sex  =  Input::get('sex');
            $patient->document  =  Input::get('document');
            $patient->profession  =  Input::get('profession');
            $patient->address  =  Input::get('address');
            $patient->postal_code  =  Input::get('postal_code');
            $patient->telephone  =  Input::get('telephone');
            $patient->nationality  =  Input::get('nationality');
            $patient->pec  =  Input::get('pec');
            $patient->description  =  Input::get('description');

            $patient->place_of_birth  =  Input::get('place_of_birth');
            $patient->province_of_birth  =  Input::get('province_of_birth');
            $patient->fiscal_code  =  Input::get('fiscal_code');
            $patient->place_of_living  =  Input::get('place_of_living');
            $patient->province_of_living  =  Input::get('province_of_living');
            $patient->number_of_the_address  =  Input::get('number_of_the_address');

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
        
        $appoint  = DB::table('appointement_booking')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')
                            ->join('examination', 'appointement_booking.examination_id', '=', 'examination.id')
                            ->join('room', 'appointement_booking.room_id', '=', 'room.id')                     
                            ->select('appointement_booking.*', 'users.name','examination.title','room.room_name')                     
                            ->where('patient_id', '=', $id)
                            ->orderBy('appointement_booking.start_date','DESC');
        if($user->role_type == 3) {
            $appoint->where('doctro_name', '=', $user->id);
        }
        $appointments = $appoint->get();
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
            $patient->sex  =  Input::get('sex');
            $patient->document  =  Input::get('document');
            $patient->profession  =  Input::get('profession');
            $patient->address  =  Input::get('address');
            $patient->postal_code  =  Input::get('postal_code');
            $patient->telephone  =  Input::get('telephone');
            $patient->nationality  =  Input::get('nationality');
            $patient->pec  =  Input::get('pec');
            $patient->description  =  Input::get('description');
            $patient->place_of_birth  =  Input::get('place_of_birth');
            $patient->province_of_birth  =  Input::get('province_of_birth');
            $patient->fiscal_code  =  Input::get('fiscal_code');
            $patient->place_of_living  =  Input::get('place_of_living');
            $patient->province_of_living  =  Input::get('province_of_living');
            $patient->number_of_the_address  =  Input::get('number_of_the_address');
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
    	return view('admin.editPatient', ['patientData' => $patientData, 'appointments' => $appointments, 'privacy'=>$privacy,'user'=>$user]);
    }

    public function SavePrivacy(Request $request) {
        $patient = Patient::find(Input::get('pat_id'));
        $patient->privacy  =  json_encode(Input::get('privacy'));
        if($patient->save()){
            echo 'success';
        }
        exit;
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
            return redirect('/admin/eyevisit/'.$patid.'/'.$appid)->with('success',"I dati sono stati aggiornati correttamente.");
        }
        return view('admin.eyeVisit', ['appointmentData' => $appointmentData,'eyeVisitTabs'=>$eyeVisitTabs,'eyeVisitInputTabs'=>$eyeVisitInputTabs,'eyeDataPat'=>$eyeDataPat,'patid'=>$patid,'patientData'=>$patientData]);
    }

    public function managepatient() {
        $user = auth()->user();
        $examination = Examination::all();
        $existingPat = Managepatient::where(['manage_date'=>date('Y-m-d',time())])->first();
        $patientsOfTheDay = DB::table('appointement_booking')
                            ->join('patients', 'appointement_booking.patient_id', '=', 'patients.id')                     
                            ->select('appointement_booking.id as appointid','appointement_booking.starteTime','appointement_booking.endtime','appointement_booking.doctro_name as docId', 'patients.*')                     
                            ->where(DB::raw("DATE_FORMAT(appointement_booking.start_date, '%Y-%m-%d')"), '=', date('Y-m-d',time()))->get()->keyBy('id');
        $patientFirst = [];
        $todaysDoc =[];
        $patInDatabase = [];
        if(!empty($existingPat)){
            $first = !empty($existingPat->first)?json_decode($existingPat->first, true):[];
            $second = !empty($existingPat->second)?json_decode($existingPat->second, true):[];
            $third = !empty($existingPat->third)?json_decode($existingPat->third, true):[];
            $fourth = !empty($existingPat->fourth)?json_decode($existingPat->fourth, true):[];
            $fifth = !empty($existingPat->fifth)?json_decode($existingPat->fifth, true):[];
            $extData = array_merge($first,$second, $third, $fourth, $fifth);
            foreach ($extData as  $patvalue) {
                $patInDatabase[] = $patvalue['id'];
            }
        }
        $newPat = [];
        foreach ($patientsOfTheDay as $pat) {
            $patientFirst[] =[
                'id'=>$pat->id,
                'updated_by'=>$user->id,
                'update_date'=>date('Y-m-d H:i:s', time()),
                'color'=>''
            ];
            if(!in_array($pat->id, $patInDatabase)) {
                $newPat[] = [
                    'id'=>$pat->id,
                    'updated_by'=>$user->id,
                    'update_date'=>date('Y-m-d H:i:s', time()),
                    'color'=>''
                ];
            }
            $todaysDoc[]=$pat->docId;
        }
        //print_r($patInDatabase);print_r($newPat);
        $doctorData = User::whereIn('id', $todaysDoc)->select('users.surname','users.name','users.id')->get();
        if(!empty($existingPat)){
            $patientFirst = [];
            $patFirst = !empty($existingPat->first)?json_decode($existingPat->first, true):[];
            $newArray = array_merge($patFirst,$newPat);
            //print_r($newArray);die;
            $existingPat->first = json_encode($newArray);
        }
       // print_r($existingPat);die;
        return view('admin.patientManagement', ['patients' => $patientsOfTheDay,'existingPat'=>$existingPat,'user'=>$user,'patientFirst'=>$patientFirst,'examination'=>$examination,'doctorData'=>$doctorData]);
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
            if($mage->exists){
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
                            ->select('appointement_booking.id as appointid','appointement_booking.starteTime','appointement_booking.endtime', 'patients.*','users.surname','users.name as doctorname','users.id as doctorid','users.email as doctoremail','examination.title as examtitle','room.room_name')                     
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

    public function eyevisittabs(Request $request) {
        $eyeVisitTabs = EyeVisitTabs::where(['status'=>1])->get();
        return view('admin.eyeVisitTabs', ['eyeVisitTabs' => $eyeVisitTabs]);
    }

    public function addtab(Request $request) {
        $user = auth()->user();
        if($request->method() == 'POST') {
            $rules=[
                    'title' => 'required|string|max:200'  
                ];

            $message["title.required"] = 'Il campo è obbligatorio.';                 
            $this->validate($request, $rules,$message); 
            $eyevisittab = new EyeVisitTabs();
            $eyevisittab->title  =  Input::get('title');
            if($eyevisittab->save()) {
                return redirect('/admin/schede-eye-visit')->with('success',"La nuova scheda è stata aggiunta correttamente."); 
            }
        }
        return view('admin.addTab');
    }

    public function edittab(Request $request,$id) {
        $user = auth()->user();
        $tabsData = EyeVisitTabs::where(['id'=>$id])->first();
        if($request->method() == 'POST') {
            $rules=[
                    'title' => 'required|string|max:200'  
                ];

            $message["title.required"] = 'Il campo è obbligatorio.';                 
            $this->validate($request, $rules,$message); 
            $eyevisittab = EyeVisitTabs::find($id);
            $eyevisittab->title  =  Input::get('title');
            if($eyevisittab->save()) {
                return redirect('/admin/schede-eye-visit')->with('success',"La scheda è stata aggiornata correttamente."); 
            }
        }
        return view('admin.editTab', ['tabsData'=>$tabsData]);
    }

    public function deletetab(Request $request, $id) {
        if(!empty($id)) {
            $eyevisittab = EyeVisitTabs::find($id);
            $eyevisittab->status  =  0;
            if($eyevisittab->save()) {
                return redirect('/admin/schede-eye-visit')->with('success',"La scheda è stata eliminata correttamente."); 
            }
        }
    }

    public function tabsInput(Request $request, $id, $refrizione=null) {
        $where = ['tab_id'=>$id,'status'=>1];
        if(!empty($refrizione)) {
            $where['refrazione_section'] = $refrizione;
        }
        $tabsData = EyeVisitTabs::where(['id'=>$id])->first();
        $inputTabs = InputTabs::where($where)->get();
        return view('admin.tabsInput', ['tabsData'=>$tabsData,'inputTabs'=>$inputTabs,'refrizione' => $refrizione]);
    }

    public function addInput(Request $request,$tabid) {
        $user = auth()->user();
        if($request->method() == 'POST') {
            $inputtab = new InputTabs();
            $inputtab->title  =  Input::get('title');
            $inputtab->input_name  =  str_replace(' ', '_', strtolower(Input::get('title')));
            $inputtab->type = Input::get('type');
            $inputtab->tab_id = $tabid;
            $intval = Input::get('input_val');
            
            if(!empty($intval)){
                $inputtab->input_values = json_encode($intval);
            }
            
            if($inputtab->save()) {
                return redirect('/admin/ingressi-scheda/'.$tabid)->with('success',"Il nuovo input è stato aggiunto correttamente."); 
            }
        }
        return view('admin.addInput',['tabid'=>$tabid]);
    }

    public function editInput(Request $request,$tabid,$id) {
        $user = auth()->user();
        $inputData = InputTabs::where(['id'=>$id])->first();
        if($request->method() == 'POST') {
            $inputtab = InputTabs::find($id);
            $inputtab->title  =  Input::get('title');
            $inputtab->input_name  =  str_replace(' ', '_', strtolower(Input::get('title')));
            $inputtab->type = Input::get('type');
            $inputtab->tab_id = $tabid;
            $intval = Input::get('input_val');
            
            if(!empty($intval)) {
                $inputtab->input_values = json_encode($intval);
            }
            if($inputtab->save()) {
                return redirect('/admin/ingressi-scheda/'.$tabid)->with('success',"L'input è stato aggiornato correttamente."); 
            }
        }
        return view('admin.editInput', ['inputData'=>$inputData,'tabid'=>$tabid]);
    }

    public function deleteinput(Request $request,$tabid, $id) {
        if(!empty($id)) {
            $inputtab = InputTabs::find($id);
            $inputtab->status  =  0;
            if($inputtab->save()) {
                return redirect('/admin/ingressi-scheda/'.$tabid)->with('success',"L'input è stato cancellato correttamente."); 
            }
        }
    }

    public function listByDoctor(Request $request) {
        $existingPat = Managepatient::where(['manage_date'=>date('Y-m-d',time())])->first();
        $patientsOfTheDay = DB::table('appointement_booking')
                            ->join('patients', 'appointement_booking.patient_id', '=', 'patients.id')                     
                            ->select('appointement_booking.id as appointid','appointement_booking.starteTime','appointement_booking.endtime','appointement_booking.doctro_name as docId', 'patients.*','appointement_booking.examination_color')                     
                            ->where(DB::raw("DATE_FORMAT(appointement_booking.start_date, '%Y-%m-%d')"), '=', date('Y-m-d',time()))->get()->keyBy('id');
        $patientsTodayData = [];
        $todaysDoc =[];
        foreach ($patientsOfTheDay as $pat) {
            $patientsTodayData[$pat->docId][] =[
                'id'=>$pat->id,
                'patname'=>$pat->surname.' '.$pat->name,
                'dob'=>$pat->dob,
                'color'=>$pat->examination_color,
                'appointment_start' => $pat->starteTime,
                'appointment_end' => $pat->endtime,
                'curent_status' => $this->getCurrentStatus($existingPat, $pat->id)
            ];
            $todaysDoc[]=$pat->docId;
        }
        $doctorData = User::whereIn('id', $todaysDoc)->select('users.surname','users.name','users.id')->get();
        return view('admin.listByDoctor', ['doctorData'=>$doctorData,'patientsTodayData'=>$patientsTodayData]);
    }

    public function dailyPatChangeStatus(Request $request, $patId) {
        $existingPat = Managepatient::where(['manage_date'=>date('Y-m-d',time())])->first();
        $user = auth()->user();
        $currentStatus = $this->getCurrentStatus($existingPat, $patId);
        if($request->method() == 'POST') {
            $sectionArray = ['Pazienti del giorno'=>'first','Check In'=>'second','Chirurgia'=>'third','Esami'=>'fourth','Check Out'=>'fifth'];
            $sectionArraySecond = ['first'=>'Pazienti del giorno','second'=>'Check In','third'=>'Chirurgia','fourth'=>'Esami','fifth'=>'Check Out'];
            $existsec= $sectionArray[$currentStatus];
            $existingPatientSection = '{}';
            if(isset($existingPat->$existsec)) {
                $existingPatientSection = $existingPat->$existsec;
            }
            $sectionRemoved = $this->removeElementWithValue(json_decode($existingPatientSection,true), "id", $patId);
            $sectionToUpdate = Input::get('section');
            $sectionAdded = [];
            if(!empty($existingPat->$sectionToUpdate)) {
                $sectionAdded = json_decode($existingPat->$sectionToUpdate,true);
            }
            $toAdd = [
                'id' => $patId,
                'updated_by' => $user->id,
                'update_date' => date('Y-m-d H:i:s',time()),
                'color' => ''
            ];
            array_push($sectionAdded,$toAdd);

            $managePatientData[$existsec]  =  !empty($sectionRemoved)?json_encode($sectionRemoved):null;
            $managePatientData[$sectionToUpdate]  =  !empty($sectionAdded)?json_encode($sectionAdded):null;
            $managePatientData['manage_date'] = date('Y-m-d',time());
            $mage = Managepatient::firstOrNew(['manage_date'=>date('Y-m-d',time())], $managePatientData);
            if($mage->exists){
                Managepatient::where('id', $mage->id)->update($managePatientData);
                echo $patId.'|'.$sectionArraySecond[$sectionToUpdate];
            } else {
                $mage->save();
                echo $patId.'|'.$sectionArraySecond[$sectionToUpdate];
            }
            exit;
        }
        return view('admin.dailyPatChangeStatus', ['currentStatus'=>$currentStatus,'patId'=>$patId]);
    }

    public function getCurrentStatus($existingPat, $patId) {
        $currentStatus = '';
        if(!empty($existingPat)) {
            if(!empty($existingPat->first)) {
                $currentStatus = in_array($patId, array_column(json_decode($existingPat->first,true), 'id'))?'Pazienti del giorno':'';
            }
            if(!empty($existingPat->second) && empty($currentStatus)) {
                $currentStatus = in_array($patId, array_column(json_decode($existingPat->second,true), 'id'))?'Check In':'';
            }
            if(!empty($existingPat->third) && empty($currentStatus)) {
                $currentStatus = in_array($patId, array_column(json_decode($existingPat->third,true), 'id'))?'Chirurgia':'';
            }
            if(!empty($existingPat->fourth) && empty($currentStatus)) {
                $currentStatus = in_array($patId, array_column(json_decode($existingPat->fourth,true), 'id'))?'Esami':'';
            }
            if(!empty($existingPat->fifth) && empty($currentStatus)) {
                $currentStatus = in_array($patId, array_column(json_decode($existingPat->fifth,true), 'id'))?'Check Out':'';
            }
        }else{
            $currentStatus = 'Pazienti del giorno';
        }
        return $currentStatus;
    }

    public function removeElementWithValue($array, $key, $value){
         foreach($array as $subKey => $subArray){
              if($subArray[$key] == $value){
                   unset($array[$subKey]);
              }
         }
         return $array;
    }

    public function importPatient(Request $request) {
        $user = auth()->user();
        if($request->hasFile('import_file')){
            $extension=$request->file('import_file')->getClientOriginalExtension();
            if($extension == 'xlsx') {
                $res=2;
                Excel::load($request->file('import_file')->getRealPath(), function ($reader) use (&$res,$user) {
                    $excelData = $reader->toArray();
                    if(isset($excelData[0]['cognome'])){
                        $res =1;
                        foreach ($excelData as $key => $row) {
                            
                            $patientData['name'] = $row['nome'];
                            $patientData['surname'] = $row['cognome'];
                            $patientData['dob']  = isset($row['nascita_data'])?date('Y-m-d',strtotime($row['nascita_data'])):'';
                            $patientData['place_of_birth'] = $row['nascita_comune'];
                            $patientData['province_of_birth'] = $row['nascita_prov'];
                            $patientData['fiscal_code'] = $row['codfiscale'];
                            $patientData['place_of_living'] = $row['resid_comune'];
                            $patientData['province_of_living'] = $row['resid_prov'];
                            $patientData['address'] = $row['resid_indirizzo'];
                            $patientData['number_of_the_address'] = $row['resid_civico'];
                            $patientData['postal_code'] = $row['resid_cap'];
                            $patientData['telephone'] = $row['telefono'];
                            $patientData['phone'] = $row['cellulare'];
                            $patientData['added_by'] = $user->id;
                            $patientData['updated_by'] = $user->id;
                            $patientData['privacy_agreement_date'] = isset($row['dt_consenso_privacy'])?date('Y-m-d',strtotime($row['dt_consenso_privacy'])):'';
                            $mage = Patient::firstOrNew(['name'=>$patientData['name'],'surname'=>$patientData['surname'],'dob'=>$patientData['dob']], $patientData);
                            if($mage->exists){
                                Patient::where('id', $mage->id)->update($patientData);
                            } else {
                                $mage->save();
                            }
                            
                        } 
                    }else{
                        $res=2;
                    }
                });
                if($res == 1) {
                    return redirect('/admin/paziente')->with('success',"I dati del paziente sono stati importati correttamente.");
                }else{
                    return redirect('/admin/paziente')->with('error',"Dati paziente errati.");
                }
            }else{
                return redirect('/admin/paziente')->with('error',"Estensione errata. Seleziona il file con estensione '.xlsx'."); 
            }
        } else {
            return redirect('/admin/paziente')->with('error',"Seleziona il file da importare."); 
        }
    }

    public function getPatientSignature(Request $request,$patid) {
        $data = [];
        $patData = Patient::where(['id'=>$patid])->select('patients.surname','patients.name','patients.id')->first();
        if($request->method() == 'POST') {
            echo Input::get('patient_signature');echo Input::get('pat_id');die('herrere');
        }
        return view('admin.getPatientSignature', ['data'=>$data,'patData'=>$patData]);

    }
}
