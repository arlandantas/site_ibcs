<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

  function getAll () {
    return $this->db->get('users')->result();
  }

  function getFromLogin ($username, $password) {
    $user = $this->db
      ->where('username', $username)
      ->get('users')
      ->result()[0];
    if (!$user) {
      throw new Exception('Usuário inválido!');
    } else if (!password_verify($password, $user->password)) {
      throw new Exception('Usuário/senha inválidos!');
    } else {
      return $user;
    }
  }

}

/* End of file Users_model.php */
