<?php
//we need to start session in order to access it through CI
//session_start();
//use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


class App extends CI_Controller {

    public function index()
	{
		if($this->session->userdata('uf_session')){
			$sess = $this->session->userdata('uf_session');
			if(strpos(strtoupper($sess['role']), 'ADMIN') !== false){
                return redirect(base_url('admin'), 'refresh');
            }
		}else{
			return redirect(base_url('authentication'), 'refresh');
		}
		
	}
    
}
