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
            return redirect(base_url('app'), 'refresh');
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

    public function create_new_user_post(){
        if ($this->session->userdata('uf_session')) {
            $sess = $this->session->userdata('uf_session');
            $data = [
                'user_id' => $this->post('user_id') ? $this->post('user_id') : 0,
                'salutation' => $this->post('salutation') ? $this->post('salutation') : '',
                'firstname' => $this->post('firstname') ? $this->post('firstname') : '',
                'lastname' => $this->post('lastname') ? $this->post('lastname') : '',
                'department' => $this->post('department') ? $this->post('department') : '',
                'email' => $this->post('email') ? $this->post('email') : '',
                'phone' => $this->post('phone') ? $this->post('phone') : '',
                'extention' => $this->post('extention') ? $this->post('extention') : '',
                'user_type' => $this->post('user_type') ? $this->post('user_type') : '',
                'username' => $this->post('username') ? $this->post('username') : '',
                'password' => $this->post('password') ? $this->post('password') : '',
                'avatar' => $this->post('avatar') ? $this->post('avatar') : '',
            ];
            $result = $this->authentication_model->user_records($data);
            if(gettype($result) == "array"){
            $this->response(array('success'=>true,'message'=>'Success'), REST_Controller::HTTP_OK);
        }else{
            if($result){
                $this->response(array('success'=>true,'message'=>'Successfully saved.'), REST_Controller::HTTP_OK);
            }else{
                $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
            }
        }
		}else{
			return redirect(base_url('admin/settings'), 'refresh');
		}
    }

    public function update_user_post() {
        if ($this->session->userdata('uf_session')) {
            $sess = $this->session->userdata('uf_session');
            $data = [
                'user_id' => $this->post('user_id') ? $this->post('user_id') : 0,
                'salutation' => $this->post('salutation') ? $this->post('salutation') : '',
                'firstname' => $this->post('firstname') ? $this->post('firstname') : '',
                'lastname' => $this->post('lastname') ? $this->post('lastname') : '',
                'department' => $this->post('department') ? $this->post('department') : '',
                'email' => $this->post('email') ? $this->post('email') : '',
                'phone' => $this->post('phone') ? $this->post('phone') : '',
                'extention' => $this->post('extention') ? $this->post('extention') : '',
                'user_type' => $this->post('user_type') ? $this->post('user_type') : '',
                'username' => $this->post('username') ? $this->post('username') : '',
                'password' => $this->post('password') ? $this->post('password') : '',
                'avatar' => $this->post('avatar') ? $this->post('avatar') : '',
            ];
            $result = $this->authentication_model->user_records($data);
            if(gettype($result) == "array"){
            $this->response(array('success'=>true,'message'=>'Success', 'data'=>$data), REST_Controller::HTTP_OK);
            }else{
                if($result){
                    $this->response(array('success'=>true,'message'=>'Successfully saved.','data'=>$data), REST_Controller::HTTP_OK);
                }else{
                    $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
                }
            }
		}else{
			return redirect(base_url('admin/settings'), 'refresh');
		}
    }
    public function user_archive_delete() {
        if ($this->session->userdata('uf_session')) {
            $sess = $this->session->userdata('uf_session');
            $result = $this->authentication_model->delete_user($this->delete('id'));
            if($result){
                $this->response(array('success'=>true,'message'=>'Successfully deleted user.'), REST_Controller::HTTP_OK);
            }else{
                $this->response(array('success'=>false,'message'=>'Failed deleting user!'), REST_Controller::HTTP_OK);
            }
		}else{
			return redirect(base_url('admin/settings'), 'refresh');
		}
    }
};
