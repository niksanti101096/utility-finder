<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Api extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('admin_model');
        $this->load->model('audit_log_model');
    }
    private function returns($result)
    {
        if ($result) {
            return $this->response($result, REST_Controller::HTTP_OK);
        } else {
            $result = array(
                'data' => []
            );
            return $this->response($result, REST_Controller::HTTP_OK);
        }
    }
    // functions

    public function contact_form_post()
    {
        // Data for saving in contact_form table
        $data = [
            'taken_from_page' => $this->post('taken_from_page') ? $this->post('taken_from_page') : '',
            'quote_for' => $this->post('quote_for') ? $this->post('quote_for') : '',
            'current_supplier' => $this->post('current_supplier') ? $this->post('current_supplier') : '',
            'current_contract_ends' => $this->post('current_contract_ends') ? $this->post('current_contract_ends') : '',
            'business_name' => $this->post('business_name') ? $this->post('business_name') : '',
            'post_code' => $this->post('post_code') ? $this->post('post_code') : '',
            'contact_name' => $this->post('contact_name') ? $this->post('contact_name') : '',
            'phone_number' => $this->post('phone_number') ? $this->post('phone_number') : '',
            'email_address' => $this->post('email_address') ? $this->post('email_address') : '',
        ];
        $this->api_model->post_contact_form($data);

        if ($this->post('quote_for') == "Both") {
            $lead_type = 2;
        } elseif ($this->post('quote_for') == "Gas") {
            $lead_type = 3;
        } elseif ($this->post('quote_for') == "Electricity") {
            $lead_type = 4;
        } elseif ($this->post('quote_for') == "Water") {
            $lead_type = 5;
        } else {
            $lead_type = 0;
        }
        // Data for saving in leads table
        $data = [
            'lead_id' => $this->makeID(4),
            'lead_type' => $lead_type,
            'lead_source' => 'Webform',
            'current_supplier' => $this->post('current_supplier') ? $this->post('current_supplier') : '',
            'current_contract_ends' => $this->post('current_contract_ends') ? $this->post('current_contract_ends') : '',
            'business_name' => $this->post('business_name') ? $this->post('business_name') : '',
            'post_code' => $this->post('post_code') ? $this->post('post_code') : '',
            'contact_name' => $this->post('contact_name') ? $this->post('contact_name') : '',
            'phone_number' => $this->post('phone_number') ? $this->post('phone_number') : '',
            'email_address' => $this->post('email_address') ? $this->post('email_address') : '',
            'created_by' => $this->post('created_by') ? $this->post('created_by') : '',
        ];
        $result = $this->admin_model->create_new_lead($data);

        // Data for audit log
        $lead_sequence = $result['id'];
        $data = [
            'lead_sequence' => $lead_sequence,
            'action' => "Lead Created.",
            'action_by' => $this->post('created_by') ? $this->post('created_by') : '',
        ];
        $this->audit_log_model->post_audit_log($data);

        // Data for notification
        $data = [
            'lead_sequence' => $lead_sequence,
            'notif_details' => "New Lead Received by Webform",
            'notif_added_by' => $this->post('created_by') ? $this->post('created_by') : '',
        ];
        $this->admin_model->post_notif_details($data);
        
        return true;
    }

    public function makeID($length)
    {
        $bytes = random_bytes($length);
        return bin2hex($bytes);
    }
}
