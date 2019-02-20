<body>
  <nav>
    <!-- <a class="navlink left" href="#">Menu 1</a> -->
    <a class="navlink left" href="#">Aplikasi Restoran</a>

    <a class="navlink right" href="<?php echo base_url(); ?>index.php/user/logout">Logout</a>
    <a class="userindicator right">Selamat datang, <?php echo $username."(".$role.")"; ?></a>
  </nav>

<div class="main-content">

  <div class="div-pesanan">
    <h3>Daftar Pesanan</h3>
    <button class="crud-button" type="button" name="button">Refresh</button>
    <button class="crud-button" type="button" name="button">Tambah Pesanan Baru</button>
    <table id="tabel-pesanan">
      <tr>
        <th>No. Pesanan</th>
        <th>No. Meja</th>
        <th>Status</th>
        <th colspan="3">Action</th>
      </tr>
    </table>
  </div>

  <div class="div-makanan">
    <h3>Daftar Makanan</h3>
    <button class="crud-button" type="button" name="button">Refresh</button>
    <button class="crud-button" type="button" name="button">Tambah Menu</button>
  </div>

  <div class="div-minuman">
    <h3>Daftar Minuman</h3>
    <button class="crud-button" type="button" name="button">Refresh</button>
    <button class="crud-button" type="button" name="button">Tambah Menu</button>
  </div>



  <?php //echo $makanan; ?>
</div>

  </body>
</html>

<script type="text/javascript">
$(document).ready(function(){

  loadmakanan();
  loadminuman();
  loadpesanan();

   function loadmakanan(){
    var url = "http://localhost/aplikasi_kasir_adit/index.php/makanan/loadmakanan";
    $.ajax({
      type: 'get',
      url: url,
      dataType: 'json',
      success: function(data){
        var html = '';
        var status = '';

        for (var i = 0; i < data.length; i++) {

          html += '<tr>'+
          '<td class="td-namaitem">'+data[i].nama_makanan+'</td>'+
          '<td class="td-harga">Rp. '+data[i].harga+'</td>'+
          '<td class="td-status"><button title="tandai Ready atau tidak ready">'+data[i].status+'</button></td>'+
          '<hr>'+
          '</tr>';
        }
        $('.div-makanan').append(html);
      },
      error: function(){
        alert('Gagal fetch data makanan');
      }
    });
  }
  //-------------------------

  function loadminuman(){
    var url = "http://localhost/aplikasi_kasir_adit/index.php/minuman/loadminuman";
    $.ajax({
      type: 'get',
      url: url,
      dataType: 'json',
      success: function(data){
        var html = '';
        for (var i = 0; i < data.length; i++) {
          html += '<tr>'+
          '<td class="td-namaitem">'+data[i].nama_minuman+'</td>'+
          '<td class="td-harga">Rp. '+data[i].harga+'</td>'+
          '<td class="td-status"><button title="tandai Ready atau tidak ready">'+data[i].status+'</button></td>'+
          '<hr>'+
          '</tr>';
        }
        $('.div-minuman').append(html);
      },
      error: function(){
        alert('Gagal fetch data minuman');
      }
    });
  }

  //-------------------------

  function loadpesanan(){
    var url = "http://localhost/aplikasi_kasir_adit/index.php/pesanan/loadpesanan";
    $.ajax({
      type: 'get',
      url: url,
      dataType: 'json',
      success: function(data){
        var html = '';
        var status = '';


        for (var i = 0; i < data.length; i++) {
          if (data[i].status == '1') {
            status = '<span class="aktif">Aktif</span>';
          }else{
            status = '<span class="tidak-aktif">Tidak Aktif</span>';
          }

          html += '<tr>'+
          '<td class="td-namaitem">'+data[i].nomor_pesanan+'</td>'+
          '<td class="td-harga">'+data[i].meja+'</td>'+
          '<td class="td-status"><button title="Proses/Nonaktifkan pesanan">'+status+'</button></td>'+
          '<td><button>Detail</button></td>'+
          '<td><button>Edit</button></td>'+
          '<td><button>Hapus</button></td>'+
          '<hr>'+
          '</tr>';
        }
        $('#tabel-pesanan').append(html);
      },
      error: function(){
        alert('Gagal fetch data pesanan');
      }
    });
  }

});
</script>
