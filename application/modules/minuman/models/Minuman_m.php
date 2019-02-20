<?php
class Minuman_m extends CI_Model{

  public function loadminuman(){

    $query = $this->db->get('menu_minuman');
    return $query->result();

  }
}
?>
