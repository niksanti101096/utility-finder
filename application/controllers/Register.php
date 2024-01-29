<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Register extends REST_Controller {


    public function index_get() {
	    $this->load->view('register');
	}

    public function index_post() {
        
        $data = array(
            'firstname' => $this->post('register_firstname') ? $this->post('register_firstname') : '',
        );
        var_dump($data);
    }

}