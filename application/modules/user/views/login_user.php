<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login pengguna Restoran</title>
  </head>
<link rel="stylesheet" href="<?php echo CSS_PATH; ?>loginpage.css">
<script src="<?php echo JS_PATH; ?>jquery/3.3.1/jquery.min.js"></script>
  <body>
    <!-- <h5><?php //echo $content; ?></h5> -->
    <?php //echo base_url(); ?>

    <form id="formlogin" method="post">
      <h4 class="pagetitle"><?php echo $title; ?></h4>

      <label for="username">Username</label>
      <input type="text" name="username" id="txtUsername">

      <label for="password">Password</label>
      <input type="password" name="password" id="txtPassword">

      <!-- <input type="submit" id="btnLogin" value="Login"> -->
      <!-- <input type="submit" value="Login" id="submit"> -->

      <button type="button" id="btnLogin">Login</button>
      <!-- <button type="button" id="btnLogin"><span id="txtLogin"></span></button> -->

      <div id="error_message"><div id="the_msg"></div></div>
    </form>

  </body>
  <script>
  $(document).ready(function(){
    $('#txtLogin').html('Login');
    // $('.formlogin').attr('action','http://localhost/aplikasi_kasir_adit/index.php/user/login');

    var inputUser = document.getElementById("txtUsername");
    var inputPass = document.getElementById("txtPassword");
    var home = "http://localhost/aplikasi_kasir_adit/";

    inputUser.addEventListener("keyup", function(usertypingevent){
      usertypingevent.preventDefault();
      if(usertypingevent.keyCode === 13){
        document.getElementById("btnLogin").click();
      }
    });

    inputPass.addEventListener("keyup", function(passtypingevent){
      passtypingevent.preventDefault();
      if(passtypingevent.keyCode === 13){
        document.getElementById("btnLogin").click();
      }
    });

    $('#btnLogin').click(function(){
      // var user = $("#username").val();
      // var pass = $("#password").val();

      var usnm = $('input[name = username]');
      var pswd = $('input[name = password]');

      // var url = $("#formlogin").attr('action');
      var url = "http://localhost/aplikasi_kasir_adit/index.php/user/login";

      var data = $("#formlogin").serialize();

      // if(user =='' || pass==''){
        if(usnm.val() =='' || pswd.val() ==''){
        // alert('BOM');
        $("div#error_message").show();
        $("div#the_msg").html("Semua field harus diisi!");
      }
      else{
        $.ajax({
          type: 'ajax',
          method: 'post',
          url: url,
          data: data,
          async: false,
          dataType: "json",
          success: function(result){
            $.each(result, function(index,item){
              var username_loggedin = item.username;
              var success_msg = item.success;

              if (success_msg == true) {
                // alert('berhasil');
                $("div#the_msg").html("Login Berhasil.");
                window.location.href = home;
              }else if (success_msg == false){
                $("div#error_message").show();
                $("div#the_msg").html("Login gagal. Username atau password salah.");
              }
            });
            //aaaaaa
          },
          error: function(){
            $("div#the_msg").html("Login error.");
          }
        });
      }
    });
  });
  </script>
</html>
