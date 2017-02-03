<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends CI_Controller {

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
        if($this->input->post()){
            $question_id = $this->input->post('question_id');
            $option = $this->input->post('option');
            $result = $this->SurveyModel->submit_survey($question_id, $option);

            redirect (BASE_URL);
        }

        $data['page_title'] = 'Survey';

        $questions = $this->SurveyModel->get_questions_for_user();
        $data['questions'] = $questions;

        $question_id = $questions['id'];
        $ip = $_SERVER['REMOTE_ADDR'];


        if($this->SurveyModel->is_ip_exist($ip, $question_id)){
            $this->load->view('header',$data);
            $this->load->view('sumitted_error');
            $this->load->view('footer');
        }else{

            $this->load->view('header',$data);
            $this->load->view('survey');
            $this->load->view('footer');
        }
    }
    

   
}

?>