<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

  function getAll () {
    return $this->db
      ->select('name, username, ativo, permissoes, id')
      ->get('users')->result();
  }

  function getFromLogin ($username, $password) {
    $user = $this->db
      ->where('username', $username)
      ->get('users')
      ->result();
    if (!count($user)) {
      throw new Exception('Usuário inválido!');
    } else if (!password_verify($password, $user[0]->password)) {
      throw new Exception('Usuário/senha inválidos!');
    } else {
      return $user[0];
    }
  }

  function save ($user) {
    // return $user;
    $this->db->set('name', $user->name);
    $this->db->set('username', $user->username);
    $this->db->set('permissoes', $user->permissoes);
    $this->db->set('ativo', $user->ativo);
    if ($user->id) {
      if ($user->password) {
        $this->db->set('password', password_hash($user->password, PASSWORD_DEFAULT));
      }
      $this->db->where('id', $user->id);
      $this->db->update('users');
    } else {
      $this->db->set('password', password_hash($user->password ?: $user->username, PASSWORD_DEFAULT));
      $this->db->insert('users');
      $user->id = $this->db->insert_id();
    }
    return $user;
  }

  function delete ($id) {
    $this->db->where('id', $id);
    $this->db->delete('users');
    return $id;
  }

}

/* End of file Users_model.php */
