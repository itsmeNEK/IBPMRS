<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   class Crud_model extends CI_Model {
   
      function __construct()
      {
        $this->load->database();
      }

      function get_users_fullname()
      {

      $users = $this->db->get('user_account');
        return $users->row()->firstname.' '.$users->row()->lastname;
        
      }

      function encrypt($pass){

        $string_to_encrypt=$pass;
        $password="password";
        $encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password);
        return $encrypted_string;

      }

      function decrypt($pass){

        $string_to_encrypt=$pass;
        $password="password";
        $decrypted_string=openssl_decrypt($string_to_encrypt,"AES-128-ECB",$password);
        return $decrypted_string;

      }

      function phpmailer($user_email, $email_sub, $email_msg) {

         $mail = new PHPMailer(true);                            

         try {
             //Server settings
             $mail->isSMTP();                                     
             $mail->Host = 'smtp.gmail.com';                      
             $mail->SMTPAuth = true;                             
             $mail->Username = 'service.pmrs@gmail.com';     
             $mail->Password = 'pmrs@2021!';             
             $mail->SMTPOptions = array(
                 'ssl' => array(
                 'verify_peer' => false,
                 'verify_peer_name' => false,
                 'allow_self_signed' => true
                 )
             );                         
             $mail->SMTPSecure = 'ssl';                           
             $mail->Port = 465;                                   
     
             //Send Email
             $mail->setFrom('service.pmrs@gmail.com');
     
             //Recipients
             $mail->addAddress($user_email);              
             $mail->addReplyTo('service.pmrs@gmail.com');
     
             //Content
             $mail->isHTML(true);
             $mail->Subject = $email_sub;
             $mail->Body    = $email_msg;
     
             $mail->send();
     
             //header("location:../verification.php?firstname=".$firstname."&lastname=".$lastname."&email=".$email."");
             //echo 200;
         } catch (Exception $e) {
             //$_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
             //$_SESSION['status'] = 'error';
         }
      }

      function get_phrase($phrase = '') {

        return ucwords(str_replace('_',' ',$phrase));
        
      }

      function remove_file($folder_name,$file){
         unlink('uploads/'.$folder_name.'/'.$file);
      }

      function user_log($con,$uid,$action,$desc,$date_now){

        $log = mysqli_query($con, "INSERT INTO user_log (user_id,action,description,date_trans) Values ('$uid','$action','$desc','$date_now')");

        if ($log) {
            return 1;
        }
        else {
            return 2; 
        }
        
      }

      function get_userid_by_acct($con,$un,$pwd) {

        $q = execute_query($con, "SELECT * FROM user_account WHERE username = '$un' AND password = '$pwd'");

        $id = mysqli_fetch_assoc($q);

        return $id['user_id'];

      }

      function get_prod_details($con,$id,$value) {

        $sql = mysqli_query($con,"SELECT * from products WHERE Id = '$id' AND status = '1'");

        $row = mysqli_fetch_assoc($sql);

        return $row[$value];

      }

      function get_products($con) {

        $sql = mysqli_query($con,"SELECT * from products WHERE status = '1' ORDER BY name ASC");

        if (mysqli_num_rows($sql)>0) {

            while ($row = mysqli_fetch_assoc($sql)) {

                echo '<option value="'.$row['Id'].'">'.$row['name'].'</option>';

            }
        }

      }
    
      function get_comm_type() 
      {
         
         $sql = $this->db->get_where('commodity_type', array('status' => '1'));

         if ($sql->num_rows() > 0) {

             foreach($sql->result_array() as $row)
             {
               echo '<option value="'.$row['Id'].'">'.$row['name'].'</option>';
             }

         }

      }
    

      function get_units($con) 
      {

         $sql = $this->db->get_where('units', array('status' => '1'));

         if ($sql->num_rows() > 0) {

             foreach($sql->result_array() as $row)
             {
               echo '<option value="'.$row['Id'].'">'.$row['name'].'</option>';
             }

         }

      }

      function count_total_items(){

        $sql = $this->db->query("SELECT count(*) AS total_product FROM products")->row()->total_product;

        return $sql;

      }

      function count_daily_report_recieve(){

         $date1 = date('Y-m-d')." 00:00:00";
         $date2 = date('Y-m-d')." 23:59:59";


         $sql = $this->db->query("SELECT count(*) AS total_report FROM report WHERE date_reported >= '$date1' AND date_reported <= '$date2'")->row()->total_report;

          return $sql;

      }

      function count_total_report_received(){

         $sql = $this->db->query("SELECT count(*) AS total_report FROM report")->row()->total_report;

         return $sql;

      }

      function count_total_users(){

         $sql = $this->db->query("SELECT count(*) AS total_user FROM user_account WHERE type <> '0' AND is_verified = '1'")->row()->total_user;

         return $sql;

      }

      function count_endorsed_report(){

         $sql = $this->db->query("SELECT count(*) AS total_endorse_report FROM report WHERE status = 2")->row()->total_endorse_report;

         return $sql;

      }

      // function count_pending_users(){

      //    $q = execute_query($con, "SELECT count(*) AS total_user FROM user_account WHERE type <> '1' AND STATUS = '0';");

      //    $val = mysqli_fetch_assoc($q);

      //    return $val['total_user'];

      // }

      //Create a function to encode the URL
      function encodeURIComponent($str){
         $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
         return strtr(rawurlencode($str), $revert);
      }   

   } 
   
?>