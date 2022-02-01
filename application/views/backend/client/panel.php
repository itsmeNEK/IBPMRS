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
   <!-- /.content-header -->
   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title" style="height: 10px;"></h3>
            </div>
            <div class="card-body">
               <div class="row container-fluid">
                  <?php
                     $uid = $this->session->userdata('user_id');
                     $client_info = $this->db->query("SELECT * FROM user_account WHERE user_id = '$uid'");
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
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $ctr = 0;
                           $uid = $this->session->userdata('user_id');

                           $query = $this->db->query("SELECT * FROM report WHERE user_id = '$uid' ORDER BY Id ASC");

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
                           <td class="text-center">
                              <a class="btn btn-info btn-xs" href="<?php echo base_url().'client/view_report/'.$row['complaint_code']?>" target="_blank">View Report</a>
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
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
   $(document).ready(function(){
      $("#dt_complaint_list").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });
</script>

<script>
   $(document).ready(function(){
     generate_qrcode();
   });

   function generate_qrcode() {

      var img = new Image();

      var user_id = $("#uid").val();
      var link = "<?php echo base_url()."index/summary_report/";?>" + user_id;

      img.src = "https://chart.googleapis.com/chart?cht=qr&chl=" + link + "&chs=120x120&chld=L|0";
       
      $('#view_qrcode').html(img);

   }
</script>