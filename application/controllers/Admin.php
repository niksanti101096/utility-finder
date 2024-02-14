<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Admin extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    protected $helpers = ['display', 'form', 'date', 'download'];
    private function header($title){
        $sess = $this->session->userdata('uf_session');
        return $this->load->view('partials/header', ['title' => $title, 'session' => $sess]);
    }
    private function footer(){
        return $this->load->view('partials/footer');
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
    // pages
    public function index_get() {
		if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Admin Dashboard');
                $this->load->view('admin/dashboard');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    public function new_leads_get() {
		if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Admin New Leads');
                $this->load->view('admin/new-leads');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    public function allocated_leads_get() {
		if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Admin Allocated Leads');
                $this->load->view('admin/allocated-leads');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }
    
    public function settings_get() {
		if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Admin Setting');
                $this->load->view('admin/settings');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }
    
    public function lead_record_get() {
		if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('View Record');
                $this->load->view('admin/lead-record');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    // functions
    public function pie_chart_get(){
        $result = $this->admin_model->get_pie_chart();
        $this->returns($result);
    }

    public function load_lead_records_get() {
        $result = $this->admin_model->get_load_lead_records();
        $this->returns($result);
    }

    public function load_lead_record_get() {
        $result = $this->admin_model->get_load_lead_record($this->get('sequence'));
        $this->returns($result);
    }

    public function load_not_lead_records_get() {
        $result = $this->admin_model->get_load_not_lead_records();
        $this->returns($result);
    }

    public function load_allocated_lead_record_get() {
        $result = $this->admin_model->get_load_allocated_lead_record();
        $this->returns($result);
    }

    public function load_partner_details_get() {
        $result = $this->admin_model->get_load_partner_details($this->get('partner_id'));
        $this->returns($result);
    }

    public function load_all_partners_get() {
        $result = $this->admin_model->get_load_all_partners();
        $this->returns($result);
    }

    public function search_lead_get(){
        $data = [
            'lead_id' => $this->get('lead_id') ? $this->get('lead_id') : '',
            'business_name' => $this->get('business_name') ? $this->get('business_name') : '',
            'post_code' => $this->get('post_code') ? $this->get('post_code') : '',
            'contact_name' => $this->get('contact_name') ? $this->get('contact_name') : '',
            'phone_number' => $this->get('phone_number') ? $this->get('phone_number') : '',
            'email_address' => $this->get('email_address') ? $this->get('email_address') : '',
        ];
        $result = $this->admin_model->get_lead_search($data);
        $this->returns($result);
    }

    public function create_new_lead_post(){
        if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            $data = [
                'lead_id' => $this->post('new_lead_id') ? $this->post('new_lead_id') : '',
                'lead_source' => $this->post('new_lead_source') ? $this->post('new_lead_source') : '',
                'lead_type' => $this->post('new_lead_type') ? $this->post('new_lead_type') : '',
                'current_supplier' => $this->post('new_lead_supplier') ? $this->post('new_lead_supplier') : '',
                'current_contract_ends' => $this->post('new_lead_contract_end_date') ? $this->post('new_lead_contract_end_date') : '',
                'business_name' => $this->post('new_lead_business_name') ? $this->post('new_lead_business_name') : '',
                'post_code' => $this->post('new_lead_post_code') ? $this->post('new_lead_post_code') : '',
                'contact_name' => $this->post('new_lead_contact_name') ? $this->post('new_lead_contact_name') : '',
                'phone_number' => $this->post('new_lead_phone_number') ? $this->post('new_lead_phone_number') : '',
                'email_address' => $this->post('new_lead_email') ? $this->post('new_lead_email') : '',
                'notes' => $this->post('new_lead_notes') ? $this->post('new_lead_notes') : '',
                'created_by' => $sess['id'],
            ];

            $result = $this->admin_model->create_new_lead($data);
            if(gettype($result) == "array"){
                $this->response(array('success'=>true,'message'=>'Success', 'id' => $result['id']), REST_Controller::HTTP_OK);
            } else {
                if($result){
                    $this->response(array('success'=>true,'message'=>'Successfully saved.'), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
                }
            }
		}else{
			return redirect(base_url('admin'), 'refresh');
		}
    }

    public function load_users_record_get() {
        $result = $this->admin_model->get_load_users_record();
        $this->returns($result);
    }

    public function assign_partner_post() {
        if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            $data = [
                'status' => 2,
                'partner_id' => $this->post('partner_id'),
                'allocated_by' => $sess['id'],
            ];
            $result = $this->admin_model->post_assign_partner($data, $this->post('lead_id'));
            if($result){
                if ($this->post('lead_status') == 1) {
                    $returnMessage = 'Successfully allocated lead!';
                } else {
                    $returnMessage = 'Successfully reallocated lead!';
                }
                $this->response(array('success'=>true,'message'=>$returnMessage), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('success'=>false,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
            }
        } else {
			return redirect(base_url('admin'), 'refresh');
		}
    }
}