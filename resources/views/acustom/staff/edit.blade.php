@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
    <!-- Content Header (Page header) -->


        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('staff.update',$data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 m-5 p-5 shadow bg-white rounded">


                            <div class="row">
                                <div class="col-md-6">

                                    <label for=""> Name </label>
                                    <input type="text" value="{{ $data->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Username </label>
                                    <input type="text" value="{{ $data->username }}" name="username" class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> NRC Number </label>
                                    <input type="text" value="{{ $data->nrc_number }}" name="nrc_number" class="form-control @error('nrc_number') is-invalid @enderror">
                                    @error('nrc_number')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Join Date </label>
                                    <input type="date" value="{{ $data->join_date }}" name="join_date" class="form-control @error('join_date') is-invalid @enderror">
                                    @error('join_date')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Date of Birth </label>
                                    <input type="date" value="{{ $data->dateofbirth }}" name="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror">
                                    @error('dateofbirth')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror





                                </div>
                                <div class="col-md-6">
                                    <label for=""> Phone </label>
                                    <input type="text" value="{{ $data->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Password </label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Salary </label>
                                    <input type="number" value="{{ $data->salary }}" name="salary" class="form-control @error('salary') is-invalid @enderror">
                                    @error('salary')
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


                                    <label for=""> Type </label>
                                    <select  name="type" value="{{ $data->type }}" class="form-control @error('type') is-invalid @enderror">
                                        <option >Select </option>
                                        <option @if($data->type=="Staff") selected @endif value="Staff"> Staff </option>
                                        <option @if($data->type=="Trainer") selected @endif value="Trainer"> Trainer </option>
                                        <option @if($data->type=="Coach") selected @endif value="Coach"> Coach </option>
                                        <option @if($data->type=="Reception") selected @endif value="Reception"> Reception </option>

                                    </select>
                                    @error('type')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror




                                </div>
                            </div>

                            <label for=""> Address </label>
                            <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror">{{ $data->address }}</textarea>
                            @error('address')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror



                            <hr>
                            <label for=""> Permission </label>
                            <div class="form-check">

                                <input

                                @if($data->permission)
                                @foreach (json_decode($data->permission) as $per )
                                    @if($per=='member')
                                        checked
                                    @endif
                                @endforeach
                                @endif

                                name="permission[]" value="member" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Member
                                </label>
                              </div>

                              <div class="form-check">
                                <input
                                @if($data->permission)
                                @foreach (json_decode($data->permission) as $per )
                                    @if($per=='staff')
                                        checked
                                    @endif
                                @endforeach
                                @endif

                                 name="permission[]" value="staff" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Staff
                                </label>
                              </div>


                              <div class="form-check">
                                <input
                                @if($data->permission)
                                @foreach (json_decode($data->permission) as $per )
                                    @if($per=='setup')
                                        checked
                                    @endif
                                @endforeach
                                @endif

                                 name="permission[]" value="setup" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Setup
                                </label>
                              </div>


                              <div class="form-check">
                                <input
                                @if($data->permission)
                                @foreach (json_decode($data->permission) as $per )
                                    @if($per=='pos')
                                        checked
                                    @endif
                                @endforeach
                                @endif

                                name="permission[]" value="pos" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  POS
                                </label>
                              </div>


                              <div class="form-check">
                                <input
                                @if($data->permission)
                                @foreach (json_decode($data->permission) as $per )
                                    @if($per=='checkin')
                                        checked
                                    @endif
                                @endforeach
                                @endif

                                 name="permission[]" value="checkin" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Checkin
                                </label>
                              </div>



                            <button class="btn btn-primary my-3">Submit</button>
                            <a href="{{route('staff.list')}}" class="btn btn-warning"> Cancle </a>
                        </div>
                    </div>

                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>




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
