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


        $AppointmentUser  = DB::table('appointement_booking')
                            ->join('users', 'appointement_booking.doctro_name', '=', 'users.id')                     
                            ->select('appointement_booking.*', 'users.name','users.phone','users.email')                     
                            ->get();
  
        //echo '<pre>';print_r($AppointmentUser);die;


        return view('admin.appointmentView',['examination'=>$examination,'Doctor'=>$Doctor,'appointmentuser'=>$AppointmentUser]);
     }

    public function ResponseData()
    {
        $result= AppointmentBooking::all();
        $data =[];
        foreach($result as $row)
        {
            $DoctorDetail = User::where(['id'=>$row->doctro_name])->first();
            $recurrence = '';
            if(empty($row->recurrence)) {
                $patientWhere = ['appointment_id'=>$row->id];
            }else{
                $patientWhere = ['recurrence_id'=>$row->recurrence];
                $recurrence = $row->recurrence;
            }
            $patient = Patient::where($patientWhere)->first();
            $data[] = array(
                              'id'   => $row->id,
                              'title'   => (($row->is_cancel == 1)?$DoctorDetail->name.'- Annullato':$DoctorDetail->name),
                              'start'   => date('Y-m-d H:i',strtotime($row->start_date)),
                              'end'   => date('Y-m-d H:i',strtotime($row->end_date)),
                              'color' => !empty($row->examination_color)?$row->examination_color:'',
                              'examination_id' => $row->examination_id,
                              'starttime' => $row->starteTime,
                              'endtime' => $row->endtime,
                              'endtime' => $row->endtime,
                              'room_id' => $row->room_id,
                              'doctor_id' => $row->doctro_name,
                              'patient_name' => (isset($patient->name)?$patient->name:''),
                              'patient_email' => (isset($patient->email)?$patient->email:''),
                              'patient_phone' => (isset($patient->phone)?$patient->phone:''),
                              'patient_id' => (isset($patient->id)?$patient->id:''),
                              'is_cancel' => $row->is_cancel,
                              'recurrence' => $recurrence
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
        $patientName =          Input::get('patient_name');
        $patientEmail =         Input::get('patient_email');
        $patientPhone =         Input::get('patient_phone');

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
                $recurrenceData['patient_name'] = $patientName;
                $recurrenceData['patient_phone'] = $patientPhone;
                $recurrenceData['patient_added_updated_by'] = $user->id;

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

                if($AppointmentBooking->save()) {
                    if(empty(Input::get('appointment_id'))) {
                        $patient = new Patient();
                        $patient->appointment_id         =     $AppointmentBooking->id;
                        $request->session()->flash('success', "L'appuntamento è stato creato correttamente.");
                    } else {
                        $patient = Patient::find(Input::get('pat_id'));
                        $request->session()->flash('success', "L'appuntamento è stato aggiornato con successo.");
                    }
                    $patient->email                  =     $patientEmail;
                    $patient->name                   =     $patientName;
                    $patient->phone                  =     $patientPhone;
                    $patient->added_by               =     $user->id;
                    $patient->updated_by             =     $user->id;
                    $patient->save();
                }
                return  'success';  
            }

        }else{

            return  'error';
        }               

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
                    $AppointmentBooking->start_date          =     $apStatDate;
                    $AppointmentBooking->end_date            =     $apEndDate;
                    $AppointmentBooking->str_starttime       =     strtotime($appointmentData['startTime']);
                    $AppointmentBooking->str_endtime         =     strtotime($appointmentData['endtime']);
                    $AppointmentBooking->str_startdate       =     strtotime($apStatDate);
                    $AppointmentBooking->str_enddate         =     strtotime($apEndDate);
                    $AppointmentBooking->examination_color   =     $appointmentData['examination_color'];
                    $AppointmentBooking->room_id   =     $appointmentData['room_id'];
                    $AppointmentBooking->recurrence   =     $recurrenceId;
                    $AppointmentBooking->save();
                }
            } 
            $patient = new Patient();
            $patient->appointment_id         =     0;
            $patient->recurrence_id          =     $recurrenceId;
            $patient->email                  =     $appointmentData['patient_email'];
            $patient->name                   =     $appointmentData['patient_name'];
            $patient->phone                  =     $appointmentData['patient_phone'];
            $patient->added_by               =     $appointmentData['patient_added_updated_by'];
            $patient->updated_by             =     $appointmentData['patient_added_updated_by'];
            $patient->save();
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

}
