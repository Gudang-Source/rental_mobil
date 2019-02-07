<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '1'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysqli_query($con, "SELECT *, tbl_rental.status as status_rental FROM tbl_rental inner join tbl_user on tbl_rental.id_user=tbl_user.id_user inner join tbl_mobil on tbl_rental.no_polisi=tbl_mobil.no_polisi ");
?>

<div class="content">
	<div class="font">

		<h1>
			<center>DATA MOBIL DIPINJAM</center>
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
				<th>TANGGAL RENTAL</th>
				<th>TANGGAL KEMBALI</th>
				<th>TOTAL HARGA</th>
				<th>STATUS MOBIL</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['id_rental'];  ?>
				</td>
				<td>
					<?php echo $data['nama'];  ?>
				</td>
				<td>
					<?php echo $data['alamat'];  ?>
				</td>
				<td>
					<?php echo $data['no_hp'];  ?>
				</td>
				<td>
					<a href="../../assets/img/user/ktp/<?php echo $data['foto_ktp']; ?>"><img src="../../assets/img/user/ktp/<?php echo $data['foto_ktp']; ?>" width="100%"></a>
				</td>
				<td>
					<?php echo $data['no_polisi'];  ?>
				</td>
				<td width="20%">
					MERK 	: <?php echo $data['merk']; ?><br>
					JENIS	: <?php echo $data['jenis']; ?>
				</td>
				<td>
					<?php echo $data['tgl_rental'];  ?>
				</td>
				<td>
					<?php echo $data['tgl_kembali'];  ?>
				</td>
				<td>
					<?php echo $data['ttl_harga'];  ?>
				</td>
				<td>
					<?php if($data['status_rental']==1) echo "<font style='color: grey'> Sedang Dipesan </font>"; elseif($data['status_rental']==2) echo "<font style='color: black'> Menunggu Pembayaran </font>"; elseif($data['status_rental']==3) echo "<font style='color: blue'> Persetujuan Pinjam </font>"; elseif($data['status_rental']==4) echo "<font style='color: green'> Sedang Dirental </font>"; elseif($data['status_rental']==5) echo "<font style='color: brown'> Persetujuan Kembali </font>"; ?>
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
