<?php
namespace App\Http\Controllers\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Appversion;
use App\Entity\Appcmds;

use App\Models\M3Result;
class AppController extends Controller
{
  public function toAppversions()
  {
    $Appversions = Appversion::all();
    return view('ad.app_versions')->with('appversions', $Appversions);
  }
  public function toAppcmds()
  {
    $Appcmds = Appcmds::all();
    return view('ad.app_cmds')->with('appcmds', $Appcmds);
  }

  public function verdel(Request $request){

    $id=$request->input('id','');
    Appversion::where('id',$id)->delete();
    $m3_result =new M3Result;
    $m3_result->status=0;
    $m3_result->message='删除成功';
    return  $m3_result->toJson();


  }
  public function cmds_edit(){

return view ('ad.cmds_edit');

  }
    public function toWeListUpdate(Request $request ){
     $id=1;
      $Wechat=Wechat::find($id);

     $name=$request->input('name','');
    $account=$request->input('account','');
    $appID=$request->input('appID','');
    $appsecret=$request->input('appsecret','');
    $Token=$request->input('Token','');
    $Wechat->name=$name;
  $Wechat->account=$account;
    $Wechat->appID=$appID;
      $Wechat->appsecret=$appsecret;
        $Wechat->Token=$Token;
    $Wechat->save();
    $m3_result =new M3Result;
    $m3_result->status=0;
    $m3_result->message='修改成功';
    return  $m3_result->toJson();
    }

}
