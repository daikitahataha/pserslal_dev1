<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provisional extends CI_Controller {

	public function construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('provisional');
	}

}
