<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() 
    {
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
		
        if ($this->session->userdata('admin_login') == 1)
        {
            redirect(base_url() . 'admin/panel/', 'refresh');
        }
        if ($this->session->userdata('client_login') == 1)
        {
            redirect(base_url() . 'client/panel/', 'refresh');
        }

        $this->load->view('backend/login');
	}

    function auth() {
        
        $username = $this->input->post('uname');
        $password = $this->input->post('pwd');

        $uname = strtolower($username);
        $pass = strtolower($this->crud_model->encrypt($password));

        $users = $this->db->get_where('user_account', array('username' => $uname, 'password' => $pass));
        
        if ($users->num_rows() > 0) 
        {
            if ($users->row()->is_verified == 1) 
            {
                if ($users->row()->login_type == 1)
                {

                    $row = $users->row();
                    $this->session->set_userdata('admin_login', 1);
                    $this->session->set_userdata('user_id', $row->user_id);
                    $this->session->set_userdata('login_user_id', $row->user_id);
                    $this->session->set_userdata('fname', $row->firstname);
                    $this->session->set_userdata('lname', $row->lastname);
                    $this->session->set_userdata('login_type', 'admin');

                    // $status = read_file('index.php');
                    // $status = str_replace('item_status',  '1',   $status);
                    // write_file('index.php', $status);

                    //$this->crud_model->save_user_logs("admin", 'Login', 'Login Account', 'Successfully Login...');
                    redirect(base_url() . 'admin/panel', 'refresh');

                }
                elseif ($users->row()->login_type == 2)
                {

                    $row = $users->row();
                    $this->session->set_userdata('client_login', 1);
                    $this->session->set_userdata('user_id', $row->user_id);
                    $this->session->set_userdata('login_user_id', $row->user_id);
                    $this->session->set_userdata('fname', $row->firstname);
                    $this->session->set_userdata('lname', $row->lastname);
                    $this->session->set_userdata('login_type', 'client');

                    //$this->crud_model->save_user_logs("admin", 'Login', 'Login Account', 'Successfully Login...');
                    redirect(base_url() . 'client/panel', 'refresh');

                }
            }
            else
            {
                $this->session->set_flashdata('error', '404');
            }
        }
        else
        {
            $this->session->set_flashdata('error', '1');
        }

        redirect(base_url(), 'refresh');

    }

    function logout() 
    { 
        $this->session->sess_destroy();
        // $this->session->set_flashdata('logout_notification', 'logged_out');
        // $this->crud_model->save_user_logs($user_type, 'logout', 'Logged Account', 'Successfully Logged out account...');

        redirect(base_url(), 'refresh');
    }

    function forgot_password($param1 = "") 
    {

        if ($param1 == "request") {

            $prov_email = $this->input->post('email_add');
            $chk_email = $this->db->get_where('user_account', array('email_address' => $prov_email))->num_rows();

            if ($chk_email == 0) {
                echo 1;
            }
            else
            {
                $link = base_url().'login/change_password/'.$prov_email;

                $email_sub = "Password Reset Request";
                $email_msg = "We have received a request to reset the password for your account.<br><br>"
                ."If you submitted this request, please click the button below to proceed.<br>"
                ."If you do not wish to reset your password, please disregard this notice.<br><br>"
                ."<a href='$link'>Click Here to reset your password !</a>";
         
                $this->crud_model->phpmailer($prov_email, $email_sub, $email_msg);
                echo 200;
            }   
            
        }
        else if ($param1 == ""){

            $page_data['page_title'] = 'Forgot Password Request';
            $this->load->view('backend/forgot_password', $page_data);

        }
        
    }

    function change_password($param1 = "") 
    {
        
        $user_id = $this->db->get_where('user_account', array('email_address' => $param1))->row()->user_id;

        $page_data['page_title'] = 'Change Password';
        $page_data['user_id'] = $user_id;
        $this->load->view('backend/change_password', $page_data);

    }

    function reset_password($param1 = "") 
    {

        if ($param1 == 'reset') {
            $user_id = html_escape($this->input->post('user_id'));
            $pwd = html_escape($this->input->post('new_pass'));

            $data['password'] = $this->crud_model->encrypt($pwd);
            
            $this->db->where('user_id', $user_id);
            $this->db->update('user_account', $data);

            echo 200;
        }
        else if($param1 == "" || $param1 == null) {
            $page_data['page_title'] = 'Reset Password';
            $this->load->view('backend/reset_password', $page_data);
        }

    }

    function request_sent() 
    {

        $page_data['page_title'] = 'Forgot Password Request';
        $this->load->view('backend/request_sent', $page_data);

    }
    
} 


?>