<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Forgot_Password extends REST_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('authentication_model');
	}
    
	public function index_get()
	{
	    $this->load->view('forgot-password');
	}

	public function index_post()
	{
	    $email=$this->input->post('email');
		$query=$this->db->query("select user_id, email, CONCAT(firstname,' ', middlename, ' ', lastname) AS fullname from users where email='$email'");
		$row=$query->row();
		if($row){
			$user_email=$row->email;
			$user_fullname=$row->fullname;
			$user_id=$row->user_id;
			if(!strcmp($email, $user_email)){ // check case sensitivity
				$word = array_merge(range('a', 'z'), range('A', 'Z'), range(1,9));
				shuffle($word);
				$system_generated_password = substr(implode($word), 0, 8);
				$new_password = password_hash($system_generated_password,PASSWORD_BCRYPT);
				/*Mail Code*/
				$this->load->library('phpmailer_library');

				// PHPMailer object
				$mail = $this->phpmailer_library->load();

				// SMTP configuration
				$mail->SMTPDebug = 0;
				$mail->IsSMTP();
				$mail->CharSet = 'UTF-8';
				$mail->Host = MAIL_PRECOM_HOST;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'tls';//ssl for gmail testing
				$mail->Port = MAIL_PRECOM_PORT;
				$mail->Username = MAIL_PRECOM_USERNAME;
				$mail->Password = MAIL_PRECOM_PASSWORD;              
				$mail->From = EMAIL_PRECOM;
				$mail->FromName = "A2 SOLUTIONS";
				$mail->Subject = "Account Password Recovery";
				$mail->Body = "Your new system generated password is <b>" . $system_generated_password . "</b>. You can change it after login.<br><br>Login now <a href='".base_url('authentication')."' target='_blank'>".base_url('authentication')."</a>";
				$mail->IsHTML(true);

				$mail->AddAddress(trim($user_email));

				// Send email
				if($mail->send()){
					$this->authentication_model->reset_password($user_id, $new_password);
					$data = array(
						'success' => true,
						'message' => 'Successfully sent email. Please check your email for your new system generated password.'
					);
					$this->load->view('forgot-password', $data);
				}else{
					$data = array(
						'success' => false,
						'message' => 'Something went wrong while sending email. Please contact your administrator.'
					);
					$this->load->view('forgot-password', $data);
				}
			}
			else{
				$data = array(
					'success' => false,
					'message' => 'Case-sensitivity mismatched.'
				);
				$this->load->view('forgot-password', $data);
			}
		}else{
			$data = array(
				'success' => false,
				'message' => 'Email not found.'
			);
			$this->load->view('forgot-password', $data);
		}
	}
}
