@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11 py-5  ">
                <form action="{{ route('create.member.new') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 m-5 p-5 shadow bg-white rounded">


                            <div class="row">
                                <div class="col-md-6">

                                    <label for=""> Name </label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror



                                    <label for=""> NRC Number </label>
                                    <input type="text" name="nrc_number" class="form-control @error('nrc_number') is-invalid @enderror">
                                    @error('nrc_number')
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

                                    <label for=""> Date of Birth </label>
                                    <input type="date" name="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror">
                                    @error('dateofbirth')
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



                                    <label for=""> Address </label>
                                    <textarea type="text" name="address" rows="4" class="form-control @error('address') is-invalid @enderror"></textarea>
                                    @error('address')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror


                                </div>
                            </div>


                            <hr>

                                <label for=""> Package </label>
                                <select onchange="change_section(this.value)"  name="package" class="form-control @error('package') is-invalid @enderror">
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


</script>



      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
</div>
@endsection
