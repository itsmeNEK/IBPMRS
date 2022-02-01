<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        // $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function index() 
    {

        $page_data['page_title'] = 'Register';
        $this->load->view('backend/register', $page_data);

    }

    function create() {
        $em_add = html_escape($this->input->post('email_add'));
        $un = html_escape($this->input->post('uname'));
        $pwd = html_escape($this->input->post('pwd'));
        $otp_code = $code = substr(uniqid(rand(), true), 0, 4);

        $chk_email = $this->db->get_where('user_account', array('email_address' => $em_add))->num_rows();
        $chk_un = $this->db->get_where('user_account', array('username' => $un))->num_rows();

        if ($chk_email > 0) {
            echo 1;
        }
        else if($chk_un > 0) {
            echo 2;
        }
        else{

            $data['firstname'] = html_escape($this->input->post('fname'));
            $data['middlename'] = html_escape($this->input->post('mname'));
            $data['lastname'] = html_escape($this->input->post('lname'));
            $data['suffix'] = html_escape($this->input->post('suffix'));
            $data['address'] = html_escape($this->input->post('address'));
            $data['dob'] = html_escape($this->input->post('bdate'));
            $data['contact_no'] = html_escape($this->input->post('cno'));
            $data['gender'] = html_escape($this->input->post('gender'));
            $data['username'] = $un;
            $data['password'] = $this->crud_model->encrypt($pwd);
            $data['email_address'] = $em_add;
            $data['login_type'] = 2;
            $data['type'] = html_escape($this->input->post('user_type'));
            $data['bo_type'] = html_escape($this->input->post('bo_type'));
            $data['date_created'] = date("Y/m/d h:i:s");
            $data['status'] = 0;
            $data['is_verified'] = 0;
             $data['otp_code'] = $otp_code;

            $this->db->insert('user_account', $data);
            $user_id = $this->db->insert_id();
            $this->verify_code($user_id,$otp_code);

            $this->session->set_flashdata('flash_message', 'Successfully Added');
            echo 200;
            
        }

        // $page_data['page_title'] = 'Register';
        // $this->load->view('backend/register', $page_data);
    }

    function verification($param1 = "") 
    {

        $user_id = $this->db->get_where('user_account', array('email_address' => $param1))->row()->user_id;

        $page_data['page_title'] = 'Account Verification';
        $page_data['user_id'] = $user_id;
        $this->load->view('backend/verification', $page_data);

    }

    function verify_account() 
    {

        $user_id = $this->input->post('user_id');
        $otp_code = $this->input->post('otp_code');
        $chk_otp_code = $this->db->get_where('user_account', array('otp_code' => $otp_code))->num_rows();

        if ($chk_otp_code >= 1) {

            $data['is_verified'] = 1;

            $this->db->where('user_id', $user_id);
            $this->db->update('user_account', $data);

            $this->verified_email($user_id);
            echo 200;
        
        }
        else{
            echo 1;
        }

    }

    function verified($param1 = "") {

        $page_data['page_title'] = 'Account Verified';
        $this->load->view('backend/verified', $page_data);
    }

    function verify_code($id = "", $otp_code = "") {

        $user_email = $this->db->get_where('user_account', array('user_id' => $id))->row()->email_address;
        $user_name = $this->db->get_where('user_account', array('user_id' => $id))->row()->firstname." ".$this->db->get_where('user_account', array('user_id' => $id))->row()->lastname;

        $email_sub = "Account Verification";
        $email_msg = "Hi <strong>".$user_name.",</strong><br><br>"
        ."A new account has been created with your email address in ".base_url()."<br><br>"
        ."<strong>Verification code:</strong><br>"
        ."<strong><span style='font-size: 20px;'> ".$otp_code."</span></strong><br><br>"
        ."Do not share your code with anyone.<br>";
 
        $this->crud_model->phpmailer($user_email, $email_sub, $email_msg);

    }

    function verif_email($id = "") {

        $user_email = $this->db->get_where('user_account', array('user_id' => $id))->row()->email_address;
        $user_name = $this->db->get_where('user_account', array('user_id' => $id))->row()->firstname." ".$this->db->get_where('user_account', array('user_id' => $id))->row()->lastname;
        $username = $this->db->get_where('user_account', array('user_id' => $id))->row()->username;
        $password = $this->db->get_where('user_account', array('user_id' => $id))->row()->password;
        $link = base_url().'register/verify/'.$user_email;

        $email_sub = "Welcome ". $user_name;
        $email_msg = "Hi <strong>".$user_name.",</strong><br><br>"
        ."A new account has been created with your email address in ".base_url()."<br><br>"
        ."Please click the link below to confirm your email and complete the registration process.<br>"
        ."You will be automatically redirected to a welcome page where you can then sign in.<br><br>"
        ."Your data are as follows:<br><br>"
        ."<strong>Name:</strong> ".$user_name."<br/>"
        ."<strong>Email:</strong> ".$user_email."<br/>"
        ."<strong>Username:</strong> ".$username."<br/>"
        ."<strong>Password:</strong> ".$this->crud_model->decrypt($password)."<br/>"
        ."Please click below to activate your account:<br>"
        ."<a href='$link'>Click Here!</a>";
 
        $this->crud_model->phpmailer($user_email, $email_sub, $email_msg);
    }

    function verified_email($id = "") {

        $user_email = $this->db->get_where('user_account', array('user_id' => $id))->row()->email_address;
        $user_name = $this->db->get_where('user_account', array('user_id' => $id))->row()->firstname." ".$this->db->get_where('user_account', array('user_id' => $id))->row()->lastname;

        $email_sub = "Account Successfuly Verified";
        $email_msg = "Hi <strong>".$user_name.",</strong><br><br>"
        ."<h3>Congratulation</h3>"
        ."Your email is already verified.<br>"
        ."Please let me know if you have any questions or would like further information, otherwise, no response is needed.<br><br>"
        ."Thank You!<br>";
 
        $this->crud_model->phpmailer($user_email, $email_sub, $email_msg);

    }

}