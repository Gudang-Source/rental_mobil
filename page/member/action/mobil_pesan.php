<?php
include('../../../database/config.php');

$id_user = $_POST['id_user'];
$no_polisi = $_POST['no_polisi'];
$tgl_rental = $_POST['tgl_rental'];
$tgl_kembali = $_POST['tgl_kembali'];
$ttl_harga = $_POST['total_harga'];
$tanggal_sekarang = date('Y-m-d H:i:s');

$query_mobil = mysqli_query($con, "SELECT * from tbl_mobil where no_polisi='$no_polisi'");
$data_mobil  = mysqli_fetch_assoc($query_mobil);
$jenis       = $data_mobil['jenis'];
$merk        = $data_mobil['merk'];
$mobil       = $jenis." ".$merk;

$query = mysqli_query($con, "INSERT into tbl_rental
  values('','$id_user','$no_polisi','$tgl_rental','$tgl_kembali','','$ttl_harga','','','','1') ");

$query_rental = mysqli_query($con, "SELECT * from tbl_rental ORDER BY id_rental DESC");
$data_rental  = mysqli_fetch_assoc($query_rental);
$id_rental    = $data_rental['id_rental'];

$query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
  values('','$id_user','$id_rental','MOBIL $mobil ini hampir menjadi pinjamanmu','lanjutkan pembayaran peminjaman dari keranjang pada tanggal $tanggal_sekarang','0') ");

  if ($query) {
      ?>
  <script language="javascript">
  alert('silahkan pilih metode pembayaran');
    window.location = "../metode_pembayaran.php?id_rental=<?php echo $id_rental ?>&no_polisi=<?php echo $no_polisi  ?> ";
  </script>
  <?php
  } else {
      echo mysqli_error($con);
  }
