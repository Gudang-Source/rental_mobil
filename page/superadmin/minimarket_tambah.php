<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->


<div class="content">
	<div class="font">

		<h1>TAMBAH MINIMARKET</h1>
		<form action="action/minimarket_tambah.php" method="post" enctype="multipart/form-data">
			<pre>
USERNAME 		: <input type="text" name="username" required><br>
PASSWORD 		: <input type="text" name="password" required><br>
NAMA  			: <input type="text" name="minimarket" required><br>
KODE  			: <input type="text" name="kode_minimarket" required><br>
Harga 			: <input type="number" name="harga" required><br>
			</pre>
			<button class="button button1" type="submit">SIMPAN</button>
			<button class="button button-info" type="reset">RESET</button>
		</form>
	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
