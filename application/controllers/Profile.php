<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Profile extends REST_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
    }

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

    public function index_get() {
		if($this->session->userdata('uf_session')){
            $this->header('User Profile');
            $this->load->view('profile');
            $this->footer();
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    // Functions

    public function load_user_get() {
        $currentUser = $this->session->userdata('uf_session');
        $result = $this->profile_model->get_load_user($currentUser['id']);
        $this->returns($result);
    }

    public function update_profile_info_post(){
        $data = array(
            'salutation' => $this->post('salutation') ? $this->post('salutation') : '',
            'firstname' => $this->post('firstname') ? $this->post('firstname') : '',
            'middlename' => $this->post('middlename') ? $this->post('middlename') : '',
            'lastname' => $this->post('lastname') ? $this->post('lastname') : '',
            'extention' => $this->post('extention') ? $this->post('extention') : '',
            'email' => $this->post('email') ? $this->post('email') : '',
            'phone' => $this->post('phone') ? $this->post('phone') : '',
        );
        $result = $this->profile_model->save_profile_info($data);
        return $result ? $this->response(array('success'=>true,'message'=>'Successfully updated information'), REST_Controller::HTTP_OK) : $this->response(array('success'=>false,'message'=>'Failed updating information.'), REST_Controller::HTTP_OK);
    }

    public function change_password_post() {
        $result = $this->profile_model->save_password($this->post('old_password'), $this->post('new_password'));
        return $result ? $this->response(array('success'=>true,'message'=>'Password Changed'), REST_Controller::HTTP_OK) : $this->response(array('success'=>false,'message'=>'Please check your old password.'), REST_Controller::HTTP_OK);
    }

}