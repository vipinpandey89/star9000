<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\User;
use App\NavigationTabs;
use App\UserAccessLevel;


class AccessLevelController extends Controller
{
    public function index(Request $request, $uid=null)
    {
        $user = auth()->user();
        $usersecreatary = User::where(['role_type'=>2,'is_delete'=>'0'])->get();
        if($user->role_type == 1) {
            $navigationTabs = [];
            $existingAccessData = [];
            $userData = [];
            if(!empty($uid)){
                $navigationTabs = NavigationTabs::all();
                $existingUData = UserAccessLevel::where(['user_id'=>$uid])->first();
                $existingAccessData = isset($existingUData->access_level)?json_decode($existingUData->access_level,true):[];
                $userData=User::where(['id'=>$uid])->first();
            }
            if($request->method() == 'POST') {
                if(!empty(Input::get('tabs'))) {
                    $tabsData = Input::get('tabs');
                    $accessData = [];
                    foreach ($tabsData as $tdata) {
                        if(isset($tdata['id'])) {
                            $accessData[$tdata['id']] = $tdata;
                        }
                    }
                    $uDtata['access_level'] = json_encode($accessData);
                    $uAccessLevel = UserAccessLevel::firstOrNew(['user_id'=>Input::get('user_id')], $uDtata);
                    if($uAccessLevel->exists){
                        UserAccessLevel::where('id', $uAccessLevel->id)->update($uDtata);
                    } else {
                        $uAccessLevel->save();
                    }
                    return redirect('/admin/livello-di-accesso/'.Input::get('user_id'))->with('success',"I dati del livello di accesso sono stati aggiornati correttamente.");
                }
            }
            return view('admin.accessLevel',['navigationTabs'=>$navigationTabs,'uid'=>$uid,'existingAccessData'=>$existingAccessData,'userData'=>$userData,'usersecreatary'=>$usersecreatary]);
        } else {
            return redirect()->back();
        }
    }

}
