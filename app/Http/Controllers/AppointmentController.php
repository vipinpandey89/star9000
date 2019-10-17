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
use App\RecurrenceAppointment;
use DateTime;
use DatePeriod;
use DateInterval;


class AppointmentController extends Controller
{
    public function index(Request $request)
    {

        $examination = Examination::all();

        $Doctor = User::where(['role_type'=>'3'])->get();
        $patients = Patient::all();
        $rooms = Room::all();
        $patientsData = [];
        foreach ($patients as $data) {
            $patientsData[]=[
                'surname' => $data['surname'].' '.$data['name'].(!empty($data['dob'])?' - ('.$data['dob'].')':''),
                'email' => $data['email'],
                'dob' => $data['dob'],
                'id' => $data['id']
            ];
        }
        $AppointmentUser  = DB::table('appointement_booking')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')                     
                            ->select('appointement_booking.*', 'users.name','users.phone','users.email')                     
                            ->get();
        return view('admin.appointmentView',['examination'=>$examination,'Doctor'=>$Doctor,'appointmentuser'=>$AppointmentUser,'patientsData'=>$patientsData, 'rooms'=>$rooms]);
     }

    public function ResponseData()
    {
        $examinationEvent = Examination::all();
        $roomsEvent = Room::all();
        $exams = [];
        $rooms = [];
        
        array_map(function($item) use (&$exams) {
            $exams[$item['id']] = $item['title']; // object to array
        }, $examinationEvent->toArray());
        array_map(function($item) use (&$rooms) {
            $rooms[$item['id']] = $item['room_name']; // object to array
        }, $roomsEvent->toArray());
        $filterbydoctor = Input::get('filterbydoctor');
        $filterexamtype = Input::get('filterexamtype');
        $filterroom = Input::get('filterroom');
        $tenDaysBack = date('Y-m-d', strtotime('-10 days', time()));
        $appoint = DB::table('appointement_booking')
                     ->select('*')
                     ->where('start_date', '>=', $tenDaysBack);
        if(isset($filterbydoctor) && !empty($filterbydoctor)) {
            $appoint->whereIn('doctro_name', $filterbydoctor);
        }
        if(isset($filterexamtype) && !empty($filterexamtype)) {
            $appoint->where('examination_id', '=', $filterexamtype);
        }
        if(isset($filterroom) && !empty($filterroom)) {
            $appoint->where('room_id', '=', $filterroom);
        }
        $result = $appoint->get();
        $data =[];
        foreach($result as $row)
        {
            $DoctorDetail = User::where(['id'=>$row->doctro_name])->first();
            $recurrence = '';
            $patientWhere = ['id'=>$row->patient_id];
            $recurrence = $row->recurrence;
            
            $patient = Patient::where($patientWhere)->first();
            $emaildat='';
            if(!empty($patient->dob)){
                $emaildat=' - ('.(isset($patient->dob)?$patient->dob:'').')';
            }
            $eventDescription = "<div><div>Nome del dottore : ".$DoctorDetail->name."</div>";
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

   public function AjaxResponse($id)
    {
                
        $selectedDate = isset($_GET['selectdate'])?$_GET['selectdate']:'';
        $startTime = isset($_GET['starttime'])?$_GET['starttime']:'';
        $endTime = isset($_GET['endtime'])?$_GET['endtime']:'';
        $getDay = date('D',strtotime($selectedDate));


        if($getDay =='Mon') { $Wekday_num = '2';  }elseif($getDay =='Tue')  {$Wekday_num = '3'; } elseif($getDay =='Wed')  { $Wekday_num = '4'; } elseif($getDay =='Thu')  { $Wekday_num = '5'; 
        } elseif($getDay =='Fri') { $Wekday_num = '6'; } elseif($getDay =='Sat')  { $Wekday_num = '7';} elseif($getDay =='Sun')   { $Wekday_num = '8'; }

         //(end_time >= ".$startTime." and start_time <= ".$endTime." )
        $getData['DoctorInformation'] = DB::select("select u.name,u.id as user_id,d.examination_id,d.weekdays_id FROM doctors as d  join users as u  on u.id= d.userId  WHERE d.examination_id=$id and d.weekdays_id=$Wekday_num and ((TIME(d.end_time) >= TIME('".$startTime."')) and (TIME(d.start_time) <= TIME('".$endTime."')) ) group by d.userId");        


        $getData['rooms']= Room::where(['examination_type'=>$id])->get();

        

        return json_encode($getData);
    }

    public function AjaxSetAppointment(Request $request)
    {     
        $user = auth()->user();
        $roomId =               Input::get('rooms');

        $doctor =               Input::get('doctro');

        $examinationId =       Input::get('examination_id');

        $GetroomColor =        Room::where(['id'=>$roomId])->first();

        $date =                Input::get('selected_date');

        $starttime=            Input::get('starteTime');

        $endtime =             Input::get('endtime');

        $startDate =           $date.' '.$starttime;

        $endDate =             $date.' '.$endtime;
        $roomID =               Input::get('rooms');
        $patientEmail =         Input::get('patient_email');
        $patientId =            Input::get('patient_id');
        $visitMotive =            Input::get('visit_motive');

        if(empty(Input::get('appointment_id'))) {
            $matchdata= DB::select("select id from appointement_booking WHERE doctro_name = ".$doctor." AND is_cancel='0' AND ((end_date > '" . date('Y-m-d h:i:s',strtotime($startDate)) . "') AND (start_date < '" . date('Y-m-d h:i:s',strtotime($endDate)) . "'))");
        } else {
            $matchdata= DB::select("select id from appointement_booking WHERE doctro_name = ".$doctor." AND is_cancel='0' AND ((end_date > '" . date('Y-m-d h:i:s',strtotime($startDate)) . "') AND (start_date < '" . date('Y-m-d h:i:s',strtotime($endDate)) . "')) AND id <> ".Input::get('appointment_id'));
        }
        if(empty($matchdata))
        {
            if(Input::get('recurrence')) {
                $recurrenceData['doctro_name'] = $doctor;
                $recurrenceData['examination_id'] = $examinationId;
                $recurrenceData['startTime'] = $starttime;
                $recurrenceData['endtime'] = $endtime;
                $recurrenceData['examination_color'] = $GetroomColor->room_color;
                $recurrenceData['room_id'] = $roomID;
                $recurrenceData['patient_email'] = $patientEmail;
                $recurrenceData['patient_id'] = $patientId;
                $recurrenceData['patient_added_updated_by'] = $user->id;
                $recurrenceData['visit_motive'] = $visitMotive;

                $recurrenceData['recurrence_start'] = $date;
                $recurrenceData['recurrence_end'] = Input::get('recurrence_end');
                $recurrenceData['recurrence_type'] = Input::get('recurrence_type');
                if($this->checkRecurrenceAppointment($recurrenceData)) {
                    $this->recurrenceAppointment($request, $recurrenceData);
                }
            } else {
                if(empty(Input::get('appointment_id'))) {
                    $AppointmentBooking = new AppointmentBooking();
                }else{
                    $AppointmentBooking = AppointmentBooking::find(Input::get('appointment_id'));
                }
                $AppointmentBooking->doctro_name         =     $doctor;
                $AppointmentBooking->examination_id      =     $examinationId;
                $AppointmentBooking->starteTime          =     $starttime;
                $AppointmentBooking->endtime             =     $endtime;
                $AppointmentBooking->start_date          =     $startDate;
                $AppointmentBooking->end_date            =     $endDate;
                $AppointmentBooking->str_starttime       =     strtotime($starttime);
                $AppointmentBooking->str_endtime         =     strtotime($endtime);
                $AppointmentBooking->str_startdate       =     strtotime($startDate);
                $AppointmentBooking->str_enddate         =     strtotime($endDate);
                $AppointmentBooking->examination_color   =     $GetroomColor->room_color;
                $AppointmentBooking->room_id   =     $roomID;
                $AppointmentBooking->visit_motive   =     $visitMotive;
                $AppointmentBooking->patient_id   =     $patientId;

                if($AppointmentBooking->save()) {
                    $request->session()->flash('success', "L'appuntamento è stato aggiornato con successo.");
                }
                return  'success';  
            }

        }else{

            return  'error';
        }               

    }

    public function CreatePatient() {
        $user = auth()->user();
        $patientSurname =          Input::get('surname');
        $patientDob =          Input::get('pat_dob');
        $patientName =          Input::get('pat_name');
        $patientEmail =         Input::get('pat_email');
        $patientPhone =         Input::get('pat_phone_num');
        $patientDesc =         Input::get('pat_desc');
        $patient = new Patient();
        $patient->email                  =     $patientEmail;
        $patient->name                   =     $patientName;
        $patient->phone                  =     $patientPhone;
        $patient->surname                =     $patientSurname;
        $patient->dob                    =     $patientDob;
        $patient->description            =     $patientDesc;
        $patient->added_by               =     $user->id;
        $patient->updated_by             =     $user->id;
        if($patient->save()) {
            echo $patient->id;
        }
        exit;
    }

    public function checkRecurrenceAppointment($appointmentData) {
        $startDate = new DateTime($appointmentData['recurrence_start']);
        $endDate = new DateTime($appointmentData['recurrence_end']);
        switch($appointmentData['recurrence_type']){
            case 'daily':
                $day = 1;
                break;
            case 'weekly':
                $day = 7;
                break;
            case 'monthly':
                $day = 28;
                break;
            case 'yearly':
                $day = 336;
                break;
        }
        $where='';
        for($i = $startDate; $i <= $endDate; $i->modify('+'.$day.' day')) {
            $apStatDate = $i->format("Y-m-d").' '.$appointmentData['startTime'];
            $apEndDate = $i->format("Y-m-d").' '.$appointmentData['endtime'];
            $where .= "((end_date > '" . date('Y-m-d h:i:s',strtotime($apStatDate)) . "') AND (start_date < '" . date('Y-m-d h:i:s',strtotime($apEndDate)) . "')) OR ";
        }
        $where = substr_replace($where ,"", -3);
        $matchdata= DB::select("select id from appointement_booking WHERE doctro_name = ".$appointmentData['doctro_name']." AND is_cancel='0' AND (".$where.")");
        if(!empty($matchdata))
        {
            echo 'error';
        } else {
            return true;
        }
        exit;
    }

    public function recurrenceAppointment($request, $appointmentData) {
        $startDate = new DateTime($appointmentData['recurrence_start']);
        $endDate = new DateTime($appointmentData['recurrence_end']);
        $recurrence = new RecurrenceAppointment();
        $recurrence->recurrence_type        =     $appointmentData['recurrence_type'];
        $recurrence->start_date             =     $startDate;
        $recurrence->end_date               =     $endDate;

        if($recurrence->save()){
            $recurrenceId = $recurrence->id;
            //check doctor availability here- to be done
            $doctorData = DB::table('doctors')
                ->leftJoin('weekdays', 'doctors.weekdays_id', '=', 'weekdays.weekday_num')
                ->select('doctors.weekdays_id', 'weekdays.day_of_week')
                ->where('doctors.userId', '=', $appointmentData['doctro_name'])
                ->where('doctors.examination_id', '=', $appointmentData['examination_id'])
                ->get();

            $availableDays = array();
            array_map(function($item) use (&$availableDays) {
                $availableDays[$item->weekdays_id] = $item->day_of_week; // object to array
            }, $doctorData->toArray());
            switch($appointmentData['recurrence_type']){
                case 'daily':
                    $day = 1;
                    break;
                case 'weekly':
                    $day = 7;
                    break;
                case 'monthly':
                    $day = 28;
                    break;
                case 'yearly':
                    $day = 336;
                    break;
            }
            for($i = $startDate; $i <= $endDate; $i->modify('+'.$day.' day')) {
                if(in_array($i->format("D"), $availableDays)) {
                    $apStatDate = $i->format("Y-m-d").' '.$appointmentData['startTime'];
                    $apEndDate = $i->format("Y-m-d").' '.$appointmentData['endtime'];
                    $AppointmentBooking = new AppointmentBooking();
                    $AppointmentBooking->doctro_name         =     $appointmentData['doctro_name'];
                    $AppointmentBooking->examination_id      =     $appointmentData['examination_id'];
                    $AppointmentBooking->starteTime          =     $appointmentData['startTime'];
                    $AppointmentBooking->endtime             =     $appointmentData['endtime'];
                    $AppointmentBooking->visit_motive        =     $appointmentData['visit_motive'];
                    $AppointmentBooking->start_date          =     $apStatDate;
                    $AppointmentBooking->end_date            =     $apEndDate;
                    $AppointmentBooking->str_starttime       =     strtotime($appointmentData['startTime']);
                    $AppointmentBooking->str_endtime         =     strtotime($appointmentData['endtime']);
                    $AppointmentBooking->str_startdate       =     strtotime($apStatDate);
                    $AppointmentBooking->str_enddate         =     strtotime($apEndDate);
                    $AppointmentBooking->examination_color   =     $appointmentData['examination_color'];
                    $AppointmentBooking->room_id   =     $appointmentData['room_id'];
                    $AppointmentBooking->recurrence   =     $recurrenceId;
                    $AppointmentBooking->patient_id   =     $appointmentData['patient_id'];
                    $AppointmentBooking->save();
                }
            }
            $request->session()->flash('success', "L'appuntamento di ricorrenza è stato creato correttamente.");
            echo  'success'; 
        }
        exit;
    }

    public function CancelAppointment(Request $request)
    {
        $appid = Input::get('appid');
        $appointment = AppointmentBooking::find($appid);
        if(!empty($appointment)) {
            if(AppointmentBooking::where('id', $appid)->update(['is_cancel' => '1','examination_color' => '#FF0000'])) {
                $request->session()->flash('success', "L'appuntamento è stato cancellato con successo.");
                return  'success';  
            }else{
                $request->session()->flash('error', "Error occured. Try again later.");
                return  'error';
            }
        }
        exit;
        
    }

    public function CancelRecurrenceAppointment(Request $request)
    {
        $appid = Input::get('appid');
        $appointment = AppointmentBooking::find($appid);
        if(!empty($appointment->recurrence)) {
            if(AppointmentBooking::where('recurrence', $appointment->recurrence)->update(['is_cancel' => '1','examination_color' => '#FF0000'])) {
                $request->session()->flash('success', "L'appuntamento di ricorrenza è stato annullato correttamente.");
                return  'success';  
            }else{
                $request->session()->flash('error', "Error occured. Try again later.");
                return  'error';
            }
        }
        exit;
        
    }

    public function getdoctoravailability() {
        $docids = Input::get('filterByDoctor');
        $currentDateTime = date('Y-m-d H:i',strtotime(Input::get('dateTimeToday')));
        $now = new DateTime();
        $startDate = new DateTime();
        $endDate = $now->add(new DateInterval('P60D'));
        $doctorData = DB::table('doctors')
                ->leftJoin('weekdays', 'doctors.weekdays_id', '=', 'weekdays.weekday_num')
                ->select('doctors.weekdays_id', 'weekdays.day_of_week', 'doctors.start_time','doctors.end_time')
                ->where('doctors.userId', '=', $docids[0])
                ->get();

        $availableDays = array();
        $todaydiff =0;
        array_map(function($item) use (&$availableDays,&$currentDateTime,&$todaydiff) {
            if(date('D',time()) == $item->day_of_week) {
                if(strtotime($currentDateTime) > strtotime(date('Y-m-d ',time()).$item->start_time)){
                    $time1 = strtotime($currentDateTime);
                    $time2 = strtotime(date('Y-m-d ',time()).$item->end_time);
                    $todaydiff = abs($time1 - $time2) / 60;
                } else {
                    $time1 = strtotime(date('Y-m-d ',time()).$item->start_time);
                    $time2 = strtotime(date('Y-m-d ',time()).$item->end_time);
                    $todaydiff = abs($time1 - $time2) / 60;
                }
            }
            $ts1 = strtotime(date('Y-m-d ',time()).$item->start_time);
            $ts2 = strtotime(date('Y-m-d ',time()).$item->end_time);
            $diff = abs($ts1 - $ts2) / 60;
            $availableDays[$item->day_of_week] = $diff;
        }, $doctorData->toArray());
        $count=1;
        for($i = $startDate; $i <= $endDate; $i->modify('+1 day')) {
            $appData= DB::select("select SUM(TIMESTAMPDIFF(MINUTE, start_date , end_date)) as totalminutes from appointement_booking WHERE date_format(start_date,'%Y-%m-%d') = '".$i->format("Y-m-d")."' AND doctro_name =".$docids[0]);
            $totalTime = 0;
            if(isset($appData[0]->totalminutes)) {
                $totalTime = $appData[0]->totalminutes;
            }
            if(isset($availableDays[$i->format("D")])) {
                if($count == 1) {
                    if($todaydiff > $totalTime) {
                        echo $i->format("Y-m-d");
                        break;
                    }
                } else {
                    if($availableDays[$i->format("D")] > $totalTime) {
                        echo $i->format("Y-m-d");
                        break;
                    }
                }
            }
            $count++;
        }
        die;
    }

}
