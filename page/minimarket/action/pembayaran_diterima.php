<?php
include('../../../database/config.php');

$id_rental     = $_POST['id_rental'];
$id_user       = $_POST['id_user'];
$no_polisi     = $_POST['no_polisi'];
$id_minimarket = $_POST['id_minimarket'];
$ttl_harga     = $_POST['ttl_harga'];
$nama          = $_POST['nama'];

$query_minimarket = mysqli_query($con, "SELECT * from tbl_minimarket where id_minimarket='$id_minimarket' ");
$data_minimarket = mysqli_fetch_assoc($query_minimarket);
$minimarket   = $data_minimarket['minimarket'];
$saldo = $data_minimarket['harga'];
$saldo_tambah = $data_minimarket['saldo']+$saldo;
$ttl_harga2 = $ttl_harga-$saldo;

$saldo_masuk  = mysqli_query($con, "UPDATE tbl_minimarket set saldo='$saldo_tambah' where id_minimarket='$id_minimarket' ");
$status_bayar = mysqli_query($con, "UPDATE tbl_rental set status='3',ttl_harga='$ttl_harga2' where id_rental='$id_rental' ");
$riwayat = mysqli_query($con, "INSERT INTO riwayat_pembayaran VALUES('','$id_minimarket','$nama','$ttl_harga') ");
$query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
    values('','$id_user','$id_rental','pembayaran peminjaman mobil telah Lunas','Terima Kasih Telah Melakukan Pembayaran di minimarket $minimarket ' ','0') ");

  if ($status_bayar) {
      ?>
  <script language="javascript">
    alert('pembayaran sukses');
    window.location = "../pembayaran.php";
  </script>
        <?php
  } else {
      echo mysqli_error($con);
  }
