<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><?php echo $this->crud_model->get_phrase($page_name);?></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?php echo $this->crud_model->get_phrase($page_name);?></li>
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
               <h3 class="card-title" style="height:38px;"></h3>
            </div>
            <div class="card-body">
               <table id="dt_complaint_list" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Ticket No.</th>
                        <th>Complaint Title</th>
                        <th>View Details</th>
                        <th>Take Action</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php

                        $query = $this->db->query("SELECT * FROM report ORDER BY Id ASC");

                        foreach($query->result_array() as $row):
                     ?>
                     <tr>
                        <td><?php echo "#".strtoupper($row['complaint_code']); ?></td>
                        <td><?php echo $row['complaint_title']; ?></td>
                        <td class="text-center">
                           <a class="btn btn-info btn-sm" href="<?php echo base_url().'admin/view_report/'.$row['complaint_code']?>" target="_blank">View Details</a>
                        </td>
                        <td class="text-center">
                           <?php
                              if ($row['status'] == 0) {
                                 echo '<button class="btn btn-primary btn-sm" id="btn_stat_1" onclick="change_status('.$row['Id'].','.$row['user_id'].',1)">Start to Review</button> <button class="btn btn-warning btn-sm" id="btn_stat_2" onclick="show_endorse_report_modal('.$row['Id'].','.$row['user_id'].')">Endorse Complaint</button>';
                              }
                              else if ($row['status'] == 1 OR $row['status'] == 2) {
                                 echo '<button class="btn btn-success btn-sm" id="btn_stat_3" onclick="change_status('.$row['Id'].','.$row['user_id'].',3)">Mark as Resolved</button>';
                              }
                              else if ($row['status'] == 3){
                                  echo '<button class="btn btn-danger btn-sm" id="btn_stat_0" onclick="change_status('.$row['Id'].','.$row['user_id'].',0)">Mark as Unresolved</button>';
                              }  
                           ?>
                        </td>
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
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="endorse_report">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Endorsed Report</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="endorsed_report">
               <div class="row container-fluid">
                  <input type="hidden" id="report_id">
                  <input type="hidden" id="user_id">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Endorsed To:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="to_endorsed" id="to_endorsed" required="">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_endorse_rpt" onclick="endorse_report()">Endorse</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      $("#dt_complaint_list").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });

   function show_endorse_report_modal(id, user_id) {

      $("#report_id").val(id);
      $("#user_id").val(user_id);
      $("#endorse_report").modal('show');
   }

   function endorse_report() {

      var to_endorsed = $("#to_endorsed").val();

      if(to_endorsed == "") 
      {
         swal("PMRS","Endorsed To is required. Please fill up this field.","warning");
      }
      else
      {
         swal({
           title: "Are you sure ?",
           text: "You want to endorse this report?",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Yes",
           closeOnConfirm: true
         },
         function(isConfirm){

            if (isConfirm) 
            {
               var rpt_id = $("#report_id").val();
               var uid = $("#user_id").val();

               var mydata = 'id=' + rpt_id + '&uid=' + uid + '&status=' + 2 + '&to_endorsed=' + to_endorsed;

               $.ajax({
                  type:'POST',
                  url: "<?php echo base_url(); ?>admin/change_report_status/",
                  data:mydata,
                  cache:false,
                  beforeSend:function(){
                     $("#btn_endorse_rpt").attr('disabled');
                     $("#btn_endorse_rpt").text('Loading ...');
                  },
                  success:function(data){
                    location.reload();
                  }
               });
            }
         });
      }
   }

   function change_status($id, $user_id, $status) {

       swal({
        title: "Are you sure ?",
        text: "You want to proceed this transaction?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: true
      },
      function(isConfirm){

         if (isConfirm) 
         {
            var mydata = 'id=' + $id + '&uid=' + $user_id + '&status=' + $status;

            $.ajax({
               type:'POST',
               url: "<?php echo base_url(); ?>admin/change_report_status/",
               data:mydata,
               cache:false,
               beforeSend:function(){
                  if ($status == 1) {
                     $("#btn_stat_1").attr('disabled');
                     $("#btn_stat_1").text('Loading ...');
                  }
                  else if ($status == 2) {
                     $("#btn_stat_2").attr('disabled');
                     $("#btn_stat_2").text('Loading ...');
                  }
                  else if ($status == 3) {
                     $("#btn_stat_3").attr('disabled');
                     $("#btn_stat_3").text('Loading ...');
                  }
                  else {
                     $("#btn_stat_4").attr('disabled');
                     $("#btn_stat_4").text('Loading ...');
                  }
               },
               success:function(data){
                 location.reload();
               }
            });
         }

      });

   }
</script>