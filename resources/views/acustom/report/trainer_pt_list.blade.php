@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
<div class="content p-3">
    <div class="container-fluid">

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
                        <th> Invoice </th>
                        <th> Member </th>
                        <th> Remain Session </th>






                        {{-- <th> Action </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $dat)
                    <tr>
                        <td> {{(++$k)}}</td>
                        <td> {{$dat->name}} </td>
                        <td> {{$dat->code}} </td>
                        <td>{{ $dat->remain_pt }} </td>






                        {{-- <td>
                            <a href="{{route('purchase.section.list',$dat->id)}}" class="btn btn-dark"> Voucher </a>


                            @if(Auth::user()->type=="admin")
                         <a  href="/customerdelete/{{$dat->id}}" class="btn btn-danger"> <i class="fas fa-trash"></i> </a>
                            @endif

                    </td> --}}
                    </tr>
                    @endforeach
                </tbody>

            </table>
             <div class="d-flex justify-content-center">
                {{-- {{$data->links()}} --}}

            </div>
        </div>

      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>



@endsection
