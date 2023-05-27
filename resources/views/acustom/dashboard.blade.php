@extends('layouts.admin.app')

@section('title',\App\CPU\translate("home"))

@section('content')


<script src="{{ asset('chart.js/dist/chart.umd.js') }}"></script>

<div class="content">
    <div class="container-fluid">

        <form action="">


        <div class="row">
            <div class="col-md-4">
                <label for="">From Date </label>
                <input name="from" type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">To Date </label>
                <input name="to" type="date" class="form-control">
            </div>

            <div class="col-md-4">
                <label for="">Action </label>
               <button class="btn btn-primary form-control"> Submit </button>
            </div>
        </div>
    </form>

        <div class="row my-3">
            <div class="col-sm-6 col-lg-4 mb-3 mt-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100 color-two" href="#">
                    <div class="card-body">
                        <div class="flex-between align-items-center mb-1">
                            <div>
                                <h6 class="card-subtitle text-white">{{\App\CPU\translate('New Member')}}</h6>
                                <span class="card-title h2 text-white">
                                  115000 kyats
                                </span>
                            </div>
                            <div class="mt-2">
                                <i class="tio-money-vs text-white font-one"></i>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
                </div>

                <div class="col-sm-6 col-lg-4 mb-3 mt-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100 color-two" href="#">
                        <div class="card-body">
                            <div class="flex-between align-items-center mb-1">
                                <div>
                                    <h6 class="card-subtitle text-white">{{\App\CPU\translate('Total PT')}}</h6>
                                    <span class="card-title h2 text-white">
                                      115000 kyats
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <i class="tio-money-vs text-white font-one"></i>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </a>
                    <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mt-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card card-hover-shadow h-100 color-two" href="#">
                            <div class="card-body">
                                <div class="flex-between align-items-center mb-1">
                                    <div>
                                        <h6 class="card-subtitle text-white">{{\App\CPU\translate('Total Section')}}</h6>
                                        <span class="card-title h2 text-white">
                                          115000 kyats
                                        </span>
                                    </div>
                                    <div class="mt-2">
                                        <i class="tio-money-vs text-white font-one"></i>
                                    </div>
                                </div>
                                <!-- End Row -->
                            </div>
                        </a>
                        <!-- End Card -->
                        </div>




        </div>


        <div class="row my-3">
            <div class="col-sm-6 col-lg-4 mb-3 mt-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100 color-two" href="#">
                    <div class="card-body">
                        <div class="flex-between align-items-center mb-1">
                            <div>
                                <h6 class="card-subtitle text-white">{{\App\CPU\translate('Total Sale')}}</h6>
                                <span class="card-title h2 text-white">
                                  115000 kyats
                                </span>
                            </div>
                            <div class="mt-2">
                                <i class="tio-money-vs text-white font-one"></i>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
                </div>

            <div class="col-sm-6 col-lg-4 mb-3 mt-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100 color-two" href="#">
                    <div class="card-body">
                        <div class="flex-between align-items-center mb-1">
                            <div>
                                <h6 class="card-subtitle text-white">{{\App\CPU\translate('Total GYM Income')}}</h6>
                                <span class="card-title h2 text-white">
                                  115000 kyats
                                </span>
                            </div>
                            <div class="mt-2">
                                <i class="tio-money-vs text-white font-one"></i>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
                </div>


                <div class="col-sm-6 col-lg-4 mb-3 mt-3 mb-lg-5">
                    <!-- Card -->
                    <a class="card card-hover-shadow h-100 color-two" href="#">
                        <div class="card-body">
                            <div class="flex-between align-items-center mb-1">
                                <div>
                                    <h6 class="card-subtitle text-white">{{\App\CPU\translate('Total Pos Income')}}</h6>
                                    <span class="card-title h2 text-white">
                                      115000 kyats
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <i class="tio-money-vs text-white font-one"></i>
                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </a>
                    <!-- End Card -->
                    </div>


            <div class="col-md-12 p-3">
                <h4>Income Graph Daily</h4>
                <canvas id="IncreateChart"></canvas>
            </div>


            <div class="col-md-6 p-3">
                <h4>Income Graph Weekly</h4>
                <canvas id="IncreateChart"></canvas>
            </div>


            <div class="col-md-6 p-3">
                <h4>Income Graph Monthly</h4>
                <canvas id="IncreateChart"></canvas>
            </div>


            <div class="col-md-12 p-3">
                <h4>New Member Graph Daily</h4>
                <canvas id="IncreateChart"></canvas>
            </div>


            <div class="col-md-6 p-3">
                <h4>New Member Graph Weekly</h4>
                <canvas id="IncreateChart"></canvas>
            </div>


            <div class="col-md-6 p-3">
                <h4>New Member Graph Monthly</h4>
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
      @endphp ],
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
