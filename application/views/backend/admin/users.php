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
               <h3 class="card-title" style="height: 38px;"></h3>
            </div>
            <div class="card-body">
               <table id="dt_users_list" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>User ID</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Option</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $this->db->query("SELECT * FROM user_account WHERE user_id <> 1");
                        
                        foreach($query->result_array() as $row):
                        ?>
                     <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['date_created']; ?></td>
                        <td>
                           <?php 
                              if ($row['is_verified'] == 1) {
                                echo "<span class='badge badge-success'>VERIFIED</span>";
                              }
                              else{
                                echo " <span class='badge badge-danger'>NOT VERIFIED</span>";
                              }
                              ?>  
                        </td>
                        <td>
                           <button class="btn btn-sm btn-success" onclick="view_users_info('<?php echo $row['user_id']; ?>','<?php echo $row['firstname']; ?>','<?php echo $row['middlename']; ?>','<?php echo $row['lastname']; ?>','<?php echo $row['suffix']; ?>','<?php echo $row['address']; ?>','<?php echo $row['dob']; ?>','<?php echo $row['contact_no']; ?>','<?php echo $row['gender']; ?>','<?php echo $row['type']; ?>','<?php echo $row['bo_type']; ?>','<?php echo $row['email_address']; ?>','<?php echo $row['username']; ?>','<?php echo $this->crud_model->decrypt($row['password']); ?>');">UPDATE</button>
                           <button class="btn btn-sm btn-danger" onclick="remove_user('<?php echo $row['user_id']; ?>');">DELETE</button>
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

<div class="modal fade" id="edit_users">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Update User Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form enctype="multipart/form-data" id="up_users">
               <div class="row container-fluid">
                  <input type="hidden" name="user_id" id="user_id">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Firstname:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_fname" id="up_fname" placeholder="Firstname" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Middlename:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_mname" id="up_mname" placeholder="Middlename" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Lastname:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_lname" id="up_lname" placeholder="Lastname" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Suffix:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_suffix" id="up_suffix" placeholder="Suffix">
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                     <label>Address:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_address" id="up_address" placeholder="Complete Address" required>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                     <label>Date of Birthdate:</label>
                     <div class="form-group mb-3" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="up_bdate" id="up_bdate" placeholder="Birthdate" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Contact No.:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_cno" id="up_cno" placeholder="Contact No" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Gender:</label>
                     <div class="form-group mb-3">
                        <select class="form-control select2" name="up_gender" id="up_gender" required>
                           <option value="">Select Gender</option>
                           <option value="1">Male</option>
                           <option value="2">Female</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>User Type:</label>
                     <div class="form-group mb-3">
                        <select class="form-control select2" name="up_user_type" id="up_user_type" required>
                           <option value="">Select Usertype</option>
                           <option value="1">Consumer</option>
                           <option value="2">Concessionaire</option>
                           <option value="3">Business Owner</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Business Owner Type:</label>
                     <div class="form-group mb-3">
                        <select class="form-control select2" name="up_bo_type" id="up_bo_type" required>
                           <option value="0">None</option>
                           <option value="1">Retailer</option>
                           <option value="2">Wholesaler</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                     <label>Email Address:</label>
                     <div class="form-group mb-3">
                        <input type="email" class="form-control" name="up_email_add" id="up_email_add" placeholder="Email">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Username:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_uname" id="up_uname" placeholder="Username">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label>Password:</label>
                     <div class="form-group mb-3">
                        <input type="text" class="form-control" name="up_pwd" id="up_pwd" placeholder="Password">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer float-right">
            <button type="button" class="btn btn-primary" id="btn_up_users" onclick="edit_user()">UPDATE</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
      $("#dt_users_list").DataTable({
         "responsive": true, "lengthChange": false, "autoWidth": false,
         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   });

   function view_users_info($id,$fn,$mn,$ln,$sfx,$addrs,$dob,$cno,$gen,$ut,$bot,$ea,$un,$pwd) {

      $("#user_id").val($id);
      $("#up_fname").val($fn);
      $("#up_mname").val($mn);
      $("#up_lname").val($ln);
      $("#up_suffix").val($sfx);
      $("#up_address").val($addrs);
      $("#up_bdate").val($dob);
      $("#up_cno").val($cno);
      $("#up_gender").val($gen).change();
      $("#up_user_type").val($ut).change();
      $("#up_bo_type").val($bot).change();
      $("#up_email_add").val($ea);
      $("#up_uname").val($un);
      $("#up_pwd").val($pwd);
      $("#edit_users").modal('show');

   }

   function edit_user() {

      console.log($("form#up_users").serialize());

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>admin/users/update",
         data:$("form#up_users").serialize(),
         cache:false,
         beforeSend:function(){
            $("#btn_up_users").attr('disabled');
            $("#btn_up_users").text('UPDATING ...');
         },
         success:function(data){
           location.reload();
         }
      });

   }

   function remove_user(Id) {

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
               url: "<?php echo base_url(); ?>admin/users/delete",
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