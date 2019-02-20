<?php
class Home extends MX_Controller{

  function __construct(){
    parent::__construct();
  }

  function index(){
    if ($this->session->userdata('is_loggedin') == true) {
      // $this->load->view('home');
      $data['username'] = $this->session->userdata('username');
      $data['role'] = $this->session->userdata('role');
      $page;

      if ($data['role'] == 'Kasir') {
        // $page = 'kasir/kasir';
        echo modules::run('kasir');
      }elseif($data['role'] == 'Pelayan'){
        // $page = 'pelayan/pelayan';
        echo modules::run('pelayan');
      }
      // echo modules::run('template/loadv', $data, $page);

    }else{
      echo modules::run('user');
    }
  }
}
?>
