@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 py-5  ">
                <form action="{{ route('create.member.old') }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 m-5 p-5 shadow bg-white rounded">
                            <label for=""> Search </label>
                            <input onchange="search_member(this.value)" type="text" id="search" class="form-control">

                            <label for=""> Member </label>
                            <select onchange="changemember(this.value)" id="member_list"  name="member" class="form-control @error('member') is-invalid @enderror">
                                <option value="">Select </option>
                              @foreach(App\Models\Member::where('is_guest','0')->get() as $key => $memb)
                                <option value="{{ $memb->id }}"> {{ $memb->name }} - {{ $memb->phone }} </option>
                              @endforeach

                            </select>
                            @error('member')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                                <label for=""> Name </label>
                              <input readonly type="text" class="form-control" value="" id="member_name">
                              <label for=""> Phone </label>
                              <input readonly type="text" class="form-control" value="" id="member_phone">
                              <label readonly for=""> Address </label>
                              <textarea type="text" class="form-control" value="" id="member_address"></textarea>
                            <hr>

                                <label for=""> Package </label>
                                <select onchange="change_section(this.value)" name="package" class="form-control @error('package') is-invalid @enderror">
                                    <option value="">Select </option>
                                    @foreach(App\Models\Package::where('month','!=',null)->get() as $key => $pkg)

                                    <option value="{{ $pkg->id }}">@if($pkg->month) {{$pkg->month}} Months @endif @if($pkg->day) {{$pkg->day}} Days @endif {{$pkg->cost}} </option>
                                    @endforeach



                                </select>
                                @error('package')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""> Trainer </label>
                                        <select onchange="changetrainer(this.value)"  name="trainer" class="form-control @error('trainer') is-invalid @enderror">
                                            <option value="">Select </option>
                                           @foreach(App\Models\Staff::where('type','Trainer')->get() as $key => $val)

                                           <option value="{{ $val->id }}"> {{ $val->name }} </option>

                                           @endforeach

                                        </select>
                                        @error('trainer')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="col-md-6">

                                        <label for=""> PT </label>
                                        <select onchange="change_trainer(this.value)" id="pt_time"  name="section" class="form-control @error('section') is-invalid @enderror">

                                        </select>
                                        @error('section')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>


                                <hr>
                                <div class="row">

                                    <div class="col-md-6">


                                        <label for="">Total Price</label>
                                        <input type="text" class="form-control" readonly id="total_price">

                                        <label for=""> Amount </label>
                                        <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror">
                                        @error('amount')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror


                                    </div>
                                    <div class="col-md-6">


                                        <label for=""> Payment Method </label>
                                        <select  name="payment_method" class="form-control @error('payment_method') is-invalid @enderror">
                                            <option value="">Select </option>
                                            @foreach(App\Models\PaymentMethod::all() as $key => $pkg)
                                            <option value="{{ $pkg->id }}"> {{ $pkg->name }} </option>
                                            @endforeach



                                        </select>
                                        @error('payment_method')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror


                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Payment Method (option) </label>
                                        <select  name="payment_method2" class="form-control @error('payment_method2') is-invalid @enderror">
                                            <option value="">Select </option>
                                            @foreach(App\Models\Account::all() as $key => $pkg)
                                            <option value="{{ $pkg->id }}"> {{ $pkg->account }} </option>
                                            @endforeach



                                        </select>
                                        @error('payment_method2')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">

                                    <label for=""> Amount(option) </label>
                                    <input type="text" name="amount2" class="form-control @error('amount2') is-invalid @enderror">
                                    @error('amount2')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    </div>
                                </div>


                                <label for=""> Payment(Note) </label>
                                <textarea type="text" name="note" rows="4" class="form-control @error('note') is-invalid @enderror"></textarea>
                                @error('note')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror






                            <button class="btn btn-primary my-3">Submit</button>
                            <a href="{{route('checkin')}}" class="btn btn-warning"> Cancle </a>
                        </div>
                    </div>

                </form>
            </div>

        </div>










      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>



<script>

var section_price=0;
var trainer_price=0;
var total_price=0;
var section_data=JSON.parse('{{ json_encode(App\Models\Package::where('month','!=',null)->get()) }}'.replace(/&quot;/ig,'"'));

var trainer_data=JSON.parse('{{ json_encode(App\Models\Section::all()) }}'.replace(/&quot;/ig,'"'));

function change_section(dt)
{   section_data.forEach(et => {
    if(dt==et.id)
    {
        section_price=et.cost;
    }
});
total_price=parseInt(trainer_price) +parseInt(section_price);
    $('#total_price').val(total_price);

}

function change_trainer(dt)
{   trainer_data.forEach(et => {
    if(dt==et.id)
    {
        trainer_price=et.cost;
    }
});
total_price=parseInt(trainer_price) +parseInt(section_price);
    $('#total_price').val(total_price);
}




    var member=JSON.parse('{{ json_encode(App\Models\Member::all()) }}'.replace(/&quot;/ig,'"'));

function changemember(dt)
{
    member.forEach(element => {
        if(element.id==dt)
        {
            $('#member_name').val(element.name);
            $('#member_phone').val(element.phone);
            $('#member_address').val(element.address);

        }
    });

}


function changetrainer(dt)
        {

           if(dt)
           {


               $.ajax({
           type: "GET",
           url: "/get_section/"+dt,
           data: "",
           success: function(msg){

               $('#pt_time').empty();
               console.log(msg);
           msg.forEach(function(dd){

               $('#pt_time').append('<option value="'+dd.id+'"> '+dd.time+'times ('+dd.cost+' mmk) </option>');

           });
           change_trainer( $('#pt_time').val());
           },
           error: function(error) {
               console.log(error);
           }
           });
           }
           else
           {
               $('#pt_time').empty();
           }

        }


    function search_member(dt)
            {

               if(dt)
               {


                   $.ajax({
               type: "GET",
               url: "/get_member/"+dt,
               data: "",
               success: function(msg){
                member=msg;
                   $('#member_list').empty();
                   console.log(msg);
               msg.forEach(function(dd){

                   $('#member_list').append('<option value="'+dd.id+'"> '+dd.name+' - '+dd.phone+' </option>');

               });
               },
               error: function(error) {
                   console.log(error);
               }
               });
               }
               else
               {
                $.ajax({
               type: "GET",
               url: "/get_member/ALLMEMBER",
               data: "",
               success: function(msg){
                   $('#member_list').empty();
                   console.log(msg);
                   data
               msg.forEach(function(dd){

                   $('#member_list').append('<option value="'+dd.id+'"> '+dd.name+' - '+dd.phone+' </option>');

               });
               },
               error: function(error) {
                   console.log(error);
               }
               });
               }

            }


    </script>


@endsection
