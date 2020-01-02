<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Reminder;


class ReminderController extends Controller
{
    public function index(Request $request)
    {
        $reminders = Reminder::where(['user_id'=>auth()->user()->id])->get();
        return view('admin.reminder',['reminders'=>$reminders]);
    }

    public function addReminder(Request $request) {
        $user = auth()->user();
    	if($request->method() == 'POST') {
    		$reminder = new Reminder();
            $reminder->description  =  Input::get('description');
            $reminder->reminder_time  =  date('Y-m-d H:i:s',strtotime(Input::get('reminder_time')));
            $reminder->user_id  =  $user->id;
            if($reminder->save()) {
                if($user->role_type == '3') {
                    return redirect('/medico/promemoria')->with('success',"Il promemoria è stato creato correttamente."); 
                }else{
                    return redirect('/admin/promemoria')->with('success',"Il promemoria è stato creato correttamente."); 
                }
            }
    	}
    	return view('admin.addreminder');
    }

    public function editReminder(Request $request, $id) {
        $user = auth()->user();
    	$reminder = Reminder::where(['id'=>$id])->first();
    	if($request->method() == 'POST') {
    		$reminder = Reminder::find($id);
            $reminder->description  =  Input::get('description');
            $reminder->reminder_time  =  date('Y-m-d H:i:s',strtotime(Input::get('reminder_time')));
            $reminder->user_id  =  $user->id;
            if($reminder->save()) {
                if($user->role_type == '3') {
                    return redirect('/medico/promemoria')->with('success',"Il promemoria è stato aggiornato correttamente."); 
                }else{
                    return redirect('/admin/promemoria')->with('success',"Il promemoria è stato aggiornato correttamente."); 
                }
            }
    	}
    	return view('admin.editreminder',['reminder'=>$reminder]);
    }

    public function deleteReminder(Request $request, $id) {
        $user = auth()->user();
        if(!empty($id)) {
            $eyevisittab = Reminder::find($id);
            if($eyevisittab->delete()) {
                if($user->role_type == '3') {
                    return redirect('/medico/promemoria')->with('success',"Il promemoria è stato eliminato correttamente.");
                }else{
                    return redirect('/admin/promemoria')->with('success',"Il promemoria è stato eliminato correttamente.");
                }
            }
        }
    }

    public function getreminder(Request $request) {
        $user = auth()->user();
        $actime = date('Y-m-d H:i:s',time());
        $currentTime=date("Y-m-d H:i:s", strtotime('+5 hours')); 
        $appointmentData= DB::select(DB::raw("select * from reminder WHERE user_id = ".$user->id." AND (reminder_time <= '" . $currentTime . "') AND is_read = 0"));
        $appData = [];
        foreach ($appointmentData as $data) {
            $appData[] = [
                'id' =>$data->id,
                'description'=>$data->description,
                'time' => strtotime($data->reminder_time) - strtotime($actime),
                'actime'=> date('Y-m-d H:i',strtotime($data->reminder_time)),
                'current'=>$actime
            ];
        }
        return json_encode($appData);
    }

    public function updatereminder() {
        $rid = Input::get('id');
        if(!empty($rid)) {
            $reminder = Reminder::find($rid);
            $reminder->is_read  =  1;
            if($reminder->save()) {
                echo 'success';
            }
        }
        exit;
    }
}
