<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class API extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
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
        return true;
    }
}
