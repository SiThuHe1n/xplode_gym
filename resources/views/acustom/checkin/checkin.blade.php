@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 py-5  ">
                <form action="{{ route('checkin.member') }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 m-5 p-5 shadow bg-white rounded">
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
                              <input type="text" readonly class="form-control" value="" id="member_name">
                              <label for=""> Phone </label>
                              <input type="text" readonly class="form-control" value="" id="member_phone">

                              <label for=""> Address </label>
                              <textarea type="text" readonly class="form-control" value="" id="member_address"></textarea>
                              <label for=""> Remain PT </label>
                              <input type="text" readonly class="form-control" value="" id="member_remain">

                              <div class="form-check form-switch">
                                <input name="trainer" value="yes" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                <label class="form-check-label" for="flexSwitchCheckChecked"> Person Trainer </label>
                              </div>



                            <button class="btn btn-primary my-3">Check In</button>
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
    var member=JSON.parse('{{ json_encode(App\Models\Member::all()) }}'.replace(/&quot;/ig,'"'));

function changemember(dt)
{
    member.forEach(element => {
        if(element.id==dt)
        {
            $('#member_name').val(element.name);
            $('#member_phone').val(element.phone);
            $('#member_address').val(element.address);
            if(element.remain_pt)
            {
                $('#member_remain').val(element.remain_pt);
            }
            else
            {
                $('#member_remain').val(0);
            }


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
