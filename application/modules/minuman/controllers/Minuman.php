<?php
class Minuman extends MX_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('minuman_m', 'mnm');
  }

  public function index(){

  }

  public function loadminuman(){
    $result = $this->mnm->loadminuman();
    $msg['success'] = false;

    if ($result) {
      $msg['success'] = true;
    }
    echo json_encode($result);
  }
}
?>
