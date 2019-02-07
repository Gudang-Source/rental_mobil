<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->


<div class="content">
	<div class="font">

		<h1>TAMBAH USER</h1>
		<form action="action/user_tambah.php" method="post" enctype="multipart/form-data">
			<pre>
ID USER 		: <input type="text" value="AUTO" disabled><br>
USERNAME 		: <input type="text" name="username" required><br>
PASSWORD 		: <input type="text" name="password" required><br>
NAMA  			: <input type="text" name="nama" required><br>
ALAMAT			: <input type="text" name="alamat" required><br>
NO HP 			: <input type="number" name="no_hp" required><br>
FOTO KTP		: <input type="file" name="foto_ktp" required><br>
FOTO KK			: <input type="file" name="foto_kk" required><br>
HAK AKSES		: <select name="hak_akses" required>
							<option value="1">Admin</option>
							<option value="2">Member</option>
							</select>
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
