<?php
class User extends MX_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('user_m', 'um');
  }

  function index(){
    $data['title'] = 'Login pengguna';
    // $data['content'] = 'Buat ngetes';
    $page = 'user/login_user';
    echo modules::run('template/loadv', $data, $page);
    // $this->load->view('login_user', $data);
  }

  public function login(){
		$data['username'] = $this->input->post('username');
    $data['password'] = $this->input->post('password');

    $msg['success'] = false;
    $result = $this->um->login($data);

    if($result){
      $msg['success'] = true;
      $user_id = $result->users_id;
      $username = $result->username;
      $role = $result->role;

      $this->session->set_userdata('username', $username);
      $this->session->set_userdata('role', $role);
      $this->session->set_userdata('is_loggedin', true);

      // redirect('home/index');

      // $data_kasir = array(
      //   'title' => 'Kasir',
      //   'content' => 'Isi content'
      // );
      //
      // $page_kasir = 'kasir/kasir';
      // $page_pelayan = 'pelayan/pelayan';
      //
      // if($role == "Kasir"){
      //   modules::run('template/loadv', $data_kasir, $page_kasir);
      // }elseif($role == "Pelayan"){
      //   echo modules::run('pelayan');
      // }
    }
    echo json_encode(array($msg, $result));
	}

  // public function submit(){
	// 	$result = $this->um->login();
	// 	$msg['success'] = false;
	// 	if($result){
	// 		$msg['success'] = true;
  //
  //     $user_id = $result->user_id;
  //     $user_name = $result->user_name;
  //
  //     $this->session->set_userdata('user_id', $user_id);
  //     $this->session->set_userdata('user_name', $user_name);
	// 	}
	// 	echo json_encode(array($msg , $result));
	// 	// echo json_encode($msg);
	// }

  function logout(){
    $this->session->sess_destroy();
    $this->session->set_userdata('logged_in', false);
    redirect($this);
  }
}
?>
