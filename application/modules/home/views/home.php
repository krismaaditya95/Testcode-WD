<?php
$username = $this->session->userdata('username');
$role = $this->session->userdata('role');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Selamat datang, <?php echo $username; ?></title>
  </head>
  <body>
    <h4>Selamat datang, <?php echo $username; ?></h4>
    <h3>Anda adalah <?php echo $role; ?></h3>
    <a href="<?php echo base_url(); ?>index.php/user/logout">Logout</a>

  </body>
</html>
