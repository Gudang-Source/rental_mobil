<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '0') {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$no_polisi = $_GET['no_polisi'];
    $query = mysqli_query($con, "SELECT * FROM tbl_mobil where no_polisi='$no_polisi' ");
    $data = mysqli_fetch_assoc($query); ?>


<div class="content">
	<div class="font">

		<h1>EDIT MOBIL</h1>
		<form action="action/mobil_edit.php" method="post" enctype="multipart/form-data">
			<pre>
NO POLISI 	: <input type="text" value="<?php echo $data['no_polisi']; ?>" disabled><br>
MERK      	: <input type="text" name="merk" value="<?php echo $data['merk']; ?>" required><br>
JENIS     	: <input type="text" name="jenis" value="<?php echo $data['jenis']; ?>" required><br>
FOTO MOBIL	: <input type="file" name="foto_mobil"><br>
KETERANGAN 	: <textarea name="keterangan" required><?php echo $data['keterangan']; ?></textarea><br>
HARGA SEWA 	: <input type="number" name="hrg_sewa" value="<?php echo $data['hrg_sewa']; ?>" required><br>
			</pre>
			<input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
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
