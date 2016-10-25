<?php
namespace App\Http\Controllers\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Facility;
use App\Entity\Plctype;
use App\Entity\Users;

use App\Entity\product;
use App\Models\M3Result;
class DeviceController extends Controller
{
  public function toDevice(Request $request)
  {
    $facilitys = Facility::all();
    $jihe=Facility::join('users', function($join)
            {
                $join->on('facility.uid', '=', 'users.uid');
            })->select('facility.fid','facility.facname','facility.ipaddr','users.phone','facility.product_id','facility.created_at','facility.updated_at','facility.run_status','facility.subfac')->get();
            $jihe2=Facility::join('product', function($join)
                    {
                        $join->on('facility.product_id', '=', 'product.product_id');
                    })->select('product.product_name')->get();
    //$Users = Users::where()join('facility','users.uid','=','facility.uid')->get();
     return view('ad.device')->with('jihe',$jihe);//->with('users',$Users);
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
