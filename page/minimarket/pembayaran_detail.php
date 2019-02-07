<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '3') {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$kode_pembayaran = $_GET['kode_pembayaran'];
    $id_minimarket = $_SESSION['id_minimarket'];
    $query = mysqli_query($con, "SELECT * FROM tbl_rental INNER JOIN
  tbl_user on tbl_rental.id_user=tbl_user.id_user where kode_pembayaran='$kode_pembayaran' and id_minimarket='$id_minimarket' and status='2' ");
    $data = mysqli_fetch_assoc($query); ?>

<div class="content">
	<div class="font">

		<h1>
			<center>DETAIL PEMBAYARAN</center>
		</h1>
<?php if ($data != null) {
        ?>
<form action="action/pembayaran_diterima.php" method="post" enctype="multipart/form-data">
  <pre>
KODE PEMBAYARAN : <font style="color: black;"><?php echo $data['kode_pembayaran']; ?></font><br>
NAMA            : <font style="color: green;"><?php echo $data['nama']; ?></font><br>
TOTAL HARGA     : <font style="color: red;">Rp.<?php echo number_format($data['ttl_harga']); ?></font><br>
  </pre>
  <hr>
  <input type="hidden" name="id_rental" value="<?php echo $data['id_rental']; ?>">
  <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
  <input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
  <input type="hidden" name="id_minimarket" value="<?php echo $data['id_minimarket']; ?>">
  <input type="hidden" name="ttl_harga" value="<?php echo $data['ttl_harga']; ?>">
  <input type="hidden" name="nama" value="<?php echo $data['nama']; ?>">
  <button class="button button1" type="submit">TERIMA</button>
  <a href="pembayaran.php" class="button button-info">KEMBALI</a>
</form>
<?php
    } else {
        ?>
  <pre>
<font style="color: red;">TIDAK ADA DATA TERSEDIA, CEK KEMBALI KODE PEMBAYARAN</font><br>
  </pre>
  <hr>
  <a href="pembayaran.php" class="button button-info">KEMBALI</a>
<?php
    } ?>
	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php
} else {
        ?>
<script language="javascript">
	document.location = '../../minimarket.php'
</script>
<?php
    } ?>
