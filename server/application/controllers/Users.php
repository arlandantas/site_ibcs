<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Users_model', 'users');
	}

  public function index()
  {
		if (!isset($_SESSION['user_id'])) {
      redirect('login');
		}
		$this->load->view('header');
		$this->load->view('admin/users', [ 'users' => $this->users->getAll() ]);
		$this->load->view('footer');
	}
	
  public function save () {
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_permissoes']) || $_SESSION['user_permissoes'] != '*') {
			return $this->output
				->set_status_header(403)
				->set_content_type('application/json')
        ->set_output(json_encode(array('err' => 'Acesso não permitido', 'data' => $_SESSION)));
		}
		$data = json_decode($this->input->raw_input_stream);
		echo json_encode($this->users->save($data));
  }
	
  public function delete ($id) {
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_permissoes']) || $_SESSION['user_permissoes'] != '*') {
			return $this->output
				->set_status_header(403)
				->set_content_type('application/json')
        ->set_output(json_encode(array('err' => 'Acesso não permitido', 'data' => $_SESSION)));
		}
		// echo "Deletando ".($_GET['id']);
		$this->users->delete($_GET['id']);
  }

}

/* End of file Users.php */
