<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {
	public function index() {
		$this->load->helper('url');
		echo file_get_contents(site_url('index.html'));
	}
}
