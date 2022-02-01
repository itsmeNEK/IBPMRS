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
         <div class="row container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title float-right"><a class="btn btn-success" data-toggle="modal" data-target="#add_comm_type">Add Commodity Type</a></h3>
                  </div>
                  <div class="card-body">
                     <table id="dt_comm_list" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Commodity</th>
                              <th>Category</th>
                              <th>Status</th>
                              <th>Option</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $query = $this->db->query("SELECT * FROM commodity_type ORDER BY name ASC");
                              
                              foreach($query->result_array() as $row):
                              ?>
                           <tr>
                              <td><?php echo $row['name']; ?></td>
                              <td class="text-center">
                                 <?php
                                    if ($row['category'] == 1) {
                                       echo '<span class="badge badge-primary">BASIC NECESSITIES</span>';
                                    }
                                    else{
                                      echo '<span class="badge badge-info">PRIME COMMODITIES</span>';
                                    } 
                                     
                                 ?>
                              </td>
                              <td class="text-center">
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
                                 <button class="btn btn-sm btn-success mb-1" onclick="view_commodity_info('<?php echo $row['Id']; ?>','<?php echo $row['name']; ?>','<?php echo $row['status']; ?>');">UPDATE</button>
                                 <button class="btn btn-sm btn-danger mb-1" onclick="remove_commodity('<?php echo $row['Id']; ?>')">DELETE</button>
                              </td>
                           </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title float-right"><a class="btn btn-success" data-toggle="modal" data-target="#add_unit">Add Unit</a></h3>
                  </div>
                  <div class="card-body">
                     <table id="dt_unit_list" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Unit</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Option</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $query = $this->db->query("SELECT * FROM units ORDER BY name ASC");
                              
                              foreach($query->result_array() as $row):
                              ?>
                           <tr>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td class="text-center">
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
                                 <button class="btn btn-sm btn-success mb-1" onclick="view_unit_info('<?php echo $row['Id']; ?>','<?php echo $row['name']; ?>','<?php echo $row['description']; ?>','<?php echo $row['status']; ?>');">UPDATE</button>
                                 <button class="btn btn-sm btn-danger mb-1" onclick="remove_unit('<?php echo $row['Id']; ?>')">DELETE</button>
                              </td>
                           </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="add_comm_type">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Commodity Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="commodity">
               <div class="row container-fluid">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Commodity Name</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="comm_name" id="comm_name" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Commodity Category</label>
                     <div class="form-group mb-3">
                        <select class="custom-select" name="comm_categ" id="comm_categ" required>
                           <option value="">Select Category</option>
                           <option value="1">Basic Necessities</option>
                           <option value="2">Prime Commodities</option>
                        </select>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_add_comm" onclick="add_commodity()">ADD</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit_comm_type">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update Commodity Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="up_commodity">
               <div class="row container-fluid">
                  <input type="hidden" name="comm_id" id="comm_id">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Commodity Name</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_comm_name" id="up_comm_name" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Commodity Category</label>
                     <div class="form-group mb-3">
                        <select class="custom-select" name="up_comm_categ" id="up_comm_categ" required>
                           <option value="">Select Category</option>
                           <option value="1">Basic Necessities</option>
                           <option value="2">Prime Commodities</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Units</label>
                     <div class="form-group">
                        <select class="custom-select" name="up_comm_sts" id="up_comm_sts" required>
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
            <button type="button" class="btn btn-primary" id="btn_up_comm" onclick="edit_commodity()">UPDATE</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="add_unit">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="unit">
               <div class="row container-fluid">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Unit Name</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="unit_name" id="unit_name" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Unit Description</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="unit_desc" id="unit_desc" required="">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_add_unit" onclick="add_unit()">ADD</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit_unit_type">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="up_unit">
               <div class="row container-fluid">
                  <input type="hidden" name="unit_id" id="unit_id">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Unit Name</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_unit_name" id="up_unit_name" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Unit Description</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_unit_desc" id="up_unit_desc" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Units</label>
                     <div class="form-group">
                        <select class="custom-select" name="up_unit_sts" id="up_unit_sts" required>
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
            <button type="button" class="btn btn-primary" id="btn_up_unit" onclick="edit_unit()">UPDATE</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      $("#dt_comm_list").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": true,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
      $("#dt_unit_list").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });

   function add_commodity() {

      console.log($("form#commodity").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/setup/comm_add",
         data:$("form#commodity").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_add_comm").attr('disabled');
            $("#btn_add_comm").text('ADDING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function view_commodity_info($id,$name,$categ,$status) {

      $("#comm_id").val($id);
      $("#up_comm_name").val($name);
      $("#up_comm_categ").val($categ);
      $("#up_comm_sts").val($status);
      $("#edit_comm_type").modal('show');

   }

   function edit_commodity() {

      console.log($("form#up_commodity").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/setup/comm_update",
         data:$("form#up_commodity").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_up_comm").attr('disabled');
            $("#btn_up_comm").text('UPDATING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function remove_commodity(Id) {

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
               url: "<?php echo base_url(); ?>admin/setup/comm_delete",
               data:{Id:Id},
               cache:false,
               success:function(data){
                 location.reload();
               }
            });
         }
      });

   }


   function add_unit() {

      console.log($("form#unit").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/setup/unit_add",
         data:$("form#unit").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_add_unit").attr('disabled');
            $("#btn_add_unit").text('ADDING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function view_unit_info($id,$name,$desc,$status) {

      $("#unit_id").val($id);
      $("#up_unit_name").val($name);
      $("#up_unit_desc").val($desc);
      $("#up_unit_sts").val($status);
      $("#edit_unit_type").modal('show');

   }

   function edit_unit() {

      console.log($("form#up_unit").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/setup/unit_update",
         data:$("form#up_unit").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_up_unit").attr('disabled');
            $("#btn_up_unit").text('UPDATING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function remove_unit(Id) {

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
               url: "<?php echo base_url(); ?>admin/setup/unit_delete",
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