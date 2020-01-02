<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Examination;
use App\Room;
use App\Doctor;


class AdminController extends Controller
{
    //

    public function index(Request $request)
    {
      $user = auth()->user();
      if(isset($user->id)) {
        if($user->role_type == 3) {
          return redirect('medico/appuntamenti');
        } else if($user->role_type == 1) {
          return redirect('admin/calendario');
        } else {
          return redirect('admin/elenco-per-medico');
        }
      }
    	if(isset($_POST['addlogin']))
    	{
    			 $rules = [
                        'email' => 'required|email',             
                        'password' => 'required|min:6|max:20',
                   ];

              $message["email.required"] = 'Il campo email è obbligatorio';
              $message["password.required"] = 'Il campo della password è obbligatorio';
              $message["password.min"] = 'La password deve contenere almeno 6 caratteri';
              $message["password.max"] = 'La password non può avere più di venti caratteri';
              $message["email.email"] = "L'indirizzo e-mail deve essere valido";

             $this->validate($request, $rules,$message);  

    			$email = Input::get('email');

    			$password = Input::get('password');

      		if(Auth::attempt(['email' => $email, 'password' => $password]))
      		{
      		  	if(auth()->user()->role_type == 3) {
                return redirect('medico/appuntamenti');
              } else if(auth()->user()->role_type == 1){
                return redirect('admin/calendario');
              }else{
                return redirect('admin/elenco-per-medico');
              }

         	 }else{
                   return redirect('/admin')->with('danger','Indirizzo email o password sono errati!');
           }

    	}

    	return view('admin.login');
    }


    public function dasbhoard()
    {

    	return view('admin/dasbhoard');
    }


    public function ListSecretary()
    {

    	$user= User::where(['role_type'=>'2','is_delete'=>'0'])->get();

    	return view('admin.list-secteray',['userDetail'=>$user]);
    }

    public function AddSecretary(Request $request)
    {

    	if(isset($_POST['addsectary']))
    	{
    			 $rules=[
                        'fullname' => 'required|string|max:200',                     
                        'phone' => 'required|numeric|digits:10',
                        'email' => 'required|string|email|max:255|unique:users',
                        'regione' => 'required|string|min:5', 
                        'cap' => 'required|numeric|min:5', 
                        'dob' => 'required|string|min:5',                             
                    ];

                     $message["fullname.required"] = 'È richiesto il campo nome';	
		                $message["cap.required"] = 'Il campo cap è richiesto';
                     $message["email.required"] = 'Il campo email è obbligatorio';
                     $message["email.unique"] = "l'email è già stata presa";
                      $message["email.email"] = "Questa email deve essere un indirizzo email valido";
                     $message["phone.digits"] = 'Il numero di telefono deve essere di 10 cifre';
                     $message["phone.required"]= 'Il campo telefono è richiesto';
                     $message["dob.required"] = 'Il campo dob è richiesto';	
                     $message["regione.required"] = 'Il campo Regione è richiesto';

                $this->validate($request, $rules,$message);  

                $rand= rand('456213','5565546');	

                $user = new User();


                   $user->name         =       Input::get('fullname');
                   $user->email         =      Input::get('email');                    
                   $user->phone        =       Input::get('phone');
                   $user->regione      =       Input::get('regione');
                   $user->cap          =       Input::get('cap'); 
                   $user->dob          =       Input::get('dob');
                   $user->password     =       bcrypt($rand);
                   $user->role_type     =     '2';

                   if ($user->save()) {  

                          // send mail here //
                              
                             $notMessage = 'Nuovo registro promotore';

                             $subject= 'Registration Confirmation';

                             $header = "From:star900@star900.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             $message ='Ciao '.$request->input('fullname').'<br/>'; 
                             $message.='la tua password '.$rand.'<br/>';
                             $message.='Grazie per esserti registrato su star9000 <br/>';                           

                           mail($request->input('email'),$subject,$message,$header);     


                          // end here // 

                     return redirect('/admin/lista-segretaria')->with('success',"I dati sono stati salvati correttamente."); 
                   }   
    	}

    	return view('admin.add-secteray');
    }


    public function DeleteSecretary(Request $request,$id)
    {

        User::where(['id'=>$id])->update(array('is_delete'=>'1'));

        $request->session()->flash('success', "I dati sono stati cancellati correttamente.");

       return Redirect::back();
    }


    public function EditSecretary(Request $request,$id)
    {

        if(isset($_POST['addsectary']))
        {

            $rules=[
                        'fullname' => 'required|string|max:200',                     
                        'phone' => 'required|numeric|digits:10',
                        'regione' => 'required|string|min:5', 
                        'cap' => 'required|string|min:5', 
                        'dob' => 'required|string|min:5',                             
                    ];

                     $message["fullname.required"] = 'È richiesto il campo nome'; 
                 $message["cap.required"] = 'Il campo cap è richiesto';                   
                     $message["email.unique"] = "l'email è già stata presa";
                     $message["phone.digits"] = 'Il numero di telefono deve essere di 10 cifre';
                     $message["phone.required"]= 'Il campo telefono è richiesto';
                     $message["dob.required"] = 'Il campo dob è richiesto'; 
                     $message["regione.required"] = 'Il campo Regione è richiesto';

                $this->validate($request, $rules,$message);              

                $user = User::where(['id'=>$id])->first();


                   $user->name         =       Input::get('fullname');                                 
                   $user->phone        =       Input::get('phone');
                   $user->regione      =       Input::get('regione');
                   $user->cap          =       Input::get('cap'); 
                   $user->dob          =       Input::get('dob');
                   $user->save();

                  return redirect('/admin/lista-segretaria')->with('success',"L'utente aggiunge con successo"); 


        }

        $userDetail= User::where(['id'=>$id,'is_delete'=>'0'])->first();

        return view('admin.edit-secteray',['userDetail'=>$userDetail]);
    }


    public function ListExamination()
    {

        $Data= Examination::all();

        return view('admin.list-examination',['data'=>$Data]);       
    }


    public function AddExamination(Request $request)
    {

       if(isset($_POST['add']))
       {

               $rules=[
                        'title' => 'required|string|max:200'  
                      ];

                 $message["title.required"] = 'Il campo è obbligatorio.';                 

              $this->validate($request, $rules,$message);   

            $user = new Examination();


           $user->title  =    Input::get('title');

           $user->save();

            return redirect('/admin/visite')->with('success',"I dati sono stati salvati correttamente."); 
       } 

      return view('admin.add-examination');
    }

    public function EditExamination(Request $request, $id)
    {


        if(isset($_POST['add']))
        {

            $rules=[
                        'title' => 'required|string|max:200'  
                      ];

                 $message["title.required"] = 'Il campo è obbligatorio.';                 

              $this->validate($request, $rules,$message);   

              $user = Examination::where(['id'=>$id])->first();


             $user->title  =    Input::get('title');

             $user->save();
              return redirect('/admin/visite')->with('success',"L'utente aggiunge con successo");
         }

          $data = Examination::where(['id'=>$id])->first();

         return view('admin.edit-examination',['data'=>$data]); 
    }

    public function ExaminationDelete($id)
    {

        Examination::where(['id'=>$id])->delete();

        return redirect('/admin/visite')->with('success'," I dati sono stati cancellati correttamente."); 

    }


    public function RoomList()
    {

          $detail  =  DB::table('room')
                            ->join('examination', 'room.examination_type', '=', 'examination.id')                     
                            ->select('room.*', 'examination.title')                     
                            ->get();

           //echo '<pre>';print_r($detail);die;                   

        return view('admin.list-room',['roomlist'=>$detail]);
    }

    public function AddRoome(Request $request)
    {

        if(isset($_POST['add']))
        {

               $rules=[
                        'room-name' => 'required|string|max:200',
                        'Color'     => 'required',
                        'examination_type'=>'required'  
                      ];

              $message["room-name.required"] = 'Il campo del nome della stanza è obbligatorio';    

              $message["Color.required"] = 'Il campo colore è obbligatorio';  

              $message['examination_type.required'] = "Il campo d'esame è obbligatorio";           

              $this->validate($request, $rules,$message);  


              $room= new Room();


             $room->room_name = Input::get('room-name');
             $room->room_color = Input::get('Color');
             $room->duration = Input::get('duration');
             $room->examination_type = Input::get('examination_type');

             $room->save();

             return redirect('/admin/assegna-stanza')->with('success',"I dati sono stati salvati correttamente."); 

        }

        $examination = Examination::all();
        return view('admin.add-room',['examination'=>$examination]);
    }

    public function DeleteRoom($id)
    {

        Room::where(['id'=>$id])->delete();

        return redirect('/admin/assegna-stanza')->with('success',"I dati sono stati eliminati correttamente"); 

    }

    public function EditRooms(Request $request,$id)
    {

        if(isset($_POST['add']))
        {


               $rules=[
                        'room-name' => 'required|string|max:200',
                        'Color'     => 'required',
                        'examination_type'=>'required'  
                      ];

              $message["room-name.required"] = 'Il campo del nome della stanza è obbligatorio';    

              $message["Color.required"] = 'Il campo colore è obbligatorio';  

              $message['examination_type.required'] = "Il campo d'esame è obbligatorio";           

              $this->validate($request, $rules,$message);  


              $room= Room::where(['id'=>$id])->first();


             $room->room_name = Input::get('room-name');
             $room->room_color = Input::get('Color');
              $room->examination_type = Input::get('examination_type');
              $room->duration = Input::get('duration');
             $room->save();

            return redirect('/admin/assegna-stanza')->with('success',"La stanza è stata eliminata correttamente"); 


        }

        $roomDetail = Room::where(['id'=>$id])->first();

         $examination = Examination::all();
        return view('admin.edit-room',['examination'=>$examination,'roomDetail'=>$roomDetail]);
    }

    public function DoctorList()
    {
                
        $user= User::where(['role_type'=>'3','is_delete'=>'0'])->get();
        return view('admin.list-doctor',['userDetail'=>$user]);     
    }

    public function AddDoctor(Request $request)
    {
    		DB::enableQueryLog();
    	
        if(isset($_POST['add']))
        {


           $rules=[
                        'surname' => 'required|string|max:100',
                        'name' => 'required|string|max:200',                     
                        'phone' => 'required|numeric|digits:10',
                        'email' => 'required|string|email|max:255|unique:users',
                        'regione' => 'required|string|min:5', 
                        'cap' => 'required|numeric|min:5', 
                        'dob' => 'required|string|min:5',
                        'weekday_num' => 'required',
                        'examination_type'=>'required'                             
                    ];
                      $message["surname.required"] = 'Il campo è obbligatorio.'; 
                     $message["name.required"] = 'Il campo è obbligatorio.'; 
                     $message["cap.required"] = 'Il campo è obbligatorio.';
                     $message["email.required"] = 'Il campo è obbligatorio.';
                     $message["email.unique"] = "Il campo è obbligatorio.";
                      $message["email.email"] = "Questa email deve essere un indirizzo email valido.";
                     $message["phone.digits"] = 'Il campo è obbligatorio.';
                     $message["phone.required"]= 'Il campo è obbligatorio.';
                     $message["dob.required"] = 'Il campo è obbligatorio.'; 
                     $message["regione.required"] = 'Il campo è obbligatorio.';
                     $message["weekday_num.required"] = 'Il campo è obbligatorio.';
                     $message["examination_type.required"] = "Il campo è obbligatorio.";

                $this->validate($request, $rules,$message);  

                $rand= rand('456213','5565546');  

                $user = new User();

                   $user->surname         =       Input::get('surname');
                   $user->name         =       Input::get('name');
                   $user->email         =      Input::get('email');                    
                   $user->phone        =       Input::get('phone');
                   $user->regione      =       Input::get('regione');
                   $user->cap          =       Input::get('cap'); 
                   $user->dob          =       Input::get('dob');
                   $user->address      =       Input::get('address');
                   $user->postal_code  =       Input::get('postal_code');
                   $user->telephone    =       Input::get('telephone');
                   $user->performance_type    =       Input::get('performance_type');

                   $user->password     =       bcrypt($rand);
                   $user->role_type     =     '3';
                   $user->availability_from  =       Input::get('availability_from');
                   $user->availability_to  =       Input::get('availability_to');

                   
 
                   $ExaminationId= Input::get('examination_type');

                  $weekDays= !empty($request->input('weekday_num'))?$request->input('weekday_num'):'';


                   $startDate= !empty($request->input('startDate'))?$request->input('startDate'):'';  

                  $endDate= !empty($request->input('enddate'))?$request->input('enddate'):'';

                    foreach($weekDays as $weekey=>$value)
                    {
                        $finaldata['weekdays'][$weekey]=$value;
                        foreach($startDate as $key=> $star)
                        {
                          $finaldata['starttime'][$value]= $startDate[$value];

                        } 

                      foreach($endDate as $key1=>$end)
                      {
                        $finaldata['endtime'][$value]= $endDate[$value];
                      } 

                    }
                  
                 // echo '<pre>';print_r($weekDays);die;
                  
                  if ($user->save()) {  


                  			// insert here examination detail doctor//

                  			//	 DB::table('doctors')->where('userId', '=', $user->id)->delete();
                        // insert here examination detail doctor//
                           foreach($finaldata['weekdays'] as $finalkey=> $val)
                           {
                                $DoctorExamination = new Doctor();

                               $DoctorExamination->userId =  $user->id;
                               $DoctorExamination->examination_id =  $ExaminationId;
                               $DoctorExamination->weekdays_id =  $finaldata['weekdays'][$val];
                               $DoctorExamination->start_time =  $finaldata['starttime'][$val];
                               $DoctorExamination->end_time =  $finaldata['endtime'][$val];
                               $DoctorExamination->save();
                           }    

                  			// end here //

                          // send mail here //
                              
                             $notMessage = 'Nuovo registro promotore';

                             $subject= 'Registration Confirmation';

                             $header = "From:star900@star900.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             $message ='Ciao '.$request->input('name').'<br/>'; 
                             $message.='la tua password '.$rand.'<br/>';
                             $message.='Grazie per esserti registrato su star9000 <br/>'; 

                            mail($request->input('email'),$subject,$message,$header); 

                          // end here // 
                   } 
                   return redirect('/admin/elenco-medico')->with('success',"I dati sono stati salvati correttamente."); 
            }


           $doctorDetail = DB::table('weekdays')
                            ->leftjoin('doctors', 'doctors.weekdays_id', '=', 'weekdays.weekday_num')                     
                            ->select('weekdays.*', 'doctors.weekdays_id as doctorweeks','doctors.examination_id')
                            ->orderby('weekdays.weekday_num','ASC')                     
                            ->get(); 

          $weekDays= DB::table('weekdays')->whereNotIn('weekday_num', [7,8])->orderBy('weekday_num','ASC')->get();    
        //  echo '<pre>';print_r($weekDays);die;        
         $examination = Examination::all();   
        return view('admin.add-doctor',['examination'=>$examination,'weekDays'=>$weekDays,'doctorDetail'=>$doctorDetail]);
    }


    public function EditDoctor(Request $request,$id)
    {


    	if(isset($_POST['add']))
        {


           $rules=[
                        'surname' => 'required|string|max:100',
                        'name' => 'required|string|max:200',                     
                        'phone' => 'required|numeric|digits:10',
                        'regione' => 'required|string|min:5', 
                        'cap' => 'required|numeric|min:5', 
                        'dob' => 'required|string|min:5',
                        'weekday_num' => 'required', 
                        'examination_type'=>'required'                              
                    ];
                     $message["surname.required"] = 'Il campo è obbligatorio.';
                     $message["name.required"] = 'Il campo è obbligatorio.'; 
                     $message["cap.required"] = 'Il campo è obbligatorio.';
                     $message["phone.digits"] = 'Il campo è obbligatorio.';
                     $message["phone.required"]= 'Il campo è obbligatorio.';
                     $message["dob.required"] = 'Il campo è obbligatorio.'; 
                     $message["regione.required"] = 'Il campo è obbligatorio.';
                     $message["weekday_num.required"] = 'Il campo è obbligatorio.';
                     $message["examination_type.required"] = "Il campo è obbligatorio.";

                $this->validate($request, $rules,$message); 

                  $user = User::where(['id'=>$id])->first();

                   $user->surname         =       Input::get('surname');
                   $user->name         =       Input::get('name');                 
                   $user->phone        =       Input::get('phone');
                   $user->regione      =       Input::get('regione');
                   $user->cap          =       Input::get('cap'); 
                   $user->dob          =       Input::get('dob');                    
                   $user->address      =       Input::get('address');
                   $user->postal_code  =       Input::get('postal_code');
                   $user->telephone    =       Input::get('telephone');
                   $user->performance_type    =       Input::get('performance_type');
                   $user->availability_from  =       Input::get('availability_from');
                   $user->availability_to  =       Input::get('availability_to');
                   $ExaminationId= Input::get('examination_type');

                  $weekDays= !empty($request->input('weekday_num'))?$request->input('weekday_num'):'';  

                   $startDate= !empty($request->input('startDate'))?$request->input('startDate'):'';  

                  $endDate= !empty($request->input('enddate'))?$request->input('enddate'):'';

                    foreach($weekDays as $weekey=>$value)
                    {
                        $finaldata['weekdays'][$weekey]=$value;
                        foreach($startDate as $key=> $star)
                        {
                          $finaldata['starttime'][$value]= $startDate[$value];

                        } 

                      foreach($endDate as $key1=>$end)
                      {
                        $finaldata['endtime'][$value]= $endDate[$value];
                      } 

                    }

                           
                  if ($user->save()) {  

                  		  DB::table('doctors')->where('userId', '=', $user->id)->delete();
                        // insert here examination detail doctor//
                           foreach($finaldata['weekdays'] as $finalkey=> $val)
                           {
                                $DoctorExamination = new Doctor();

                               $DoctorExamination->userId =  $user->id;
                               $DoctorExamination->examination_id =  $ExaminationId;
                               $DoctorExamination->weekdays_id =  $finaldata['weekdays'][$val];
                               $DoctorExamination->start_time =  $finaldata['starttime'][$val];
                               $DoctorExamination->end_time =  $finaldata['endtime'][$val];
                               $DoctorExamination->save();
                           }

                  			// end here //
                   } 
                  return redirect('/admin/elenco-medico')->with('success',"L'utente aggiunge con successo"); 
            }


    	$userProfile= User::where(['id'=>$id])->first();

        $doctorDetail = DB::select("select p.day_of_week,p.day_of_week_it,p.weekday_num,c.examination_id,c.weekdays_id,c.start_time,c.end_time from weekdays p left join doctors c on c.weekdays_id = p.weekday_num and c.userId ='$id' where p.weekday_num NOT IN (7,8) order by p.weekday_num"); 
      
    	$examination = Examination::all();   
    	return view('admin.edit-doctor',['examination'=>$examination,'userProfile'=>$userProfile,'doctorDetail'=>$doctorDetail]);
    }


    public function SetExamination(Request $request)
    {
    	$userId= Auth::id();


    	if(isset($_POST['add']))
        {


           $rules=[
                        'name' => 'required|string|max:200',                     
                        'phone' => 'required|numeric|digits:10',
                        'regione' => 'required|string|min:5', 
                        'cap' => 'required|numeric|min:5', 
                        'dob' => 'required|string|min:5',
                        'weekday_num' => 'required', 
                        'examination_type' => 'required',                             
                    ];

                     $message["name.required"] = 'Il campo è obbligatorio.'; 
                     $message["cap.required"] = 'Il campo è obbligatorio.';
                     $message["phone.digits"] = 'Il campo è obbligatorio.';
                     $message["phone.required"]= 'Il campo è obbligatorio.';
                     $message["dob.required"] = 'Il campo è obbligatorio.'; 
                     $message["regione.required"] = 'Il campo è obbligatorio.';
                     $message["weekday_num.required"] = 'Il campo è obbligatorio.';
                     $message["examination_type.required"] = 'Il campo è obbligatorio.';

                $this->validate($request, $rules,$message); 

                  $user = User::where(['id'=>$userId])->first();


                   $user->name         =       Input::get('name');                 
                   $user->phone        =       Input::get('phone');
                   $user->regione      =       Input::get('regione');
                   $user->cap          =       Input::get('cap'); 
                   $user->dob          =       Input::get('dob');                    
 
                   $ExaminationId= Input::get('examination_type');

                  $weekDays= !empty($request->input('weekday_num'))?$request->input('weekday_num'):'';    

                  $startDate= !empty($request->input('startDate'))?$request->input('startDate'):'';  

                  $endDate= !empty($request->input('enddate'))?$request->input('enddate'):'';

                  	foreach($weekDays as $weekey=>$value)
                  	{
                  			$finaldata['weekdays'][$weekey]=$value;
                  			foreach($startDate as $key=> $star)
                  			{
                  				$finaldata['starttime'][$value]= $startDate[$value];

                  			} 

                  		foreach($endDate as $key1=>$end)
                  		{
                  			$finaldata['endtime'][$value]= $endDate[$value];
                  		}	

                  	}

                  	//echo'<pre>';print_r($finaldata);


                  if ($user->save()) {  

                  		  DB::table('doctors')->where('userId', '=', $user->id)->delete();
                  			// insert here examination detail doctor//
                  				 foreach($finaldata['weekdays'] as $finalkey=> $val)
                  				 {
                  				 	    $DoctorExamination = new Doctor();

                  				 		 $DoctorExamination->userId =  $user->id;
                  				 		 $DoctorExamination->examination_id =  $ExaminationId;
                  				 		 $DoctorExamination->weekdays_id =  $finaldata['weekdays'][$val];
                  				 		 $DoctorExamination->start_time =  $finaldata['starttime'][$val];
                  				 		 $DoctorExamination->end_time =  $finaldata['endtime'][$val];
                  				 		 $DoctorExamination->save();
                  				 }
                  				 
                  			// end here //
                   } 
                  return redirect('/admin/profilo-visite')->with('success',"L'utente aggiunge con successo"); 
            }



    	$userProfile= User::where(['id'=>$userId])->first();


    	//$doctorDetail = DB::table('weekdays')
                           // ->leftjoin('doctors', 'doctors.weekdays_id', '=', 'weekdays.weekday_num')                     
                           // ->select('weekdays.*', 'doctors.weekdays_id as doctorweeks','doctors.examination_id')
                           // ->orderby('weekdays.weekday_num','ASC')                     
                           // ->get();  
        $doctorDetail = DB::select("select p.day_of_week,p.day_of_week_it,p.weekday_num,c.examination_id,c.weekdays_id,c.start_time,c.end_time from weekdays p left join doctors c on c.weekdays_id = p.weekday_num and c.userId ='$userId' where p.weekday_num NOT IN (7,8) order by p.weekday_num");      

    	$examination = Examination::all();  

    	return view('admin.doctor.edit-doctor-examination',['examination'=>$examination,'userProfile'=>$userProfile,'doctorDetail'=>$doctorDetail]);
    }

    public function DoctorLeaves()
    {
        $user= User::where(['role_type'=>'3'])->get();
        return view('admin.doctor-leaves',['userDetail'=>$user]);
    }

    public function TestDigital()
    {
      return view('Testdigitalpad');
    }

    public function AdminLogout()
    {
    	  Auth::logout();

        return redirect('/');
    }
}
