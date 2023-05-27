<?php

namespace App\Http\Controllers\Custom;

use App\CPU\Helpers;
use App\Models\Staff;
use App\Models\Account;
use App\Models\Product;
use App\Models\Transection;
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

            $data=MemberSection::whereBetween('datetime',[Carbon::parse(date('Y-m-d'))->format('Y-m-d 00:00:00'),Carbon::parse(date('Y-m-d'))->format('Y-m-d 23:59:59')])->orderBy('id','DESC')->paginate(15);

        }

         return view('acustom.report.purchase_section',compact('data'));
    }
    public function voucher_purchase($id)
    {
        $member_section=MemberSection::find($id);
        $route=url()->previous();
        return view('acustom.checkin.voucher2',compact('member_section','route'));
    }

    public function dashboard(Request $request)
    {

        // return view('admin-views.dashboard',compact('account','monthly_income','monthly_expense','accounts','products','last_month_income','last_month_expense','month','total_day'));



        return view('acustom.dashboard',compact('request'));
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
