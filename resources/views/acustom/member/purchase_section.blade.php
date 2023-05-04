@extends('acustom.member.detail')
@section('detail_content')


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
            @foreach($data2 as $k => $dat)
            <tr>
                <td> {{(++$k)+(15*($data2->currentPage()-1))}}</td>
                <td> {{$dat->code}} </td>
                <td> {{$dat->member->name}} </td>
                <td> {{Carbon\Carbon::parse($dat->datetime)->format('d-m-Y h:i a')}} </td>
                <td> {{$dat->amount2+$dat->amount}} mmk </td>





                <td>
                    <a href="{{route('purchase.section.list',$dat->id)}}" class="btn btn-dark"> Voucher </a>


                    {{-- @if(Auth::user()->type=="admin") --}}
                 {{-- <a  href="/customerdelete/{{$dat->id}}" class="btn btn-danger"> <i class="fas fa-trash"></i> </a> --}}
                    {{-- @endif --}}

            </td>
            </tr>
            @endforeach
        </tbody>

    </table>
     <div class="d-flex justify-content-center">
        {{$data2->links()}}

    </div>
</div>

@endsection
