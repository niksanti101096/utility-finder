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
                $this->header('New Leads');
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
                $this->header('Allocated Leads');
                $this->load->view('admin/allocated-leads');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    public function archived_leads_get() {
		if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Archived Leads');
                $this->load->view('admin/archived-leads');
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
                'created_by' => $sess['id'],
            ];

            $result = $this->admin_model->create_new_lead($data);
            if(gettype($result) == "array"){
                $notes = $this->post('new_lead_notes');
                $lead_sequence = $result['id'];
                $id = $sess['id'];
                if ($notes != "") {
                    $data = [
                        'lead_sequence' => $lead_sequence,
                        'notes' => $notes,
                        'notes_added_by' => $id
                    ];
                    $result = $this->admin_model->post_save_notes($data);
                    if ($result) {
                        $this->response(array('success'=>true,'message'=>'Successfully Created Lead.'), REST_Controller::HTTP_OK);
                    } else {
                        $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
                    }
                } else {
                    $this->response(array('success'=>true,'message'=>'Successfully Created Lead.'), REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
            }
		}else{
			return redirect(base_url('admin'), 'refresh');
		}
    }

    public function update_lead_record_post(){
        if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            $data = [
                'lead_source' => $this->post('lead_source') ? $this->post('lead_source') : '',
                'lead_type' => $this->post('lead_type') ? $this->post('lead_type') : '',
                'current_supplier' => $this->post('current_supplier') ? $this->post('current_supplier') : '',
                'current_contract_ends' => $this->post('current_contract_ends') ? $this->post('current_contract_ends') : '',
                'business_name' => $this->post('business_name') ? $this->post('business_name') : '',
                'post_code' => $this->post('post_code') ? $this->post('post_code') : '',
                'contact_name' => $this->post('contact_name') ? $this->post('contact_name') : '',
                'phone_number' => $this->post('phone_number') ? $this->post('phone_number') : '',
                'email_address' => $this->post('email_address') ? $this->post('email_address') : '',
            ];
            $lead_sequence = $this->post('lead_sequence');
            $result = $this->admin_model->post_update_lead_record($data, $lead_sequence);

            if ($result) {
                $this->response(array('success'=>true,'message'=>'Successfully Updated Lead.'), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('success'=>false,'message'=>'Failed Updating Lead'), REST_Controller::HTTP_OK);
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

    public function load_notes_get() {
        $result = $this->admin_model->get_load_notes($this->get('lead_sequence'));
        $this->returns($result);
    }

    public function save_note_post() {
        $sess = $this->session->userdata('uf_session');
        $data = [
            'lead_sequence' => $this->post('lead_sequence'),
            'notes' => $this->post('notes'),
            'notes_added_by' => $sess['id'],
        ];
        $result = $this->admin_model->post_save_notes($data);
        if ($result) {
            $this->response(array('success'=>true,'message'=>'Successfully Added Note.'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>false,'message'=>'Failed Adding Note.'), REST_Controller::HTTP_OK);
        }
    }

    public function archive_lead_post() {
        $result = $this->admin_model->post_archive_lead($this->post('lead_sequence'));
        if ($result) {
            $this->response(array('success'=>true,'message'=>'Successfully Archived Lead!'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>true,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
        }
    }
    
}