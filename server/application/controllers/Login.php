<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}

  public function index() {
    if (isset($_SESSION['user_id'])) {
      redirect('admin');
    }
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      return $this->load->view('login');
    } else {
      $this->session->set_userdata('user_id', 1);
      redirect('admin');
    }
  }

  public function logoff () {
    $this->session->set_userdata('user_id');
    redirect('login');
  }

}

/* End of file Login.php */
