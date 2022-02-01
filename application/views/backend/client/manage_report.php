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
               <h3 class="card-title float-right"><a class="btn btn-success" href="<?php echo base_url();?>client/report/" traget="_blank">Send Report</a></h3>
            </div>
            <div class="card-body">
               <table id="dt_complaint_list" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Complaint Code</th>
                        <th>Complaint Title</th>
                        <th>Date Submitted</th>
                        <th>Date Solved</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $uid = $this->session->userdata('user_id');

                        $query = $this->db->query("SELECT * FROM report WHERE user_id = '$uid' ORDER BY Id ASC");

                        foreach($query->result_array() as $row):
                     ?>
                     <tr>
                        <td><?php echo strtoupper($row['complaint_code']); ?></td>
                        <td><?php echo $row['complaint_title']; ?></td>
                        <td><?php echo $row['date_reported']; ?></td>
                        <td><?php echo $row['date_solved']; ?></td>
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
                           <button class="btn btn-info btn-sm">View</button>
                           <button class="btn btn-success btn-sm">Edit</button>
                           <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                     <tr>
                       <th>Complaint #</th>
                        <th>Complaint Title</th>
                        <th>Date Submitted</th>
                        <th>Date Solved</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
               </table>
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