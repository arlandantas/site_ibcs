<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Programacao extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ProgramacaoModel', 'programacao');
	}

	public function index( $offset = 0 ) {
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($this->programacao->all()));
	}

	public function add() {

	}

	public function update( $id = NULL ) {

	}

	public function delete( $id = NULL ) {

	}
}

/* End of file Programacao.php */

