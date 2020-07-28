<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programacao extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ProgramacaoModel', 'programacao');
	}

	public function index() {
		$retorno = array_map(function ($programacao) {
			$h = explode(":", $programacao->horario);
			return [
				'titulo' => $programacao->nome,
				'descricao' => $programacao->descricao,
				'horario' => ltrim($h[0], '0').'h'.($h[1] != '00' ? $h[1] : ''),
				'dia' => ['domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado'][$programacao->dia_semana]
			];
		}, $this->programacao->all());

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($retorno));
	}

	public function add() {

	}

	public function update( $id = NULL ) {

	}

	public function delete( $id = NULL ) {

	}
}

/* End of file Programacao.php */

