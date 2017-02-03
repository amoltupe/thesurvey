<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sadmin extends CI_Controller {

    function __construct() {
        // if i remove this parent::__construct(); the error is gone
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url', 'language', 'custom'));

        $this->config->set_item('language', 'english');
        $this->load->language('en');
        
       $this->load->model('SurveyModel');

//            save_log ( ); // Temp_part
    }
    
    function Index(){
        $data['page_title'] = 'Home';
        $this->load->view('admin/header',$data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
        
    }
    
    function add_survey(){
        $data['page_title'] = 'Add Survey';
        $this->load->view('admin/header',$data);
        $this->load->view('admin/add_survey');
        $this->load->view('admin/footer');
    }
   

    function survey(){
        $data['page_title'] = 'Manage Survey';
        $data['surveys'] = $this->SurveyModel->get_questions();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/survey');
        $this->load->view('admin/footer');
    }
}

?>