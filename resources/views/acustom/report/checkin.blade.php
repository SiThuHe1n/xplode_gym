@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')
<div class="content p-3">
    <div class="container-fluid">
        <div class="col-md-12 ">

            <form action="{{ route('checkin.list') }}" >



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
                            <th> ID </th>
                            <th> Member </th>
                            <th> Trainer </th>
                            <th> DateTime </th>
                            <th> Expire Date </th>
                            <th> Current Package </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $k => $dat)
                        <tr>
                            <td> {{(++$k)+(15*($data->currentPage()-1))}}</td>
                            <td> {{$dat->member->code ?? 'No-ID'}}  </td>
                            <td> {{$dat->member->name ?? 'No-Name'}}  </td>
                            <td> {{$dat->trainer->name ?? 'Non-Trainer'}}  </td>
                            <td> {{$dat->datetime}}  </td>
                            <td> {{$dat->expire_date ?? ''}}  </td>
                            <td> @isset($dat->package->month)
                                {{$dat->package->month ?? ''}} Months
                            @endisset  </td>






                            <td>
                                {{-- <a href="{{route('ptrainer.edit',$dat->id)}}" class="btn btn-warning"> Edit </a>
                                <a href="{{route('ptrainer.delete',$dat->id)}}" class="btn btn-danger"> Delete </a> --}}

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
        </div>
        </div>

      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>



@endsection
