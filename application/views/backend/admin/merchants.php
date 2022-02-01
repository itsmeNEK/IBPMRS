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
               <h3 class="card-title float-right"><a class="btn btn-success" data-toggle="modal" data-target="#add_merchants">Add Merchant</a></h3>
            </div>
            <div class="card-body">
               <table id="dt_merchants_list" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Merchants Name</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Option</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $this->db->query("SELECT * FROM merchants ORDER BY name ASC");

                        foreach($query->result_array() as $row):
                     ?>
                     <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contact_no']; ?></td>
                        <td><?php echo $row['email_add']; ?></td>
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
                          <button class="btn btn-sm btn-success" onclick="view_merchants_info('<?php echo $row['Id'];?>','<?php echo $row['name'];?>','<?php echo $row['address'];?>','<?php echo $row['contact_no'];?>','<?php echo $row['email_add'];?>','<?php echo $row['status'];?>');">UPDATE</button>
                          <button class="btn btn-sm btn-danger" onclick="remove_merchants('<?php echo $row['Id'];?>');">DELETE</button>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Merchants Name</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Option</th>
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

<div class="modal fade" id="add_merchants">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Merchants</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="merchants">
               <div class="row container-fluid">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Merchants Name</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="mer_name" id="mer_name" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Address</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="address" id="address" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Contact No</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="cno" id="cno" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Email Address</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="email_add" id="email_add" required="">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_add_merch" onclick="add_merchants()">ADD</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit_merchants">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update Merchanst</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="up_merchants">
               <div class="row container-fluid">
                  <input type="hidden" name="merch_id" id="merch_id">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Merchants Name</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_mer_name" id="up_mer_name" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Address</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_address" id="up_address" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Contact No</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_cno" id="up_cno" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Email Address</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_email_add" id="up_email_add" required="">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <label>Units</label>
                     <div class="form-group">
                        <select class="custom-select" name="up_merch_sts" id="up_merch_sts" required>
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
            <button type="button" class="btn btn-primary" id="btn_up_merch" onclick="edit_merchants()">UPDATE</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      $("#dt_merchants_list").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });

   function add_merchants() {

      console.log($("form#merchants").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/merchants/add",
         data:$("form#merchants").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_add_merch").attr('disabled');
            $("#btn_add_merch").text('ADDING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function view_merchants_info($id,$name,$comm_id,$unit_id,$srp,$status) {

      $("#merch_id").val($id);
      $("#up_mer_name").val($name);
      $("#up_address").val($comm_id);
      $("#up_cno").val($unit_id);
      $("#up_email_add").val($srp);
      $("#up_merch_sts").val($status);
      $("#edit_merchants").modal('show');

   }

   function edit_merchants() {

      console.log($("form#up_merchants").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/merchants/update",
         data:$("form#up_merchants").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_up_merch").attr('disabled');
            $("#btn_up_merch").text('UPDATING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function remove_merchants(Id) {

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
               url: "<?php echo base_url(); ?>admin/merchants/delete",
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