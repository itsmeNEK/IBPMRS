<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><?php echo $page_name?></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo $page_name?></li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>

   <div class="content">
      <div class="row container-fluid">
         <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
               <div class="inner">
                  <h3><?php echo $this->crud_model->count_total_items();?></h3>
                  <p>Total Items</p>
               </div>
               <div class="icon">
                  <i class="fas fa-box-open fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3><?php echo $this->crud_model->count_total_users();?></h3>
                  <p>Total User Registered</p>
               </div>
               <div class="icon">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>

         <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3><?php echo $this->crud_model->count_daily_report_recieve();?></h3>
                  <p>Daily Report Received</p>
               </div>
               <div class="icon">
                  <i class="fas fa-address-book fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-purple">
               <div class="inner">
                  <h3><?php echo $this->crud_model->count_endorsed_report();?></h3>
                  <p>Total Endorsed Report</p>
               </div>
               <div class="icon">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="inner">
                  <h3><?php echo $this->crud_model->count_total_report_received();?></h3>
                  <p>Total Report Recieved</p>
               </div>
               <div class="icon">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
         
         <div class="col-lg-12 col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                     <i class="fas fa-chart-pie mr-1"></i>
                     Monthly Send Report Overview
                  </h3>
               </div>
               <div class="card-body">
                  <canvas id="revenue-chart-canvas" height="320" style="height: 320px;"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
   /* Chart.js Charts */
   // Sales chart
   var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d')
   //$('#revenue-chart').get(0).getContext('2d');

   var salesChartData = {
    labels: <?php echo $month;?>,
    datasets: [
      {
        label: '',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: <?php echo $rep_count;?>
      }  
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  })
  
</script>