<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_rental  = $_GET['id_rental'];
    $query_rental = mysqli_query($con, "SELECT * from riwayat_rental inner join
    tbl_user on riwayat_rental.id_user=tbl_user.id_user left join
    tbl_minimarket on riwayat_rental.id_minimarket=tbl_minimarket.id_minimarket
    where id_rental='$id_rental' ");
    $data_rental  = mysqli_fetch_assoc($query_rental); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1>NOTA</h1><hr>
		<pre>
NAMA PELANGGAN            : <?php echo $data_rental['nama'] ?><br>
TANGGAL MULAI RENTAL      : <?php echo $data_rental['tgl_rental'] ?><br>
TANGGAL SELESAI RENTAL    : <?php echo $data_rental['tgl_kembali'] ?><br>
TOTAL HARGA               : Rp. <?php echo number_format($data_rental['ttl_harga']); ?><br>
TOTAL DENDA               : Rp. <?php echo number_format($data_rental['denda']); ?><br>
KODE PEMBAYARAN           : <?php if ($data_rental['kode_pembayaran']) echo $data_rental['kode_pembayaran']; else echo "-"; ?><br>
MINIMARKET                : <?php if ($data_rental['kode_pembayaran']) echo $data_rental['minimarket']; else echo "-" ?><br>
STATUS                    : <?php if ($data_rental['status'] == 0) {
        echo "PESANAN GAGAL";
    } else {
        echo "PESANAN SUKSES";
    } ?>
</pre><hr>
			<a href="riwayat_pinjam.php"><button class="button button-info">OK</button></a>
      <a href="riwayat_nota_print.php?id_rental=<?php echo $data_rental['id_rental']; ?>" target="_blank"><button class="button button1">PRINT</button></a>
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
