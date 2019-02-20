<?php
class Pesanan_m extends CI_Model{

  public function loadpesanan(){

    $query = $this->db->get('pesanan');
    // $query = $this->db->get_where('pesanan', array('status' => '1'));
    return $query->result();

  }
}
?>
