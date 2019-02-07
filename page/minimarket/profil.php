<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '3') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_minimarket = $_SESSION['id_minimarket'];
    $query = mysqli_query($con, "SELECT * from tbl_minimarket where id_minimarket='$id_minimarket'");
    $data = mysqli_fetch_assoc($query); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>PROFIL MINIMARKET</h1>
		<pre>
ID MINIMARKET 		: <input value="<?php echo $_SESSION['id_minimarket']; ?>" disabled><br>
USERNAME 		: <input value="<?php echo $_SESSION['username']; ?>" disabled><br>
PASSWORD 		: <input type="password" value="<?php echo $_SESSION['password']; ?>" disabled><br>
NAMA MINIMARKET         : <input value="<?php echo $_SESSION['minimarket']; ?>" disabled><br>
KODE MINIMARKET         : <input value="<?php echo $data['kode_minimarket']; ?>" disabled><br>
HARGA	                : <input value="<?php echo $_SESSION['harga']; ?>" disabled><br>
TOTAL SALDO             : <input value="<?php echo $data['saldo']; ?>" disabled><br>
</pre>
		<form action="profil_edit.php" method="get">
			<input type="hidden" name="id_minimarket" value="<?php echo $_SESSION['id_minimarket'] ?>">
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
	document.location = '../../minimarket.php'
</script>
<?php
    } ?>
