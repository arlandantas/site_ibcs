<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos_model extends CI_Model {

  function getPage ($page, $qtd_page = 5) {
    $this->db->limit($qtd_page, ($page - 1) * $qtd_page);
    $this->db->order_by('dthr', 'DESC');
    return $this->db->get('contatos')->result();
  }

  function getCount () {
    return $this->db->count_all_results('contatos');
  }

  function save ($contato) {
    if (isset($contato->id)) {
      $this->db->where('id', $contato->id);
      $this->db->update('contatos', $contato);
    } else {
      $this->db->insert('contatos', $contato);
      $contato->id = $this->db->insert_id();
    }
    return $contato;
  }

  function delete ($id) {
    $this->db->where('id', $id);
    $this->db->delete('contatos');
    return $id;
  }

}

/* End of file Contatos_Model.php */
