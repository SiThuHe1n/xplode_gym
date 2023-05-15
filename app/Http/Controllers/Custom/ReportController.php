<?php

namespace App\Http\Controllers\Custom;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\MemberSection;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function list_purchase(Request $request)
    {
        if(count($request->all()) > 0)
        {
            $data=MemberSection::wherehas('member',function($que) use($request)
            {
                $que->where('code','like',"%$request->member%")
                ->where('name','like',"%$request->member%");

            })->whereBetween('datetime',[Carbon::parse($request->date)->format('Y-m-d 00:00:00'),Carbon::parse($request->date)->format('Y-m-d 23:59:59')])->orderBy('id','DESC')->paginate(15);

        }
        else
        {

            $data=MemberSection::orderBy('id','DESC')->paginate(15);

        }

         return view('acustom.report.purchase_section',compact('data'));
    }
    public function voucher_purchase($id)
    {
        $member_section=MemberSection::find($id);
        $route=url()->previous();
        return view('acustom.checkin.voucher2',compact('member_section','route'));
    }

    public function dashboard()
    {
        return view('acustom.dashboard');
    }
    public function voucher_purchase2($id)
    {
        $member_section=MemberSection::find($id);
        $route=url()->previous();
        return view('acustom.checkin.voucher2',compact('member_section','route'));

    }
    public function trainer_pt_list($id)
    {
        $data=Staff::find($id);
        $data=$data->member;
        return view('acustom.report.trainer_pt_list',compact('data'));
    }


}
