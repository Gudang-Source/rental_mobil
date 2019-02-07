<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '1'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>PROFIL SUPER ADMIN</h1>
		<pre>
ID USER 		: <input value="<?php echo $_SESSION['id_user']; ?>" disabled><br>
USERNAME 		: <input value="<?php echo $_SESSION['username']; ?>" disabled><br>
PASSWORD 		: <input type="password" value="<?php echo $_SESSION['password']; ?>" disabled><br>
NAMA  			: <input value="<?php echo $_SESSION['nama']; ?>" disabled><br>
ALAMAT			: <input value="<?php echo $_SESSION['alamat']; ?>" disabled><br>
NO HP 			: <input value="<?php echo $_SESSION['no_hp']; ?>" disabled><br>
FOTO KTP		:
      			  <a href="../../assets/img/user/ktp/<?php echo $_SESSION['foto_ktp'] ?>"><img src="../../assets/img/user/ktp/<?php echo $_SESSION['foto_ktp'] ?>" width="10%" height="10%"></img></a><br>
FOTO KK			:
      			  <a href="../../assets/img/user/kk/<?php echo $_SESSION['foto_kk'] ?>"><img src="../../assets/img/user/kk/<?php echo $_SESSION['foto_kk'] ?>" width="10%" height="10%"></img></a><br>
HAK AKSES		: <input value="<?php if($_SESSION['hak_akses'] == 0) echo "Super Admin"; elseif($_SESSION['hak_akses'] == 1) echo "ADMIN"; else echo "Member"; ?>" disabled>
</pre>
		<form action="profil_edit.php" method="get">
			<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
			<button type="submit" class="button button-info" >UBAH</button>
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
