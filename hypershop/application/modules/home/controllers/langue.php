<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Langue extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->lang->load('message','french');
	}
	public function index()
	{

		$this->load->view('home/langue');
	}

}

/* End of file langue.php */
/* Location: ./application/modules/home/controllers/langue.php */