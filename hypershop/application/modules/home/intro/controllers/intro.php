<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro extends CI_Controller {

	public function index()
	{
		$this->load->view('intro/intro_view');
	}

}

/* End of file intro.php */
/* Location: ./application/modules/intro/controllers/intro.php */