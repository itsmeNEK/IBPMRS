<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        // $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        // $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        // $this->output->set_header('Pragma: no-cache');
        // $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }
        if ($this->session->userdata('admin_login') == 1)
        {
            redirect(base_url() . 'admin/panel/', 'refresh');
        }
    }

    function panel() 
    {

        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        $arr_month = array();
        $report_count = array();

        $sql = $this->db->query("SELECT Id, MONTHNAME(STR_TO_DATE(MONTH(date_reported), '%m')) AS 'month', COUNT(complaint_code) AS report_count FROM report GROUP BY month ORDER BY Id;");

        foreach($sql->result_array() as $row)
        {
            $arr_month[] = $row['month'];
            $report_count[] = $row['report_count'];
        }

        $page_data['page_name']  = 'Panel';
        $page_data['page_title'] = 'Panel';
        $page_data['month'] = json_encode($arr_month);
        $page_data['rep_count'] = json_encode($report_count);
        $this->load->view('backend/index', $page_data);

    }

    function products($param1 = "") 
    {
        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        if ($param1 == "add") 
        {
            $data['name'] = $this->input->post('prod_name');
            $data['commodity_id'] = $this->input->post('comm_type');
            $data['unit_id'] = $this->input->post('units');
            $data['srp'] = $this->input->post('srp');
            $data['date_added'] = date('Y-m-d h:i:s');
            $data['status'] = 1;

            $this->db->insert('products', $data);
        }
        else if($param1 == 'update')
        {   
            $prod_id = $this->input->post('prod_id');

            $data['name'] = $this->input->post('up_prod_name');
            $data['commodity_id'] = $this->input->post('up_comm_type');
            $data['unit_id'] = $this->input->post('up_units');
            $data['srp'] = $this->input->post('up_srp');
            $data['status'] = $this->input->post('up_prod_sts');;

            $this->db->where('Id', $prod_id);
            $this->db->update('products', $data);
        }
        else if($param1 == 'delete') 
        {   
            $prod_id = $this->input->post('Id');

            $this->db->where('Id', $prod_id);
            $this->db->delete('products');
        }

        $page_data['page_name']  = 'Products';
        $page_data['page_title'] = 'Products';
        $this->load->view('backend/index', $page_data);
    }

    function manage_report() {

        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'manage_report';
        $page_data['page_title'] = 'Manage Report';
        $this->load->view('backend/index', $page_data);

    }

    function view_report($param1 = '') {

        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }


        $page_data['page_name']  = 'view_report';
        $page_data['page_title'] = 'View Report';
        $page_data['comp_code'] = $param1;
        $this->load->view('backend/index', $page_data);

    }

    function merchants($param1 = "") 
    {
        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        if ($param1 == "add") 
        {
            $data['name'] = $this->input->post('mer_name');
            $data['address'] = $this->input->post('address');
            $data['contact_no'] = $this->input->post('cno');
            $data['email_add'] = $this->input->post('email_add');
            $data['date_added'] = date('Y-m-d h:i:s');
            $data['status'] = 1;

            $this->db->insert('merchants', $data);
        }
        else if($param1 == 'update')
        {   
            $merch_id = $this->input->post('merch_id');
            
            $data['name'] = $this->input->post('up_mer_name');
            $data['address'] = $this->input->post('up_address');
            $data['contact_no'] = $this->input->post('up_cno');
            $data['email_add'] = $this->input->post('up_email_add');
            $data['status'] = $this->input->post('up_merch_sts');;

            $this->db->where('Id', $merch_id);
            $this->db->update('merchants', $data);
        }
        else if($param1 == 'delete') 
        {   
            $merch_id = $this->input->post('Id');

            $this->db->where('Id', $merch_id);
            $this->db->delete('merchants');
        }

        $page_data['page_name']  = 'Merchants';
        $page_data['page_title'] = 'Merchants';
        $this->load->view('backend/index', $page_data);
    }
    
    function setup($param1 = "") 
    {

        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        if ($param1 == "comm_add") 
        {
            $data['name'] = $this->input->post('comm_name');
            $data['date_added'] = date('Y-m-d h:i:s');
            $data['status'] = 1;

            $this->db->insert('commodity_type', $data);
        }
        else if($param1 == 'comm_update')
        {   
            $comm_id = $this->input->post('comm_id');
            
            $data['name'] = $this->input->post('up_comm_name');
            $data['status'] = $this->input->post('up_comm_sts');;

            $this->db->where('Id', $comm_id);
            $this->db->update('commodity_type', $data);
        }
        else if($param1 == 'comm_delete') 
        {   
            $comm_id = $this->input->post('Id');

            $this->db->where('Id', $comm_id);
            $this->db->delete('commodity_type');
        }


        if ($param1 == "unit_add") 
        {
            $data['name'] = $this->input->post('unit_name');
            $data['status'] = 1;

            $this->db->insert('units', $data);
        }
        else if($param1 == 'unit_update')
        {   
            $un_id = $this->input->post('unit_id');
            
            $data['name'] = $this->input->post('up_unit_name');
            $data['status'] = $this->input->post('up_unit_sts');;

            $this->db->where('Id', $un_id);
            $this->db->update('units', $data);
        }
        else if($param1 == 'unit_delete') 
        {   
            $un_id = $this->input->post('Id');

            $this->db->where('Id', $un_id);
            $this->db->delete('units');
        }

        $page_data['page_name']  = 'Setup';
        $page_data['page_title'] = 'Setup';
        $this->load->view('backend/index', $page_data);

    }

    function users($param1 = "") 
    {

        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        if($param1 == 'update')
        {   
            $un_id = $this->input->post('user_id');
            
            $data['firstname'] = $this->input->post('up_fname');
            $data['middlename'] = $this->input->post('up_mname');
            $data['lastname'] = $this->input->post('up_lname');
            $data['suffix'] = $this->input->post('up_suffix');
            $data['address'] = $this->input->post('up_address');
            $data['dob'] = $this->input->post('up_bdate');
            $data['contact_no'] = $this->input->post('up_cno');
            $data['gender'] = $this->input->post('up_gender');
            $data['username'] = $this->input->post('up_uname');
            $data['password'] = $this->crud_model->encrypt($this->input->post('up_pwd'));
            $data['email_address'] = $this->input->post('up_uname');
            $data['type'] = $this->input->post('up_user_type');
            $data['bo_type'] = $this->input->post('up_bo_type');
            $data['status'] = 0;

            $this->db->where('user_id', $un_id);
            $this->db->update('user_account', $data);
        }
        else if($param1 == 'delete') 
        {   
            $usr_id = $this->input->post('Id');

            $this->db->where('user_id', $usr_id);
            $this->db->delete('user_account');
        }

        $page_data['page_name']  = 'Users';
        $page_data['page_title'] = 'Users';
        $this->load->view('backend/index', $page_data);

    }

    function change_report_status() {

        if ($this->session->userdata('admin_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        $status = $this->input->post('status');
        $user_id = $this->input->post('uid');
        $user_email = $this->db->get_where('user_account', array('user_id' => $user_id))->row()->email_address;
        $user_name = $this->db->get_where('user_account', array('user_id' => $user_id))->row()->firstname.' '.$this->db->get_where('user_account', array('user_id' => $user_id))->row()->lastname;
        $report_id = $this->input->post('id');
        $c_code = $this->db->get_where('report', array('Id' => $report_id))->row()->complaint_code;

        $data['status'] = $status;

        $this->db->where('Id', $report_id);
        $this->db->update('report', $data);

        if ($status == 1) {
            $email_sub = "Complaint Report Status";
            $email_msg = "Hi, ".$user_name."<br><br>"
                ."We already started to evaluate your complaint with reference code #".$c_code.".<br>"
                ."Check your account regularly to check the status of your complaint<br><br>"
                ."Thank you";

            $this->crud_model->phpmailer($user_email, $email_sub, $email_msg);
        }
        else if ($status == 2) {
            $email_sub = "Complaint Report Status";
            $email_msg = "Hi, ".$user_name."<br><br>"
                ."We already started to endorse your complaint with reference code #".$c_code.".<br>"
                ."Check your account regularly to check the status of your complaint<br><br>"
                ."Thank you";

             $this->crud_model->phpmailer($user_email, $email_sub, $email_msg);
        }
        else if ($status == 3) {
            $email_sub = "Complaint Report Status";
            $email_msg = "Hi, ".$user_name."<br><br>"
                ."We already resolve your complaint  with referencewith reference code #".$c_code.".<br>"
                ."Please check your account to view the full details.<br><br>"
                ."Thank you";

            $this->crud_model->phpmailer($user_email, $email_sub, $email_msg);
        }        
       
    }

}

?>