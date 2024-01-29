<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Authentication extends REST_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('authentication_model');
	}
    // page
	public function index_get() // check if login
	{
		if($this->session->userdata('uf_session')){
			$sess = $this->session->userdata('uf_session');
			if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                return redirect(base_url('admin'), 'refresh');
            }
		}else{
			$this->load->view('login'); // return to login if not logged in
		}
	}
    // function
	public function index_post(){
		$data = array(
            'username' => $this->input->post('login-username'),
            'password' => $this->input->post('login-password')
			);
		$result = $this->authentication_model->login_auth($data); // callign model authentication_model.php -> login_auth function
		if($result['result']){ // if there is a return result from model
            foreach($result['result'] as $data){
                $id = $data->user_id;
                $username = $data->username;
                $password = $data->password;
                $firstname = $data->firstname;
                $lastname = $data->lastname;
                $middlename = $data->middlename;
                $role = $data->role;
                $status = $data->status;
            }
            $session_data = array(
                'id' => $id,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'middlename' => $middlename,
                'username' => $username,
                'role' => $role
            );
            if($status == 2){
                $data = array(
                    'message' => 'Your account was disabled by admin'
                );
            }else{
                $this->session->set_userdata('uf_session', $session_data); // add $session_data to session with session name 'uf_session'
                $data = array(
                    'message' => 'Successfully Login'
                );
                if(strpos(strtoupper($role), 'ADMIN') !== false){ // this condition checks the 'user role' of logged in user
                    return redirect(base_url('admin'), 'refresh'); // redirect to admin page, this means successful verification
                }
                return redirect(base_url('app'), 'refresh');
                
            }
        }else{
            if(!$result['username']){
                $data = array(
                    'message' => 'Username or Password is Incorrect'
                );
            }else{
                $data = array(
                    'message' => 'Username or Password is Incorrect'
                );
            }
        }
        $this->load->view('login', $data); // return to login page with message
	}
	public function logout_get() {
		$session_data = false;
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
		return redirect(base_url('authentication'), 'refresh');
	}
}
