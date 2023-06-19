<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
 @include('doctor.css')
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {

     var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       ['Дети до 5 лет',     5],
       ['Дети до 14 лет',      7],
       ['Жители до 25 лет',  10],
       ['Старше 25', 26]
     ]);

     var options = {
       title: 'Возрастные показатели населения'
     };

     var chart = new google.visualization.PieChart(document.getElementById('piechart'));

     chart.draw(data, options);
   }

 </script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawVisualization);

   function drawVisualization() {
     // Some raw data (not necessarily accurate)
     var data = google.visualization.arrayToDataTable([
       ['Годы', 'Рождаемость'],
       ['2019',  19],
       ['2020',  8],
       ['2021',  21],
       ['2022',  11]
     ]);

     var options = {
       title : 'Статистика рождаемости',
       hAxis: {title: 'Годы'},
       seriesType: 'bars',
       series: {5: {type: 'line'}}
     };

     var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
     chart.draw(data, options);
   }
 </script>
</head>
  <body>
<div class="container-scroller">
  @include('doctor.sidebar')
@include('doctor.navbar')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">


                  <!-- partial:partials/_sidebar.html -->

                  <!-- partial -->

                    <div class="main-panel">
                      <div class="content-wrapper">

                        <div class="row">


                                <body>
                                  <div id="piechart" style="width: 900px; height: 500px;"></div>
                                  <div id="chart_div" style="width: 900px; height: 500px;"></div>
                                </body>
                              </html>



                          </div>
                        </div>
                      </div>
                      <!-- content-wrapper ends -->







    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>


    @include('doctor.script')
  </body>
</html>
