<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller 
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

    function summary_report($param1 = "") {

        $page_data['user_id']  = $param1;
        $this->load->view('backend/report_summary', $page_data);

    }

    function complaint_report_details($param1 = "") {

        $page_data['complaint_code']  = $param1;
        $this->load->view('backend/complaint_report', $page_data);

    }

}