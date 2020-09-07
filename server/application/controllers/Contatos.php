<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Contatos_model', 'contatos');
  }

	public function enviar () {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$dados = json_decode($this->input->raw_input_stream);
	
			$this->load->model('Contatos_model', 'contatos');
			try {
				$this->contatos->save($dados);
			} catch (\Exception $e) {
				echo "Não conseguimos salvar no BD!\n";
			}

			$date = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
      $html_email =
			"<h3 style='margin: 0'>{$dados->titulo}</h3>".
      "<b>Nome: </b>{$dados->nome}<br/>".
			"<b>Contato: </b>{$dados->contato}<br/>".
			"<b>Data: </b>".$date->format('d/m/Y à\s H:i:s')."<br/>".
			"<b>Conteúdo: </b><br/>".str_replace("\n", "<br/>", $dados->conteudo);

			$this->load->library('email');
			$this->email->from('site@ibserodio.com.br', 'Contato Site');
			$this->email->to(isset($_ENV['FORM_CONTATO_EMAIL']) ? $_ENV['FORM_CONTATO_EMAIL'] : 'lanfsa@hotmail.com');
			$this->email->subject('[SITE] '.$dados->nome.' - '.$date->format('d/m/Y H:i:s'));
			$this->email->message($html_email);
      $this->email->send();

			echo "enviado!";
		} else {
			echo 'ok';
		}
	}

  public function index($page = 1)
  {
		if (!isset($_SESSION['user_id'])) {
      redirect('login');
    }
    $qtd_page = 5;
		$this->load->view('header');
		$this->load->view('admin/contatos', [
      'contatos' => $this->contatos->getPage($page, $qtd_page),
      'qtd_page' => $qtd_page,
      'total_pages' => ceil($this->contatos->getCount() / $qtd_page),
      'page' => $page
    ]);
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
		echo json_encode($this->contatos->save($data));
  }
	
  public function delete ($id) {
		if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_permissoes']) || $_SESSION['user_permissoes'] != '*') {
			return $this->output
				->set_status_header(403)
				->set_content_type('application/json')
        ->set_output(json_encode(array('err' => 'Acesso não permitido', 'data' => $_SESSION)));
		}
		// echo "Deletando ".($_GET['id']);
		$this->contatos->delete($_GET['id']);
  }

}

/* End of file Contatos.php */
