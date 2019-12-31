<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('common');
    $this->load->library('form_validation');
	}

}
