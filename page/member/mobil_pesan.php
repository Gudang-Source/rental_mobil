<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
    $no_polisi  = base64_decode($_GET['no_polisi']);
    $id_user    = $_SESSION['id_user'];
    $query      = mysqli_query($con, "SELECT * FROM tbl_minimarket");
    $query2     = mysqli_query($con, "SELECT * FROM tbl_mobil where no_polisi='$no_polisi' ");
    $query_user = mysqli_query($con, "SELECT * from tbl_user where id_user='$id_user' ");
    $data_user  = mysqli_fetch_assoc($query_user);
    $data_mobil = mysqli_fetch_assoc($query2);
    if ($data_mobil['status'] == 1) {
        ?><script language="javascript">
        alert('mobil tidak tersedia');
        document.location = '../../index.php'
      </script>
      <?php
    } ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>PEMESANAN</h1><hr>
<form action="action/mobil_pesan.php" method="post">
<pre>
<h2>BIODATA PEMESAN</h2>
NAMA  			: <?php echo $_SESSION['nama']; ?><br>
NO HP 			: <?php echo $_SESSION['no_hp']; ?><br>
FOTO KTP		:
      			  <a href="../../assets/img/user/ktp/<?php echo $_SESSION['foto_ktp'] ?>"><img src="../../assets/img/user/ktp/<?php echo $_SESSION['foto_ktp'] ?>" width="10%" height="10%"></img></a><br>
FOTO KK			:
      			  <a href="../../assets/img/user/kk/<?php echo $_SESSION['foto_kk'] ?>"><img src="../../assets/img/user/kk/<?php echo $_SESSION['foto_kk'] ?>" width="10%" height="10%"></img></a><br>
<div style="color: green;"><b>SALDO ANDA		: Rp.<?php echo number_format($data_user['saldo']); ?></b></div>

<hr><h2>SYARAT PEMESANAN</h2>
<p style="border: 2px solid lightgray; padding: 3px">
1.Minimal memesan mobil 1 hari setelah hari ini <br>
2.Maximal memesan mobil 7 hari<br>
3.Pengambilan mobil di mulai dari jam 7 pagi sampai dengan jam 10 malam <br>
</p>
<h2>DETAIL PEMESANAN</h2>
<div style="color: red;"><b>HARGA SEWA MOBIL        : Rp. <?php echo number_format($data_mobil['hrg_sewa']); ?></b></div>
TANGGAL MULAI RENTAL    : <input type="date" name="tgl_rental"  min="<?php echo date('Y-m-d', time() + (60 * 60 * 24)); ?>" required
max="<?php echo date('Y-m-d', time() + (60 * 60 * 24 * 7)); ?>" onchange="hitung_jumlah_hari()"  id="tgl_rental" >
TANGGAL SELESAI RENTAL  : <input type="date" name="tgl_kembali" min="<?php echo date('Y-m-d', time() + (60 * 60 * 24 * 2)); ?>" required
max="<?php echo date('Y-m-d', time() + (60 * 60 * 24 * 8)); ?>" onchange="hitung_jumlah_hari()"  id="tgl_kembali">

<hr><h2>RIGNKASAN PEMESANAN</h2></pre>
<div id='ringkasan_pemesanan' style="display:none">

<pre>
TOTAL HARI RENTAL       : <input type="text"  id="total_hari_rental" name="total_hari_rental" disabled>
</pre>

<div id='saldo_anda' style="display:none">
<pre>
SALDO ANDA              : <input type="text" name="saldo" value="<?php echo "Rp.".number_format($data_user['saldo']); ?>" disabled>
</pre>
<input type="hidden" id="saldo" name="saldo" value="<?php echo $data_user['saldo']; ?>" disabled>
</div>

<pre>
TOTAL HARGA             : <input type="text"  id="total_harga" name="total_harga" disabled>
</pre>

<input type="hidden"  id="total_harga_get" name="total_harga_get">

<div id ='kembalian_saldo' style="display:none">
<pre>
SISA SALDO              : <input type="text"  id="sisa_saldo" name="sisa_saldo" disabled>
</pre>
</div>

</div>

<pre>
<h3 id='error_tanggal' style="display:block; color: red;">NOTE: INPUT TANGGAL / TANGGAL MULAI TIDAK BOLEH LEBIH BESAR ATAU SAMA DENGAN TANGGAL SELESAI</h3>
</pre>

<input type="hidden" id="hrg_sewa" name="hrg_sewa" value="<?php echo $data_mobil['hrg_sewa']; ?>" disabled>

<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
<input type="hidden" name="no_polisi" value="<?php echo $no_polisi ?>">
<input type="hidden" id='tgl_kembali_post'name="tgl_kembali">
<input type="hidden" id='tgl_rental_post' name="tgl_rental">
<input type="hidden" id="total_harga_post" name="total_harga">
<button type="submit" class="button button-info"
id="pilih_metode_pembayaran" style="display:none">Pilih Metode Pembayaran</button>
  </form>

  <form action="action/bayar_dengan_saldo.php" method="post">
    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
    <input type="hidden" name="no_polisi" value="<?php echo $no_polisi ?>">
    <input type="hidden" id='tgl_kembali_post_saldo'name="tgl_kembali">
    <input type="hidden" id='tgl_rental_post_saldo' name="tgl_rental">
    <input type="hidden" id="total_harga_post_saldo" name="total_harga">
    <button type="submit" class="button button-info"
    id="bayar_dengan_saldo" style="display:none">Bayar Dengan Saldo</button>
  </form>

	</div>
</div>

<script type="text/javascript">
  function hitung_jumlah_hari()
  {
    var tgl_rental  = document.getElementById('tgl_rental').value;
    var tgl_kembali = document.getElementById('tgl_kembali').value;
    var hrg_sewa    = document.getElementById('hrg_sewa').value;
    var saldo       = document.getElementById('saldo').value;
    var sisa_saldo  = document.getElementById('sisa_saldo');
    var tgl_kembali_post    = document.getElementById('tgl_kembali_post');
    var tgl_rental_post     = document.getElementById('tgl_rental_post');
    var total_harga_post    = document.getElementById('total_harga_post');
    var tgl_kembali_post_saldo    = document.getElementById('tgl_kembali_post_saldo');
    var tgl_rental_post_saldo     = document.getElementById('tgl_rental_post_saldo');
    var total_harga_post_saldo    = document.getElementById('total_harga_post_saldo');
    var total_harga         = document.getElementById('total_harga');
    var total_harga_get     = document.getElementById('total_harga_get');
    var total_hari_rental   = document.getElementById('total_hari_rental');
    var bayar_dengan_saldo  = document.getElementById('bayar_dengan_saldo');
    var saldo_anda          = document.getElementById('saldo_anda');
    var kembalian_saldo     = document.getElementById('kembalian_saldo');
    var ringkasan_pemesanan = document.getElementById('ringkasan_pemesanan');
    var pilih_metode_pembayaran = document.getElementById('pilih_metode_pembayaran');
    var error_tanggal       = document.getElementById('error_tanggal');


    var date_rental   = new Date(tgl_rental);
    var date_kembali  = new Date(tgl_kembali);

    var diff        = date_kembali-date_rental;
    const oneDay    = (1000 * 60 * 60 * 24);
    var jumlah_hari = Math.floor(diff / oneDay);
    var harga       = jumlah_hari * hrg_sewa;
    var kembalian   = saldo-harga;

    var format_harga     = format_rupiah(harga);
    var format_kembalian = format_rupiah(kembalian);

    if(jumlah_hari > 0 && diff > 0)
    {
      ringkasan_pemesanan.style.display ='inline-block';
      total_hari_rental.value           = jumlah_hari + " Hari " ;
      total_harga.value                 =  format_harga;
      total_harga_get.value             =  harga;
      error_tanggal.style.display       = 'none';
      pilih_metode_pembayaran.style.display = 'none';
      // total_hari_rental.style.display   ='inline-block';
      // total_harga.style.display='inline-block';

      if(harga <= saldo)
      {
        saldo_anda.style.display          ='block';
        kembalian_saldo.style.display     ='block';
        bayar_dengan_saldo.style.display  ='block';
        error_tanggal.style.display       ='none';
        sisa_saldo.value                  = format_kembalian;
        tgl_rental_post_saldo.value   = tgl_rental;
        tgl_kembali_post_saldo.value  = tgl_kembali;
        total_harga_post_saldo.value  = harga;
      }
      else
      {
          bayar_dengan_saldo.style.display  ='none';
          kembalian_saldo.style.display     ='none';
          saldo_anda.style.display          ='none';
          error_tanggal.style.display       ='none';
          pilih_metode_pembayaran.style.display = 'block';
          tgl_rental_post.value   = tgl_rental;
          tgl_kembali_post.value  = tgl_kembali;
          total_harga_post.value = harga;
      }
    }
    else
    {
      ringkasan_pemesanan.style.display = 'none';
      bayar_dengan_saldo.style.display  = 'none';
      pilih_metode_pembayaran.style.display = 'none';
      error_tanggal.style.display       ='block';
    }

  }


  function format_rupiah(angka)
  {
    var reverse = angka.toString().split('').reverse('').join('');
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = "Rp."+ribuan.join('.').split('').reverse('').join('');
        return ribuan;
  }

</script>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php
} else {
        ?>
<script language="javascript">
  alert("silahkan login terlebih dahulu");
	document.location = '../../login.php'
</script>
<?php
    } ?>
