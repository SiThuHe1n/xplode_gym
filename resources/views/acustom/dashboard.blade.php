@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')


<script src="{{ asset('chart.js/dist/chart.umd.js') }}"></script>

<div class="content">
    <div class="container-fluid">



        <div class="row my-3">
            <div class="col-md-4 p-3">
                <div class="information">
                    <h5>Total Sale </h5>
               
                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="information">
                    <h5>Total Purchase </h5>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="information">
                    <h5>Today Sale </h5>
                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="information">
                    <h5>Today Purchase </h5>
                </div>
            </div>



        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">From Date </label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">To Date </label>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4 p-3">
                <div class="information">
                    <h5>Total Sale </h5>
                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="information">
                    <h5>Total Purchase </h5>
                </div>
            </div>


            <div class="col-md-12 p-3">
                <h4>Sale Graph</h4>
                <canvas id="IncreateChart"></canvas>
            </div>

        </div>










      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <style>
    .information
    {
        padding: 20px;
        background: rgb(152, 119, 119);
        border:0px solid;
        border-radius: 30px;
    }
  </style>
    <script>
         const ctx = document.getElementById('IncreateChart');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: [@php
      $last = Carbon::now()->subDays(7);
      for($i=$last;strtotime($i)<=strtotime(Carbon::now());$i=Carbon::parse($i)->addDay(1))
      {
        echo '"'.$i->format('d/m').'",';
      }
      @endphp],
    datasets: [{
      label: '# of Votes',
      data: [@php
      $last = Carbon::now()->subDays(7);
      for($i=$last;strtotime($i)<=strtotime(Carbon::now());$i=Carbon::parse($i)->addDay(1))
      {
    //   $daily=App\Models\DailyInvestLog::where('user_id',Auth::user()->id)->where('date',$i->format('Y-m-d'))->first();
    //   if($daily)
    //   {
    //     echo $daily->profit.',';
    //   }
    //   else
    //   {
    //     echo '0,';
    //   }

      }
      @endphp 1,10,100,30,80,2,150],
      borderWidth: 1,
      tension: 0.4,
      pointStyle: false,
    }]
  },
  options: {
    responsive: true,
    interaction: {
intersect: false,
},
plugins: {
legend: {
    display: false
}
},
scales: {
x: {
display: true,
title: {
  display: true
}
},
y: {
display: true,
title: {
  display: true,
  text: 'Value'
},

}
}
},

});


    </script>

@endsection
