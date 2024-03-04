<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Count extends REST_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
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

    function count_hits_get(){
        $type = $this->get('type');
        $date_from = $this->get('date_from');
        $date_to = $this->get('date_to');
        if($type == 'today'){
            $date_from = date('Y-m-d 00:00:01');
            $date_to = date('Y-m-d 23:59:59');
        } else {
            $date_from = date('Y-m-d 00:00:01', strtotime($date_from));
            $date_to = date('Y-m-d 23:59:59', strtotime($date_to));
        }
        $result = $this->admin_model->get_hits_allocation($date_from, $date_to);
        $this->returns($result);
    }

    function load_leads_filter_get(){
        $type = $this->get('type');
        $date_from = $this->get('date_from');
        $date_to = $this->get('date_to');
        if($type == 'all'){
            $result = $this->admin_model->get_load_leads_filter();
            $this->returns($result);
        } else if ($type == 'today') {
            $date_from = date('Y-m-d 00:00:01');
            $date_to = date('Y-m-d 23:59:59');
        } else {
            $date_from = date('Y-m-d 00:00:01', strtotime($date_from));
            $date_to = date('Y-m-d 23:59:59', strtotime($date_to));
        }
        $result = $this->admin_model->get_load_leads_filter($date_from, $date_to);
        $this->returns($result);
    }

    function load_allo_leads_filter_get(){
        $type = $this->get('type');
        $date_from = $this->get('date_from');
        $date_to = $this->get('date_to');
        if($type == 'all'){
            $result = $this->admin_model->get_load_allo_leads_filter();
            $this->returns($result);
        } else if ($type == 'today') {
            $date_from = date('Y-m-d 00:00:01');
            $date_to = date('Y-m-d 23:59:59');
        } else {
            $date_from = date('Y-m-d 00:00:01', strtotime($date_from));
            $date_to = date('Y-m-d 23:59:59', strtotime($date_to));
        }
        $result = $this->admin_model->get_load_allo_leads_filter($date_from, $date_to);
        $this->returns($result);
    }

    function count_leads_get(){
        $type = $this->get('type');
        $date_from = $this->get('date_from');
        $date_to = $this->get('date_to');
        if($type == 'today'){
            $date_from = date('Y-m-d 00:00:01');
            $date_to = date('Y-m-d 23:59:59');
        } else {
            $date_from = date('Y-m-d 00:00:01', strtotime($date_from));
            $date_to = date('Y-m-d 23:59:59', strtotime($date_to));
        }
        $result = $this->admin_model->get_leads_lead_source($date_from, $date_to);
        $this->returns($result);
    }
}
