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
      $this->load->model('Users_model', 'users');
      try {
        $user = $this->users->getFromLogin(
          $this->input->post('login'),
          $this->input->post('password')
        );
        $this->session->set_userdata('user_id', $user->id);
        redirect('admin');
      } catch (Exception $e) {
        return $this->load->view('login', [
          'error' => $e->getMessage(),
          'login' => $this->input->post('login')
        ]);
      }
    }
  }

  public function logoff () {
    $this->session->set_userdata('user_id');
    redirect('login');
  }

}

/* End of file Login.php */
