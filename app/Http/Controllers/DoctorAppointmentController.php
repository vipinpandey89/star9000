<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use App\AppointmentBooking;
use App\User;
use App\Patient;
use App\Examination;
use App\Room;


class DoctorAppointmentController extends Controller
{
    public function List(Request $request)
    {
        $examtypes = Examination::all()->mapWithKeys(function ($ref) {
            return [$ref->id => $ref->title];
        });
        $rooms = Room::all()->mapWithKeys(function ($room) {
            return [$room->id => $room->room_name];
        });
        $doctorData = DB::table('doctors')
                ->leftJoin('weekdays', 'doctors.weekdays_id', '=', 'weekdays.weekday_num')
                ->select('doctors.*', 'weekdays.day_of_week')
                ->where('doctors.userId', '=', Auth::user()->id)
                ->get();
        $daysArray = ['Mon'=>1, 'Tue'=>2,'Wed'=>3,'Thu'=>'4','Fri'=>5,'Sat'=>6,'Sub'=>7];
        $availableDays = array();
        $scrollTime = '';
        foreach ($doctorData as $data) {
            $scrollTime = $data->start_time;
            $availableDays[] =[
                'dow' => [$daysArray[$data->day_of_week]],
                'start' => $data->start_time,
                'end' => $data->end_time
            ];
        }
        return view('admin.doctorappointmentView',['examtypes' => $examtypes,'rooms' => $rooms,'availableDays' => $availableDays,'scrollTime'=>$scrollTime]);
    }

    public function ResponseData()
    {
        $docId = Auth::user()->id;
        $result= AppointmentBooking::where(['doctro_name'=>$docId])->get();
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
                              'doctorname'   => $DoctorDetail->name,
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
    

}
