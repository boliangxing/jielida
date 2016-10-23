<?php
namespace App\Http\Controllers\Ad;
use App\Http\Controllers\Controller;
 use App\Entity\Admin;

use App\Models\M3Result;
use Illuminate\Http\Request;
class permissionController extends Controller
{


     public function topermission()
      {
        $permissions=Admin::all();


        return view('ad.permission')->with('permissions',$permissions);
      }

           public function topermissionAdd()
            {

                 return view('ad/permission_add');


            }



            public function permissionAdd(Request $request ){

            $name=$request->input('name','');
            $pwd=$request->input('pwd','');
            $qx=$request->input('qx','');

                $permission=new Admin;
            $permission->num=$name;
            $permission->pwd=$pwd;
            $permission->qx=$qx;


            $permission->save();
            $m3_result =new M3Result;
            $m3_result->status=0;
            $m3_result->message='添加成功';
            return  $m3_result->toJson();
            }


            public function tosceneEdit(Request $request){

            $id=$request->input('id','');
            $scene=Scene::find($id);

            return view('ad/scene_edit')->with('scene',$scene);

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
}
