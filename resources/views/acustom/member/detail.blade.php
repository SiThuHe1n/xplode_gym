@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <td >
                            <h5>Name</h5>
                            <span style="color:rgb(0, 84, 158)">  {{ $data->name }} </span>

                        </td>

                        <td style="text-align: end">
                            <h5>Member ID</h5>
                            <span style="color:rgb(0, 84, 158)">  {{ $data->code }} </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5>Phone</h5>
                              <span style="color:rgb(0, 84, 158)"> {{ $data->phone }} </span>

                        </td>

                        <td style="text-align: end">
                            <h5>NRC</h5>
                            <span style="color:rgb(0, 84, 158)">  {{ $data->nrc_number }} </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5>Address</h5>
                            <span style="color:rgb(0, 84, 158)">   {{ $data->address }} </span>

                        </td>

                        <td style="text-align: end">
                            <h5>Birth Date</h5>
                            <span style="color:rgb(0, 84, 158)">  {{ $data->dateofbirth }} </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5>Expire Date</h5>
                            <span style="color:rgb(0, 84, 158)">   {{ $data->expire_date }} </span>

                        </td>

                        <td style="text-align: end">
                            <h5>Join Date</h5>
                            <span style="color:rgb(0, 84, 158)">  {{ $data->join_date }} </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5>Current Trainer</h5>
                            <span style="color:rgb(0, 84, 158)">   {{ $data->current_trainer }} </span>

                        </td>

                        <td style="text-align: end">
                            <h5>Remain Section</h5>
                            <span style="color:rgb(0, 84, 158)">   {{ $data->remain_pt }} </span>

                        </td>
                    </tr>
                </table>
            </div>
        </div>


        <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#"> Purchase Section </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Checkin List</a>
            </li>

          </ul>

          <div class="row">
            <div class="col-md-12">
                @yield('detail_content')
            </div>
          </div>

      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

@endsection
