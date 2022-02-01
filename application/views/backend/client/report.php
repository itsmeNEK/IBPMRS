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
                  <div class="mt-2" id="first_page" style="display: block;">
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
                              <input type="text" class="form-control" name="c_fname" id="c_fname" placeholder="Fullname" required>
                           </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                           <div class="form-group">
                              <input type="text" class="form-control" name="c_age" id="c_age" placeholder="Age" required>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                           <div class="form-group">
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
                              <input type="text" class="form-control" name="c_telno" id="c_telno" placeholder="Telephon No." required>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group">
                              <input type="email" class="form-control" name="c_email" id="c_email" placeholder="Email Address" required>
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
                              <input type="text" class="form-control" name="r_fname" id="r_fname" placeholder="Fullname" required>
                           </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <input type="text" class="form-control" name="r_age" id="r_age" placeholder="Age" required>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                           <div class="form-group mb-3">
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
                              <input type="text" class="form-control" name="r_telno" id="r_telno" placeholder="Telephon No." required>
                           </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                           <div class="form-group mb-3">
                              <input type="email" class="form-control" name="r_email" id="r_email" placeholder="Email Address" required>
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
                        <h6 class="mb-4">THE COMPLAINANT/S, UNDER OATH, HEREBY DEPOSE/S AND SAY/S:</h6>
                        <h6 class="mb-2">A) THAT HE/SHE/THEY IS/ARE THE COMPLAINT/S IN TH CASE:</h6>
                        <h6 class="mb-2">B) THAT HE/SHE/THEY HAS/HAVE READ AND UNDERSTOOD THE CONTENTS THEREOF:</h6>
                        <h6 class="mb-2">C) THAT THE ALLEGATIONS THEREIN ARE TRUE AND CORRECT OF HIS/HER/THEIR OWN PERSONAL KNOWLEDGE AND BELIEF</h6>
                        <h6 class="mb-2">D) THAT FURTHER HE/SHE/THEY CERTIFY THAT AS OF THIS DATE, HE/SHE/THEY HAS/HAVE NOT FILED IN ANY COURT, TRIBUNAL, OR QUASI-JUDICIAL AGENCY, OTHER ACTION/S OR CLAIMS INVOLVING THE SAME PARTIES AND THE SAME ISSUES.  SHOULD HE/SHE/THEY FIND/S THEREAFTER THAT A SIMILAR ACTION OR CLAIM IS FILED OR PENDING IN ANY OTHER COURT, TRIBUNAL, OR QUASI-JUDICIAL AGENCY, HE/SHE/THEY SHALL REPORT THE SAME WITHIN FIVE (5) DAYS THEREFROM TO THIS HONORABLE OFFICE.</h6>
                     </div>
                     <br><br><br><br><br>
                     <div class="row container-fluid">
                        <div class="col-md-3 mb-3">
                          <button type="button" class="btn btn-primary btn-block" onclick="fourth()">Back</button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                          <button type="button" class="btn btn-primary btn-block" id="btn_submit" onclick="submit_complaint();">Send Report</button>
                        </div>
                     </div>
                  </div>

                  <div class="mt-5 mb-5" id="sixth_page" style="display: none;">
                     <div class="text-center">
                        <h2 class="text-gray-900 mb-5"><strong>Thank You for Sending your Report!</strong></h2>
                        <h5>Your report is now for evaluation,</h5>
                        <h5>Check account regularly<h5>
                        <h5>to check the status<h5>
                        <br><br>
                        <a class="btn btn-primary" href="<?php echo base_url();?>client/panel/">Back to Home</a>
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
   
   function first() {
      $('#first_page').css('display','block');
      $('#second_page').css('display','none');
      $('#third_page').css('display','none');
      $('#fourth_page').css('display','none');
      $('#fifth_page').css('display','none');
      $('#sixth_page').css('display','none');
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
         swal("PMRS","Compliant Title is required. Please fill up this field.","warning");
      }
      else if (cfn == "") {
         swal("PMRS","Complianant Fullname is required. Please fill up this field.","warning");
      }
      else if (ca == "") {
         swal("PMRS","Complianant Fullname is required. Please fill up this field.","warning");
      }
      else if (cs == "") {
         swal("PMRS","Complianant Status is required. Please fill up this field.","warning");
      }
      else if (ctn == "") {
         swal("PMRS","Complianant Contact No. is required. Please fill up this field.","warning");
      }
      else if (cea == "") {
         swal("PMRS","Complianant Email Address is required. Please fill up this field.","warning");
      }
      else if (cadd == "") {
         swal("PMRS","Complianant Complete Address is required. Please fill up this field.","warning");
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
      }
      else{
         swal("PMRS","Please check one of the Cause of Action.","warning");
      }

   }

   function fourth() {

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

      }
      
   }

   function fifth() {

      var ro1 = $("#rel_option1").prop('checked');
      var ro2 = $("#rel_option2").prop('checked');
      var ro3 = $("#rel_option3").prop('checked');

      if (ro1 || ro2 || ro3) {
         $('#first_page').css('display','none');
         $('#second_page').css('display','none');
         $('#third_page').css('display','none');
         $('#fourth_page').css('display','none');
         $('#fifth_page').css('display','block');
         $('#sixth_page').css('display','none');
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

   }

   function submit_complaint() {
      
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
            if(data == 200){
               sixth();
            }
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
          //alert("Image File Size is very big");
       
          swal('error','Image File Size is very big atleast 10mb','error');
       
         }
         else
         {
            form_data.append("evidence", document.getElementById('evidence').files[0]);

            $.ajax({
               url:"<?php echo base_url(); ?>client/upload_image",
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
   });

   function remove_file(){
  
      var folder_name = "evidence_image";
      var file_name = $("#evidence_title_image").val();

      $.ajax({
         url:"<?php echo base_url(); ?>client/remove_image",
         method:"POST",
         data: {file_name:file_name,folder_name:folder_name},
         cache: false,
         beforeSend:function(){
            $('#uploaded_image').html('<center><img src="<?php echo base_url();?>assets/images/preloader.gif" /> </span> <br> Removing Image...');
            $('#file').val('');
         },   
         success:function(data)
         {
            $('#uploaded_image').html("");
            $('#file').val('');
            $('.hide_control').css('display','inline');
         }
      });
  }
</script>