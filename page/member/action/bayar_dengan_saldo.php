<?php
include('../../../database/config.php');

$id_user = $_POST['id_user'];
$no_polisi = $_POST['no_polisi'];
$tgl_rental = $_POST['tgl_rental'];
$tgl_kembali = $_POST['tgl_kembali'];
$ttl_harga = $_POST['total_harga'];

$query_user = mysqli_query($con, "SELECT * from tbl_user where id_user='$id_user' ");
$data_user = mysqli_fetch_assoc($query_user);
$saldo = $data_user['saldo']-$ttl_harga;
$saldo_kurang = mysqli_query($con, "UPDATE tbl_user set saldo='$saldo' where id_user='$id_user' ");

$query = mysqli_query($con, "INSERT into tbl_rental
  values('','$id_user','$no_polisi','$tgl_rental','$tgl_kembali','','$ttl_harga','$ttl_harga','','','3') ");
  $status_mobil= mysqli_query($con, "UPDATE tbl_mobil set status='1' where no_polisi='$no_polisi' ");

  if ($query) {
      ?>
  <script language="javascript">
    window.location = "../mobil_dipinjam.php";
  </script>
  <?php
  } else {
      echo mysqli_error($con);
  }
  // $query_rental = mysqli_query($con, "SELECT * from tbl_rental where no_polisi='$no_polisi' ");
  // while ($data_rental = mysqli_fetch_assoc($query_rental)) {
  //     $startDate = $data_rental['tgl_rental'];
  //     $endDate = $data_rental['tgal_kembali'];
  //     $bookedDate = [$startDate,$endDate];
  // } if ($endDate < $startDate) {
  //     if ($startDate >= $bookedDate.startDate) {
  //         if ($startDate <= $bookedDate.endDate) {
  //             return false;
  //         }
  //         return true;
  //     }
  //
  //     if ($endDate >= $bookedDate.startDate) {
  //         return false;
  //     }
  //
  //     return true;
  // }
