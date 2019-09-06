<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Privacy;


class PrivacyController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() == 'POST') {
            $privacy = Privacy::find(1);
            $privacy->description  =  Input::get('description');
            if($privacy->save()) {
                return redirect('/admin/privacy')->with('success',"La privacy è stata aggiornata con successo."); 
            }
        }
        $privacy = Privacy::where(['id'=>1])->first();
        return view('admin.privacy',['privacy'=>$privacy]);
    }
}
