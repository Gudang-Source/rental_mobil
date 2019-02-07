<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_user = $_SESSION['id_user'];
    $query = mysqli_query($con, "SELECT *,riwayat_rental.status AS status_pembayaran FROM riwayat_rental inner join
    tbl_user on riwayat_rental.id_user=tbl_user.id_user left join
    tbl_mobil on riwayat_rental.no_polisi=tbl_mobil.no_polisi left join
    tbl_minimarket on riwayat_rental.id_minimarket = tbl_minimarket.id_minimarket
    where riwayat_rental.id_user=$id_user"); ?>

<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>
			<center>RIWAYAT PINJAM</center>
		</h1>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>NAMA</th>
				<th>NO POLISI</th>
				<th>MOBIL</th>
				<th>TANGGAL RENTAL</th>
        <th>TANGGAL KEMBALI</th>
        <th>MINIMARKET</th>
        <th>KODE PEMBAYARAN</th>
        <th>TOTAL HARGA</th>
        <th>TOTAL DENDA</th>
        <th>STATUS</th>
        <th>NOTA</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
        ?>
			<tr>
				<td>
					<?php echo $data['nama']; ?>
				</td>
				<td>
					<?php echo $data['no_polisi']; ?>
				</td>
        <td width="20%">
					MERK 	: <?php echo $data['merk']; ?><br>
					JENIS	: <?php echo $data['jenis']; ?>
				</td>
        <td>
					<?php echo $data['tgl_rental']; ?>
				</td>
        <td>
					<?php echo $data['tgl_kembali']; ?>
				</td>
        <td>
          <?php if ($data['minimarket']) echo $data['minimarket']; else echo "N/A" ?>
        </td>
        <td>
          <?php if ($data['kode_pembayaran']) echo $data['kode_pembayaran']; else echo "N/A" ?>
        </td>
        <td>
          <?php echo "Rp.".number_format($data['ttl_harga']); ?>
        </td>
        <td>
          <?php if ($data['denda'] > 0) {
            ?><p style="color:red;"><?php  echo "Rp.".number_format($data['denda']); ?></p><?php
        } else {
            echo "Rp.".number_format($data['denda']);
        } ?>
        </td>
        <td>
          <?php if ($data['status_pembayaran'] == '0') {
            ?>
            <div style="color: red;"><b>Pemesanan Gagal<b></div>
          <?php
        } elseif ($data['status_pembayaran'] == '1') {
            ?>
            <div style="color: green;"><b>Pemesanan Selesai<b></div>
          <?php
        } ?>
				</td>
        <td>
          <form action="riwayat_nota.php?id_rental=<?php echo $data['id_rental'] ?>" method="POST">
            <input type="hidden" name="id_rental" value="<?php echo $data['id_rental']; ?>">
            <input type="submit" class="button button-info" value="Lihat Nota">
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
