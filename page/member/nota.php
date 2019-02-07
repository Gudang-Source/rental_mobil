<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_rental  = $_GET['id_rental'];
    $query_rental = mysqli_query($con, "SELECT * from tbl_rental left join
    tbl_user on tbl_rental.id_user=tbl_user.id_user left join
    tbl_minimarket on tbl_rental.id_minimarket=tbl_minimarket.id_minimarket
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
BATAS WAKTU PEMBAYARAN    : <?php if ($data_rental['waktu_pembayaran']) echo $data_rental['waktu_pembayaran']; else echo "-"; ?><br>
TOTAL HARGA               : Rp. <?php echo number_format($data_rental['ttl_harga']); ?><br>
KODE PEMBAYARAN           : <?php if ($data_rental['kode_pembayaran']) echo $data_rental['kode_pembayaran']; else echo "-"; ?><br>
MINIMARKET                : <?php if ($data_rental['minimarket']) echo $data_rental['minimarket']; else echo "-"; ?><br>
STATUS                    : <?php if ($data_rental['status'] > 2) echo "LUNAS"; else echo "BELUM LUNAS"; ?>
<p style="border: 2px solid lightgray; padding: 3px">
KETENTUAN PEMBAYARAN DENGAN <?php echo $data_rental['minimarket'] ?> <br>
1.Tunjukan nomer tagihan kepada kasir <br>
2.Simpan juga bukti pembayaran yang di berikan oleh kasir<br>
</p>
</pre>
		<a href="mobil_dipinjam.php"><button class="button button-info" >OK</button></a>
    <a href="nota_print.php?id_rental=<?php echo $data_rental['id_rental']; ?>" target="_blank"><button class="button button1">PRINT</button></a>
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
