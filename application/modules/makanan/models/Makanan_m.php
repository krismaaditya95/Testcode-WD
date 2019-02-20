<?php
class Makanan_m extends CI_Model{

  public function loadmakanan(){

    $query = $this->db->get('menu_makanan');
    return $query->result();

  }
}
?>
