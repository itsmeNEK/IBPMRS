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
         <div class="mb-4 text-right">
            <a class="btn btn-success"href="<?php echo base_url();?>client/report/" traget="_blank">File a Complaint</a>
         </div>
         <div class="mb-4 text-center">
            <h2>Suggested Retail Price as of <strong><?php echo date('F Y')?></strong></h2>
         </div>
         <div class="row">
            <?php
               $ct_query = $this->db->query("SELECT t2.`Id`, t2.`name`, t2.`category` FROM products t1 LEFT JOIN commodity_type t2 on t1.`commodity_id` = t2.`Id` GROUP BY commodity_id ORDER BY t2.`category`");

               foreach($ct_query->result_array() as $ct_row):
                  $commodity_type = $ct_row['Id'];
                  $commodity_name = $ct_row['name'];

                  $ct_name = str_replace(' ','',$commodity_name);
                  $table_name = "dt_prod_" . strtolower($ct_name);

                  if ($ct_row['category'] == 1) {
                     $categ = "Basic Necessities";
                  }
                  else{
                     $categ = "Prime Commodities";
                  }
            ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title"><?php echo strtoupper($categ).' | '.strtoupper($commodity_name); ?></h3>
                  </div>
                  <div class="card-body">
                     <table id="<?php echo $table_name; ?>" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Product Name</th>
                              <th>Unit</th>
                              <th>SRP</th>
                              <!-- <th>Status</th>
                              <th>Option</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $query = $this->db->query("SELECT t1.`Id`, t1.`name`, t2.`Id` AS unit_id, t2.`name` AS units, t1.`srp`, t1.`quantity`, t1.`status` FROM products t1 LEFT JOIN units t2 ON t1.`unit_id` = t2.`Id` WHERE t1.`commodity_id` = $commodity_type ORDER BY name ASC");
                              
                              foreach($query->result_array() as $row):
                           ?>
                           <tr>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['quantity'].$row['units'];; ?></td>
                              <td><?php echo $row['srp']; ?></td>
                              <!-- <td class="text-center">
                                 <?php
                                    if ($row['status'] == 1) {
                                       echo '<span class="badge badge-success">ACTIVE</span>';
                                    }
                                    else{
                                       echo '<span class="badge badge-danger">INACTIVE</span>';
                                    } 
                                    ?>
                              </td>
                              <td class="text-center">
                                 <button class="btn btn-sm btn-success" onclick="view_product_info('<?php //echo $row['Id'];?>','<?php //echo $row['name'];?>','<?php //echo $row['comm_id'];?>','<?php //echo $row['unit_id'];?>','<?php //echo $row['srp'];?>','<?php //echo $row['status'];?>');">UPDATE</button>
                                 <button class="btn btn-sm btn-danger" onclick="remove_product('<?php //echo $row['Id'];?>');">DELETE</button>
                              </td> -->
                           </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function(){
                  var name = "<?php echo $table_name; ?>";
                  $("#" + name).DataTable({
                     "responsive": true, "lengthChange": false, "autoWidth": false,
                     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
               });
            </script>
            <?php endforeach; ?>
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