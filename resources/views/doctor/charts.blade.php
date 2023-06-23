<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>

    <meta charset="utf-8">
    @include('doctor.css')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      @include('doctor.sidebar')
      @include('doctor.navbar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div id="piechart" style="width: 100%; height: 400px;"></div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div id="piechart2" style="width: 100%; height: 400px;"></div>
            </div>
            </div>

          </div>
        </div>


        </div>
        </div>
      </div>
    </div>

@include('doctor.script')

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      <?php echo $chartData ?>
    ]);

    var options = {
      title: 'Статистика хронически больных'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>


<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $chartData2 ?>
        ]);

        var options = {
          title: 'Возраст населения',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }
    </script>

  </body>
</html>





