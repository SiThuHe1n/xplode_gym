@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 py-5  ">






                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Check In
                  </button>

                  <form action="{{ route('checkin.member') }}" method="post">
                    @csrf


                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Check In </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

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







                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button class="btn btn-primary my-3">Check In</button>

                        </div>
                      </div>
                    </div>
                  </div>
                </form>


            </div>
            <div class="col-md-12 ">


                <form action="{{ route('checkin.member') }}" >



                <div class="row my-3">
                    <div class="col-md-4">
                        <label for="">Search By member</label>
                        <input type="text" class="form-control" name="member" >
                    </div>

                    <div class="col-md-4">
                        <label for="">Search By Date</label>
                        <input type="date" class="form-control" name="date" >
                    </div>

                    <div class="col-md-4">
                        <label for="">Action</label>
                        <button class="btn btn-primary form-control">Search</button>
                    </div>
                </div>
            </form>
                <div class="table-responsive bg-white p-3 m-2 shadow rounded">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> ID </th>
                                <th> Member </th>
                                <th> Trainer </th>
                                <th> DateTime </th>
                                <th> Expire Date </th>
                                <th> Current Package </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $k => $dat)
                            <tr>
                                <td> {{(++$k)+(15*($data->currentPage()-1))}}</td>
                                <td> {{$dat->member->code ?? 'No-ID'}}  </td>
                                <td> {{$dat->member->name ?? 'No-Name'}}  </td>
                                <td> {{$dat->trainer->name ?? 'Non-Trainer'}}  </td>
                                <td> {{$dat->datetime}}  </td>
                                <td> {{$dat->expire_date ?? ''}}  </td>
                                <td> {{$dat->package->month.' Months ' ?? ''}}  </td>






                                <td>
                                    {{-- <a href="{{route('ptrainer.edit',$dat->id)}}" class="btn btn-warning"> Edit </a>
                                    <a href="{{route('ptrainer.delete',$dat->id)}}" class="btn btn-danger"> Delete </a> --}}

                                    {{-- @if(Auth::user()->type=="admin") --}}
                                 {{-- <a  href="/customerdelete/{{$dat->id}}" class="btn btn-danger"> <i class="fas fa-trash"></i> </a> --}}
                                    {{-- @endif --}}

                            </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                     <div class="d-flex justify-content-center">
                        {{$data->links()}}

                    </div>
                </div>
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
