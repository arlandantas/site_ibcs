<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programacoes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Programacoes_model', 'programacoes');
	}

	public function index() {
		$retorno = array_map(function ($programacoes) {
			$h = explode(":", $programacoes->horario);
			return [
				'titulo' => $programacoes->nome,
				'descricao' => $programacoes->descricao,
				'horario' => ltrim($h[0], '0').'h'.($h[1] != '00' ? $h[1] : ''),
				'dia' => ['domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado'][$programacoes->dia_semana]
			];
		}, $this->programacoes->all());

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($retorno));
	}

  public function index_admin ()
  {
		$this->load->library('session');
		if (!isset($_SESSION['user_id'])) {
      redirect('login');
		}
		$this->load->view('header');
		$this->load->view('admin/programacoes', [ 'programacoes' => $this->programacoes->getAll() ]);
		$this->load->view('footer');
	}
	
  public function save () {
		$this->load->library('session');
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_permissoes']) || $_SESSION['user_permissoes'] != '*') {
			return $this->output
				->set_status_header(403)
				->set_content_type('application/json')
        ->set_output(json_encode(array('err' => 'Acesso não permitido', 'data' => $_SESSION)));
		}
		$data = json_decode($this->input->raw_input_stream);
		echo json_encode($this->programacoes->save($data));
  }
	
  public function delete ($id) {
		$this->load->library('session');
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_permissoes']) || $_SESSION['user_permissoes'] != '*') {
			return $this->output
				->set_status_header(403)
				->set_content_type('application/json')
        ->set_output(json_encode(array('err' => 'Acesso não permitido', 'data' => $_SESSION)));
		}
		$this->programacoes->delete($_GET['id']);
  }
}

/* End of file programacoes.php */

