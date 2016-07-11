<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class spa extends CI_Controller {

	public function index()
	{
		$this->load->view('spa');
	}
}
