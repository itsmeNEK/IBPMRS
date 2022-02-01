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
         <div class="mb-4 text-right"><a class="btn btn-success" data-toggle="modal" data-target="#add_products">Add Product</a></div>
         <div class="row">
            <?php
               $ct_query = $this->db->query("SELECT t2.`Id`, t2.`name` FROM products t1 LEFT JOIN commodity_type t2 on t1.`commodity_id` = t2.`Id` GROUP BY commodity_id");

               foreach($ct_query->result_array() as $ct_row):
                  $commodity_type = $ct_row['Id'];
                  $commodity_name = $ct_row['name'];

                  $ct_name = str_replace(' ','',$commodity_name);
                  $table_name = "dt_prod_" . strtolower($ct_name);
            ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title"><?php echo $commodity_name; ?></h3>
                  </div>
                  <div class="card-body">
                     <table id="<?php echo $table_name; ?>" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Product Name</th>
                              <th>Unit</th>
                              <th>SRP</th>
                              <!-- <th>Status</th> -->
                              <th>Option</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $query = $this->db->query("SELECT t1.`Id`, t1.`name`, t2.`Id` AS unit_id, t2.`name` AS units, t1.`srp`, t1.`quantity`, t1.`status` FROM products t1 LEFT JOIN units t2 ON t1.`unit_id` = t2.`Id` WHERE t1.`commodity_id` = $commodity_type ORDER BY name ASC");
                              
                              foreach($query->result_array() as $row):
                           ?>
                           <tr>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['quantity'].$row['units']; ?></td>
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
                              </td>-->
                              <td class="text-center">
                                 <button class="btn btn-sm btn-success" onclick="view_product_info('<?php echo $row['Id'];?>','<?php echo $row['name'];?>','<?php echo $commodity_type;?>','<?php echo $row['unit_id'];?>','<?php echo $row['quantity'];?>','<?php echo $row['srp'];?>','<?php echo $row['status'];?>');">UPDATE</button>
                                 <button class="btn btn-sm btn-danger" onclick="remove_product('<?php echo $row['Id'];?>');">DELETE</button>
                              </td> 
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

<div class="modal fade" id="add_products">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Products</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="products">
               <div class="row container-fluid">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Commodity Type</label>
                     <div class="form-group">
                        <select class="custom-select" name="comm_type" id="comm_type">
                           <option value="">Select Commodity Type</option>
                           <?php echo $this->crud_model->get_comm_type();?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Product Name</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="prod_name" id="prod_name" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                     <label>Quantity</label>
                      <div class="form-group mb-3">
                        <input type="text" class="form-control" name="qty" id="qty" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                     <label>Units</label>
                     <div class="form-group">
                        <select class="custom-select" name="units" id="units">
                           <option value="">Select Units</option>
                           <?php echo $this->crud_model->get_units($con); ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>SRP</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="srp" id="srp" required>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_add_prod" onclick="add_product()">ADD</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit_products">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update Products</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="up_products">
               <div class="row container-fluid">
                  <input type="hidden" name="prod_id" id="prod_id">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Commodity Type</label>
                     <div class="form-group">
                        <select class="custom-select" name="up_comm_type" id="up_comm_type" required>
                           <option value="">Select Commodity Type</option>
                           <?php echo $this->crud_model->get_comm_type();?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Product Name</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_prod_name" id="up_prod_name" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                     <label>Quantity</label>
                      <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_qty" id="up_qty" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                     <label>Units</label>
                     <div class="form-group">
                        <select class="custom-select" name="up_units" id="up_units" required>
                           <option value="">Select Units</option>
                           <?php echo $this->crud_model->get_units($con); ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>SRP</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_srp" id="up_srp" required>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Status</label>
                     <div class="form-group">
                        <select class="custom-select" name="up_prod_sts" id="up_prod_sts" required>
                           <option value="">Select Status</option>
                           <option value="1">ACTIVE</option>
                           <option value="0">INACTIVE</option>
                        </select>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_up_prod" onclick="edit_product()">UPDATE</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">

   function add_product() {

      console.log($("form#products").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/products/add",
         data:$("form#products").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_add_prod").attr('disabled');
            $("#btn_add_prod").text('ADDING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function view_product_info($id,$name,$comm_id,$unit_id,$qty,$srp,$status) {

      $("#prod_id").val($id);
      $("#up_prod_name").val($name);
      $("#up_comm_type").val($comm_id);
      $("#up_units").val($unit_id);
      $("#up_qty").val($qty);
      $("#up_srp").val($srp);
      $("#up_prod_sts").val($status);
      $("#edit_products").modal('show');

   }

   function edit_product() {

      console.log($("form#up_products").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/products/update",
         data:$("form#up_products").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_up_prod").attr('disabled');
            $("#btn_up_prod").text('UPDATING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function remove_product(Id) {

      swal({
        title: "Are you sure ?",
        text: "You want to delete this data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete",
        closeOnConfirm: true
      },
      function(isConfirm){
         if (isConfirm) 
         {
            $.ajax({
               type:'POST',
               url: "<?php echo base_url(); ?>admin/products/delete",
               data:{Id:Id},
               cache:false,
               success:function(data){
                 location.reload();
               }
            });
         }
      });

   }
</script>