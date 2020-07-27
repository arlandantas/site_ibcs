<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {
	public function index() {
		$this->load->helper('file');
		echo read_file('./public/index.html');
	}
}
