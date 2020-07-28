<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Migrations_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    // Carrega biblioteca de manipulação do DB
    $this->load->dbforge();
    // Cria a tabela de versões
    $this->criar_tabela();
    // Carrega a versão atual
    $this->current_version = $this->get_current_version();
  }

  public function migrate () {
    if ($this->current_version < 0.1) {
      $this->dbforge->add_field('id');
      $this->dbforge->add_field([
        'nome' => array(
          'type' => 'TEXT',
          'null' => FALSE
        ),
        'descricao' => array(
          'type' => 'TEXT',
          'null' => TRUE
        ),
        'horario' => array(
          'type' => 'VARCHAR',
          'constraint' => '5',
          'null' => FALSE
        ),
        'dia_semana' => array(
          'type' => 'INT',
          'constraint' => '1',
          'null' => FALSE
        ),
      ]);
      $this->dbforge->create_table('programacoes', TRUE);
      $this->set_current_version(0.1);
    }
    return $this->current_version;
  }

  private function get_current_version () {
    $row = $this->db->query("SELECT value FROM versoes WHERE nome = 'DB'")->row();
    return $row ? $row->value : 0;
  }

  private function set_current_version ($version = 0) {
    $exec = $this->db->query("INSERT INTO versoes (nome, value) VALUES ('DB', ?)
      ON DUPLICATE KEY UPDATE value = VALUES(value)", [$version]);
    if ($exec) {
      $this->current_version = $version;
      return $version;
    } else {
      throw new Exception("Não conseguimos atualizar a versão do banco!");
    }
  }

  private function criar_tabela () {
    $this->dbforge->add_field([
      'nome' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
        'unique' => TRUE,
      ),
      'value' => array(
        'type' => 'VARCHAR',
        'constraint' => 10
      ),
    ]);
    $this->dbforge->create_table('versoes', TRUE);
  }

}

/* End of file Migrations_model.php */
