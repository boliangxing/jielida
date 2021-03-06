<?php
namespace App\Http\Controllers\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Member;
use App\Entity\Users;
use App\Models\M3Result;
class MemberController extends Controller
{
  public function toMember(Request $request)
  {
    $members = Member::all();
    return view('ad.member')->with('members', $members);
  }
  public function toMemberEdit(Request $request)
  {
    $id = $request->input('id', '');
    $member = Member::find($id);
    return view('ad.member_edit')->with('member', $member);
  }
  public function memberEdit(Request $request)
  {
    $member = Member::find($request->input('id', ''));
    $member->nickname = $request->input('nickname', '');
    $member->phone = $request->input('phone', '');
    $member->email = $request->input('email', '');
    $member->save();
    $m3_result = new M3Result;
    $m3_result->status = 0;
    $m3_result->message = '添加成功';
    return $m3_result->toJson();
  }
  public function tomemberUpdate(Request $request)
    {
      $Member = Users::find($request->input('id', ''));
      return view('ad.member_update')->with('member', $Member);
    }
    public function memberUpdate(Request $request)
    {
      $Member = Users::find($request->input('id', ''));
      $Member->pwd = $request->input('pwd', '');
      $Member->save();
      $m3_result = new M3Result;
      $m3_result->status = 0;
      $m3_result->message = '修改成功';
      return $m3_result->toJson();
    }
    public function tomemberStop(Request $request)
      {
        $user = Users::find($request->input('id', ''));
        return view('ad.member_stop')->with('user', $user);
      }
      public function memberStop(Request $request)
      {
        $user = Users::find($request->input('id', ''));
       $user->state= $request->input('state', '');
        $user->save();
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '修改成功';
        return $m3_result->toJson();
      }


}
