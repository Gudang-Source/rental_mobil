<?php
include('../../../database/config.php');

$id_rental = $_GET['id_rental'];

$query_rantal            = mysqli_query($con, "SELECT * from tbl_rental inner join tbl_user
  on tbl_rental.id_user=tbl_user.id_user where id_rental='$id_rental' ");
$data_rental             = mysqli_fetch_assoc($query_rantal);
$id_rental               = $data_rental['id_rental'];
$id_user                 = $data_rental['id_user'];
$saldo_user              = $data_rental['saldo'];
$input_saldo_user        = $data_rental['input_saldo_user'];
$no_polisi               = $data_rental['no_polisi'];
$tgl_rental              = $data_rental['tgl_rental'];
$tgl_kembali             = $data_rental['tgl_kembali'];
$ttl_harga               = $data_rental['ttl_harga'];
$id_minimarket           = $data_rental['id_minimarket'];
$kode_pembayaran         = $data_rental['kode_pembayaran'];

$saldo = $saldo_user+$input_saldo_user;

$status_mobil= mysqli_query($con, "UPDATE tbl_mobil set status='0' where no_polisi='$no_polisi' ");
$kembalikan_uang = mysqli_query($con, "UPDATE tbl_user set saldo='$saldo' where id_user='$id_user' ");
$masukan_riwayat = mysqli_query($con, "INSERT into riwayat_rental
    values ('','$id_rental','$id_user','$no_polisi','$tgl_rental','$tgl_kembali','$ttl_harga','0','$id_minimarket','$kode_pembayaran','0')");
$query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
    values('','$id_user','$id_rental','Pembayaran sudah expired :(','Pembayaran di gagalkan dikarenakan kamu kehabisan waktu :( ','0') ");

    if ($masukan_riwayat) {
        $query = mysqli_query($con, "DELETE from tbl_rental where id_rental = '$id_rental' "); ?>
    <script language="javascript">
      window.location = "../mobil_dipinjam.php";
    </script>
    <?php
    } else {
        echo mysqli_error($con);
    }
