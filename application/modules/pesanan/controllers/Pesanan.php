<?php
class Pesanan extends MX_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('pesanan_m', 'pm');
  }

  public function index(){

  }

  public function loadpesanan(){
    $result = $this->pm->loadpesanan();
    $msg['success'] = false;

    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($result);
  }
}
?>
