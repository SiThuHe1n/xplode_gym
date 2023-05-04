@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New City</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create New City</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}
    <!-- Main content -->
    <section  class="content">
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('ptrainer.update',$data->id) }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4 m-5 p-5 shadow bg-white rounded">


                            <label for=""> Trainer </label>
                            <select  name="trainer" class="form-control @error('trainer') is-invalid @enderror">
                                @foreach (App\Models\Staff::where('type','trainer')->get() as $tr)
                                <option value="{{ $tr->id }}"> {{ $tr->name }} </option>
                                @endforeach

                            </select>
                            @error('trainer')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror



                            <label for=""> Section(Time) </label>
                            <input value="{{ $data->time }}" type="number" name="time" class="form-control @error('time') is-invalid @enderror">
                            @error('time')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror

                            <label for=""> Cost </label>
                            <input value="{{ $data->cost }}" type="number" name="cost" class="form-control @error('cost') is-invalid @enderror">
                            @error('cost')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror






                            <button class="btn btn-primary my-3">Submit</button>
                            <a href="{{route('ptrainer.list')}}" class="btn btn-warning"> Cancle </a>
                        </div>
                    </div>

                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>


    <script>
           $.ajax({
        type: "GET",
        url: "/get_customer_code",
        data: "",
        success: function(msg){
            $('#township').empty();
            console.log(msg);
            $('#code').val(msg);
        },
        error: function(error) {
            console.log(error);
        }
        });


     function changestate(dt)
     {

        if(dt)
        {


            console.log(dt)
            $.ajax({
        type: "GET",
        url: "/get_township/"+dt,
        data: "",
        success: function(msg){
            $('#township').empty();
            console.log(msg);
        msg.forEach(function(dd){

            $('#township').append('<option value="'+dd.id+'"> '+dd.name+' </option>');

        });
        },
        error: function(error) {
            console.log(error);
        }
        });
        }
        else
        {
            $('#township').empty();
        }

     }
    </script>
@endsection
