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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url();?>index" class="h1"><b>PMRS</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <center><span id="err_alert"></span></center>
      <div class="input-group mb-3">
        <input type="email" class="form-control" id="prov_email" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button class="btn btn-primary btn-block" id="btn_forgot_password" onclick="request_password();">Request new password</button>
          <!-- <a href="<?php echo base_url();?>login/recover_password" class="btn btn-primary btn-block">Request new password</a>
        </div> -->
        <!-- /.col -->
      </div>
      <p class="mt-3 mb-1">
        <a href="<?php echo base_url(); ?>login">Back to Login Page</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script>
  
  function request_password() {

    var email_add = $("#prov_email").val();

    $.ajax({
      type:'POST',
      url: "<?php echo base_url(); ?>login/forgot_password/request/",
      data:{email_add:email_add},
      cache:false,
      beforeSend:function(){
        $("#btn_forgot_password").attr('disabled');
        $("#btn_forgot_password").text('Requesting ...');
      },
      success:function(data){
        $("#btn_forgot_password").text('Request new password');

        if(data == 1) {
          $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Email Address does not exist.</div>");
        }
        else if(data == 200){
          window.location = "<?php echo base_url();?>login/request_sent/";
        }
        else{
          $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span>" + data + "</div>");
        }

      }
    });
  }
</script>
</body>
</html>
