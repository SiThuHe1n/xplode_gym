<?php

namespace App\Http\Controllers\Custom;

use App\Models\Member;
use App\Models\Section;
use App\Models\CheckinLog;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Carbon;
use Faker\Provider\pl_PL\Payment;
use App\Http\Controllers\Controller;

class CheckinController extends Controller
{

    public function checkin_list($search=null)
    {
        $data=CheckinLog::orderBy('id','DESC')->paginate(15);
        return view('acustom.report.checkin',compact('data'));
    }

    public function checkin_form()
    {
        // return 'he';
        return view('acustom.checkin.checkin');
    }

    public function checkin_member(Request $request)
    {
        $data=new CheckinLog();
        $data->staff_id=0;
        $data->member_id=$request->member;
        $data->datetime=Carbon::now();
        $data->is_pt=0;

        $member=Member::find($request->member);

        if($request->trainer)
        {
            $data->is_pt=1;
            $member->remain_pt-=1;
            $data->trainer_id=$member->current_trainer;
        }
        $data->save();
        $member->update();


        return back();


    }
    public function get_section($trainer)
    {
        $data=Section::where('trainer_id',$trainer)->get();
        return $data;
    }
    public function checkin()
    {
        return view('acustom.checkin.dashboard');
    }
    public function new_member()
    {
        return view('acustom.checkin.new');
    }
    public function old_member()
    {
        return view('acustom.checkin.old');
    }
    public function guest_member()
    {
        return view('acustom.checkin.guest');
    }



public function list_payment($search=null)
{
    if($search)
    {

    }
    else
    {
        $data=PaymentMethod::orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.payment.list',compact('data'));
}


public function add_payment()
{
return view('acustom.payment.add');
}

public function edit_payment($id)
{
$data=PaymentMethod::find($id);
return view('acustom.payment.edit',compact('data'));
}

public function create_payment(Request $request)
{
$request->validate([
    'name'=>'required'
]);
$data=new PaymentMethod();

$data->name=$request->name;


$data->save();

return redirect()->route('payment.list');

}

public function update_payment(Request $request,$id)
{

    $request->validate([
        'name'=>'required'
    ]);
    $data=PaymentMethod::find($id);

    $data->name=$request->name;


    $data->save();

    return redirect()->route('payment.list');
}

public function delete_payment($id)
{
    $data=PaymentMethod::find($id)->delete();
    return back();
}


}
