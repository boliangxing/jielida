<?php
namespace App\Http\Controllers\Ad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Admin;
class IndexController extends Controller
{
  public function Login(Request $request)
  {
    $username = $request->input('username', '');
    $password = $request->input('password', '');
    $m3_result = new M3Result;
    if($username == '' || $password == '') {
      $m3_result->status = 1;
      $m3_result->message = "帐号或密码不能为空!";
      return $m3_result->toJson();
    }
    $admin = Admin::where('num', $username)->where('pwd',  $password)->first();
    if(!$admin) {
      $m3_result->status = 2;
      $m3_result->message = "账号或密码错误";
    } else {
      $admin = Admin::where('num', $username)->where('pwd',  $password)->where('qx', 1)->first();
      if(!$admin) {
        $m3_result->status = 2;
        $m3_result->message = "并不是超级管理员";
      }else{
      $m3_result->status = 0;
      $m3_result->message = "登录成功!";
      $request->session()->put('admin', $admin);
}
    }
    return $m3_result->toJson();
  }
  public function toLogin()
  {
    return view('ad.login');
  }



  public function toMember()
  {
    return view('ad.member');
  }
  public function toMemberFeedBack()
  {
    return view('ad.member_feedback');

  }

  public function toDevice()
  {
    return view('ad.device');
  }

  public function to110()
  {
    return view('ad.110');
  }
  public function toPAbefore()
  {
    return view('ad.product_add_before');
  }
  public function toProduct_list()
  {
    return view('ad.product_list');
  }
  public function toWeList()
  {
    return view('ad.we_list');
  }
  public function toWemenu()
  {
    return view('ad.we_menu');
  }
  public function toWereply()
  {
    return view('ad.we_reply');
  }
  public function toApplog()
  {
    return view('ad.app_log');
  }
  public function toAppversions()
  {
    return view('ad.app_versions');
  }
  /*public function toLogin()
  {
    return view('ad.login');
  }
  public function toLogin()
  {
    return view('ad.login');
  }
  public function toLogin()
  {
    return view('ad.login');
  }
  public function toLogin()
  {
    return view('ad.login');
  }
  public function toLogin()
  {
    return view('ad.login');
  }*/
  public function toExit(Request $request)
  {
    $request->session()->forget('admin');
    return view('ad.login');
  }
  public function toIndex(Request $request)
  {
  $admin = $request->session()->get('admin');
  if($admin==null){

  return view('ad.login');
  }
    return view('ad.index')->with('admin', $admin);
  }
}
