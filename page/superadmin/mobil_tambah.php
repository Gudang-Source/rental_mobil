<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '0') {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->


<div class="content">
	<div class="font">

		<h1>TAMBAH DATA MOBIL</h1>
		<form action="action/mobil_tambah.php" method="post" enctype="multipart/form-data">
			<pre>
NO POLISI 	: <input type="text" name="no_polisi" required><br>
MERK      	: <input type="text" name="merk" required><br>
JENIS     	: <input type="text" name="jenis" required><br>
FOTO MOBIL	: <input type="file" name="foto_mobil" required><br>
KETERANGAN 	: <textarea name="keterangan" required></textarea><br>
HARGA SEWA 	: <input type="number" name="hrg_sewa" required><br>
			</pre>
			<button class="button button1" type="submit">SIMPAN</button>
			<button class="button button-info" type="reset">RESET</button>
		</form>
	</div>
</div>

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
