<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Transaction extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('transaction_model');
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
    public function sample_page_get() {
		if($this->session->userdata('l_session')){
            $sess = $this->session->userdata('l_session');
            if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                $this->header('Loans');
                $this->load->view('admin/transaction/sample-page');
                $this->footer();
            }else{
                return redirect(base_url('app'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
    }

    // functions
    
}