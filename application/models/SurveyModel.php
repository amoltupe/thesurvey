<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SurveyModel extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

    function get_questions_for_user($ques_id = '') {
        $this->db->select("*");
        
        $this->db->where('status', STATUS_UNDELETED);

        if($ques_id != '')
                $this->db->where( 'id', $ques_id );

        
        $res = $this->db->get('questions');
     
            return $res->row_array();
     
    }

    function get_questions($ques_id = '') {
        $this->db->select("*");
        
        $this->db->where('status', STATUS_UNDELETED);

        if($ques_id != '')
                $this->db->where( 'id', $ques_id );

        
        $res = $this->db->get('questions');
        if($ques_id != '')
            return $res->row_array();
        else
            return $res->result_array();
    }

    function is_ip_exist($ip, $question_id){
        $this->db->where('ip_address', $ip);
        $this->db->where('question_id', $question_id);
        $res = $this->db->get('user_survey');
        return $res->row_array();
    }
    function submit_survey($question_id, $option){
        
        $ip = $_SERVER['REMOTE_ADDR'];
        if(empty($this->is_ip_exist($ip, $question_id))){
            $this->db->set('question_id', $question_id);
            $this->db->set('answer', $option);
            $this->db->set('ip_address', $ip);

            $this->db->insert('user_survey');
            $this->session->set_flashdata(FLASH_SUCCESS, 'Survey submited successfully.');
            return true;
        }else{
            $this->session->set_flashdata(FLASH_ERROR, 'You have already submited the Survey.');
            return false;
        }
    }
    

}

?>