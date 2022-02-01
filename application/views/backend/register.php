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
<div class="register-box" style="width: 90%">
  <div class="card card-outline card-primary">
    <!-- <div class="card-header text-center">
      <a href="<?php echo base_url();?>login/" class="h1"><b>PMRS</b></a>
    </div> -->
    <div class="card-body">
      <p class="login-box-msg"><h5>Register a new account</h5></p>
      <center><span id="err_alert"></span></center>
      <form enctype="multipart/form-data" id="form_reg">
        <div class="row" id="info" style="display: block">
          <div class="row container-fluid"> 
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Firstname" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="mname" id="mname" placeholder="Middlename" required>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Lastname" required>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Suffix" required>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-home"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="address" id="address" placeholder="Complete Address" required>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="input-group mb-3" id="reservationdate" data-target-input="nearest">
                <div class="input-group-prepend" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="bdate" id="bdate" placeholder="Birthdate" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
                <input type="text" class="form-control" name="cno" id="cno" placeholder="Contact No" required>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-venus-mars"></span>
                  </div>
                </div>
                <select class="form-control select2" name="gender" id="gender" required>
                   <option value="">Select Gender</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-people-arrows"></span>
                  </div>
                </div>
                <select class="form-control select2" name="user_type" id="user_type" required>
                  <option value="">Select Usertype</option>
                  <option value="1">Consumer</option>
                  <option value="2">Concessionaire</option>
                  <option value="3">Business Owner</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-people-carry"></span>
                  </div>
                </div>
                <select class="form-control select2" name="bo_type" id="bo_type" required>
                  <option value="0">None</option>
                  <option value="1">Retailer</option>
                  <option value="2">Wholesaler</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-10">
            </div>
            <!-- /.col -->
            <div class="col-md-2 mt-5">
              <button type="button" class="btn btn-primary btn-block mb-3" onclick="next()">Next</button>
            </div>
            <!-- /.col -->
          </div>
        </div>

        <div id="cred" style="display: none">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email_add" id="email_add" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="r_pwd" id="r_pwd" placeholder="Retype password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="icheck-primary mt-3">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
             I agree to the <a href="#">terms</a>
            </label>
          </div>

          <div class="row mt-5">
            <div class="col-md-2 mb-3">
              <button type="button" class="btn btn-primary btn-block" onclick="back()">Back</button>
            </div>
            <div class="col-md-8"></div>
            <!-- /.col -->
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary btn-block" id="btn_reg" onclick="register();">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </div>
      </form>

      <a href="<?php echo base_url();?>login/" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
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
</body>

<script type="text/javascript">  
  $(document).ready(function(){
    $(function () {
      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });
    });    
  });

  function next() {

    var fn = $("#fname").val();
    var ln = $("#lname").val();
    var ca = $("#address").val();
    var bd = $("#bdate").val();
    var cn = $("#cno").val();
    var gen = $("#gender").val();
    var ut = $("#user_type").val();
    var bt = $("#bo_type").val();

    if (fn == "") {
      $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Firstname is required.</div>");
    }
    else if (ln == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Lastname is required.</div>")
    }
    else if (ca == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Complete Address is required.</div>")
    }
    else if (bd == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Birthdate is required.</div>")
    }
    else if (cn == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Contact Number is required.</div>")
    }
    else if (gen == "" ) {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Gender is required.</div>")
    }
    else if (ut == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Usertype is required.</div>")
    }
    else{
      $("#err_alert").html("");
      $('#info').css('display','none');
      $('#cred').css('display','block');
      $('#cred').css('display','block');

    }

  }

  function back() {
    $('#info').css('display','block');
    $('#cred').css('display','none');
  }
</script>

<script type="text/javascript">
  
  function register() {

    var fn = $("#fname").val();
    var ln = $("#lname").val();

    var em_add = $("#email_add").val();
    var un = $("#uname").val();
    var pwd = $("#pwd").val();
    var r_pwd = $("#r_pwd").val();

    if (em_add == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Firstname is required.</div>")
    }
    else if (un == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Username is required.</div>")
    }
    else if (pwd == "") {
       $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Password is required.</div>")
    }
    else if (pwd != r_pwd)
    {
      $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Password does not match. Please try again !</div>");
    }
    else 
    {
      $("#err_alert").html("");
      if ($("#agreeTerms").prop('checked') == true) {
        console.log($("form#form_reg").serialize());

        $.ajax({
          type:'POST',
          url: "<?php echo base_url(); ?>register/create",
          data:$("form#form_reg").serialize(),
          cache:false,
          beforeSend:function(){
            $("#btn_reg").attr('disabled');
            $("#btn_reg").text('Registering Account...');
          },
          success:function(data){
            $("#btn_reg").text('Register');
            //alert(data);

            if (data == 1) {
              $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Email Address already in use.</div>");
            }
            else if (data == 2) {
              $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span> Username already exists.</div>");
            }
            else if (data == 200) 
            {
              //window.location = "<?php echo base_url();?>register/verification/" + fn + "/" + ln + "/" + em_add;
              window.location = "<?php echo base_url();?>register/verification/" +  em_add;
            }
            else
            {
              $("#err_alert").html("<div class='alert alert-danger text-center'><span class='fa fa-info-circle'></span>" + data + "</div>");
            }
          }
        });
      }
      else{
        $("#agreeTerms").focus();
      } 
    }
  }
</script>
</html>
