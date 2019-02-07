<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$id_user = $_GET['id_user'];
$query = mysqli_query($con, "SELECT * FROM tbl_user where id_user='$id_user' ");
$data = mysqli_fetch_assoc($query);
?>


<div class="content">
	<div class="font">

		<h1>EDIT USER</h1>
		<form action="action/user_edit.php" method="post" enctype="multipart/form-data">
			<pre>
ID USER 		: <input type="text" value="<?php echo $data['id_user']; ?>" disabled><br>
USERNAME 		: <input type="text" name="username" value="<?php echo $data['username']; ?>" required><br>
PASSWORD 		: <input type="text" name="password" value="<?php echo base64_decode($data['password']); ?>" required><br>
NAMA  			: <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br>
ALAMAT			: <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required><br>
NO HP 			: <input type="number" name="no_hp" value="<?php echo $data['no_hp']; ?>" required><br>
FOTO KTP		: <input type="file" name="foto_ktp"><br>
FOTO KK			: <input type="file" name="foto_kk"><br>
<?php if($data['hak_akses'] != 0) { ?>
HAK AKSES		: <select name="hak_akses" required>
							<option value="1" <?php if($data['hak_akses'] == 1) echo "selected"?>>Admin</option>
							<option value="2" <?php if($data['hak_akses'] == 2) echo "selected"?>>Member</option>
							</select>
<?php } else { ?>
HAK AKSES		: <select name="hak_akses" required>
							<option value="0" selected hidden>Super Admin</option>
							</select>
<?php } ?>
			</pre>
			<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
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
