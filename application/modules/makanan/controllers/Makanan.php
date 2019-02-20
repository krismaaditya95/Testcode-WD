<?php
class Makanan extends MX_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('makanan_m', 'mkn');
  }

  public function index(){

  }

  public function loadmakanan(){
    $result = $this->mkn->loadmakanan();
    $msg['success'] = false;

    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($result);
  }
}
?>
