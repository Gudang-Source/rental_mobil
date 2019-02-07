<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysqli_query($con, "select * from tbl_mobil");
?>

<div class="content">
	<div class="font">

		<h1>
			<center>DATA MOBIL</center>
		</h1>
		<a href="mobil_tambah.php"><button class="button button1">+ Tambah</button></a>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>NO POLISI</th>
				<th>MERK</th>
				<th>JENIS</th>
				<th>FOTO</th>
				<th>KETERANGAN</th>
				<th>HARGA SEWA</th>
				<th>STATUS</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['no_polisi'];  ?>
				</td>
				<td>
					<?php echo $data['merk'];  ?>
				</td>
				<td>
					<?php echo $data['jenis'];  ?>
				</td>
				<td>
					<a href="../../assets/img/mobil/<?php echo $data['foto_mobil']; ?>"><img src="../../assets/img/mobil/<?php echo $data['foto_mobil']; ?>" width="50%"></a>
				</td>
				<td>
					<?php echo $data['keterangan']; ?>
				</td>
				<td>
					<?php echo $data['hrg_sewa']; ?>
				</td>
				<td>
					<?php if($data['status'] == 0) echo "Tersedia"; else echo "Tidak Tersedia"; ?>
				</td>
				<td>
					<form action="mobil_edit.php" method="get">
						<input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
						<input type="submit" class="button button-info" value="Edit">
					</form>
				</td>
				<td>
					<form action="action/mobil_hapus.php" method="get">
						<input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
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
