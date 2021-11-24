<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Users Model 
 *
 * @author Team TechArise
 *
 * @email info@techarise.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users_model extends CI_Model {
  // declare private variable
  private $_userID;
  private $_name;
  private $_userName;
  private $_email;
  private $_password;
  private $_status;
   
  public function setUserID($userID) {
    $this->_userID = $userID;
  }  
  public function setEmail($email) {
    $this->_email = $email;
  }
  public function setPassword($password) {
    $this->_password = $password;
  }       
 
  public function getUserInfo() {
    $this->db->select(array('*'));
    $this->db->from('systemuser');
    $this->db->where('user_id', $this->_userID);
    $query = $this->db->get();
    return $query->row_array();
  } 
  function login() {
    $this -> db -> select('user_id, concat(lname, ' ', fname) as name, username, email');
    $this -> db -> from('systemuser');
    $this -> db -> where('email', $this->_email);
    $this -> db -> where('password', $this->_password);
    $this -> db -> limit(1);
    $query = $this -> db -> get();
    if($query -> num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }    
}
?>