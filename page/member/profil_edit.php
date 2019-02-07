<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '2'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$id_user = $_GET['id_user'];
$query = mysqli_query($con, "SELECT * FROM tbl_user where id_user='$id_user' ");
$data = mysqli_fetch_assoc($query);
if($data['id_user'] == $_SESSION['id_user']){
?>


<div class="content">
	<div class="font">

		<h1>EDIT PROFIL</h1>
		<form action="action/profil_edit.php" method="post" enctype="multipart/form-data">
			<pre>
ID USER 		: <input type="text" value="<?php echo $data['id_user']; ?>" disabled><br>
USERNAME 		: <input type="text" name="username" value="<?php echo $data['username']; ?>" required><br>
PASSWORD 		: <input type="password" name="password" value="<?php echo base64_decode($data['password']); ?>" required><br>
RE-TYPE PASSWORD	: <input type="password" name="repassword" required><br>
NAMA  			: <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br>
ALAMAT			: <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required><br>
NO HP 			: <input type="number" name="no_hp" value="<?php echo $data['no_hp']; ?>" required><br>
FOTO KTP		: <input type="file" name="foto_ktp"><br>
FOTO KK			: <input type="file" name="foto_kk"><br>
HAK AKSES		: <input value="<?php if($_SESSION['hak_akses'] == 0) echo "Super Admin"; elseif($_SESSION['hak_akses'] == 1) echo "ADMIN"; else echo "Member"; ?>" disabled>
			</pre>
			<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
			<button class="button button1" type="submit">SIMPAN</button>
			<button class="button button-info" type="reset">RESET</button>
		</form>
	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php }else{ ?>
<script language="javascript">
	alert('AKSES DENIED!');
	document.location = 'profil.php'
</script>
<?php } ?>
<?php require_once('footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
