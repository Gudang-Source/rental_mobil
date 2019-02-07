<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '0') {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysqli_query($con, "SELECT * FROM tbl_rental inner join tbl_user on tbl_rental.id_user=tbl_user.id_user inner join tbl_mobil on tbl_rental.no_polisi=tbl_mobil.no_polisi where tbl_rental.status='5' "); ?>

<div class="content">
	<div class="font">

		<h1>
			<center>PERMINTAAN PENGEMBALIAN</center>
		</h1>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>ID RENTAL</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
				<th>NO HP</th>
        <th>FOTO KTP</th>
				<th>NO POLISI</th>
				<th>MOBIL</th>
        <th>TOTAL HARGA</th>
				<th>TANGGAL RENTAL</th>
				<th>TANGGAL KEMBALI</th>
				<th>ACTION</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
        ?>
			<tr>
				<td>
					<?php echo $data['id_rental']; ?>
				</td>
				<td>
					<?php echo $data['nama']; ?>
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
					<?php echo $data['no_polisi']; ?>
				</td>
				<td width="20%">
					MERK 	: <?php echo $data['merk']; ?><br>
					JENIS	: <?php echo $data['jenis']; ?>
				</td>
				<td>
					<?php echo $data['ttl_harga']; ?>
				</td>
				<td>
					<?php echo $data['tgl_rental']; ?>
				</td>
        <td>
					<?php echo $data['tgl_kembali']; ?>
				</td>
				<td>
					<form action="action/kembali_terima.php" method="POST">
						<input type="hidden" name="id_rental" value="<?php echo $data['id_rental']; ?>">
						<input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
						<input type="submit" name="submit" class="button button-info" value="Terima">
					</form>
				</td>
			</tr>
			<?php
    } ?>
		</table>

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
