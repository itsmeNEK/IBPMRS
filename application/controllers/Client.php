<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

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
        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }
        if ($this->session->userdata('client_login') == 1)
        {
            redirect(base_url() . 'client/panel/', 'refresh');
        }
    }

    function panel() 
    {
        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        $page_data['page_name']  = 'Panel';
        $page_data['page_title'] = 'Panel';
        $this->load->view('backend/index', $page_data);
    }

    function products() 
    {
        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }


        $page_data['page_name']  = 'Products';
        $page_data['page_title'] = 'Products';
        $this->load->view('backend/index', $page_data);
    }

    function report() {

        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }


        $page_data['page_name']  = 'Report';
        $page_data['page_title'] = 'Report';
        $this->load->view('backend/index', $page_data);

    }

    function view_report($param1 = '') {

        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }


        $page_data['page_name']  = 'view_report';
        $page_data['page_title'] = 'View Report';
        $page_data['comp_code'] = $param1;
        $this->load->view('backend/index', $page_data);

    }

    function manage_report() {

        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }


        $page_data['page_name']  = 'manage_report';
        $page_data['page_title'] = 'Manage Report';
        $this->load->view('backend/index', $page_data);

    }

    function save_complaint() {

        $comp_arr = array(
            "fullname" => $this->input->post('c_fname'),
            "age" => $this->input->post('c_age'),
            "status" => $this->input->post('c_status'),
            "telno" => $this->input->post('c_telno'),
            "email" => $this->input->post('c_email'),
            "address" => $this->input->post('c_addr')
        );

        $resp_arr = array(
            "fullname" => $this->input->post('r_fname'),
            "age" => $this->input->post('r_age'),
            "status" => $this->input->post('r_status'),
            "telno" => $this->input->post('r_telno'),
            "email" => $this->input->post('r_email'),
            "address" => $this->input->post('r_addr')
        );

        $c_opt = array(
            "option1" => $this->input->post('coa_option1'),
            "option2" => $this->input->post('coa_option2'),
            "option3" => $this->input->post('coa_option3'),
            "option4" => $this->input->post('coa_option4'),
            "option5" => $this->input->post('coa_option5'),
            "option6" => $this->input->post('coa_option6'),
            "option7" => $this->input->post('coa_option7'),
            "option8" => $this->input->post('coa_option8'),
            "option9" => $this->input->post('coa_option9'),
            "option10" => $this->input->post('coa_option10'),
            "option11" => $this->input->post('coa_option11'),
            "option12" => $this->input->post('coa_option12')
        );

        $r_opt = array(
            "option1" => $this->input->post('rel_option1'),
            "option2" => $this->input->post('rel_option2'),
            "option3" => $this->input->post('rel_option3')
        );

        $wit_conf = array(
            "day" => $this->input->post('wit_day'),
            "month" => $this->input->post('wit_month'),
            "year" => $this->input->post('wit_year'),
            "location" => $this->input->post('wit_loc')
        );

        $subs_sworn_subs = array(
            "day" => $this->input->post('ss_day'),
            "month" => $this->input->post('ss_month'),
            "cedula" => $this->input->post('ss_cedula'),
            "date_issued" => $this->input->post('ss_date_issd'),
            "loc_issued" => $this->input->post('ss_loc_issd'),
            "govid_no" => $this->input->post('ss_govid_no')
        );

        $code = substr(md5(uniqid(rand(), true)), 0, 7);

        $data['complaint_code'] = $code; 
        $data['user_id'] = $this->session->userdata('user_id');
        $data['complaint_title'] = $this->input->post('comp_title');
        $data['complainant_info'] = json_encode($comp_arr);
        $data['respondent_info'] = json_encode($resp_arr);
        $data['own_mgr'] = $this->input->post('r_om');
        $data['coa_option'] = $this->input->post('coa1');
        $data['coa_details'] = json_encode($c_opt);
        $data['other_provision'] = $this->input->post('oth_prov');
        $data['other_fair_trade'] = $this->input->post('oth_fr_trd');
        $data['coa_option2'] = $this->input->post('coa2');
        $data['coa_naration'] = $this->input->post('coa_narr');
        $data['relief_details'] = json_encode($r_opt);
        $data['relief_others'] = $this->input->post('rel_others');
        $data['witness_conf'] = json_encode($wit_conf);
        $data['subs_sworn_conf'] = json_encode($subs_sworn_subs);
        $data['evidence_image_link'] = $this->input->post('evidence_title_image');
        $data['idcard_image_link'] = $this->input->post('idcard_title_image');
        $data['cedula_image_link'] = $this->input->post('cedula_title_image');
        $data['signature_link'] = $this->input->post('sig_title_image');
        $data['establishment_location'] = $this->input->post('gps_location');
        $data['date_reported'] = date("Y/m/d h:i:s");
        $data['date_solved'] = "";
        $data['status'] = "0";

        $this->db->insert('report', $data);
        echo '200-'.$code;

    }

    function upload_image($param1 = "")
    {  

        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        if ($param1 == "evidence") {

            if($_FILES["evidence"]["name"] != '')
            {
                $test = explode('.', $_FILES["evidence"]["name"]);
                $ext = end($test);
                $code = substr(md5(rand(100000000, 200000000)), 0, 10);
                $name = 'img-'.$code . '.' . $ext;
                $location = './uploads/evidence_image/' . $name;  

                ini_set( 'memory_limit', '200M' );
                ini_set('upload_max_filesize', '200M');  
                ini_set('post_max_size', '200M');  
                ini_set('max_input_time', 3600);  
                ini_set('max_execution_time', 3600);

                move_uploaded_file($_FILES["evidence"]["tmp_name"], $location);

                echo '<img src="'.base_url().$location.'" height="150" width="225" class="img-thumbnail" /> <input type="hidden" name="file_code" value="'.$code.'"/><br> 
                    <small name="file_size"> size: '.$this->formatBytes($_FILES["evidence"]["size"]).'</small><br>
                    <input type="hidden" name="evidence_title_image" id="evidence_title_image" value="'.$name.'"/>
                    <input type="hidden" name="evidence_file_ext" id="evidence_file_ext" value="'.$ext.'"/><br>
                    <button onclick="remove_file(1);" class="btn btn-sm btn-danger view_control">
                    <i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> Remove</button>';
             
            }

        }
        else if($param1 == "idcard") 
        {

            if($_FILES["idcard"]["name"] != '')
            {
                $test = explode('.', $_FILES["idcard"]["name"]);
                $ext = end($test);
                $code = substr(md5(rand(100000000, 200000000)), 0, 10);
                $name = 'img-'.$code . '.' . $ext;
                $location = './uploads/idcard_image/' . $name;  

                ini_set('memory_limit', '200M');
                ini_set('upload_max_filesize', '200M');  
                ini_set('post_max_size', '200M');  
                ini_set('max_input_time', 3600);  
                ini_set('max_execution_time', 3600);

                move_uploaded_file($_FILES["idcard"]["tmp_name"], $location);

                echo '<img src="'.base_url().$location.'" height="150" width="225" class="img-thumbnail" /> <input type="hidden" name="file_code" value="'.$code.'"/><br> 
                    <small name="file_size"> size: '.$this->formatBytes($_FILES["idcard"]["size"]).'</small><br>
                    <input type="hidden" name="idcard_title_image" id="idcard_title_image" value="'.$name.'"/>
                    <input type="hidden" name="file_ext" id="idcard_file_ext" value="'.$ext.'"/><br>
                    <button onclick="remove_file(2);" class="btn btn-sm btn-danger view_control">
                    <i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> Remove</button>';
            }

        }
        else if($param1 == "cedula") 
        {

            if($_FILES["cedula"]["name"] != '')
            {
                $test = explode('.', $_FILES["cedula"]["name"]);
                $ext = end($test);
                $code = substr(md5(rand(100000000, 200000000)), 0, 10);
                $name = 'img-'.$code . '.' . $ext;
                $location = './uploads/cedula_image/' . $name;  

                ini_set( 'memory_limit', '200M' );
                ini_set('upload_max_filesize', '200M');  
                ini_set('post_max_size', '200M');  
                ini_set('max_input_time', 3600);  
                ini_set('max_execution_time', 3600);

                move_uploaded_file($_FILES["cedula"]["tmp_name"], $location);

                echo '<img src="'.base_url().$location.'" height="150" width="225" class="img-thumbnail" /> <input type="hidden" name="file_code" value="'.$code.'"/><br> 
                    <small name="file_size"> size: '.$this->formatBytes($_FILES["cedula"]["size"]).'</small><br>
                    <input type="hidden" name="cedula_title_image" id="cedula_title_image" value="'.$name.'"/>
                    <input type="hidden" name="file_ext" id="file_ext" value="'.$ext.'"/><br>
                    <button onclick="remove_file(3);" class="btn btn-sm btn-danger view_control">
                    <i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> Remove</button>';
             
            }

        }

    }

    function remove_image(){
        $file_name = $this->input->post('file_name');
        $folder_name = $this->input->post('folder_name');
        $this->crud_model->remove_file($folder_name,$file_name);
    }

    function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');   
        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    function upload_signature() {

        if ($this->session->userdata('client_login') != 1)
        {
            redirect(base_url(), 'refresh');
        }

        $sig_img = $this->input->post('sig_image');

        if ($sig_img != '') {

            $folderPath = "./uploads/signature_image/";
 
            $image_parts = explode(";base64,", $sig_img);
             
            $image_type_aux = explode("image/", $image_parts[0]);
             
            $image_type = $image_type_aux[1];
             
            $image_base64 = base64_decode($image_parts[1]);

            $file_name = uniqid() . '.'.$image_type;
             
            $file = $folderPath . $file_name;
             
            file_put_contents($file, $image_base64);

            echo '<img src="'.base_url().$file.'" height="150" width="300" class="img-thumbnail" /> 
                <input type="hidden" name="sig_title_image" id="sig_title_image" value="'.$file_name.'"/>
                <center><button onclick="remove_file(4);" class="btn btn-sm btn-danger view_control mt-2">
                <i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i> Remove</button><center>';

        }

    }

    function download_qrcode($param1 = "") {

        //$link = base_url()."index/complaint_report_details/".$param1;
        //$qrcode_link = "https://chart.googleapis.com/chart?cht=qr&chl=" . $link . "&chs=140x140&chld=L|0";
        $urls = "https://chart.googleapis.com/chart?cht=qr&chl=HAHAHAHA&chs=140x140&chld=L|0";
        $qrcode_link = $this->crud_model->encodeURIComponent($urls);

        // take URL from GET method
        $url = $qrcode_link;
     
        // define file transfer
        header('Content-Description: File Transfer');

        // define content type as PNG image
        header("Content-type: image/png");

        // define unique file name and tell that it is an attachment
        header("Content-disposition: attachment; filename= qrcode_".time().".png");

        // read and file
        readfile($url);
    }

}

?>