<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\User;

class UserResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() == 'POST') {
            if(!empty(Input::get('email'))) {
                $uData=User::where(['email'=>Input::get('email')])->first();
                if(!empty($uData))
                {
                    $userD = User::find($uData['id']);
                    $token = openssl_random_pseudo_bytes(16);
                    $token = bin2hex($token);
                    $userD->reset_token  = $token;
                    if($userD->save()){
                        $subject = "Resetta la password";
                        $header = "From:star900@star900.komete.it \r\n";
                        $header.= 'MIME-Version: 1.0' . "\r\n";
                        $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                        $message ='Ciao '.$uData->surname.' '.$uData->name.'<br/>'; 
                        $message.='Si prega di trovare il link qui sotto per ripristinare la password.<br/>';
                        $message.='Collegamento:<a href="http://star9000.komete.it/cambia-la-password/'.$token.'">http://star9000.komete.it/cambia-la-password/'.$token.'</a><br/>';
                        mail($uData->email,$subject,$message,$header);
                        return redirect('/resetta-la-password')->with('success','La password di reimpostazione della password è stata inviata correttamente.');
                    } else {
                        return redirect('/resetta-la-password')->with('danger','Si è verificato un errore. Per favore riprova più tardi.'); 
                    }
                }else{
                    return redirect('/resetta-la-password')->with('danger','Nessun account esistente.');
                }
            } else {
                return redirect('/resetta-la-password')->with('danger',"Si prega di inserire l'indirizzo e-mail.");
            }
        }
        return view('admin.resetPassword');
    }

    public function changePassword(Request $request, $token) {
        $uData=User::where(['reset_token'=>$token])->first();
        if(!empty($uData)) {
            if($request->method() == 'POST') {
                if(strlen(Input::get('password'))< 6) {
                    return redirect('/cambia-la-password/'.$token)->with('danger','la lunghezza della password deve essere maggiore di 6.'); 
                }
                if(Input::get('password') == Input::get('confirm_passwd')) {
                    $userD = User::find($uData['id']);
                    $userD->reset_token  = '';
                    $userD->password  = bcrypt(Input::get('password'));
                    if($userD->save()){
                        return redirect('/admin')->with('success','La tua password è stata cambiata con successo.');
                    }else{
                        return redirect('/cambia-la-password/'.$token)->with('danger','Si è verificato un errore. Per favore riprova più tardi.'); 
                    }
                } else {
                    return redirect('/cambia-la-password/'.$token)->with('danger','password e conferma password non corrispondenti.');
                    
                }
            }
            return view('admin.changePassword');
        } else {
            return redirect('/resetta-la-password')->with('danger','Si è verificato un errore.'); 
        }
        
    }
}
