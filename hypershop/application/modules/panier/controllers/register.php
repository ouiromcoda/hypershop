<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('model_users');
		$this->load->model('model_settings');
	}
		
	public function index()
	{
		
		$this->form_validation->set_rules('rusername','Username','required|alpha_numeric|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('rpassword','Password','required|alpha_numeric|matches[repassword]|min_length[6]|max_length[24]|md5');
		$this->form_validation->set_rules('repassword','Password','required|alpha_numeric');
		
		if($this->form_validation->run()	==	FALSE)
		{
			$data['get_sitename'] = $this->model_settings->sitename_settings();
			$data['get_footer'] = $this->model_settings->footer_settings();	
			$this->load->view('register/form_register',$data); 
			
		}else{
				$data_register_new = array
				 (
					'usr_name'			=> set_value('rusername'),
					'usr_password'		=> set_value('rpassword'),
					'stuts'				=> '1',
					'usr_group'				=>'3'
				 );
				 if($this->model_users->is_usr() == FALSE)
				 {
					 $this->model_users->register_new($data_register_new);
						 $this->form_validation->set_rules('rusername');
						 $this->form_validation->set_rules('rpassword');
						 if($this->form_validation->run()	==	FALSE)
						 {
								$this->load->view('login/form_login'); 	
						 }else{
								$valid_user	= $this->model_users->check();
								 if($valid_user	==	FALSE)
								 {
									 $this->session->set_flashdata('error','Username / Password Not Correct !' );
									 redirect('login');
								 }else{
										 $this->session->set_userdata('username',$valid_user->usr_name);
										 $this->session->set_userdata('group',$valid_user->usr_group);
										 switch($valid_user->usr_group)
										 {
											 case 3 ://for member
											 redirect(base_url());
											 break;
											 
											 default: break;
										 }
								 }
						 }
					 
					 redirect(base_url());
				 }else{
						$this->session->set_flashdata('error','Please Write Other User Name !' );
						redirect('register');
				 }
		}
	}
	
	public function api()
	{
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'https://api.montexto.pro/v1/login',
		    CURLOPT_USERAGENT => 'Montexto API Simple Agent',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => array(
		        'Email' => 'viwami@yahoo.fr',
		        'Password' => 'leprogresci'
		    )
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources

		curl_close($curl);
	}
}