<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysqli_query($con, "select * from tbl_user");
?>

<div class="content">
	<div class="font">

		<h1>
			<center>DATA USER</center>
		</h1>
		<a href="user_tambah.php"><button class="button button1">+ Tambah</button></a>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>ID USER</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
				<th>NO HP</th>
				<th>FOTO KTP</th>
				<th>FOTO KK</th>
				<th>SALDO</th>
				<th>HAK AKSES</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['id_user'];  ?>
				</td>
				<td>
					<?php echo $data['username'];  ?>
				</td>
				<td>
					<?php echo base64_decode($data['password']);  ?>
				</td>
				<td>
					<?php echo $data['nama'];  ?>
				</td>
				<td>
					<?php echo $data['alamat']; ?>
				</td>
				<td>
					<?php echo $data['no_hp']; ?>
				</td>
				<td>
					<a href="../../assets/img/user/ktp/<?php echo $data['foto_ktp']; ?>"><img src="../../assets/img/user/ktp/<?php echo $data['foto_ktp']; ?>" width="100%"></a>
				</td>
				<td>
					<a href="../../assets/img/user/kk/<?php echo $data['foto_kk']; ?>"><img src="../../assets/img/user/kk/<?php echo $data['foto_kk']; ?>" width="100%"></a>
				</td>
				<td>
					<?php if ($data['hak_akses'] == '1') echo 'N/A'; else echo $data['saldo']; ?>
				</td>
				<td>
					<?php if($data['hak_akses'] == 0) echo "Super Admin"; elseif($data['hak_akses'] == 1) echo "Admin"; else echo "Member"; ?>
				</td>
				<td>
					<form action="user_edit.php" method="get">
						<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
						<input type="submit" class="button button-info" value="Edit">
					</form>
				</td>
				<td>
					<form action="action/user_hapus.php" method="get">
						<input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
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
