<?php
class Pelayan extends MX_Controller{

  function __construct(){
    parent::__construct();
  }

  public function index(){
    // $this->load->view('pelayan');

    $page = 'template/content';
    $data['username'] = $this->session->userdata('username');
    $data['role'] = $this->session->userdata('role');
    $data['akses'] = array(
    );

    // $data['makanan'] = modules::run('makanan/loadmakanan');

    echo modules::run('template/loadv', $data, $page);
  }
}
?>
