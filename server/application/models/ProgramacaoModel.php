<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramacaoModel extends CI_Model {

  public function all () {
    return $this->db->get_where('programacoes', ['ativo' => 1])->result();
  }

}

/* End of file ProgramacaoModel.php */
