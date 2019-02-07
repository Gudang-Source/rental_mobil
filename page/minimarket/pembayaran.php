<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '3') {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>
			<center>INPUT KODE PEMBAYARAN</center>
		</h1>
		<form action="pembayaran_detail.php" method="get">
<pre>
KODE PEMBAYARAN   : <input type="text" name="kode_pembayaran" required> <button type="submit" class="button button1">CARI</button>
</pre>
    </form>
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
