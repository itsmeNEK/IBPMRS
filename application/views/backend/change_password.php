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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
       <a href="<?php echo base_url();?>index" class="h1"><b>PMRS</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <center><span id="err_alert"></span></center>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="Password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="cnew_pass" id="cnew_pass" placeholder="Confirm Password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary btn-block" id="btn_change_pass" onclick="reset_password();">Change password</button>
        </div>
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

<script type="text/javascript">

  function reset_password() {

    var npwd = $("#new_pass").val();
    var cnpwd = $("#cnew_pass").val();
    var uid = <?php echo $user_id; ?>;

    if (npwd != cnpwd) {
      $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Password does not match. Please try again !</div>")
    }
    else { 

      var mydata = 'new_pass=' + npwd + '&user_id=' + uid;
      alert(mydata);

      $.ajax({
        type:'POST',
        url: "<?php echo base_url(); ?>login/reset_password/reset",
        data: mydata,
        cache:false,
        beforeSend:function(){
          $("#btn_change_pass").attr('disabled');
          $("#btn_change_pass").text('Changing ...');
        },
        success:function(data){
          $("#btn_change_pass").text('Change password');
          alert(data);

          if(data == 200){
            window.location = "<?php echo base_url();?>login/reset_password"; 
          }
          else{
            $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span>" + data + "</div>");
          }

        }
      });
    }
    
  }
</script>
</body>
</html>
