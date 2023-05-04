<?php

namespace App\Http\Controllers\Custom;

use App\Models\Member;
use App\Models\Package;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\MemberSection;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    public function list_member($search=null)
    {
        if($search)
        {
            $data=Member::where('join_date','like',"%$search%")
            ->orwhere('name','like',"%$search%")
            ->orwhere('nrc_number','like',"%$search%")
            ->orwhere('dateofbirth','like',"%$search%")
            ->orwhere('username','like',"%$search%")
            ->orwhere('address','like',"%$search%")
            ->orwhere('type','like',"%$search%")

            ->orwhere('phone','like',"%$search%")
            ->orderBy('id','desc')->paginate(15);

        }
        else
        {
            $data=Member::orderBy('id','DESC')->paginate(15);
        }

        return view('acustom.member.list',compact('data'));
    }




   public function add_member()
   {
    return view('acustom.member.add');
   }

   public function edit_member($id)
   {
    $data=Member::find($id);
    return view('acustom.member.edit',compact('data'));
   }

//         $table->string('name')->nullable();
// $table->string('phone')->nullable();
// $table->string('username')->nullable();
// $table->string('password')->nullable();
// $table->string('nrc_number')->nullable();
// $table->string('address')->nullable();
// $table->double('salary')->nullable();
// $table->date('join_date')->nullable();
// $table->string('image')->nullable();
// $table->string('type')->nullable();
// $table->string('status')->nullable();


   public function get_member($search)
   {
    if($search=="ALLMEMBER")
    {
        $data=Member::where('is_guest','0')->get();
    }
    else
    {
        $data=Member::
        where(function($que) use($search)
        {
            $que->where('is_guest','0')->where('name','like',"%$search%");
        })->
        orwhere(function($que) use($search)
        {
            $que->where('is_guest','0')->where('code','like',"%$search%");
        })->
        orwhere(function($que) use($search)
        {
            $que->where('is_guest','0')->where('phone','like',"%$search%");
        })->get();
    }

    return $data;

   }

   public function get_guest($search)
   {
    if($search=="ALLMEMBER")
    {
        $data=Member::where('is_guest','1')->get();
    }
    else
    {
        $data=Member::
        where(function($que) use($search)
        {
            $que->where('is_guest','1')->where('name','like',"%$search%");
        })->
        orwhere(function($que) use($search)
        {
            $que->where('is_guest','1')->where('code','like',"%$search%");
        })->
        orwhere(function($que) use($search)
        {
            $que->where('is_guest','1')->where('phone','like',"%$search%");
        })->get();
    }

    return $data;

   }
   public function create_member(Request $request)
   {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',

            'nrc_number'=>'required',
            'address'=>'required',

            'join_date'=>'required',

            'dateofbirth'=>'required',

        ]);


    $data=new Member();
    $count = count(Member::all());
    $a = 1;
    $code = 'XP' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
    $old = Member::where('code', $code)->first();
    while ($old) {
        $a++;
        $code = 'XP' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
        $old = Member::where('code', $code)->first();
    }

    $data->is_guest=0;

    if($request->type=='guest')
    {
        $data->is_guest=1;
    }
    $data->code = $code;
    $data->name=$request->name;
    $data->phone=$request->phone;
    $data->nrc_number=$request->nrc_number;
    $data->address=$request->address;
    $data->join_date=$request->join_date;

    if($request->image)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);
        $data->image=$imageName;
    }
    $data->dateofbirth=$request->dateofbirth;


    $data->status=1;
    $data->save();
    return redirect()->route('member.list');

   }

   public function update_member(Request $request,$id)
   {

    $request->validate([
        'name'=>'required',
        'phone'=>'required',

        'nrc_number'=>'required',
        'address'=>'required',

        'join_date'=>'required',

        'dateofbirth'=>'required',

    ]);


$data= Member::find($id);




$data->name=$request->name;
$data->phone=$request->phone;
$data->nrc_number=$request->nrc_number;
$data->address=$request->address;
$data->join_date=$request->join_date;
$data->remain_pt=$request->remain_pt;
if($request->image)
{
    $request->validate([
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
    ]);

    $imageName = time().'.'.$request->image->extension();

    // Public Folder
    $request->image->move(public_path('images'), $imageName);
    $data->image=$imageName;
}
$data->dateofbirth=$request->dateofbirth;


$data->status=1;
$data->update();
return redirect()->route('member.list');
   }

   public function delete_member($id)
   {
    $data=Member::find($id)->delete();
    MemberSection::where('member_id',$id)->delete();
    return back();

   }



   public function old_member(Request $request)
   {
        $data=Member::find($request->member);


        $member_section=new MemberSection();

     $count = count(MemberSection::get());
     $a = 1;
     $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
     $old = MemberSection::where('code', $code)->first();
     while ($old) {
         $a++;
         $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
         $old = MemberSection::where('code', $code)->first();
     }
     $member_section->code = $code;
        $member_section->member_id=$data->id;
        $member_section->package_id=$request->package;
        $member_section->trainer_id=$request->trainer;
        $member_section->trainer_section=$request->section;

        $member_section->datetime=Carbon::now();
        $member_section->payment_method=$request->payment_method;
        $member_section->amount=$request->amount;
        $member_section->payment_method2=$request->payment_method2;
        $member_section->amount2=$request->amount2;
        $member_section->note=$request->note;
        $member_section->save();

        if($request->package)
        {
        $pkg=Package::find($request->package);
        if(strtotime($data->expire_date)<strtotime(Carbon::now()))
        {
            if(!$pkg->day)
            {
                $data->expire_date=Carbon::now()->addDay($pkg->day);
            }
            else if(!$pkg->month)
            {
                $data->expire_date=Carbon::now()->addMonth($pkg->month);
            }
            else
            {
                $data->expire_date=Carbon::now()->addDay($pkg->day)->addMonth($pkg->month);
            }

        }
        else
        {
            if(!$pkg->day)
            {
                $data->expire_date=Carbon::parse($data->expire_date)->addDay($pkg->day);
            }
            else if(!$pkg->month)
            {
                $data->expire_date=Carbon::parse($data->expire_date)->addMonth($pkg->month);
            }
            else
            {
                $data->expire_date=Carbon::parse($data->expire_date)->addDay($pkg->day)->addMonth($pkg->month);
            }
             }
            }

        $data->current_trainer=$request->trainer;
        if($request->section)
     {
        $data->remain_pt+=Section::find($request->section)->time;
     }
        $data->update();
           $route=url()->previous();
       return view('acustom.checkin.voucher2',compact('member_section','data','route'));

   }

   public function new_member(Request $request)
   {

            $request->validate([
                'name'=>'required',
                'phone'=>'required',

                'nrc_number'=>'required',
                'address'=>'required',

                'join_date'=>'required',

                'dateofbirth'=>'required',
                'payment_method'=>'required',
                'amount'=>'required',
            ]);


        $data=new Member();
        $count = count(Member::where('is_guest',1)->get());
        $a = 1;
        $code = 'XP' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
        $old = Member::where('is_guest',1)->where('code', $code)->first();
        while ($old) {
            $a++;
            $code = 'XP' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
            $old = Member::where('is_guest',1)->where('code', $code)->first();
        }

        $data->is_guest=0;

        if($request->type=='guest')
        {
            $data->is_guest=1;
        }
        $data->code = $code;
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->nrc_number=$request->nrc_number;
        $data->address=$request->address;
        $data->join_date=$request->join_date;

        if($request->image)
        {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $imageName = time().'.'.$request->image->extension();

            // Public Folder
            $request->image->move(public_path('images'), $imageName);
            $data->image=$imageName;
        }
        $data->dateofbirth=$request->dateofbirth;


        $data->status=1;
        $data->save();

        $member_section=new MemberSection();

     $count = count(MemberSection::get());
     $a = 1;
     $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
     $old = MemberSection::where('code', $code)->first();
     while ($old) {
         $a++;
         $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
         $old = MemberSection::where('code', $code)->first();
     }
     $member_section->code = $code;
        $member_section->member_id=$data->id;
        $member_section->package_id=$request->package;
        $member_section->trainer_id=$request->trainer;
        $member_section->trainer_section=$request->section;

        $member_section->datetime=Carbon::now();
        $member_section->payment_method=$request->payment_method;
        $member_section->amount=$request->amount;
        $member_section->payment_method2=$request->payment_method2;
        $member_section->amount2=$request->amount2;
        $member_section->note=$request->note;
        $member_section->save();

        if($request->package)
        {
        $pkg=Package::find($request->package);
        if(!$pkg->day)
        {
            $data->expire_date=Carbon::now()->addDay($pkg->day);
        }
        else if(!$pkg->month)
        {
            $data->expire_date=Carbon::now()->addMonth($pkg->month);
        }
        else
        {
            $data->expire_date=Carbon::now()->addDay($pkg->day)->addMonth($pkg->month);
        }
    }
        $data->current_trainer=$request->trainer;
        if($request->section)
     {
        $data->remain_pt+=Section::find($request->section)->time;
     }
        $data->update();
        $route=url()->previous();
        return view('acustom.checkin.voucher2',compact('member_section','data','route'));

   }
//    Guest

public function old_guest(Request $request)
{
     $data=Member::find($request->member);


     $member_section=new MemberSection();

     $count = count(MemberSection::get());
     $a = 1;
     $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
     $old = MemberSection::where('code', $code)->first();
     while ($old) {
         $a++;
         $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
         $old = MemberSection::where('code', $code)->first();
     }
     $member_section->code = $code;
     $member_section->member_id=$data->id;
     $member_section->package_id=$request->package;
     $member_section->trainer_id=$request->trainer;
     $member_section->trainer_section=$request->section;

     $member_section->datetime=Carbon::now();
     $member_section->payment_method=$request->payment_method;
     $member_section->amount=$request->amount;
     $member_section->payment_method2=$request->payment_method2;
     $member_section->amount2=$request->amount2;
     $member_section->note=$request->note;
     $member_section->save();

     if($request->package)
     {
     $pkg=Package::find($request->package);
     if(strtotime($data->expire_date)<strtotime(Carbon::now()))
     {
         if(!$pkg->day)
         {
             $data->expire_date=Carbon::now()->addDay($pkg->day);
         }
         else if(!$pkg->month)
         {
             $data->expire_date=Carbon::now()->addMonth($pkg->month);
         }
         else
         {
             $data->expire_date=Carbon::now()->addDay($pkg->day)->addMonth($pkg->month);
         }

     }
     else
     {
         if(!$pkg->day)
         {
             $data->expire_date=Carbon::parse($data->expire_date)->addDay($pkg->day);
         }
         else if(!$pkg->month)
         {
             $data->expire_date=Carbon::parse($data->expire_date)->addMonth($pkg->month);
         }
         else
         {
             $data->expire_date=Carbon::parse($data->expire_date)->addDay($pkg->day)->addMonth($pkg->month);
         }
          }
         }


     if($request->section)
  {
    $data->current_trainer=$request->trainer;
     $data->remain_pt+=Section::find($request->section)->time;
  }
     $data->update();

        $route=url()->previous();
     return view('acustom.checkin.voucher2',compact('member_section','data','route'));


}

public function new_guest(Request $request)
{

         $request->validate([
             'name'=>'required',
             'phone'=>'required',


             'address'=>'required',

             'join_date'=>'required',


             'payment_method'=>'required',
             'amount'=>'required',
         ]);


     $data=new Member();
     $count = count(Member::where('is_guest','1')->get());
     $a = 1;
     $code = 'XPGuest' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
     $old = Member::where('is_guest',1)->where('code', $code)->first();
     while ($old) {
         $a++;
         $code = 'XPGuest' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
         $old = Member::where('is_guest','1')->where('code', $code)->first();
     }

     $data->is_guest=1;

     $data->code = $code;
     $data->name=$request->name;
     $data->phone=$request->phone;
     $data->address=$request->address;
     $data->join_date=$request->join_date;

     if($request->image)
     {
         $request->validate([
             'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
         ]);

         $imageName = time().'.'.$request->image->extension();

         // Public Folder
         $request->image->move(public_path('images'), $imageName);
         $data->image=$imageName;
     }


     $data->status=1;
     $data->save();

     $member_section=new MemberSection();

     $count = count(MemberSection::whereHas('member',function($que)
     {
        $que->where('is_guest',1);
     })->get());
     $a = 1;
     $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
     $old = MemberSection::whereHas('member',function($que)
     {
        $que->where('is_guest',1);
     })->where('code', $code)->first();
     while ($old) {
         $a++;
         $code = 'Inv_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
         $old = MemberSection::whereHas('member',function($que)
         {
            $que->where('is_guest',1);
         })->where('code', $code)->first();
     }
     $member_section->code = $code;
     $member_section->member_id=$data->id;
     $member_section->package_id=$request->package;
     $member_section->trainer_id=$request->trainer;
     $member_section->trainer_section=$request->section;

     $member_section->datetime=Carbon::now();
     $member_section->payment_method=$request->payment_method;
     $member_section->amount=$request->amount;
     $member_section->payment_method2=$request->payment_method2;
     $member_section->amount2=$request->amount2;
     $member_section->note=$request->note;
     $member_section->save();

     if($request->package)
     {
        $pkg=Package::find($request->package);
        if(!$pkg->day)
        {
            $data->expire_date=Carbon::now()->addDay($pkg->day);
        }
        else if(!$pkg->month)
        {
            $data->expire_date=Carbon::now()->addMonth($pkg->month);
        }
        else
        {
            $data->expire_date=Carbon::now()->addDay($pkg->day)->addMonth($pkg->month);
        }
     }

     $data->current_trainer=$request->trainer;

     if($request->section)
     {
        $data->remain_pt+=Section::find($request->section)->time;
     }
     $data->update();

        $route=url()->previous();
     return view('acustom.checkin.voucher2',compact('member_section','data','route'));


}
public function orders()
{
    return $this->hasMany(Order::class,'user_id');
}

//    Section

public function list_section($search=null)
{
    if($search)
    {

    }
    else
    {
        $data=Package::orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.section.list',compact('data'));
}


public function add_section()
{
return view('acustom.section.add');
}

public function edit_section($id)
{
$data=Package::find($id);
return view('acustom.section.edit',compact('data'));
}

public function create_section(Request $request)
{

$data=new Package();

$data->month=$request->month;
$data->day=$request->day;
$data->cost=$request->cost;

$data->save();

return redirect()->route('section.list');

}

public function member_purchase_section($id)
{
    $data=Member::find($id);
    $data2=MemberSection::where('member_id',$id)->paginate(15);
    return view('acustom.member.purchase_section',compact('data','data2'));
}

public function update_section(Request $request,$id)
{

$data=Package::find($id);

$data->month=$request->month;
$data->day=$request->day;
$data->cost=$request->cost;

$data->save();

return redirect()->route('section.list');

}

public function delete_section($id)
{
    $data=Package::find($id)->delete();
    return back();
}


public function guest_member($search=null)
{
    if($search)
    {
        $data=Member::where('is_guest',1)->
        where(function($que) use($search){
            $que->where('join_date','like',"%$search%")
            ->orwhere('name','like',"%$search%")
            ->orwhere('nrc_number','like',"%$search%")
            ->orwhere('dateofbirth','like',"%$search%")
            ->orwhere('username','like',"%$search%")
            ->orwhere('address','like',"%$search%")
            ->orwhere('type','like',"%$search%")

            ->orwhere('phone','like',"%$search%");
        })
        ->orderBy('id','desc')->paginate(15);

    }
    else
    {
        $data=Member::where('is_guest',1)->orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.member.list',compact('data'));
}



public function expire_member($search=null)
{
    if($search)
    {
        $data=Member::where('expire_date','<',Carbon::now())
        ->where('is_guest',0)->
        where(function($que) use($search){
            $que->where('join_date','like',"%$search%")
            ->orwhere('name','like',"%$search%")
            ->orwhere('nrc_number','like',"%$search%")
            ->orwhere('dateofbirth','like',"%$search%")
            ->orwhere('username','like',"%$search%")
            ->orwhere('address','like',"%$search%")
            ->orwhere('type','like',"%$search%")

            ->orwhere('phone','like',"%$search%");
        })
        ->orderBy('id','desc')->paginate(15);

    }
    else
    {
        $data=Member::where('expire_date','<',Carbon::now())
        ->where('is_guest',0)->orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.member.list',compact('data'));
}


public function active_member($search=null)
{
    if($search)
    {
        $data=Member::where('expire_date','>=',Carbon::now())
        ->where('is_guest',0)->
        where(function($que) use($search){
            $que->where('join_date','like',"%$search%")
            ->orwhere('name','like',"%$search%")
            ->orwhere('nrc_number','like',"%$search%")
            ->orwhere('dateofbirth','like',"%$search%")
            ->orwhere('username','like',"%$search%")
            ->orwhere('address','like',"%$search%")
            ->orwhere('type','like',"%$search%")

            ->orwhere('phone','like',"%$search%");
        })
        ->orderBy('id','desc')->paginate(15);

    }
    else
    {
        $data=Member::where('expire_date','>=',Carbon::now())
        ->where('is_guest',0)->orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.member.list',compact('data'));
}


}
