@extends("layouts.main_layout")
@section('title')
Dashboard
@endsection
@section('content1')
<div class="row">
    <div class="col-lg-3">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$inmates_count}}</h3>

          <p>Total Inmates</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('inmates')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$male_count}}</h3>

          <p>Total Male Inmates</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{route('demo_by_cat','male')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$female_count}}</h3>

          <p>Total Female Inmates</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('demo_by_cat','female')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-6">
    <!-- PIE CHART -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Pie Chart</h3>

        
      </div>
      <div class="card-body">
        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Simple Full Width Table</h3>

            <div class="card-tools">
              <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-danger">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-warning">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar bg-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-primary">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar bg-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-success">90%</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>
@endsection
@section('custom_script')
<script>
    $(function () {
      var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
// Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  });
  </script>
@endsection