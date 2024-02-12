<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Standard extends REST_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('standard_model');
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
            if(strpos(strtoupper($sess['role']), 'STANDARD') !== false){
                $this->header('Dashboard');
                $this->load->view('standard/dashboard');
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