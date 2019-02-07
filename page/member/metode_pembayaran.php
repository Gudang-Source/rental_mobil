<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
    $query            = mysqli_query($con, "SELECT * FROM tbl_minimarket");
    $id_user          = $_SESSION['id_user'];
    $id_rental        = $_GET['id_rental'];
    $no_polisi        = $_GET['no_polisi'];
    $query2           = mysqli_query($con, "SELECT * FROM tbl_mobil where no_polisi='$no_polisi' ");
    $query_user       = mysqli_query($con, "SELECT * from tbl_user where id_user='$id_user' ");
    $query_rental     = mysqli_query($con, "SELECT * from tbl_rental where id_rental='$id_rental' ");

    $data_user        = mysqli_fetch_assoc($query_user);
    $data_mobil       = mysqli_fetch_assoc($query2);
    $data_rental      = mysqli_fetch_assoc($query_rental);

    if ($data_rental == null) {
        ?><script language="javascript">
      alert('data tidak tersedia');
      document.location = '../../index.php'
    </script>
    <?php
    }

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
		<h1>METODE PEMBAYARAN</h1><hr>
    <pre><h3>PILIH GERAI MINIMARKET</h3></pre>
    <form action="action/mobil_bayar.php" method="POST" id="formPembayaran"><br>
    <?php $no = 0; ?>
    <?php while ($data_minimarket = mysqli_fetch_assoc($query)) {
        $no ++;
        $idCaraPembayaran = 'text'.($data_minimarket['id_minimarket']); ?>
<?php echo $no; ?>. <input type="radio" value="<?php echo $data_minimarket['id_minimarket'] ?>" id="id_minimarket" name="id_minimarket" onclick="tampil_input_by_metode_pembayaran('<?php echo $idCaraPembayaran ?>')" required> <?php echo $data_minimarket['minimarket']; ?><br>
        <p id="<?php echo $idCaraPembayaran ?>" class='cara-pembayaran' data-value='<?php echo $data_minimarket['harga']; ?>' style="display:none; margin-left: 2%; border: 2px solid lightgray; padding: 3px;">
        * Pembayaran dapat dilakukan di gerai <?php echo $data_minimarket['minimarket']; ?> terdekat pilihan kamu.<br>
        * Tunjukkan Nomor Tagihan kepada kasir <?php echo $data_minimarket['minimarket']; ?>.<br>
        * Pihak <?php echo $data_minimarket['minimarket']; ?> akan mengenakan biaya tambahan sebesar Rp. <?php echo number_format($data_minimarket['harga']); ?> di luar total tagihan. </p>
       <?php } ?>
    <hr>
    <div style="color: green;">Saldo Kamu : Rp. <?php echo number_format($data_user['saldo']); ?></div><hr>
    <input type="checkbox" id='checkbox_saldo' onclick="muncul_input_saldo()"> BAYAR SEBAGIAN DENGAN SALDO <br>
<div id="div_input_saldo" style="display: none;"><pre>
  MASUKKAN NOMINAL                  : Rp. <input type="number" id="input_saldo" min="0" name='input_saldo' step="1000" onchange="handle_input_saldo(this)">
</pre></div><hr>
    <input type="text" id='saldo_anda' style="display:none" value='<?php echo $data_user['saldo']; ?>' >
    <input type="hidden" id='total_harga_get' name="" value="<?php echo $data_rental['ttl_harga'] ?>" disabled> <br>
<b><pre>
  TOTAL HARGA PINJAMAN MOBIL        : Rp. <?php echo number_format($data_rental['ttl_harga']); ?><br>
</pre></b>

    <div id='div_biaya_pelayanan' style="display:none">
<pre>
  BIAYA PELAYANAN                   : <input type="text" id='biaya_pelayanan' disabled><br>
</pre>
    </div>

    <div id='div_total_harga_rental' style="display:none">
<div style="color: red"><b><pre>
  TOTAL HARGA YANG HARUS DI BAYAR   : <input type="text" id='total_harga_rental' disabled>
</pre></b></div>
    <input type="hidden" id='total_harga_post' name="total_harga_post">
    <input type="hidden" name="id_rental" value="<?php echo $id_rental ?>">


  </div>
<input type="hidden" name="id_user"   value="<?php echo $id_user ?>">
<input type="hidden" name="no_hp"     value="<?php echo $data_user['no_hp']; ?>">
<input type="hidden" name="no_polisi" value="<?php echo $data_rental['no_polisi']; ?>">

  <input type="submit" class="button button-info" value="Bayar">
</form>

	</div>
</div>

<script>
 function tampil_input_by_metode_pembayaran(textId) {
     hitung_total();
  var total_harga_get      = document.getElementById('total_harga_get').value;
  var biaya_pelayanan      = document.getElementById('biaya_pelayanan');
  var total_harga_rental   = document.getElementById('total_harga_rental');
  var div_biaya_pelayanan  = document.getElementById('div_biaya_pelayanan');
  var div_total_harga_rental = document.getElementById('div_total_harga_rental');
  // var harga_minimarket     = document.getElementById('id_minimarket').getAttribute('data-value');
  var listCaraPembayaran   = document.querySelectorAll('.cara-pembayaran');


  for (let caraPembayaran of listCaraPembayaran) {
     caraPembayaran.style.display='none';
  }
  var text = document.getElementById(textId);
  text.style.display='block';
}

function muncul_input_saldo()
{
  var checkbox_saldo       = document.getElementById('checkbox_saldo');
  if(checkbox_saldo.checked == true)
  {
    div_input_saldo.style.display='block';
  }
  else
  {
    div_input_saldo.style.display='none';
  }
}

function hitung_total()
{
var total_harga_get        = document.getElementById('total_harga_get').value;
var input_saldo            = document.getElementById('input_saldo').value;
var total_harga_rental     = document.getElementById('total_harga_rental');
var total_harga_post       = document.getElementById('total_harga_post');
var biaya_pelayanan        = document.getElementById('biaya_pelayanan');
var div_total_harga_rental = document.getElementById('div_total_harga_rental');
var div_biaya_pelayanan    = document.getElementById('div_biaya_pelayanan');
var saldo_anda             = document.getElementById('saldo_anda').value;

var id_minimarket = document.getElementById("formPembayaran").elements.namedItem("id_minimarket").value;
var element_id_minimarket = 'text'+id_minimarket;
var element_minimarket = document.getElementById(element_id_minimarket);

let harga_biaya_pelayanan;

if(element_minimarket == null)
{
  harga_biaya_pelayanan = 0;
}
else
{
  harga_biaya_pelayanan = element_minimarket.getAttribute('data-value');
  div_biaya_pelayanan.style.display='block';
}
div_total_harga_rental.style.display='block';
var total_harga = parseInt(total_harga_get)+parseInt(harga_biaya_pelayanan)-input_saldo;
var format_total_harga = format_rupiah(total_harga);
var format_biaya_pelayanan= format_rupiah(harga_biaya_pelayanan)
biaya_pelayanan.value = format_biaya_pelayanan;
total_harga_rental.value = format_total_harga;
total_harga_post.value = total_harga;

}

function handle_input_saldo(input_saldo)
{
  var saldo_anda  = document.getElementById('saldo_anda').value;
  if(parseInt(input_saldo.value) > parseInt(saldo_anda))
  {
    input_saldo.value = saldo_anda;
  }
  hitung_total();
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
	document.location = '../../index.php'
</script>
<?php
    } ?>
