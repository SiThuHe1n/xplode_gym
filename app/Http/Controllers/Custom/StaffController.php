<?php

namespace App\Http\Controllers\Custom;

use App\Models\Staff;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{

    public function list_staff($search=null)
    {
        if($search)
        {
            $data=Staff::where('join_date','like',"%$search%")
            ->orwhere('name','like',"%$search%")
            ->orwhere('nrc_number','like',"%$search%")
            ->orwhere('dateofbirth','like',"%$search%")
            ->orwhere('username','like',"%$search%")
            ->orwhere('address','like',"%$search%")
            ->orwhere('type','like',"%$search%")
            ->orwhere('salary','like',"%$search%")
            ->orwhere('phone','like',"%$search%")
            ->orderBy('id','desc')->pagindate(15);

        }
        else
        {
            $data=Staff::orderBy('id','DESC')->paginate(15);
        }

        return view('acustom.staff.list',compact('data'));
    }


   public function add_staff()
   {
    return view('acustom.staff.add');
   }

   public function edit_staff($id)
   {
    $data=Staff::find($id);
    return view('acustom.staff.edit',compact('data'));
   }

   public function create_staff(Request $request)
   {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'username'=>'required|unique:staff,username',
            'password'=>'required',
            'nrc_number'=>'required',
            'address'=>'required',
            'salary'=>'required',
            'join_date'=>'required',
            'type'=>'required',
            'dateofbirth'=>'required',

        ]);


    $data=new Staff();
    $count = count(Staff::all());
    $a = 1;
    $code = 'xpStaff_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
    $old = Staff::where('code', $code)->first();
    while ($old) {
        $a++;
        $code = 'xpStaff_' . str_pad($count + $a, 6, '0', STR_PAD_LEFT);
        $old = Staff::where('code', $code)->first();
    }
    $data->code = $code;
    $data->name=$request->name;
    $data->phone=$request->phone;
    $data->username=$request->username;
    $data->password=bcrypt($request->password);
    $data->nrc_number=$request->nrc_number;
    $data->address=$request->address;
    $data->salary=$request->salary;
    $data->join_date=$request->join_date;
    $data->permission=json_encode($request->permission);

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
    $data->type=$request->type;

    $data->status=1;
    $data->save();
    return redirect()->route('staff.list');

   }

   public function update_staff(Request $request,$id)
   {

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            // 'username'=>'required|unique:staff,username',
            // 'password'=>'required',
            'nrc_number'=>'required',
            'address'=>'required',
            'salary'=>'required',
            'join_date'=>'required',
            'type'=>'required',
            'dateofbirth'=>'required',

        ]);


        $data= Staff::find($id);

        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->username=$request->username;
        if($request->password)
        {
            $data->password=bcrypt($request->password);
        }

        $data->nrc_number=$request->nrc_number;
        $data->address=$request->address;
        $data->salary=$request->salary;
        $data->join_date=$request->join_date;
        $data->permission=json_encode($request->permission);

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
        $data->type=$request->type;

        $data->status=1;
        $data->update();
        return redirect()->route('staff.list');

   }

   public function delete_staff()
   {

   }


//    Trainer


public function list_trainer($trainer,$search=null)
{
    if($search)
    {
        $data=Section::where('join_date','like',"%$search%")
        ->orwhere('name','like',"%$search%")
        ->orwhere('nrc_number','like',"%$search%")
        ->orwhere('dateofbirth','like',"%$search%")
        ->orwhere('username','like',"%$search%")
        ->orwhere('address','like',"%$search%")
        ->orwhere('type','like',"%$search%")
        ->orwhere('salary','like',"%$search%")
        ->orwhere('phone','like',"%$search%")
        ->orderBy('id','desc')->pagindate(15);

    }
    else
    {
        $data=Section::where('trainer_id',$trainer)->orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.trainer.list',compact('data','trainer'));
}


public function add_trainer($trainer)
{
return view('acustom.trainer.add',compact('trainer'));
}

public function edit_trainer($trainer,$id)
{
$data=Section::find($id);
return view('acustom.trainer.edit',compact('data','trainer'));
}

public function create_trainer($trainer,Request $request)
{
    $request->validate([
        'time'=>'required',
        'cost'=>'required',


    ]);


$data=new Section();
$data->trainer_id=$trainer;
$data->time=$request->time;
$data->cost=$request->cost;

$data->save();

return redirect()->route('trainer.list',$trainer);

}

public function update_trainer(Request $request,$trainer,$id)
{

    $request->validate([
        'time'=>'required',
        'cost'=>'required',


    ]);


    $data=Section::find($id);
    $data->time=$request->time;
    $data->cost=$request->cost;

    $data->update();

    return redirect()->route('trainer.list',$trainer);

}

public function delete_trainer($trainer)
{

}


// p trainer


public function list_ptrainer($search=null)
{
    if($search)
    {
        $data=Section::where('join_date','like',"%$search%")
        ->orwhere('name','like',"%$search%")
        ->orwhere('nrc_number','like',"%$search%")
        ->orwhere('dateofbirth','like',"%$search%")
        ->orwhere('username','like',"%$search%")
        ->orwhere('address','like',"%$search%")
        ->orwhere('type','like',"%$search%")
        ->orwhere('salary','like',"%$search%")
        ->orwhere('phone','like',"%$search%")
        ->orderBy('id','desc')->pagindate(15);

    }
    else
    {
        $data=Section::orderBy('id','DESC')->paginate(15);
    }

    return view('acustom.pt_trainer.list',compact('data'));
}


public function add_ptrainer()
{
return view('acustom.pt_trainer.add');
}

public function edit_ptrainer($id)
{
$data=Section::find($id);
return view('acustom.pt_trainer.edit',compact('data'));
}

public function create_ptrainer(Request $request)
{
    $request->validate([
        'trainer'=>'required',
        'time'=>'required',
        'cost'=>'required',


    ]);


$data=new Section();
$data->trainer_id=$request->trainer;
$data->time=$request->time;
$data->cost=$request->cost;

$data->save();

return redirect()->route('ptrainer.list');

}

public function update_ptrainer(Request $request,$id)
{

    $request->validate([
        'trainer'=>'required',
        'time'=>'required',
        'cost'=>'required',


    ]);


    $data=Section::find($id);
    $data->trainer_id=$request->trainer;
    $data->time=$request->time;
    $data->cost=$request->cost;

    $data->update();

    return redirect()->route('ptrainer.list');

}

public function delete_ptrainer($id)
{
    $data=Section::find($id)->delete();
    return back();
}

public function login()
{
    
}


}
