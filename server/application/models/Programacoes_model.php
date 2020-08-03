<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Programacoes_model extends CI_Model {

  public function all () {
    return $this->db->get_where('programacoes', ['ativo' => 1])->result();
  }

  function getAll () {
    return $this->db->get('programacoes')->result();
  }

  function save ($programacao) {
    $this->db->set('nome', $programacao->nome);
    $this->db->set('descricao', $programacao->descricao);
    $this->db->set('horario', $programacao->horario);
    $this->db->set('dia_semana', $programacao->dia_semana);
    $this->db->set('ativo', $programacao->ativo);
    if ($programacao->id) {
      $this->db->where('id', $programacao->id);
      $this->db->update('programacoes');
    } else {
      $this->db->insert('programacoes');
      $programacao->id = $this->db->insert_id();
    }
    return $programacao;
  }

  function delete ($id) {
    $this->db->where('id', $id);
    $this->db->delete('programacoes');
    return $id;
  }

}

/* End of file ProgramacaoModel.php */
