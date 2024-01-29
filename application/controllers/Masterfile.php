<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Masterfile extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('masterfile_model');
    }
    private function header($title){
        $sess = $this->session->userdata('l_session');
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
    public function member_list_get() {
		if($this->session->userdata('l_session')){
            $sess = $this->session->userdata('l_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Member List');
                $this->load->view('admin/masterfile/member-list');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }
    public function member_profile_get($user_id) { // ang $user_id kay ang last na param sa url [/member-profile/$user_id]
		if($this->session->userdata('l_session')){
            $sess = $this->session->userdata('l_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Member Profile');
                $this->load->view('admin/masterfile/member-profile', array('user_id'=>$user_id)); // pass to view
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    // functions
    public function member_list_all_get(){
        $result = $this->masterfile_model->get_member_list_all();
        $this->returns($result);
    }

    public function member_list_post(){
        $data = array(
            'firstname' => $this->post('firstname') ? $this->post('firstname') : '',
            'middlename' => $this->post('middlename') ? $this->post('middlename') : '',
            'lastname' => $this->post('lastname') ? $this->post('lastname') : '',
            'username' => $this->post('lastname') . date('ymdhi'),
            'password' => '$2y$10$A.w/SZiQPBr66.0kgRz0BO6m0qEUbIJHPqX/4aKze4mFYagTZZEce'
        );
        $data2 = array(
            'deposit_amount' => $this->post('deposit_amount') ? $this->post('deposit_amount') : ''
        );
        $result = $this->masterfile_model->save_member($data, $data2);
        if($result){
            $this->response(array('success'=>true,'message'=>'Successfully saved.'), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
        }
    }

    public function member_list_delete(){
        $id = $this->delete('id');
        $result = $this->masterfile_model->delete_member($id);
        return $result ? $this->response(array('success'=>true,'message'=>'Successfully Deleted'), REST_Controller::HTTP_OK) : $this->response(array('success'=>false,'message'=>'Failed Deleting'), REST_Controller::HTTP_OK);
    }

    public function member_profile_id_get(){
        $result = $this->masterfile_model->get_member_profile_id($this->get('id'));
        $this->returns($result);
    }

    public function member_profile_post(){
        $data = array(
            'user_id' => $this->post('user_id') ? $this->post('user_id') : '',
            'firstname' => $this->post('firstname') ? $this->post('firstname') : '',
            'middlename' => $this->post('middlename') ? $this->post('middlename') : '',
            'lastname' => $this->post('lastname') ? $this->post('lastname') : '',
        );
        // add $data for more
        $result = $this->masterfile_model->save_member_profile($data);
        if($result){
            $this->response(array('success'=>true,'message'=>'Successfully saved.'), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('success'=>false,'message'=>'Failed Saving'), REST_Controller::HTTP_OK);
        }
    }
}