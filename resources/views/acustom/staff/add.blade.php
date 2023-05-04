@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
    <!-- Content Header (Page header) -->


        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('staff.create') }}" method="post">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 m-5 p-5 shadow bg-white rounded">


                            <div class="row">
                                <div class="col-md-6">

                                    <label for=""> Name </label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Username </label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
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

                                    <label for=""> Password </label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <label for=""> Salary </label>
                                    <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror">
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
                                    <select  name="type" class="form-control @error('type') is-invalid @enderror">
                                        <option >Select </option>
                                        <option value="Staff">Staff </option>
                                        <option value="Trainer">Trainer </option>
                                        <option value="Coach">Coach </option>
                                        <option value="Reception">Reception </option>

                                    </select>
                                    @error('type')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror




                                </div>
                            </div>

                            <label for=""> Address </label>
                            <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                            @error('address')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror



                            <hr>
                            <label for=""> Permission </label>
                            <div class="form-check">
                                <input name="permission[]" value="report" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Member
                                </label>
                              </div>

                              <div class="form-check">
                                <input name="permission[]" value="report" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Staff
                                </label>
                              </div>


                              <div class="form-check">
                                <input name="permission[]" value="report" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Setup
                                </label>
                              </div>


                              <div class="form-check">
                                <input name="permission[]" value="report" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  POS
                                </label>
                              </div>


                              <div class="form-check">
                                <input name="permission[]" value="report" class="form-check-input" type="checkbox"  id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  Report
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
