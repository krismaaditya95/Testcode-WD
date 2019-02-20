<?php
class User_m extends CI_Model{

  public function login($data){
    $query = $this->db->get_where('users', array('username'=>$data['username'], 'password'=>$data['password']));
    // return $query->num_rows();

    if($query->num_rows() != 1){
      return false;
    }
    else {
      return $query->row();
    }

  }
}
?>
