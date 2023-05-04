@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row d-flex justify-content-center">
{{--
            <div id="old_member" class="col-md-8 py-5  ">
                <button id="member_button" class=" btn btn-dark" onclick="member()" style="width:200px;" >New Guest</button>
                <form action="{{ route('create.guest.old') }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 m-3 p-5 shadow bg-white rounded">
                            <label for=""> Search </label>
                            <input onchange="search_member(this.value)" type="text" id="search" class="form-control">

                            <label for=""> Member </label>
                            <select id="member_list"  name="member" class="form-control @error('member') is-invalid @enderror">
                                <option value="">Select </option>
                              @foreach(App\Models\Member::where('is_guest','1')->get() as $key => $memb)
                                <option value="{{ $memb->id }}"> {{ $memb->name }} - {{ $memb->phone }} </option>
                              @endforeach

                            </select>
                            @error('member')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror


                            <hr>

                                <label for=""> Package </label>
                                <select  name="package" class="form-control @error('package') is-invalid @enderror">
                                    <option value="">Select </option>
                                    @foreach(App\Models\Package::where('month',null)->get() as $key => $pkg)

                                    <option value="{{ $pkg->id }}">@if($pkg->month) {{$pkg->month}} Months @endif @if($pkg->day) {{$pkg->day}} Days @endif {{$pkg->cost}} </option>
                                    @endforeach



                                </select>
                                @error('package')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror --}}

                                {{-- <div class="row">
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
                                        <select id="pt_time"  name="section" class="form-control @error('section') is-invalid @enderror">

                                        </select>
                                        @error('section')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div> --}}

{{--
                                <hr>
                                <div class="row">
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

                                    <label for=""> Amount </label>
                                    <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror">
                                    @error('amount')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Payment Method (option) </label>
                                        <select  name="payment_method2" class="form-control @error('payment_method2') is-invalid @enderror">
                                            <option value="">Select </option>
                                            @foreach(App\Models\PaymentMethod::all() as $key => $pkg)
                                            <option value="{{ $pkg->id }}"> {{ $pkg->name }} </option>
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
            </div> --}}

            <div id="new_member" class="col-md-8 py-5  ">
                {{-- <button id="member_button" class="btn btn-dark" onclick="member()" style="width:200px;" >Old Guest</button> --}}
                <form action="{{ route('create.guest.new') }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 m-3 p-5 shadow bg-white rounded">



                            <div class="row">
                                <div class="col-md-6">

                                    <label for=""> Name </label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror





                                    <label for=""> Join Date </label>
                                    <input type="date" name="join_date" class="form-control @error('join_date') is-invalid @enderror">
                                    @error('join_date')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror






                                </div>
                                <div class="col-md-6">
                                    <label for=""> Phone </label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror





                                    <label for=""> Image </label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror





                                </div>
                            </div>

                            <label for=""> Address </label>
                            <textarea type="text" name="address"  class="form-control @error('address') is-invalid @enderror"></textarea>
                            @error('address')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror

                            <hr>

                                <label for=""> Package </label>
                                <select  name="package" class="form-control @error('package') is-invalid @enderror">
                                    <option value="">Select </option>
                                    @foreach(App\Models\Package::where('month',null)->get() as $key => $pkg)
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
                                        <select onchange="changetrainer2(this.value)"  name="trainer" class="form-control @error('trainer') is-invalid @enderror">
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
                                        <select id="pt_time2"  name="section" class="form-control @error('section') is-invalid @enderror">

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

                                    <label for=""> Amount </label>
                                    <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror">
                                    @error('amount')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Payment Method (option) </label>
                                        <select  name="payment_method2" class="form-control @error('payment_method2') is-invalid @enderror">
                                            <option value="">Select </option>
                                            @foreach(App\Models\PaymentMethod::all() as $key => $pkg)
                                            <option value="{{ $pkg->id }}">{{ $pkg->name }} </option>
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








      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
</div>

<script>
    var isold=true;
    $(document).ready(function()
    {
        $('#old_member').show();
        $('#new_member').hide();
    });


    function member()
    {
        if(isold==false)
        {
            $('#old_member').show();
            $('#new_member').hide();

            isold=!isold;
        }
        else
        {
            $('#old_member').hide();
            $('#new_member').show();

            isold=!isold;

        }
    }


function changetrainer2(dt)
        {

           if(dt)
           {


               $.ajax({
           type: "GET",
           url: "/get_section/"+dt,
           data: "",
           success: function(msg){
               $('#pt_time2').empty();
               console.log(msg);
           msg.forEach(function(dd){

               $('#pt_time2').append('<option value="'+dd.id+'"> '+dd.time+'times ('+dd.cost+' mmk) </option>');

           });
           },
           error: function(error) {
               console.log(error);
           }
           });
           }
           else
           {
               $('#pt_time2').empty();
           }

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
               url: "/get_guest/"+dt,
               data: "",
               success: function(msg){
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
