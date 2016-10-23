<?php
namespace App\Http\Controllers\Ad;
use App\Http\Controllers\Controller;
use App\Entity\Scene;
use App\Models\M3Result;
use Illuminate\Http\Request;
class sceneController extends Controller
{


     public function toScene()
      {
        $scenes=Scene::all();

        return view('ad.scene')->with('scenes',$scenes);
      }

           public function tosceneAdd()
            {

             //$scenes= Scene::all();
              return view('ad/scene_add');//->with('scenes',$scenes);
            }

            public function tosceneEdit(Request $request){

            $id=$request->input('id','');
            $scene=Scene::find($id);

            return view('ad/scene_edit')->with('scene',$scene);

            }

public function sceneAdd(Request $request ){

$name=$request->input('scname','');

    $scene=new Scene;
$scene->scname=$name;

$scene->save();
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
public function scenedel(Request $request){

$id=$request->input('id','');
Scene::find($id)->delete();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='删除成功';
return  $m3_result->toJson();

}

}
