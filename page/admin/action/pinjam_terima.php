<?php
include('../../../database/config.php');

$id_rental = $_POST['id_rental'];
$id_user = $_POST['id_user'];
$ttl_harga = $_POST['ttl_harga'];
$id_user_member = $_POST['id_user_member'];

$query_rental = mysqli_query($con, "SELECT * from tbl_rental where id_rental='$id_rental' ");
$data_rental = mysqli_fetch_assoc($query_rental);
$tanggal_rental   = $data_rental['tgl_rental'];
$tanggal_kembali  = $data_rental['tgl_kembali'];

$query_user = mysqli_query($con, "SELECT * from tbl_user where id_user='1' ");
$data_user = mysqli_fetch_assoc($query_user);
$saldo = $data_user['saldo']+$ttl_harga;

    $query = mysqli_query($con, "UPDATE tbl_rental set status='4' where id_rental='$id_rental' ");
    $saldo_tambah = mysqli_query($con, "UPDATE tbl_user set saldo='$saldo' where id_user='1' ");

    $query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
        values('','$id_user_member','$id_rental','Peminjaman mobil telah di setujui oleh admin',
          'peminjaman mobil di mulai dari tanggal $tanggal_rental dan selesai pada tanggal $tanggal_kembali','0') ");

    if ($query) {
        ?>
      <script language="javascript">
  			alert('DITERIMA');
  			window.location = "../pinjam.php";
  		</script>
<?php
    } else {
        echo mysqli_error($con);
    }
?>
    // $status_mobil = mysqli_query($con, "UPDATE tbl_mobil set status='1' where no_polisi='$no_polisi' ");
