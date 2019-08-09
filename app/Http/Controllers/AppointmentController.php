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
            $patient = Patient::where(['appointment_id'=>$row->id])->first();
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
                              'is_cancel' => $row->is_cancel
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

        }else{

            return  'error';
        }               

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

}
