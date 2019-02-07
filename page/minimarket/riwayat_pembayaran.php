<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '3') {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$id_minimarket = $_SESSION['id_minimarket'];
$query = mysqli_query($con, "SELECT * FROM riwayat_pembayaran where id_minimarket='$id_minimarket' " )
?>

<div class="content">
	<div class="font">

		<h1>
			<center>RIWAYAT PEMBAYARAN</center>
		</h1>
    <a href="action/riwayat_pembayaran_hapus.php"><button class="button button3">HAPUS RIWAYAT</button></a>
    <table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>ID RIWAYAT</th>
				<th>NAMA</th>
				<th>TOTAL HARGA</th>
			</tr>
<?php
while ($data = mysqli_fetch_assoc($query)) {
?>
			<tr>
				<td>
					<?php echo $data['id_riwayat_pembayaran'];  ?>
				</td>
        <td>
					<?php echo $data['nama'];  ?>
				</td>
        <td>
					Rp.<?php echo number_format($data['ttl_harga']);  ?>
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
<?php
} else {
        ?>
<script language="javascript">
	document.location = '../../minimarket.php'
</script>
<?php
    } ?>
