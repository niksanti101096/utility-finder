<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Admin extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('audit_log_model');
        $this->load->model('api_model');
        $this->load->helper(array('form', 'url'));
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

    public function load_archived_lead_records_get() {
        $result = $this->admin_model->get_load_archived_lead_records();
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

    public function check_duplicate_get() {
        if ($this->session->userdata('uf_session')) {
            $data = [
                'email' => $this->get('email'),
                'phone' => $this->get('phone') 
            ];
            $result = $this->admin_model->get_check_duplicate($data);
            $this->returns($result);
        } else {
            return redirect(base_url('admin'), 'refresh');
        }
        
    }
// MARK: Create New Lead Function
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
                'created_by' => $sess['id'] ? $sess['id'] : '',
            ];
            $result = $this->admin_model->create_new_lead($data);
            if(gettype($result) == "array"){
                $notes = $this->post('new_lead_notes');
                $lead_sequence = $result['id'];
                $id = $sess['id'];
                $notif_details = $this->post('notif_details');

                $data = [
                    'lead_sequence' => $lead_sequence,
                    'action' => "Lead Created.",
                    'action_by' => $id,
                ];
                $this->audit_log_model->post_audit_log($data);


                if ($notes != "") {
                    $data = [
                        'lead_sequence' => $lead_sequence,
                        'notes' => $notes,
                        'notes_added_by' => $id
                    ];
                    $result = $this->admin_model->post_save_notes($data);
                    if ($result) {

                        $data = [
                            'lead_sequence' => $lead_sequence,
                            'action' => "Note Added.",
                            'action_by' => $id,
                        ];
                        $this->audit_log_model->post_audit_log($data);

                        $data = [
                            'lead_sequence' => $lead_sequence,
                            'notif_details' => $notif_details,
                            'notif_added_by' => $id,
                        ];
                        $this->admin_model->post_notif_details($data);
                        $data = [
                            'lead_id' => $this->post('new_lead_id'),
                            'sequence' => $lead_sequence,
                        ];
                        $return_email = $this->send_email($data);
                        $this->response(array('success'=>true,'message'=>'Successfully Created Lead.'), REST_Controller::HTTP_OK);
                    } else {
                        $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
                    }
                } else {
                    $data = [
                        'lead_sequence' => $lead_sequence,
                        'notif_details' => $notif_details,
                        'notif_added_by' => $id,
                    ];
                    $this->admin_model->post_notif_details($data);
                    $data = [
                        'lead_id' => $this->post('new_lead_id'),
                        'sequence' => $lead_sequence,
                    ];
                    $return_email = $this->send_email($data);
                    $this->response(array('success'=>true,'message'=>'Successfully Created Lead.'), REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
            }
        }else{
            return redirect(base_url('admin'), 'refresh');
        }
    }

    public function send_email($data) {
        // Lead Creation Email
        $result = $this->admin_model->get_user_emails();
        
        if(gettype($result) == "array"){
            $this->load->library('phpmailer_library');
            $mail = $this->phpmailer_library->load();
            $mail->SMTPDebug = 0;
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = MAIL_PRECOM_HOST;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';//ssl for gmail testing
            $mail->Port = MAIL_PRECOM_PORT;
            $mail->Username = MAIL_PRECOM_USERNAME;
            $mail->Password = MAIL_PRECOM_PASSWORD;              
            $mail->From = EMAIL_PRECOM;
            $mail->FromName = "A2 SOLUTIONS";
            $mail->Subject = "New Lead is Created";
            $mail->Body = "A new lead is created with an ID of <b>".$data['lead_id']."</b>.<br><br><a href='".base_url('admin/lead-record/')."".$data['sequence']."' target='_blank'>Click here</a> to check the lead created!";
            // $mail->Body = "A new lead is created with an ID of <b>".$this->post('new_lead_id')."</b>.<br><br><a href='".base_url('admin/lead-record')."' target='_blank'>Click here</a> to check the lead created!";
            // $mail->Body = "Your new system generated password is <b>" . $system_generated_password . "</b>. You can change it after login.<br><br>Login now <a href='".base_url('authentication')."' target='_blank'>".base_url('authentication')."</a>";
            $mail->IsHTML(true);
            
            foreach ($result as $key => $value) {
                foreach ($value as $key => $data) {
                    $email = $data->email;
                    $mail->AddAddress($email);
                }
            }
            // Send email
            if($mail->send()){
                return true;
            }else{
                return false;
            }
        }
    }

    public function update_lead_record_post(){
        if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            $lead_sequence = $this->post('lead_sequence');
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

            $result = $this->admin_model->post_update_lead_record($data, $lead_sequence);

            if ($result) {
                $data = [
                    'lead_sequence' => $lead_sequence,
                    'action' => "Lead Details Edited.",
                    'action_by' => $sess['id'],
                ];
                $this->audit_log_model->post_audit_log($data);
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

    public function load_partners_record_get() {
        $result = $this->admin_model->get_load_partners_record();
        $this->returns($result);
    }

    public function assign_partner_bulk_post() {
        if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            $lead_sequence = $this->post('lead_sequence');
            $data = [
                'status' => 2,
                'partner_id' => $this->post('partner_id'),
                'allocated_by' => $sess['id'],
            ];
            $result = $this->admin_model->post_assign_partner_bulk($data, $lead_sequence);
            if($result){
                if ($this->post('lead_status') == 1) {
                    foreach ($lead_sequence as $key => $value) {
                        $data = [
                            'lead_sequence' => $value,
                            'action' => "Lead Allocated - " . $this->post('partner_name'),
                            'action_by' => $sess['id'],
                        ];
                        $this->audit_log_model->post_audit_log($data);
                    }
                    $returnMessage = 'Successfully allocated lead!';
                } else {
                    foreach ($lead_sequence as $key => $value) {
                        $data = [
                            'lead_sequence' => $value,
                            'action' => "Lead Re-Allocated - " . $this->post('partner_name'),
                            'action_by' => $sess['id'],
                        ];
                        $this->audit_log_model->post_audit_log($data);
                    }
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

    public function assign_partner_post() {
        if($this->session->userdata('uf_session')){
            $sess = $this->session->userdata('uf_session');
            $lead_sequence = $this->post('lead_sequence');
            $partner_name = $this->post('partner_name');
            $data = [
                'status' => 2,
                'partner_id' => $this->post('partner_id'),
                'allocated_by' => $sess['id'],
            ];
            $result = $this->admin_model->post_assign_partner($data, $lead_sequence);
            if($result){
                if ($this->post('lead_status') == 1) {
                    $data = [
                        'lead_sequence' => $lead_sequence,
                        'action' => "Lead Allocated - " . $partner_name,
                        'action_by' => $sess['id'],
                    ];
                    $returnMessage = 'Successfully allocated lead!';
                } else {
                    $data = [
                        'lead_sequence' => $lead_sequence,
                        'action' => "Lead Re-Allocated - " . $partner_name,
                        'action_by' => $sess['id'],
                    ];
                    $returnMessage = 'Successfully reallocated lead!';
                }
                $this->audit_log_model->post_audit_log($data);

                $data = [
                    'partner_name' => $partner_name,
                    'lead_sequence' => $lead_sequence,
                ];
                $this->check_supplier($data);

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
        $lead_sequence = $this->post('lead_sequence');
        $data = [
            'lead_sequence' => $lead_sequence,
            'notes' => $this->post('notes'),
            'notes_added_by' => $sess['id'],
        ];
        $result = $this->admin_model->post_save_notes($data);
        if ($result) {
            $data = [
                'lead_sequence' => $lead_sequence,
                'action' => "Note Added.",
                'action_by' => $sess['id'],
            ];
            $this->audit_log_model->post_audit_log($data);
            $this->response(array('success'=>true,'message'=>'Successfully Added Note.'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>false,'message'=>'Failed Adding Note.'), REST_Controller::HTTP_OK);
        }
    }

    public function archive_bulk_lead_post() {
        $sess = $this->session->userdata('uf_session');
        $lead_sequence = $this->post('lead_sequence');
        $result = $this->admin_model->post_archive_bulk_lead($lead_sequence);
        if ($result) {
            foreach ($lead_sequence as $key => $value) {
                $data = [
                    'lead_sequence' => $value,
                    'action' => "Lead Archived.",
                    'action_by' => $sess['id'],
                ];
                $this->audit_log_model->post_audit_log($data);
            }
            $this->response(array('success'=>true,'message'=>'Successfully Archived Leads!'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>true,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
        }
    }

    public function archive_lead_post() {
        $sess = $this->session->userdata('uf_session');
        $lead_sequence = $this->post('lead_sequence');
        $result = $this->admin_model->post_archive_lead($lead_sequence);
        if ($result) {
            $data = [
                'lead_sequence' => $lead_sequence,
                'action' => "Lead Archived.",
                'action_by' => $sess['id'],
            ];
            $this->audit_log_model->post_audit_log($data);
            $this->response(array('success'=>true,'message'=>'Successfully Archived Lead!'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>true,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
        }
    }

    public function load_notif_get() {
        $sess = $this->session->userdata('uf_session');
        $result = $this->admin_model->get_load_notif($sess['id']);
        $this->returns($result);
    }

    public function set_notif_post() {
        $sess = $this->session->userdata('uf_session');
        $data = [
            'notif_id' => $this->post('notif_id'),
            'view_by' => $sess['id'],
        ];
        $result = $this->admin_model->post_set_notif($data);
        $this->returns($result);
    }

    public function store_avatar_post() {
        $fileName = $_FILES["avatar"]['name'];
        $config['upload_path'] = './assets/images/avatars/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1000;
        // $config['max_width'] = 1200;
        // $config['max_height'] = 1200;
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('avatar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->returns($error);
        }
        else {
            $data = array('success' => $this->upload->data());

            $this->response(array('success'=>true,'data'=>$data['success']['file_name']), REST_Controller::HTTP_OK);
        }
    }

    public function store_supplier_post() {
        $sess = $this->session->userdata('uf_session');
        $fileName = $_FILES["logo"]['name'];
        $supplierName = $this->post('name');
        $supplierType = $this->post('type');

        $config['upload_path'] = './assets/images/logos/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1000;
        // $config['max_width'] = 1200;
        // $config['max_height'] = 1200;
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
            $this->returns($error);
        }
        else {
            $data = array('success' => $this->upload->data());

            $data = [
                'supplier_name' => $supplierName,
                'supplier_logo' => $data['success']['file_name'],
                'supplier_type' => $supplierType,
                'added_by' => $sess['id'],
            ];
            
            $retVal = ($supplierType == 1) ? "Energy" : "Water";

            $result = $this->admin_model->post_supplier($data);
            $this->response(array('success'=>true,'message'=>'Successfully Added '.$retVal.' Supplier!'), REST_Controller::HTTP_OK);
        }
    }

    public function update_user_avatar_post() {
        $fileName = $_FILES["avatar"]['name'];
        $oldAvatarPath = $this->post('imgLocation');

        if (file_exists($oldAvatarPath)) {
            unlink($oldAvatarPath); // To delete the old logo
        }

        $config['upload_path'] = './assets/images/avatars/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1000;
        // $config['max_width'] = 1200;
        // $config['max_height'] = 1200;
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('avatar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->returns($error);
        }
        else {
            $data = array('success' => $this->upload->data());

            $this->response(array('success'=>true,'data'=>$data['success']['file_name']), REST_Controller::HTTP_OK);
        }

    }

    public function update_supplier_logo_post() {
        $fileName = $_FILES["logo"]['name'];
        $supplierId = $this->post('id');
        $oldLogoPath = $this->post('imgLocation');

        if (file_exists($oldLogoPath)) {
            unlink($oldLogoPath); // To delete the old logo
        }

        $config['upload_path'] = './assets/images/logos/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1000;
        // $config['max_width'] = 1200;
        // $config['max_height'] = 1200;
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
            $this->returns($error);
        }
        else {
            $data = array('success' => $this->upload->data());

            $data = [
                'supplier_id' => $supplierId,
                'supplier_logo' => $data['success']['file_name'],
            ];
            
            $result = $this->admin_model->post_update_supplier_logo($data);

            $this->response(array('success'=>true,'message'=>'Successfully Updated the Logo'), REST_Controller::HTTP_OK);
        }
    }

    public function load_energy_supp_get() {
        $result = $this->admin_model->get_load_energy_supp();
        $this->returns($result);
    }

    public function load_water_supp_get() {
        $result = $this->admin_model->get_load_water_supp();
        $this->returns($result);
    }

    public function archive_supplier_post() {
        $result = $this->admin_model->post_archive_supplier($this->post('supplier_id'));
        $this->returns($result);
    }

    public function update_supplier_name_post() {
        $data = [
            'supplier_id' => $this->post('supplier_id'),
            'supplier_name' => $this->post('supplier_name'),
        ];
        $result = $this->admin_model->post_update_supplier_name($data);
        $this->returns($result);
    }

    public function create_partner_post() {
        $data = [
            'partner_id' => 0,
            'partner_name' => $this->post('partner_name'),
            'email' => $this->post('email')
        ];

        $result = $this->admin_model->post_partner($data);

        if ($result) {
            $this->response(array('success'=>true,'message'=>'Successfully Created Partner'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>false,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
        }
    }

    public function update_partner_post() {
        $data = [
            'partner_id' => $this->post('partner_id'),
            'partner_name' => $this->post('partner_name'),
            'email' => $this->post('email'),
            'received_email' => $this->post('received_email') == "on" ? 1 : 0,
            'api_access' => $this->post('api_access') == "on" ? 1 : 0,
        ];

        $result = $this->admin_model->post_partner($data);

        if ($result) {
            $this->response(array('success'=>true,'message'=>'Successfully Updated Partner Details'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>false,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
        }
    }

    public function archive_partner_post() {
        $result = $this->admin_model->post_archive_partner($this->post('partner_id'));

        if ($result) {
            $this->response(array('success'=>true,'message'=>'Successfully Archived Partner Details'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>false,'message'=>'Something went wrong!'), REST_Controller::HTTP_OK);
        }

    }

    public function load_partner_record_get() {
        $id = $this->get('partner_id');
        $result = $this->admin_model->get_load_partners_record($id);

        if ($result) {
            $this->response(array('success'=>true,'data'=>$result['data']), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('success'=>false,'data'=>[]), REST_Controller::HTTP_OK);
        }
    }

    public function check_supplier($data) {

        $result = $this->admin_model->get_load_supplier($data['lead_sequence']);

        if ($data['partner_name'] == "SwiftSwitch") {

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.swiftswitch.co.uk/v1/leads/create",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                  'Last_Name' => '',
                  'First_Name' => $result['data'][0]->contact_name,
                  'Company' => $result['data'][0]->business_name,
                  'Product' => 'Water',
                  'Email' => $result['data'][0]->email_address,
                  'Phone' => $result['data'][0]->phone_number,
                  'Postal_Code' => $result['data'][0]->post_code,
                  'Street' => '',
                  'Description' => 'Lead From Switch Finder'
                ]),
                CURLOPT_HTTPHEADER => [
                  "Accept: application/json",
                  "Content-Type: application/json",
                  "x-api-key: DnGtYh3fPq1wUx9rLm4Jv5XtZs6aBc"
                ],
              ]);
              curl_exec($curl);
              curl_close($curl);
        } elseif ($data['partner_name'] == "Clearsight Energy") {

            $this->load->library('phpmailer_library');
            $mail = $this->phpmailer_library->load();
            $mail->SMTPDebug = 0;
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = MAIL_PRECOM_HOST;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';//ssl for gmail testing
            $mail->Port = MAIL_PRECOM_PORT;
            $mail->Username = MAIL_PRECOM_USERNAME;
            $mail->Password = MAIL_PRECOM_PASSWORD;              
            $mail->From = EMAIL_PRECOM;
            $mail->FromName = "A2 SOLUTIONS";
            $mail->Subject = "Lead From Switch Finder";
            $mail->Body = "Lead Source : Switch Finder<br>Current Supplier : ".$result['data'][0]->current_supplier."<br>Contract End Month : ".$result['data'][0]->current_contract_ends."<br>Business Name : ".$result['data'][0]->business_name."<br>Postcode : ".$result['data'][0]->post_code."<br>Contact Name : ".$result['data'][0]->contact_name."<br>Contact Phone : ".$result['data'][0]->phone_number."<br>Contact Email : ".$result['data'][0]->email_address;
            $mail->IsHTML(true);
            $mail->AddAddress("contact@clearsightenergy.com");
            // Send email
            if($mail->send()){
                return true;
            }else{
                return false;
            }
        } else {
            $this->load->library('phpmailer_library');
            $mail = $this->phpmailer_library->load();
            $mail->SMTPDebug = 0;
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = MAIL_PRECOM_HOST;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';//ssl for gmail testing
            $mail->Port = MAIL_PRECOM_PORT;
            $mail->Username = MAIL_PRECOM_USERNAME;
            $mail->Password = MAIL_PRECOM_PASSWORD;              
            $mail->From = EMAIL_PRECOM;
            $mail->FromName = "A2 SOLUTIONS";
            $mail->Subject = "Lead From Switch Finder";
            $mail->Body = "Lead Source : Switch Finder<br>Current Supplier : ".$result['data'][0]->current_supplier."<br>Contract End Month : ".$result['data'][0]->current_contract_ends."<br>Business Name : ".$result['data'][0]->business_name."<br>Postcode : ".$result['data'][0]->post_code."<br>Contact Name : ".$result['data'][0]->contact_name."<br>Contact Phone : ".$result['data'][0]->phone_number."<br>Contact Email : ".$result['data'][0]->email_address;
            $mail->IsHTML(true);
            
            
            foreach ($result as $key => $value) {
                foreach ($value as $key => $data) {
                    $email = $data->email;
                    $delimiter = ', ';
                    if (strpos($email, $delimiter) !== false) {
                        $emails = explode($delimiter, $email);
                        foreach ($emails as $key => $value) {
                            $mail->AddAddress($value);
                        }
                    } else {
                        $mail->AddAddress($email);
                    }
                }
            }
            // Send email
            if($mail->send()){
                return true;
            }else{
                return false;
            }
        }
    }
    public function add_third_party_email_post() {
        $data = [
            'partner_id' => $this->post('partner_id'),
            'email' => $this->post('email'),
        ];
        $result = $this->admin_model->post_add_third_party_email($data);
        $this->returns($result);
    }
}
