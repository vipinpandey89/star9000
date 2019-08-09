<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Examination;
use App\AppointmentBooking;
use App\Room;

class AppointmentController extends Controller
{
   public function index(Request $request)
    {

    	if(isset($_POST['add']))
    	{

    			//echo '<pre>';print_r($_POST);die;
    		 $AppointmentBooking = new AppointmentBooking();

                $roomId = Input::get('rooms');

               $GetroomColor = Room::where(['id'=>$roomId])->first();

                $date = Input::get('selected_date');

                $starttime= Input::get('starteTime');

                $endtime =  Input::get('endtime');

                $startDate = $date.' '.$starttime;

                $endDate = $date.' '.$endtime;

    			$AppointmentBooking->doctro_name         =     Input::get('doctro');
    			$AppointmentBooking->examination_id      =     Input::get('examination_id');
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

    		return redirect('admin/calendario')->with('success','Il dettaglio viene aggiunto correttamente');		
    	}

    	$examination = Examination::all();
    	return view('admin.appointmentView',['examination'=>$examination]);
    }

    public function ResponseData()
    {
    		$result= AppointmentBooking::all();

            // $result  =  DB::table('appointement_booking')
                          //  ->leftjoin('room', 'appointement_booking.examination_id', '=', 'room.examination_type')                     
                           // ->select('appointement_booking.*', 'room.room_color')                     
                           // ->get();

             //echo '<pre>';print_r($result);die;
    		foreach($result as $row)
			{
			      $data[] = array(
        						  'id'   => $row->id,
        						  'title'   => $row->doctro_name,
        						  'start'   => date('Y-m-d H:i',strtotime($row->start_date)),
        						  'end'   => date('Y-m-d H:i',strtotime($row->end_date)),
                                  'color' => !empty($row->examination_color)?$row->examination_color:''
    						 );
			}

		echo  json_encode($data);		
    }

   public function AjaxResponse($id)
    {

        $getData= Room::where(['examination_type'=>$id])->get();

        return json_encode($getData);

    }
}
