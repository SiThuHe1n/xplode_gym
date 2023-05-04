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
                <form action="{{ route('payment.update',$data->id) }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4 m-5 p-5 shadow bg-white rounded">

                            <label for=""> Payment Method </label>
                            <input value="{{ $data->name }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror







                            <button class="btn btn-primary my-3">Submit</button>
                            <a href="{{route('payment.list')}}" class="btn btn-warning"> Cancle </a>
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