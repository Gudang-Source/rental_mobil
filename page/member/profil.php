<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_user = $_SESSION['id_user'];
    $query = mysqli_query($con, "SELECT * from tbl_user where id_user='$id_user'");
    $data = mysqli_fetch_assoc($query); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>PROFIL</h1>
		<pre>
ID USER 		: <input value="<?php echo $_SESSION['id_user']; ?>" disabled><br>
USERNAME 		: <input value="<?php echo $_SESSION['username']; ?>" disabled><br>
PASSWORD 		: <input type="password" value="<?php echo $_SESSION['password']; ?>" disabled><br>
NAMA  			: <input value="<?php echo $_SESSION['nama']; ?>" disabled><br>
ALAMAT			: <input value="<?php echo $_SESSION['alamat']; ?>" disabled><br>
NO HP 			: <input value="<?php echo $_SESSION['no_hp']; ?>" disabled><br>
TOTAL SALDO 		: <input value="Rp. <?php echo number_format($data['saldo']); ?>" disabled><br>
FOTO KTP		:
      			  <a href="../../assets/img/user/ktp/<?php echo $_SESSION['foto_ktp'] ?>"><img src="../../assets/img/user/ktp/<?php echo $_SESSION['foto_ktp'] ?>" width="10%" height="10%"></img></a><br>
FOTO KK			:
      			  <a href="../../assets/img/user/kk/<?php echo $_SESSION['foto_kk'] ?>"><img src="../../assets/img/user/kk/<?php echo $_SESSION['foto_kk'] ?>" width="10%" height="10%"></img></a><br>
HAK AKSES		: <input value="<?php if ($_SESSION['hak_akses'] == 0) {
        echo "Super Admin";
    } elseif ($_SESSION['hak_akses'] == 1) {
        echo "ADMIN";
    } else {
        echo "Member";
    } ?>" disabled>
</pre>
		<form action="profil_edit.php" method="get">
			<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
			<button type="submit" class="button button-info" >UBAH</button>
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
