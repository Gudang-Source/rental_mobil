<?php session_start();
include('../../database/config.php');
date_default_timezone_set('Asia/Jakarta');
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php
$id_rental  = $_GET['id_rental'];
    $query_rental = mysqli_query($con, "SELECT * from riwayat_rental inner join
    tbl_user on riwayat_rental.id_user=tbl_user.id_user left join
    tbl_minimarket on riwayat_rental.id_minimarket=tbl_minimarket.id_minimarket
    where id_rental='$id_rental' ");
    $data_rental  = mysqli_fetch_assoc($query_rental); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

		<center><h1>NOTA</h1></center><hr>
		<pre>
NAMA PELANGGAN            : <?php echo $data_rental['nama'] ?><br>
TANGGAL MULAI RENTAL      : <?php echo $data_rental['tgl_rental'] ?><br>
TANGGAL SELESAI RENTAL    : <?php echo $data_rental['tgl_kembali'] ?><br>
TOTAL HARGA               : Rp. <?php echo number_format($data_rental['ttl_harga']); ?><br>
KODE PEMBAYARAN           : <?php if ($data_rental['kode_pembayaran']) echo $data_rental['kode_pembayaran']; else echo "-"; ?><br>
MINIMARKET                : <?php if ($data_rental['minimarket']) echo $data_rental['minimarket']; else echo "-" ?><br>
STATUS                    : <?php if ($data_rental['status'] == 0) echo "PESANAN GAGAL"; else echo "PESANAN SUKSES"; ?>
<hr>
DICETAK TANGGAL           : <?php echo date('d-M-Y H:i:s') ?>
</pre>

<script language="javascript">
window.print();
</script>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php
} else {
        ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php
    } ?>
