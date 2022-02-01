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
               <h3 class="card-title">Complaint Form</h3>
            </div>
            <div class="card-body">
               <form enctype="multipart/form-data" id="send_report">
                  <div class="mt-2" id="first_page" style="display: ;">
                     <label>COMPLAINT TITLE:</label>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <div class="form-group mb-3">
                           <input type="text" class="form-control" name="comp_title" id="comp_title" placeholder="" required>
                        </div>
                     </div>
                     <label>1. NAME/S OF COMPLAINANT/S:</label>
                     <div class="row container-fluid">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                           <div class="form-group">
                              <label>Fullname Complainant's:</label>
                              <input type="text" class="form-control" name="c_fname" id="c_fname" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                           <div class="form-group">
                              <label>Age:</label>
                              <input type="text" class="form-control" name="c_age" id="c_age" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                           <div class="form-group">
                              <label>Status:</label>
                              <select class="custom-select" name="c_status" id="c_status">
                                 <option value="">Select Status</option>
                                 <option value="Single">Single</option>
                                 <option value="Married">Married</option>
                                 <option value="Widow">Widow</option>
                              </select>
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group">
                              <label>Contact No.:</label>
                              <input type="text" class="form-control" name="c_telno" id="c_telno" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group">
                              <label>Email Address:</label>
                              <input type="email" class="form-control" name="c_email" id="c_email" placeholder="" required>
                           </div>
                        </div>
                        <label>2. ADDRESS:</label>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="form-group">
                              <input type="text" class="form-control" name="c_addr" id="c_addr" placeholder="" required>
                           </div>
                        </div>
                     </div>
                    
                     <label>3. NAME/S OF RESPONDENT/S:</label>
                     <div class="row container-fluid mb-5"> 
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <label>Fullname Respondent's:</label>
                              <input type="text" class="form-control" name="r_fname" id="r_fname" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <label>Age:</label>
                              <input type="text" class="form-control" name="r_age" id="r_age" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                           <div class="form-group mb-3">
                               <label>Status:</label>
                              <select class="custom-select" name="r_status" id="r_status">
                                 <option value="">Select Status</option>
                                 <option value="Single">Single</option>
                                 <option value="Married">Married</option>
                                 <option value="Widow">Widow</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <label>Contact No.:</label>
                              <input type="text" class="form-control" name="r_telno" id="r_telno" placeholder="" required>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <label>Email Address:</label>
                              <input type="email" class="form-control" name="r_email" id="r_email" placeholder="" required>
                           </div>
                        </div>
                        <label>4. ADDRESS:</label>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <input type="text" class="form-control" name="r_addr" id="r_addr" placeholder="" required>
                           </div>
                        </div>
                        <label>5. OWNER/MANAGER:</label>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <input type="text" class="form-control" name="r_om" id="r_om" placeholder="" required>
                           </div>
                        </div>
                     </div>

                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <!-- <button type="button" class="btn btn-primary btn-block" onclick="back()">Back</button> -->
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary btn-block" id="btn_submit" onclick="second();">Next</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-2" id="second_page" style="display: none;">
                     <label>6. CAUSE/S OF ACTION:</label>
                     <div class="row container-fluid mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group">
                              <div class="icheck-primary mb-2">
                                 <input type="checkbox" name="coa1" id="coa1" value="1">
                                 <label for="coa1">
                                    VIOLATION OF THE CONSUMER ACT OF THE PHILIPPINES (R.A. 7394) , MORE PARTICULARLY :
                                 </label>
                              </div>
                              <div class="form-group" style="padding-left: 30px;">
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option1" id="coa_option1" value="1">
                                   <label for="coa_option1" class="custom-control-label">PROVISIONS ON CONSUMER PRODUCT QUALITY & SAFETY</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option2" id="coa_option2" value="1">
                                   <label for="coa_option2" class="custom-control-label">PROVISION ON DECEPTIVE, UNFAIR AND UNCONSCIONABLE ACTS/PRACTICES</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option3" id="coa_option3" value="1">
                                   <label for="coa_option3" class="custom-control-label">PPROVISIONS ON LABELING AND FAIR PACKAGING</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option4" id="coa_option4" value="1">
                                   <label for="coa_option4" class="custom-control-label">PROVISIONS ON DEFECTIVE PRODUCTS AND SERVICE IMPERFECTION</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option5" id="coa_option5" value="1">
                                   <label for="coa_option5" class="custom-control-label">PROVISIONS ON ADVERTISING AND SALES PROMOTION</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option6" id="coa_option6" value="1">
                                   <label for="coa_option6" class="custom-control-label">CHAIN DISTRIBUTION PLANS OR PYRAMID SALES SCHEMES</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option7" id="coa_option7" value="1">
                                   <label for="coa_option7" class="custom-control-label">OTHER PROVISIONS CONTAINED THEREIN, SECIFICALLY:</label>
                                 </div>
                                 <div class="form-group">
                                    <textarea class="form-control" rows="5" name="oth_prov" id="oth_prov" placeholder="Text Here ..."></textarea>
                                 </div>
                                  <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option8" id="coa_option8" value="1">
                                   <label for="coa_option8" class="custom-control-label">VIOLATION OF PHILIPPINE LEMON LAW (RA 10642 )</label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option9" id="coa_option9" value="1">
                                   <label for="coa_option9" class="custom-control-label">VIOLATION OF THE BUSINESS NAME LAW</label>
                                 </div>
                                  <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option10" id="coa_option10" value="1">
                                   <label for="coa_option10" class="custom-control-label">VIOLATION OF THE LAW REGULATING THE BROKERAGE BUSINESS
                                   </label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option11" id="coa_option11" value="1">
                                   <label for="coa_option11" class="custom-control-label">VIOLATION OF R.A. NO. 71, AS AMENDED (PRICE TAG LAW)
                                   </label>
                                 </div>
                                 <div class="custom-control custom-checkbox mb-2">
                                   <input class="custom-control-input" type="checkbox" name="coa_option12" id="coa_option12" value="1">
                                   <label for="coa_option12" class="custom-control-label">OTHER FAIR TRADE LAWS:</label>
                                 </div>
                                 <div class="form-group">
                                    <label>Specify:</label>
                                    <textarea class="form-control" rows="5" name="oth_fr_trd" id="oth_fr_trd" placeholder="Text Here ..."></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-12"> 
                           <div class="form-group">
                              <label>AND/OR</label>
                              <div class="icheck-primary mb-2">
                                 <input type="checkbox" name="coa2" id="coa2" value="2">
                                 <label for="coa2">
                                    NARRATION:
                                 </label>
                              </div>
                              <div class="form-group">
                                 <textarea class="form-control" rows="29" name="coa_narr" id="coa_narr" placeholder="Text Here ..."></textarea>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="first()">Back</button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary btn-block" id="btn_submit" onclick="third();">Next</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-2" id="third_page" style="display: none;">
                     <label>7. PROOFS/EVIDENCES (ATTACHED):</label>
                     <div class="row container-fluid mb-5">
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
                                       <i class="fas fa-paperclip hide_control"></i> 
                                       <span class="hide_control" onclick="$('#evidence').click();">Upload Image...</span>
                                       <p>
                                          <span class="hide_control os-icon picons-thin-icon-thin-0189_window_alert_notification_warning_error text-danger"></span>
                                          <small class="text-danger hide_control">Maximum file size is 10mb.</small>
                                       </p>
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
                                 <input type="text" class="form-control" name="gps_location" id="gps_location">
                                 <div class="input-group-append">
                                   <button type="button" class="btn btn-primary" onclick="get_current_location();">
                                       <i class="fa fa-street-view"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="text-center" name="preview_location" id="preview_location"></div>
                           </div>
                        </div>
                     </div>

                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="second();">Back</button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary btn-block" id="btn_submit" onclick="fourth();">Next</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-2" id="fourth_page" style="display: none;">
                     <label>8. RELIEF: COMPLAINANT/S PRAY FOR THE FOLLOWING:</label>
                     <div class="row container-fluid mb-5">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="form-group">
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" name="rel_option1" id="rel_option1" value="1">
                                 <label for="rel_option1" class="custom-control-label">REFUND</label>
                              </div>
                              <div class="custom-control custom-checkbox mb-2">
                                 <input class="custom-control-input" type="checkbox" name="rel_option2" id="rel_option2" value="1">
                                 <label for="rel_option2" class="custom-control-label">REPLACEMENT</label>
                              </div>
                              <div class="form-group">
                                 <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" type="checkbox" name="rel_option3" id="rel_option3" value="1">
                                    <label for="rel_option3" class="custom-control-label">OTHERS:</label>
                                 </div>
                                 <div class="form-group">
                                    <textarea class="form-control" rows="5" name="rel_others" id="rel_others" placeholder="Text Here ..."></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="container mb-5">
                        <div class="form-group row">
                           <label class="col-xs-5 col-form-label">IN WITNESS WHEREOF, I HAVE HERUNTO SET MY HAND THIS </label>
                           <input type="text" class="col-sm-1 form-control" name="wit_day" id="wit_day" placeholder="Day">
                           <label class="col-xs-1 col-form-label">DAY OF </label>
                           <input type="text" class="col-sm-1 form-control" name="wit_month" id="wit_month" placeholder="Month">
                           <label class="col-xs-1 col-form-label">, </label>
                           <input type="text" class="col-sm-1 form-control" name="wit_year" id="wit_year" placeholder="Year">
                           <label class="col-xs-1 col-form-label">, IN </label>
                           <input type="text" class="col-sm-3 form-control" name="wit_loc" id="wit_loc" placeholder="Location">
                           <label class="col-xs-1 col-form-label">.</label>
                        </div>
                     </div>
                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="third()">Back</button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="fifth();">Next</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-3 mb-3" id="fifth_page" style="display: none;">
                     <div class="container">
                        <h5 class="text-center mb-5"><strong>VERIFICATION/CERTIFICATION</strong></h5>
                        <p class="mb-4">THE COMPLAINANT/S, UNDER OATH, HEREBY DEPOSE/S AND SAY/S:</p>
                        <p class="mb-3">A.) THAT HE/SHE/THEY IS/ARE THE COMPLAINT/S IN TH CASE:</p>
                        <p class="mb-3">B.) THAT HE/SHE/THEY HAS/HAVE READ AND UNDERSTOOD THE CONTENTS THEREOF:</p>
                        <p class="mb-3">C.) THAT THE ALLEGATIONS THEREIN ARE TRUE AND CORRECT OF HIS/HER/THEIR OWN PERSONAL KNOWLEDGE AND BELIEF</p>
                        <p class="mb-3" style="line-height: 30px;">D.) THAT FURTHER HE/SHE/THEY CERTIFY THAT AS OF THIS DATE, HE/SHE/THEY HAS/HAVE NOT FILED IN ANY COURT, TRIBUNAL, OR QUASI-JUDICIAL AGENCY, OTHER ACTION/S OR CLAIMS INVOLVING THE SAME PARTIES AND THE SAME ISSUES.  SHOULD HE/SHE/THEY FIND/S THEREAFTER THAT A SIMILAR ACTION OR CLAIM IS FILED OR PENDING IN ANY OTHER COURT, TRIBUNAL, OR QUASI-JUDICIAL AGENCY, HE/SHE/THEY SHALL REPORT THE SAME WITHIN FIVE (5) DAYS THEREFROM TO THIS HONORABLE OFFICE.</p>
                     </div>
                     <br><br>
                     <div class="row container-fluid mt-5">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                           <div id="con_sig" style="display: ;">
                              <div id="e_signature"></div>
                              <textarea id="sigpad" name="signature_image" style="display: none"></textarea>
                              <center>
                                 <button type="button" class="btn btn-success" onclick="save_signature();">Upload Signature</button>
                                 <button type="button" class="btn btn-danger" id="clear">Clear</button>
                              </center> 
                              
                           </div>
                           <div id="con_sig_img"></div> 
                        </div>
                     </div>
                     <br><br>
                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="fourth()">Back</button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                           <button type="button" class="btn btn-primary btn-block" onclick="sixth();">Next</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-2" id="sixth_page" style="display: none;">
                     <div class="container mb-5">
                        <div class="form-group row">
                           <label class="col-xs-1 col-form-label">SUBSCRIBED AND SWORN TO THIS</label>
                           <input type="text" class="col-sm-1 form-control mb-4" name="ss_day" id="ss_day" placeholder="Day">
                           <label class="col-xs-1 col-form-label">DAY OF </label>
                           <input type="text" class="col-sm-1 form-control mb-4" name="ss_month" id="ss_month" placeholder="Month">
                           <label class="col-xs-1 col-form-label">, AFFAINT/S HAVING EXHIBITED TO ME HIS/HER/THEIR COMMUNITY TAX CERTIFICATE NO. </label>
                           <input type="text" class="col-sm-3 form-control mb-4" name="ss_cedula" id="ss_cedula" placeholder="CTC No.">
                           <label class="col-xs-1 col-form-label">ISSUED ON</label>
                           <input type="text" class="col-sm-3 form-control mb-4" name="ss_date_issd" id="ss_date_issd" placeholder="Date Issued">
                           <label class="col-xs-1 col-form-label">AT</label>
                           <input type="text" class="col-sm-4 form-control mb-4" name="ss_loc_issd" id="ss_loc_issd" placeholder="Location Issued">
                           <label class="col-xs-4 col-form-label">AND HIS/HER/THEIR GOVERNMENT-ISSUED IDENTIFICATION CARD NO.</label>
                           <input type="text" class="col-sm-3 form-control mb-2" name="ss_govid_no" id="ss_govid_no" placeholder="Government ID No.">
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
                                   <span id="uploaded_image_idcard"></span>
                                 </div>
                                 <div class="form-group text-center">
                                    <input type="file" name="idcard" id="idcard" class="inputfile inputfile-3" style="display:none"/>
                                    <label style="font-size:15px;" title="Maximum upload is 10mb">
                                       <i class="fas fa-paperclip hide_control_id"></i> 
                                       <span class="hide_control_id" onclick="$('#idcard').click();">Upload Image...</span>
                                       <p>
                                          <span class="hide_control_id os-icon picons-thin-icon-thin-0189_window_alert_notification_warning_error text-danger"></span>
                                          <small class="text-danger hide_control_id">Maximum file size is 10mb.</small>
                                       </p>
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
                                   <span id="uploaded_image_cedula"></span>
                                 </div>
                                 <div class="form-group text-center">
                                    <input type="file" name="cedula" id="cedula" class="inputfile inputfile-3" style="display:none"/>
                                    <label style="font-size:15px;" title="Maximum upload is 10mb">
                                       <i class="fas fa-paperclip hide_control_cd"></i> 
                                       <span class="hide_control_cd" onclick="$('#cedula').click();">Upload Image...</span>
                                       <p>
                                          <span class="hide_control_cd os-icon picons-thin-icon-thin-0189_window_alert_notification_warning_error text-danger"></span>
                                          <small class="text-danger hide_control_cd">Maximum file size is 10mb.</small>
                                       </p>
                                   </label>
                                 </div>
                              </div>
                           </div>
                           <!-- image input -->
                        </div>
                     </div>
                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="fifth()">Back</button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary btn-block" id="btn_submit" onclick="sixth_validation();">Send Report</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-5 mb-5" id="seventh_page" style="display: none;">
                     <div class="text-center">
                        <h2 class="text-gray-900 mb-5"><strong>Thank You for Sending your Report!</strong></h2>
                        <h5>Your report is now for evaluation,</h5>
                        <h5>Check account regularly<h5>
                        <h5>to check the status<h5>
                        <br><br>
                        <input type="hidden" id="comp_id">
                        <a class="btn btn-primary" href="<?php echo base_url();?>client/panel/">Back to Home</a>
                        <!-- <button class="btn btn-primary" id="btn_dl_qrcode" onclick="download_qrcode()">Download QR Code</button> -->
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
   $(function() {
      var sig = $('#e_signature').signature({syncField: '#sigpad', syncFormat: 'PNG'});

      $('#clear').click(function() {
         sig.signature('clear');
         $("#sigpad").val('');
      });
   });

   function save_signature() {

      var sig_image = $("#sigpad").val();

      $.ajax({
         url:"<?php echo base_url(); ?>client/upload_signature",
         method:"POST",
         data: {sig_image: sig_image},
         cache: false,
         beforeSend:function(){
            $('#con_sig').css('display','none');
            $('#con_sig_img').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif"/></span><br> Uploading...');
         },
         success:function(data)
         {  
            $('#con_sig_img').html("");
            $('#con_sig_img').html(data);
         }
     });
   }
</script>

<script type="text/javascript">
   
   function first() {
      $('#first_page').css('display','block');
      $('#second_page').css('display','none');
      $('#third_page').css('display','none');
      $('#fourth_page').css('display','none');
      $('#fifth_page').css('display','none');
      $('#sixth_page').css('display','none');
      $('#seventh_page').css('display','none');
   }

   function second() {

      var ct = $("#comp_title").val();
      var cfn = $("#c_fname").val();
      var ca = $("#c_age").val();
      var cs = $("#c_status").val();
      var ctn = $("#c_telno").val();
      var cea = $("#c_email").val();
      var cadd = $("#c_addr").val();
      var rfn = $("#r_fname").val();
      var rln = $("#r_lname").val();
      var ra = $("#r_age").val();
      var rs = $("#r_status").val();
      var rtn = $("#r_telno").val();
      var rea = $("#r_email").val();
      var radd = $("#r_addr").val();
      var rom = $("#r_om").val();

      if(ct == "") {
         swal("PMRS","Complaint Title is required. Please fill up this field.","warning");
      }
      else if (cfn == "") {
         swal("PMRS","Complainant Fullname is required. Please fill up this field.","warning");
      }
      else if (ca == "") {
         swal("PMRS","Complainant Fullname is required. Please fill up this field.","warning");
      }
      else if (cs == "") {
         swal("PMRS","Complainant Status is required. Please fill up this field.","warning");
      }
      else if (ctn == "") {
         swal("PMRS","Complainant Contact No. is required. Please fill up this field.","warning");
      }
      else if (cea == "") {
         swal("PMRS","Complainant Email Address is required. Please fill up this field.","warning");
      }
      else if (cadd == "") {
         swal("PMRS","Complainant Complete Address is required. Please fill up this field.","warning");
      }
      else if (rfn == "") {
         swal("PMRS","Respondent Fullname is required. Please fill up this field.","warning");
      }
      else if (ra == "") {
         swal("PMRS","Respondent Age is required. Please fill up this field.","warning");
      }
      else if (rs == "") {
         swal("PMRS","Respondent Status is required. Please fill up this field.","warning");
      }
      else if (rtn == "") {
         swal("PMRS","Respondent Contact No. is required. Please fill up this field.","warning");
      }
      else if (rea == "") {
         swal("PMRS","Respondent Email Address is required. Please fill up this field.","warning");
      }
      else if (radd == "") {
         swal("PMRS","Respondent Complete Address is required. Please fill up this field.","warning");
      }
      else if (rom == "") {
         swal("PMRS","Owner/Manager Name is required. Please fill up this field.","warning");
      }
      else{

         $('#first_page').css('display','none');
         $('#second_page').css('display','block');
         $('#third_page').css('display','none');
         $('#fourth_page').css('display','none');
         $('#fifth_page').css('display','none');
         $('#sixth_page').css('display','none');
         $('#seventh_page').css('display','none');
         
      }

   }

   function third() {

      var coa1 = $("#coa1").prop('checked');
      var coa2 = $("#coa2").prop('checked');

      if (coa1 || coa2) {
         $('#first_page').css('display','none');
         $('#second_page').css('display','none');
         $('#third_page').css('display','block');
         $('#fourth_page').css('display','none');
         $('#fifth_page').css('display','none');
         $('#sixth_page').css('display','none');
         $('#seventh_page').css('display','none');
      }
      else{
         swal("PMRS","Please check one of the Cause of Action.","warning");
      }

   }

   function fourth() {

      // var evid = document.getElementById("evidence");
      // if(evid === 0) {
      //    swal("PMRS","Proof/Evidence is required. Please upload the required file.","warning");
      // }
      // else 

      var gl = $("#gps_location").val();

      if (gl == "") {
         swal("PMRS","Please generate a location. This field is required.","warning");
      }
      else{

         $('#first_page').css('display','none');
         $('#second_page').css('display','none');
         $('#third_page').css('display','none');
         $('#fourth_page').css('display','block');
         $('#fifth_page').css('display','none');
         $('#sixth_page').css('display','none');
         $('#seventh_page').css('display','none');

      }
      
   }

   function fifth() {

      var ro1 = $("#rel_option1").prop('checked');
      var ro2 = $("#rel_option2").prop('checked');
      var ro3 = $("#rel_option3").prop('checked');

      var wd = $("#wit_day").val();
      var wm = $("#wit_month").val();
      var wy = $("#wit_year").val();
      var wl = $("#wit_loc").val();

      if (ro1 || ro2 || ro3) {

         if (wd == "") {
            swal("PMRS","Day is required. Please fill up this field.","warning");
         }
         else if (wm == "") {
            swal("PMRS","Month is required. Please fill up this field.","warning");
         }
         else if (wy == "") {
            swal("PMRS","Year is required. Please fill up this field.","warning");
         }
         else if (wl == "") {
            swal("PMRS","Location is required. Please fill up this field.","warning");
         }
         else{
            $('#first_page').css('display','none');
            $('#second_page').css('display','none');
            $('#third_page').css('display','none');
            $('#fourth_page').css('display','none');
            $('#fifth_page').css('display','block');
            $('#sixth_page').css('display','none');
            $('#seventh_page').css('display','none');
         }

      }
      else{
         swal("PMRS","Please check one of the Complainant/s Pray.","warning");
      }

   }

   function sixth() {

      $('#first_page').css('display','none');
      $('#second_page').css('display','none');
      $('#third_page').css('display','none');
      $('#fourth_page').css('display','none');
      $('#fifth_page').css('display','none');
      $('#sixth_page').css('display','block');
      $('#seventh_page').css('display','none');

   }

   function sixth_validation() {

      var ssd = $("#ss_day").val();
      var ssm = $("#ss_month").val();
      var sscd = $("#ss_cedula").val();
      var sscdi = $("#ss_date_issd").val();
      var sscdl = $("#ss_loc_issd").val();
      var ssgovid = $("#ss_govid_no").val();

      //var idcd = document.getElementById("idcard").files.length;
      //var cedl = document.getElementById("cedula").files.length;

      if (ssd == "") {
         swal("PMRS","Day is required. Please fill up this field.","warning");
      }
      else if (ssm == "") {
         swal("PMRS","Month is required. Please fill up this field.","warning");
      }
      else if (sscd == "") {
         swal("PMRS","CTC No. is required. Please fill up this field.","warning");
      }
      else if (sscdi == "") {
         swal("PMRS","CTC Issued Date is required. Please fill up this field.","warning");
      }
      else if (sscdl == "") {
         swal("PMRS","CTC Issued Location is required. Please fill up this field.","warning");
      }
      else if (ssgovid == "") {
        swal("PMRS","Government ID No. is required. Please fill up this field.","warning");
      }
      // else if (idcd == 0) {
      //    swal("PMRS","Identification Card is required. Please upload the required file.","warning");
      // }
      // else if (cedl == 0) {
      //    swal("PMRS","Community Tax Certificate is required. Please upload the required file.","warning");
      // }
      else{
         submit_complaint();
      }

   }

   function seventh() {

      $('#first_page').css('display','none');
      $('#second_page').css('display','none');
      $('#third_page').css('display','none');
      $('#fourth_page').css('display','none');
      $('#fifth_page').css('display','none');
      $('#sixth_page').css('display','none');
      $('#seventh_page').css('display','block');

   }
   
   function submit_complaint() {

      swal({
        title: "Are you sure ?",
        text: "You want to submit this complaint?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "green",
        confirmButtonText: "Yes, Submit",
        closeOnConfirm: true
      },
      function(isConfirm){
         if (isConfirm) 
         {
            $.ajax({
               type:'POST',
               url: "<?php echo base_url(); ?>client/save_complaint",
               data:$("form#send_report").serialize(),
               cache:false,
               beforeSend:function(){
                  $("#btn_submit").attr('disabled');
                  $("#btn_submit").text('Submitting ...');
               },
               success:function(data){
                  var text = data
                  var spt_data = text.split("-")

                  if(spt_data[0] == 200){
                     $("#comp_id").val(spt_data[1]);
                     seventh();
                  }
               }
            });
         }
      });
      
   }

   function get_current_location() {

      if (navigator.geolocation) {

         navigator.geolocation.getCurrentPosition(function(position){

            var longitude = position.coords.longitude;
            var latitude = position.coords.latitude;
            var latlong =  position.coords.latitude + "," + position.coords.longitude;

            $("#gps_location").val(latlong);

            // var iframe = "<iframe class='responsive-iframe' width='100%' height='400' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/view?key=AIzaSyBoG6WtWcYKLLFduCSFSFJFSDtK0SGjK3k&center="+ latlong +"&zoom=17&maptype=roadmap' allowfullscreen></iframe>"

            var iframe = "<iframe src='https://maps.google.com/maps?q="+ latlong +"&z=18&output=embed' width='100%' height='400' frameborder='0' style='border:0'></iframe>"

            $('#preview_location').html(iframe);

         });   
      }
      else
      {
        alert("Geolocation Not supported");
      }
   }

</script>

<script type="text/javascript">
   
   function download_qrcode() {

      var cid = $("#comp_id").val();

      $.ajax({
         type:'POST',
         url: "<?php echo base_url(); ?>client/download_qrcode",
         data:{cid:cid},
         cache:false,
         beforeSend:function(){
            $("#btn_dl_qrcode").attr('disabled');
            $("#btn_dl_qrcode").text('Downloading ...');
         },
         success:function(data){
            console.log(data);
         }
      });

   }

</script>

<script type="text/javascript">
   $(document).ready(function(){
  
      $("#evidence").change(function() {
         var name = document.getElementById("evidence").files[0].name;
         var form_data = new FormData();
         var ext = name.split('.').pop().toLowerCase();
         if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
         {
          alert("Invalid Image File");
         }
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("evidence").files[0]);
         var f = document.getElementById("evidence").files[0];
         var fsize = f.size||f.fileSize;
         if(fsize > 10000000)
         {
            swal('error','Image File Size is very big atleast 10mb','error');
         }
         else
         {
            form_data.append("evidence", document.getElementById('evidence').files[0]);

            $.ajax({
               url:"<?php echo base_url(); ?>client/upload_image/evidence",
               method:"POST",
               data: form_data,
               contentType: false,
               cache: false,
               processData: false,
               beforeSend:function(){
                  $('.hide_control').css('display','none');
                  $('#uploaded_image').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif"/></span><br> Uploading...');
                  $('#evidence').val('');
               },
               success:function(data)
               {  
                  $('.hide_control').css('display','none');
                  $('.view_control').css('display','inline');
                  $('#uploaded_image').html(data);
               }
           });
         }
      });

      $("#idcard").change(function() {
         var name = document.getElementById("idcard").files[0].name;
         var form_data = new FormData();
         var ext = name.split('.').pop().toLowerCase();
         if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
         {
          alert("Invalid Image File");
         }
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("idcard").files[0]);
         var f = document.getElementById("idcard").files[0];
         var fsize = f.size||f.fileSize;
         if(fsize > 10000000)
         {
          //alert("Image File Size is very big");
       
          swal('error','Image File Size is very big atleast 10mb','error');
       
         }
         else
         {
            form_data.append("idcard", document.getElementById('idcard').files[0]);

            $.ajax({
               url:"<?php echo base_url(); ?>client/upload_image/idcard",
               method:"POST",
               data: form_data,
               contentType: false,
               cache: false,
               processData: false,
               beforeSend:function(){
                  $('.hide_control_id').css('display','none');
                  $('#uploaded_image_idcard').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif"/></span><br> Uploading...');
                  $('#idcard').val('');
               },
               success:function(data)
               {  
                  $('.hide_control_id').css('display','none');
                  $('.view_control_id').css('display','inline');
                  $('#uploaded_image_idcard').html(data);
               }
            });
         }
      });

      $("#cedula").change(function() {
         var name = document.getElementById("cedula").files[0].name;
         var form_data = new FormData();
         var ext = name.split('.').pop().toLowerCase();
         if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
         {
          alert("Invalid Image File");
         }
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("cedula").files[0]);
         var f = document.getElementById("cedula").files[0];
         var fsize = f.size||f.fileSize;
         if(fsize > 10000000)
         {
          //alert("Image File Size is very big");
       
          swal('error','Image File Size is very big atleast 10mb','error');
       
         }
         else
         {
            form_data.append("cedula", document.getElementById('cedula').files[0]);

            $.ajax({
               url:"<?php echo base_url(); ?>client/upload_image/cedula",
               method:"POST",
               data: form_data,
               contentType: false,
               cache: false,
               processData: false,
               beforeSend:function(){
                  $('.hide_control_cd').css('display','none');
                  $('#uploaded_image_cedula').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif"/></span><br> Uploading...');
                  $('#cedula').val('');
               },
               success:function(data)
               {  
                  $('.hide_control_cd').css('display','none');
                  $('.view_control_cd').css('display','inline');
                  $('#uploaded_image_cedula').html(data);
               }
           });
         }
      });
   });

   function remove_file(item){
      
      if (item == 1) {
         var folder_name = "evidence_image";
         var file_name = $("#evidence_title_image").val();
      }
      else if (item == 2) {
         var folder_name = "idcard_image";
         var file_name = $("#idcard_title_image").val();
      }
      else if (item == 3) {
         var folder_name = "cedula_image";
         var file_name = $("#cedula_title_image").val();
      }
       else if (item == 4) {
         var folder_name = "signature_image";
         var file_name = $("#sig_title_image").val();
      }

      $.ajax({
         url:"<?php echo base_url(); ?>client/remove_image",
         method:"POST",
         data: {file_name:file_name,folder_name:folder_name},
         cache: false,
         beforeSend:function(){
            if (item == 1) {
               $('#uploaded_image').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif" /> </span> <br> Removing Image...');
               $('#evidence').val('');
            }
            else if (item == 2) {
               $('#uploaded_image_idcard').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif" /> </span> <br> Removing Image...');
               $('#idcard').val('');
            }
            else if (item == 3) {
               $('#uploaded_image_cedula').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif" /> </span> <br> Removing Image...');
               $('#cedula').val('');
            }
            else if (item == 4) {
               $('#con_sig_img').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif" /> </span> <br> Removing Image...');
            }
         },   
         success:function(data)
         {
            if (item == 1) {
               $('#uploaded_image').html("");
               $('#evidence').val('');
               $('.hide_control').css('display','inline');
            }
            else if (item == 2) {
               $('#uploaded_image_idcard').html("");
               $('#idcard').val('');
               $('.hide_control_id').css('display','inline');
            }
            else if (item == 3) {
               $('#uploaded_image_cedula').html("");
               $('#cedula').val('');
               $('.hide_control_cd').css('display','inline');
            }
            else if (item == 4) {
               $('#con_sig_img').html("");
               $('#e_signature').signature('clear');
               $("#sigpad").val('');
               $('#con_sig').css('display','');
            }
         }
      });
  }
</script>