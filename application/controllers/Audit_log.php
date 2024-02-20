<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Audit_Log extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('audit_log_model');
    }

    private function returns($result){
        if($result){
            return $this->response($result, REST_Controller::HTTP_OK);
        }else{
            $result = array(
                'data' => []
            );
            return $this->response($result, REST_Controller::HTTP_OK);
        }
    }

    public function load_audit_logs_get(){
        $result = $this->audit_log_model->get_load_audit_logs($this->get('lead_sequence'));
        $this->returns($result);
    }
}