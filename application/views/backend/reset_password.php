<?php 
  $system_name = $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
  $system_title = $this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $page_title; ?> | <?php echo $system_name; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta content="ie=edge" http-equiv="x-ua-compatible">
  <meta content="<?php echo $system_name ." ".$system_title;?>" name="description">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box" style="width: 40%">
  <div class="card card-outline card-primary">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-md-12">
        <div class="p-4">
          <div class="text-center">
            <h2 class="text-gray-900 mb-5"><strong>Congratulation</strong></h2>
          </div>
            <center><h3>Successfully reset your password.</h3></center>
            <br>
            <center><h5>You may now login to your account.</h5></center>
            <br><br>
            <center><a class="btn btn-primary btn-sm" href="<?php echo base_url();?>index.php">Back to Login...</a></center>
        </div>
      </div>
    </div>
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
