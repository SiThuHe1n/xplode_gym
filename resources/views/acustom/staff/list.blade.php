@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{route('staff.add')}}" class="btn btn-primary"> Add staff</a>
        {{-- <div class="row">
            <div class="col-6">


            </div>
            <div class="col-6">
                <div class="row">
                        <div class="col-3">
                            <label for="">Search</label>
                        </div>
                        <div class="col-7">
                            <input type="search" class="form-control" id="search">
                        </div>
                        <div class="col-2">
                            <button type="button" onclick="search()" class="btn btn-primary"> Search</button>
                        </div>
                </div>
            </div>
        </div> --}}
        <script>
            function search()
            {
             let search=   $('#search').val();
             if(search)
             {
                window.location.href="/customerlist/"+search;
             }

            }
          </script>
        <div class="table-responsive bg-white p-3 m-2 shadow rounded">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Name </th>
                        <th> Occupation </th>
                        <th> Salary </th>
                        <th> Join Date </th>
                        <th> Phone </th>
                        <th> NRC </th>
                        <th> Address </th>
                        <th> Birth Date </th>


                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $dat)
                    <tr>
                        <td> {{(++$k)+(15*($data->currentPage()-1))}}</td>
                        <td> {{$dat->name}} </td>
                        <td> {{$dat->type}} </td>
                        <td> {{$dat->salary}} </td>
                        <td> {{$dat->join_date}} </td>
                        <td> {{$dat->phone}} </td>
                        <td> {{$dat->nrc_number}} </td>
                        <td> {{$dat->address}} </td>
                        <td> {{$dat->dateofbirth}} </td>




                        <td>
                            @if($dat->type=="Trainer")
                            <a href="{{route('trainer.list',$dat->id)}}" class="btn btn-dark"> PT </a>
                            <a href="{{route('trainer.pt.list',$dat->id)}}" class="btn btn-dark"> Remain PT </a>


                            @endif
                            <a href="{{route('staff.edit',$dat->id)}}" class="btn btn-dark"> Edit </a>
                            <a href="{{route('staff.delete',$dat->id)}}" class="btn btn-dark"> Delete </a>

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

      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

@endsection
