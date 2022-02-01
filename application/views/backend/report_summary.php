<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PMRS | Report Summary</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
   </head>
   <body class="hold-transition">
      <!-- Main content -->
      <div class="content mt-4">
         <div class="container-fluid">
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title" style="height: 20px;"></h3>
               </div>
               <div class="card-body">
                  <div class="row container-fluid mb-5">
                     <?php
                        $uid = $this->session->userdata('user_id');
                        $client_info = $this->db->query("SELECT * FROM user_account WHERE user_id = '$user_id'");
                     ?>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <h4>Client ID: <b><?php echo $client_info->row()->user_id;?></b></h4>
                        <h4>Client Name: <strong><?php echo $client_info->row()->firstname.' '.$client_info->row()->middlename.' '.$client_info->row()->lastname.' '.$client_info->row()->suffix.'.';?></strong></h4>
                     </div>
                  </div>
                  <center><h3><strong>SUMMARY OF COMPLAINTS</strong></h3></center><br>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <table id="dt_complaint_list" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th></th>
                              <th>Ticket/Reference #</th>
                              <th>Complaint Title</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $ctr = 0;
                              $uid = $this->session->userdata('user_id');

                              $query = $this->db->query("SELECT * FROM report WHERE user_id = '$user_id' ORDER BY Id ASC");

                              foreach($query->result_array() as $row):
                                 $ctr++;
                           ?>
                           <tr>
                              <td><?php echo $ctr.'.)'; ?></td>
                              <td><?php echo strtoupper($row['complaint_code']); ?></td>
                              <td><?php echo $row['complaint_title']; ?></td>
                              <td class="text-center">
                                 <?php
                                    if ($row['status'] == 0) {
                                        echo '<span class="badge badge-danger">PENDING</span>';
                                    }
                                    else if ($row['status'] == 1) {
                                       echo '<span class="badge badge-warning">UNDER REVIEW . . .</span>';
                                    }
                                    else if ($row['status'] == 2){
                                        echo '<span class="badge badge-success">RESOLVED</span>';
                                    }  
                                 ?>  
                              </td>
                           </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
                  <label class="mt-3 mb-3">CLIENT INFORMATION</label>
                  <div class="row container-fluid">
                     
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="custom-control custom-checkbox mb-2">
                           <div class="form-group">
                              <div class="icheck-primary mb-2">
                                 <input type="checkbox" id="cons" value="1" <?php if($client_info->row()->type == '1'){echo 'checked';}?>>
                                 <label for="cons">
                                    Consumer
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="icheck-primary mb-2">
                                 <input type="checkbox" id="consess" value="1" <?php if($client_info->row()->type == '2'){echo 'checked';}?>>
                                 <label for="consess">
                                    Consessionaire
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="custom-control custom-checkbox mb-2">
                           <div class="form-group">
                              <div class="icheck-primary mb-2">
                                 <input type="checkbox" id="bus_own" value="1" <?php if($client_info->row()->type == '3'){echo 'checked';}?>>
                                 <label for="bus_own">
                                    Business Owner
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="form-group" style="padding-left: 30px;">
                                 <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" type="checkbox" id="bo1" value="1" <?php if($client_info->row()->bo_type == '1'){echo 'checked';}?>>
                                    <label for="bo1" class="custom-control-label">Retailer</label>
                                 </div>
                              </div>
                              <div class="form-group" style="padding-left: 30px;">
                                 <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" type="checkbox" id="bo2" value="1" <?php if($client_info->row()->bo_type == '2'){echo 'checked';}?>>
                                    <label for="bo2" class="custom-control-label">Wholesaler</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                     <h4>Address: <b><?php echo $client_info->row()->address;?></b></h4>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      </div>
      <!-- /.content -->

      <!-- jQuery -->
      <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
   </body>
</html>