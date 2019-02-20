<?php
class Template extends MX_Controller{

  function __construct(){
    parent::__construct();
  }

  function loadv($data=NULL, $page=NULL){
    // $this->load->view('content', $data);

    if($page != NULL){
      if ($this->session->userdata('is_loggedin') == true) {
        $this->load->view('header', $data);
        $this->load->view('content', $data);
      }else{
        $this->load->view($page, $data);
      }
      // $this->load->view($page, $data);
    }
    else{
      $this->load->view('content',$data);
    }
  }
}
?>
