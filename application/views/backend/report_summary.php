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
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   </head>
   <body class="hold-transition">
      <!-- Main content -->
      <div class="content">
         <div class="container-fluid mt-3">
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title" style="height: 10px;"></h3>
               </div>
               <div class="card-body">
                  <div class="row container-fluid">
                     <?php
                        $uid = $this->session->userdata('user_id');
                        $client_info = $this->db->query("SELECT * FROM user_account WHERE user_id = '$user_id'");
                     ?>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                           <h4>Client ID: <b><?php echo $client_info->row()->user_id;?></b></h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                           <h4>Client Name: <strong><?php echo $client_info->row()->firstname.' '.$client_info->row()->middlename.' '.$client_info->row()->lastname.' '.$client_info->row()->suffix.'.';?></strong></h4>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <input type="hidden" id="uid" value="<?php echo $client_info->row()->user_id;?>">
                        <div class="qr-code img-thumbnail img-responsive float-right" id="view_qrcode"></div>
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
                             <!--  <th>Action</th> -->
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
                              <td><?php echo "#".strtoupper($row['complaint_code']); ?></td>
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
                                       echo '<span class="badge badge-warning">TO BE ENDORSED . . .</span>';
                                    }
                                    else if ($row['status'] == 3){
                                       echo '<span class="badge badge-success">RESOLVED</span>';
                                    }      
                                 ?> 
                              </td>
                              <!-- <td class="text-center">
                                 <a class="btn btn-info btn-xs" href="<?php //echo base_url().'client/view_report/'.$row['complaint_code']?>" target="_blank">View Report</a>
                              </td> -->
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
      <!-- DataTables  & Plugins -->
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

      <script type="text/javascript">
         $(document).ready(function(){
            $("#dt_complaint_list").DataTable({
               "responsive": true, "lengthChange": false, "autoWidth": false,
               "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         });
      </script>
   </body>
</html>