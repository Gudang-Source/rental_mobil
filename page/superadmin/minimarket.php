<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysqli_query($con, "select * from tbl_minimarket");
?>

<div class="content">
	<div class="font">

		<h1>
			<center>DATA MINIMARKET</center>
		</h1>
		<a href="minimarket_tambah.php"><button class="button button1">+ Tambah</button></a>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>ID MINIMARKET</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>NAMA</th>
				<th>KODE</th>
				<th>HARGA</th>
				<th>SALDO</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['id_minimarket'];  ?>
				</td>
				<td>
					<?php echo $data['username'];  ?>
				</td>
				<td>
					<?php echo $data['password'];  ?>
				</td>
				<td>
					<?php echo $data['minimarket'];  ?>
				</td>
				<td>
					<?php echo $data['kode_minimarket']; ?>
				</td>
				<td>
					<?php echo $data['harga']; ?>
				</td>
				<td>
					<?php echo $data['saldo']; ?>
				</td>
				<td>
					<form action="minimarket_edit.php" method="get">
						<input type="hidden" name="id_minimarket" value="<?php echo $data['id_minimarket']; ?>">
						<input type="submit" class="button button-info" value="Edit">
					</form>
				</td>
				<td>
					<form action="action/minimarket_hapus.php" method="get">
						<input type="hidden" name="id_minimarket" value="<?php echo $data['id_minimarket']; ?>">
						<input type="submit" name="submit" class="button button-danger" value="Hapus">
					</form>
				</td>
			</tr>
			<?php
}
?>
		</table>

	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
