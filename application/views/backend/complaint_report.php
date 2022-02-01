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
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
   </head>
   <body class="hold-transition">
      <!-- Main content -->
      <div class="content mt-4">
         <div class="container-fluid">
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Complaint Report Details</h3>
               </div>
               <div class="card-body">
                  <?php 
                     $query = $this->db->query("SELECT * from report WHERE complaint_code = '$complaint_code'")->result_array();
                     
                     foreach ($query as $row):
                        $comp_data = json_decode($row['complainant_info']);
                        $resp_data = json_decode($row['respondent_info']);
                        $coa_data = json_decode($row['coa_details']);
                        $relief_data = json_decode($row['relief_details']);
                     ?>
                  <label>COMPLAINT TITLE:</label>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                     <div class="form-group">
                        <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $row['complaint_title'];?>" disabled>
                     </div>
                  </div>
                  <label>1. NAME/S OF COMPLAINANT/S:</label>
                  <div class="row container-fluid mb-3">
                     <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="form-group">
                           <label>Fullname Complainant's:</label>
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $comp_data->fullname;?>" disabled>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                        <div class="form-group">
                           <label>Age:</label>
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $comp_data->age;?>" disabled>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="form-group">
                           <label>Status:</label>
                           <select class="custom-select form-control-border" disabled>
                              <option value="">Select Status</option>
                              <option value="Single" <?php if($comp_data->status == 'Single'){echo 'selected';}?>>Single</option>
                              <option value="Married" <?php if($comp_data->status == 'Married'){echo 'selected';}?>>Married</option>
                              <option value="Widow" <?php if($comp_data->status == 'Widow'){echo 'selected';}?>>Widow</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                           <label>Contact No.:</label>
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $comp_data->telno;?>" disabled>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group">
                           <label>Email Address:</label>
                           <input type="email" class="form-control form-control-border border-width-2" value="<?php echo $comp_data->email;?>" disabled>
                        </div>
                     </div>
                     <label>2. ADDRESS:</label>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $comp_data->address;?>" disabled>
                        </div>
                     </div>
                  </div>
                  <label>3. NAME/S OF RESPONDENT/S:</label>
                  <div class="row container-fluid mb-3">
                     <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="form-group mb-3">
                           <label>Fullname Respondent's:</label>
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $resp_data->fullname;?>" disabled>
                        </div>
                     </div>
                     <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                        <div class="form-group mb-3">
                           <label>Age:</label>
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $resp_data->age;?>" disabled>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="form-group mb-3">
                           <label>Status:</label>
                           <select class="custom-select form-control-border" disabled>
                              <option value="">Select Status</option>
                              <option value="">Select Status</option>
                              <option value="Single" <?php if($resp_data->status == 'Single'){echo 'selected';}?>>Single</option>
                              <option value="Married" <?php if($resp_data->status == 'Married'){echo 'selected';}?>>Married</option>
                              <option value="Widow" <?php if($resp_data->status == 'Widow'){echo 'selected';}?>>Widow</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group mb-3">
                           <label>Contact No.:</label>
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $resp_data->telno;?>" disabled>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3">
                        <div class="form-group mb-3">
                           <label>Email Address:</label>
                           <input type="email" class="form-control form-control-border border-width-2" value="<?php echo $resp_data->email;?>" disabled>
                        </div>
                     </div>
                     <label>4. ADDRESS:</label>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="form-group mb-3">
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $resp_data->address;?>" disabled>
                        </div>
                     </div>
                     <label>5. OWNER/MANAGER:</label>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="form-group mb-3">
                           <input type="text" class="form-control form-control-border border-width-2" value="<?php echo $row['own_mgr'];?>" disabled>
                        </div>
                     </div>
                  </div>
                  <label>6. CAUSE/S OF ACTION:</label>
                  <div class="row container-fluid mb-3">
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                           <div class="icheck-primary mb-2">
                              <input type="checkbox" <?php if($row['coa_option'] == '1'){echo 'checked';}?> disabled>
                              <label>
                              VIOLATION OF THE CONSUMER ACT OF THE PHILIPPINES (R.A. 7394) , MORE PARTICULARLY :
                              </label>
                           </div>
                           <div class="form-group" style="padding-left: 30px;">
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option1 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">PROVISIONS ON CONSUMER PRODUCT QUALITY & SAFETY</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option2 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">PROVISION ON DECEPTIVE, UNFAIR AND UNCONSCIONABLE ACTS/PRACTICES</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option3 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">PROVISIONS ON LABELING AND FAIR PACKAGING</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option4 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">PROVISIONS ON DEFECTIVE PRODUCTS AND SERVICE IMPERFECTION</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option5 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">PROVISIONS ON ADVERTISING AND SALES PROMOTION</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option6 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">CHAIN DISTRIBUTION PLANS OR PYRAMID SALES SCHEMES</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option7 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">OTHER PROVISIONS CONTAINED THEREIN, SECIFICALLY:</label>
                              </div>
                              <div class="form-group">
                                 <textarea class="form-control" rows="5" disabled><?php echo $row['other_provision']?></textarea>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option8 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">VIOLATION OF PHILIPPINE LEMON LAW (RA 10642 )</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option9 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">VIOLATION OF THE BUSINESS NAME LAW</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option10 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">VIOLATION OF THE LAW REGULATING THE BROKERAGE BUSINESS
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option11 == '1'){echo 'checked';}?> disabled>
                                 <label for="coa_option11" class="custom-control-label">VIOLATION OF R.A. NO. 71, AS AMENDED (PRICE TAG LAW)
                                 </label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($coa_data->option12 == '1'){echo 'checked';}?> disabled>
                                 <label for="coa_option12" class="custom-control-label">OTHER FAIR TRADE LAWS:</label>
                              </div>
                              <div class="form-group">
                                 <label>Specify:</label>
                                 <textarea class="form-control" rows="5" disabled><?php echo $row['other_fair_trade']?></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                           <label>AND/OR</label>
                           <div class="icheck-primary mb-2">
                              <input type="checkbox" <?php if($row['coa_option2'] == '2'){echo 'checked';}?> disabled>
                              <label>
                              NARRATION:
                              </label>
                           </div>
                           <div class="form-group">
                              <textarea class="form-control" rows="29" disabled><?php echo $row['coa_naration'];?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <label>7. PROOFS/EVIDENCES (ATTACHED):</label>
                  <div class="row container-fluid mb-3">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- image input -->
                        <div class="form-group">
                           <label for="customFile">Upload Evidences:</label>
                           <div class="col-sm-12">
                              <div class="form-group text-center">
                                 <span id="uploaded_image"></span>
                              </div>
                              <div class="form-group text-center">
                                 <input type="file" name="evidence" id="evidence" class="inputfile inputfile-3" style="display:none"/>
                                 <label style="font-size:15px;" title="Maximum upload is 10mb">
                                 <img class="img-fluid img-responsive" height="350" width="350" src="<?php echo base_url().'uploads/evidence_image/'.$row['evidence_image_link'];?>">
                                 </label>
                              </div>
                           </div>
                        </div>
                        <!-- image input -->
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                           <label>Establisment Location:</label>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" id="estab_loc" value="<?php echo $row['establishment_location'];?>" disabled>
                              <div class="input-group-append">
                                 <button type="button" class="btn btn-primary disabled">
                                 <i class="fas fa-street-view"></i>
                                 </button>
                              </div>
                           </div>
                           <div class="text-center" name="preview_location" id="preview_location"></div>
                        </div>
                     </div>
                  </div>
                  <label>8. RELIEF: COMPLAINANT/S PRAY FOR THE FOLLOWING:</label>
                  <div class="row container-fluid mb-5">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                           <div class="custom-control custom-checkbox mb-2">
                              <input class="custom-control-input" type="checkbox" <?php if($relief_data->option1 == '1'){echo 'checked';}?> disabled>
                              <label class="custom-control-label">REFUND</label>
                           </div>
                           <div class="custom-control custom-checkbox mb-2">
                              <input class="custom-control-input" type="checkbox" <?php if($relief_data->option2 == '1'){echo 'checked';}?> disabled>
                              <label class="custom-control-label">REPLACEMENT</label>
                           </div>
                           <div class="form-group">
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" <?php if($relief_data->option3 == '1'){echo 'checked';}?> disabled>
                                 <label class="custom-control-label">OTHERS:</label>
                              </div>
                              <div class="form-group">
                                 <textarea class="form-control" rows="5" disabled><?php echo $row['relief_others'];?></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endforeach;?>
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
      <script type="text/javascript">
         $( document ).ready(function() {
            $loc = $("#estab_loc").val()
            view_current_location($loc);
         });
         
         
         function view_current_location(latlong) {
         
            var iframe = "<iframe src='https://maps.google.com/maps?q="+ latlong +"&z=18&output=embed' width='100%' height='400' frameborder='0' style='border:0'></iframe>"
         
            $('#preview_location').html(iframe);
         
         }
      </script>
   </body>
</html>