<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Examination;
use App\AppointmentBooking;
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
           
    		foreach($result as $row)
			{
			     $DoctorDetail = User::where(['id'=>$row->doctro_name])->first(); 

			      $data[] = array(
        						  'id'   => $row->id,
        						  'title'   => $DoctorDetail->name,
        						  'start'   => date('Y-m-d H:i',strtotime($row->start_date)),
        						  'end'   => date('Y-m-d H:i',strtotime($row->end_date)),
                                  'color' => !empty($row->examination_color)?$row->examination_color:''
    						 );
			}

		echo  json_encode($data);		
    }

   public function AjaxResponse($id)
    {
                
        $selectedDate = isset($_GET['selectdate'])?$_GET['selectdate']:'';

        $getDay = date('D',strtotime($selectedDate));


        if($getDay =='Mon') { $Wekday_num = '2';  }elseif($getDay =='Tue')  {$Wekday_num = '3'; } elseif($getDay =='Wed')  { $Wekday_num = '4'; } elseif($getDay =='Thu')  { $Wekday_num = '5'; 
        } elseif($getDay =='Fri') { $Wekday_num = '6'; } elseif($getDay =='Sat')  { $Wekday_num = '7';} elseif($getDay =='Sun')   { $Wekday_num = '8'; }


        $getData['DoctorInformation'] = DB::select("select u.name,u.id as user_id,d.examination_id,d.weekdays_id FROM doctors as d  join users as u  on u.id= d.userId  WHERE d.examination_id=$id and    d.weekdays_id=$Wekday_num group by d.userId");        


        $getData['rooms']= Room::where(['examination_type'=>$id])->get();

        

        return json_encode($getData);
    }

    public function AjaxSetAppointment(Request $request)
    {
        
               

        $roomId =               Input::get('rooms');

        $doctor =               Input::get('doctro');

        $examinationId =       Input::get('examination_id');

        $GetroomColor =        Room::where(['id'=>$roomId])->first();

        $date =                Input::get('selected_date');

        $starttime=            Input::get('starteTime');

        $endtime =             Input::get('endtime');

        $startDate =           $date.' '.$starttime;

        $endDate =             $date.' '.$endtime;

          

        $matchdata= DB::select("select * from appointement_booking WHERE start_date BETWEEN '$startDate' and '$endDate' and end_date BETWEEN '$startDate' and '$endDate' and start_date <= '$endDate' or  end_date >= '$startDate'");     

     
        if(empty($matchdata))
        {
        	 $AppointmentBooking = new AppointmentBooking();

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
            $AppointmentBooking->examination_color   =    $GetroomColor->room_color;

            $AppointmentBooking->save();    

            return  'success';  

        }else{

            return  'error';
        }               

    }

}
