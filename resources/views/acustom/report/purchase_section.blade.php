@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
<div class="content p-3">
    <div class="container-fluid">

        <form action="{{ route('purchase.section.list') }}" >



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
                        <th> Invoice </th>
                        <th> Member </th>
                        <th> DateTime </th>
                        <th> Amount </th>






                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $dat)
                    <tr>
                        <td> {{(++$k)+(15*($data->currentPage()-1))}}</td>
                        <td> {{$dat->code}} </td>
                        <td> {{$dat->member->name}} </td>
                        <td> {{Carbon\Carbon::parse($dat->datetime)->format('d-m-Y h:i a')}} </td>
                        <td> {{$dat->amount2+$dat->amount}} mmk </td>





                        <td>
                            <a href="{{route('purchase.voucher',$dat->id)}}" class="btn btn-dark"> Voucher </a>


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
