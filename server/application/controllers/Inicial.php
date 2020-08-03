<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {
	public function index() {
		echo "Olá! :)";
	}
	public function admin () {
		$this->load->library('session');
		if (!isset($_SESSION['user_id'])) {
      redirect('login');
		}
		$this->load->view('header');
		$this->load->view('footer');
	}
	public function migrate () {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->input->post('password') === NULL) {
				echo "Preciso que você me informe uma senha válida!";
			} else if ($this->input->post('password') != $_ENV['DB_PASS']) {
				echo "Senha incorreta!";
			} else {
				$this->load->model('Migrations_model', 'migrations');
				echo "Banco de Dados atualizado para a versão {$this->migrations->migrate()}";
			}
		}
		echo '<form method="POST">
			<label>Para fazer a migração, informe a senha do DB:</label>
			<input name="password" id="password" type="password" />
			<button type="submit">Migrar</button>
		</form>';
	}
}
