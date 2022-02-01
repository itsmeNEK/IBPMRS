<?php $ip_address = $this->db->get_where('settings' , array('type'=>'ip_address'))->row()->description;?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><?php echo $this->crud_model->get_phrase($page_name)?></h1>
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
               <h3 class="card-title">Complaint Form</h3>
            </div>
            <div class="card-body">
               <?php 
                  $query = $this->db->query("SELECT * from report WHERE complaint_code = '$comp_code'")->result_array();

                  foreach ($query as $row):
                     $comp_data = json_decode($row['complainant_info']);
                     $resp_data = json_decode($row['respondent_info']);
                     $coa_data = json_decode($row['coa_details']);
                     $relief_data = json_decode($row['relief_details']);
                     $wc = json_decode($row['witness_conf']);
                     $sss = json_decode($row['subs_sworn_conf']);
               ?>
               <div class="row container-fluid mb-3">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <label class="float-left">
                        Complaint Status: 
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
                     </label>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                     <input type="hidden" id="comp_code" value="<?php echo $row['complaint_code'];?>">
                     <div class="qr-code img-thumbnail img-responsive float-right" id="view_qrcode"></div>
                  </div>
               </div>
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
                              <label style="font-size:15px;">
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
                                 <i class="fa fa-street-view"></i>
                              </button>
                           </div>
                        </div>
                        <div class="text-center" name="preview_location" id="preview_location"></div>
                     </div>
                  </div>
               </div>

               <label>8. RELIEF: COMPLAINANT/S PRAY FOR THE FOLLOWING:</label>
               <div class="row container-fluid mb-5">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
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
                  <div class="container text-center">
                     <div class="form-group row">
                        <label class="col-xs-5 col-form-label">IN WITNESS WHEREOF, I HAVE HERUNTO SET MY HAND THIS </label>
                        <input type="text" class="col-sm-1 form-control form-control-border border-width-2" value="<?php echo $wc->day;?>" disabled>
                        <label class="col-xs-1 col-form-label">DAY OF </label>
                        <input type="text" class="col-sm-1 form-control form-control-border border-width-2" value="<?php echo $wc->month;?>" disabled>
                        <label class="col-xs-1 col-form-label">, </label>
                        <input type="text" class="col-sm-1 form-control form-control-border border-width-2" value="<?php echo $wc->year;?>" disabled>
                        <label class="col-xs-1 col-form-label">, IN </label>
                        <input type="text" class="col-sm-3 form-control form-control-border border-width-2" value="<?php echo $wc->location;?>" disabled>
                        <label class="col-xs-1 col-form-label">.</label>
                     </div>
                  </div>
                  <div class="row container-fluid">
                     <div class="col-md-3">
                     </div>
                     <div class="col-md-6"></div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <div class="col-sm-12">
                              <div class="form-group text-center">
                                 <label style="font-size:15px;">
                                    <img class="img-fluid img-responsive" height="240" width="350" src="<?php echo base_url().'uploads/signature_image/'.$row['signature_link'];?>">
                                 </label>
                              </div>
                           </div>
                           <center><label for="customFile">Signature</label></center>
                        </div> 
                     </div>
                  </div>
               </div>

               <div class="container">
                  <h5 class="text-center mb-5"><strong>VERIFICATION/CERTIFICATION</strong></h5>
                  <p class="mb-4">THE COMPLAINANT/S, UNDER OATH, HEREBY DEPOSE/S AND SAY/S:</p>
                  <p class="mb-3">A.) THAT HE/SHE/THEY IS/ARE THE COMPLAINT/S IN TH CASE:</p>
                  <p class="mb-3">B.) THAT HE/SHE/THEY HAS/HAVE READ AND UNDERSTOOD THE CONTENTS THEREOF:</p>
                  <p class="mb-3">C.) THAT THE ALLEGATIONS THEREIN ARE TRUE AND CORRECT OF HIS/HER/THEIR OWN PERSONAL KNOWLEDGE AND BELIEF</p>
                  <p class="mb-3" style="line-height: 30px;">D.) THAT FURTHER HE/SHE/THEY CERTIFY THAT AS OF THIS DATE, HE/SHE/THEY HAS/HAVE NOT FILED IN ANY COURT, TRIBUNAL, OR QUASI-JUDICIAL AGENCY, OTHER ACTION/S OR CLAIMS INVOLVING THE SAME PARTIES AND THE SAME ISSUES.  SHOULD HE/SHE/THEY FIND/S THEREAFTER THAT A SIMILAR ACTION OR CLAIM IS FILED OR PENDING IN ANY OTHER COURT, TRIBUNAL, OR QUASI-JUDICIAL AGENCY, HE/SHE/THEY SHALL REPORT THE SAME WITHIN FIVE (5) DAYS THEREFROM TO THIS HONORABLE OFFICE.</p>
               </div>
               <div class="row container-fluid mt-3 mb-5">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-6"></div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <div class="col-sm-12">
                           <div class="form-group text-center">
                              <label style="font-size:15px;">
                                 <img class="img-fluid img-responsive" height="240" width="350" src="<?php echo base_url().'uploads/signature_image/'.$row['signature_link'];?>">
                              </label>
                           </div>
                        </div>
                        <center><label for="customFile">Signature</label></center>
                     </div> 
                  </div>
               </div>

               <div class="container mb-5">
                  <div class="form-group row">
                     <label class="col-xs-1 col-form-label">SUBSCRIBED AND SWORN TO THIS</label>
                     <input type="text" class="col-sm-1 form-control form-control-border border-width-2 mb-4" value="<?php echo $sss->day;?>" disabled>
                     <label class="col-xs-1 col-form-label">DAY OF </label>
                     <input type="text" class="col-sm-1 form-control form-control-border border-width-2 mb-4" value="<?php echo $sss->month;?>" disabled>
                     <label class="col-xs-1 col-form-label">, AFFAINT/S HAVING EXHIBITED TO ME HIS/HER/THEIR COMMUNITY TAX CERTIFICATE NO. </label>
                     <input type="text" class="col-sm-3 form-control form-control-border border-width-2 mb-4" value="<?php echo $sss->cedula;?>" disabled>
                     <label class="col-xs-1 col-form-label">ISSUED ON</label>
                     <input type="text" class="col-sm-3 form-control form-control-border border-width-2 mb-4" value="<?php echo $sss->date_issued;?>" disabled>
                     <label class="col-xs-1 col-form-label">AT</label>
                     <input type="text" class="col-sm-4 form-control form-control-border border-width-2 mb-4" value="<?php echo $sss->loc_issued;?>" disabled>
                     <label class="col-xs-4 col-form-label">AND HIS/HER/THEIR GOVERNMENT-ISSUED IDENTIFICATION CARD NO.</label>
                     <input type="text" class="col-sm-3 form-control form-control-border border-width-2 mb-2" value="<?php echo $sss->govid_no;?>" disabled>
                     <label class="col-xs-1 col-form-label">, AS FOLLOWS:</label>
                  </div>
               </div>
               <label>ADDITIONAL DOCUMENTS NEEDED</label>
               <div class="row container-fluid mb-5">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                     <!-- image input -->
                     <div class="form-group">
                        <label for="customFile">Identification Card (ID):</label>
                        <div class="col-sm-12">
                           <div class="form-group text-center">
                              <label style="font-size:15px;">
                                 <img class="img-fluid img-responsive" height="350" width="350" src="<?php echo base_url().'uploads/idcard_image/'.$row['idcard_image_link'];?>">
                              </label>
                           </div>
                        </div>
                     </div>
                     <!-- image input -->
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                     <!-- image input -->
                     <div class="form-group">
                        <label for="customFile">Community Tax Certificate (CEDULA):</label>
                        <div class="col-sm-12">
                           <div class="form-group text-center">
                              <label style="font-size:15px;">
                                 <img class="img-fluid img-responsive" height="350" width="350" src="<?php echo base_url().'uploads/cedula_image/'.$row['cedula_image_link'];?>">
                             </label>
                           </div>
                        </div>
                     </div>
                     <!-- image input -->
                  </div>
               </div>
               <div class="row container-fluid mt-3 mb-5">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-6"></div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <div class="col-sm-12">
                           <div class="form-group text-center">
                              <label style="font-size:15px;">
                                 <img class="img-fluid img-responsive" height="240" width="350" src="<?php echo base_url().'uploads/admin_sign.png'?>">
                              </label>
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
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

   $( document ).ready(function() {
      $loc = $("#estab_loc").val()
      view_current_location($loc);
      generate_qrcode();
   });
  

   function view_current_location(latlong) {

      var iframe = "<iframe src='https://maps.google.com/maps?q="+ latlong +"&z=18&output=embed' width='100%' height='400' frameborder='0' style='border:0'></iframe>"

      $('#preview_location').html(iframe);

   }

   function generate_qrcode() {

      var img = new Image();

      var comp_code = $("#comp_code").val();
      //var link = "<?php //echo base_url()."index/complaint_report_details/";?>" + comp_code;
      var link = "<?php echo "http://".$ip_address."/pmrs2/index/complaint_report_details/";?>" + comp_code;

      img.src = "https://chart.googleapis.com/chart?cht=qr&chl=" + link + "&chs=140x140&chld=L|0";
       
      $('#view_qrcode').html(img);

   }
</script>