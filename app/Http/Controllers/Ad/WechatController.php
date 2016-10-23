<?php
namespace App\Http\Controllers\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Wechat;
use App\Models\M3Result;
class WechatController extends Controller
{
  public function toweChat(Request $request)
  {
    $wechats = Wechat::all();
    return view('ad.we_list')->with('wechats', $wechats);
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
