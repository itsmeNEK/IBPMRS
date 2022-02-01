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
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-md-12">
            <div class="p-4">
              <div class="text-center">
                <h3 class="text-gray-900 mb-3"><strong>Enter Verification Code</strong></h3>
                <h6 class="text-gray-900 mb-4">Check your email for your verification code</h6>
              </div>
              <center><span id="err_alert"></span></center>
              <div class="input-group mb-3">
                <input type="email" class="form-control" id="otp" placeholder="OTP Code">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <center>
                <p class="mt-3 mb-1">
                  <a href="">Resend Code</a>
                </p>
              </center>
              <div class="row mt-3">
                <div class="col-12">
                  <button class="btn btn-primary btn-block" id="btn_verify" onclick="verify_account();">Verify</button>
                  <!-- /.col -->
                </div>
              </div>
              <center>
                <p class="mt-3 mb-1">
                  <a href="">Verify via Email</a>
                </p>
              </center>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>

    <script type="text/javascript">
      
      function verify_account() {

        var code = $("#otp").val();
        var uid = "<?php echo $user_id; ?>";

        var mydata = 'otp_code=' + code + '&user_id=' + uid;

        $.ajax({
          type:'POST',
          url: "<?php echo base_url(); ?>register/verify_account/",
          data:mydata,
          cache:false,
          beforeSend:function(){
            $("#btn_verify").attr('disabled');
            $("#btn_verify").text('Verifying ...');
          },
          success:function(data){
            $("#btn_verify").text('Verify');
            $("#err_alert").html("");

            if(data == 1) {
              $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> You entered wrong verification code. Please try again. </div>");
            }
            else if(data == 200){
              window.location = "<?php echo base_url();?>register/verified/";
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