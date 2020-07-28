<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramacaoModel extends CI_Model {

  public function all () {
    return $this->db->query('select * from programacao_semanal')->result();
  }

}

/* End of file ProgramacaoModel.php */
