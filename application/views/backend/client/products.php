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
               <h3 class="card-title float-right"><a class="btn btn-success" href="<?php echo base_url();?>client/report/" traget="_blank">Send Report</a></h3>
            </div>
            <div class="card-body">
               <table id="dt_pricelist_user" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Commodity Type</th>
                        <th>Unit</th>
                        <th>SRP</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $this->db->query("SELECT t1.`Id`, t1.`name`, t2.`Id` AS comm_id, t2.`name` AS commodity_type, t3.`Id` AS unit_id, t3.`name` AS units, t1.`srp`, t1.`status` FROM products t1 LEFT JOIN commodity_type t2 ON t1.`commodity_id` = t2.`Id` LEFT JOIN units t3 ON t1.`unit_id` = t3.`Id` ORDER BY name ASC");

                        foreach($query->result_array() as $row):
                     ?>
                     <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['commodity_type']; ?></td>
                        <td><?php echo $row['units']; ?></td>
                        <td><?php echo $row['srp']; ?></td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Name</th>
                        <th>Commodity Type</th>
                        <th>Unit</th>
                        <th>SRP</th>
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
      $("#dt_pricelist_user").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });
</script>