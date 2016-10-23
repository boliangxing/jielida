<?php
namespace App\Http\Controllers\Ad;
use App\Http\Controllers\Controller;
use App\Entity\Agency;
use App\Entity\Address;

use App\Models\M3Result;
use Illuminate\Http\Request;
class agencyController extends Controller
{


     public function toagency()
      {
        $agencys=Agency::all();


        return view('ad.agency')->with('agencys',$agencys);
      }

           public function toagencyAdd()
            {

                 $agencys=Agency::all();
                  $address=Address::all();
                return view('ad/agency_add')->with('agencys',$agencys)->with('address',$address);
            }

            public function tosceneEdit(Request $request){

            $id=$request->input('id','');
            $scene=Scene::find($id);

            return view('ad/scene_edit')->with('scene',$scene);

            }

public function agencyAdd(Request $request ){

$name=$request->input('name','');
$phone=$request->input('phone','');
$country=$request->input('country','');
$province=$request->input('province','');
$city=$request->input('city','');
$address=$request->input('address','');
$email=$request->input('email','');
$lv=$request->input('lv','');


    $agency=new Agency;
$agency->name=$name;
$agency->phone=$phone;
$agency->country=$country;
$agency->province=$province;
$agency->city=$city;

$agency->address=$address;
$agency->email=$email;
$agency->lv=$lv;

$agency->save();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='添加成功';
return  $m3_result->toJson();
}

public function sceneedit(Request $request ){
  $id=$request->input('id','');
  $scene=Scene::find($id);
$scname=$request->input('scname','');

$scene->scname=$scname;

$scene->save();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='修改成功';
return  $m3_result->toJson();
}
public function agencydel(Request $request){

$id=$request->input('id','');
Agency::find($id)->delete();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='删除成功';
return  $m3_result->toJson();

}
public function toagencyBycid($country_id)
{
  $address=Address::where(['cparentid'=>$country_id,'pparentid'=>Null ])->get();
  $m3_result=new M3Result;
  $m3_result->status=0;
  $m3_result->message="ok";
$m3_result->address=$address;
  return $m3_result->toJson();
}
public function toagencyBypid($province_id,$country_id)

{
  $add=Address::where(['name'=>$province_id])->pluck('id');

  $address=Address::where(['pparentid'=>$add,'cparentid'=>$country_id])->where('id','!=','Null')->get();
  $m3_result=new M3Result;
  $m3_result->status=0;
  $m3_result->message="ok";
$m3_result->address=$address;
  return $m3_result->toJson();
}
}
