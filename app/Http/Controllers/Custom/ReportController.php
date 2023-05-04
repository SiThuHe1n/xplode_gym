<?php

namespace App\Http\Controllers\Custom;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Models\MemberSection;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function list_purchase()
    {
        $data=MemberSection::orderBy('id','DESC')->paginate(15);
        return view('acustom.report.purchase_section',compact('data'));
    }
    public function voucher_purchase($id)
    {
        $member_section=MemberSection::find($id);
        $route=url()->previous();
        return view('acustom.checkin.voucher2',compact('member_section','route'));
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
