@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 py-5">
                <a href="{{ route('new.member') }}" class="btn btn-dark form-control mx-3 my-1">New Member</a>
                <a href="{{ route('old.member') }}" class="btn btn-dark form-control mx-3 my-1">Old Member</a>
                <a href="{{ route('guest.member') }}" class="btn btn-dark form-control mx-3 my-1">Guest</a>
                <a href="{{ route('checkin.member') }}" class="btn btn-dark form-control mx-3 my-1">Check In</a>

            </div>

        </div>










      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

@endsection
