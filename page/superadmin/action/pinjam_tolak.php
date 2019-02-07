<?php
include('../../../database/config.php');

$id_rental = $_POST['id_rental'];
$id_user 	 = $_POST['id_user'];
$ttl_harga = $_POST['ttl_harga'];
$no_polisi = $_POST['no_polisi'];
$tgl_rental = $_POST['tgl_rental'];
$tgl_kembali = $_POST['tgl_kembali'];
$id_minimarket = $_POST['id_minimarket'];
$kode_pembayaran = $_POST['kode_pembayaran'];

$query_user = mysqli_query($con, "SELECT * from tbl_user where id_user='$id_user' ");
$data_user = mysqli_fetch_assoc($query_user);
$saldo = $data_user['saldo']+$ttl_harga;

    $masukan_riwayat = mysqli_query($con, "INSERT into riwayat_rental values ('','$id_rental','$id_user','$no_polisi','$tgl_rental','$tgl_kembali','$ttl_harga','0','$id_minimarket','$kode_pembayaran','0')");
    $hapus = mysqli_query($con, "DELETE FROM tbl_rental where id_rental='$id_rental' ");
    $saldo_kembali = mysqli_query($con, "UPDATE tbl_user set saldo='$saldo' where id_user='$id_user' ");
    $status_mobil= mysqli_query($con, "UPDATE tbl_mobil set status='0' where no_polisi='$no_polisi' ");

    $query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
        values('','$id_user','$id_rental','Peminjaman mobil telah di tolak oleh admin',
          'kami mohon maaf kepada user di karenakan ada masalah pada mobil yang anda pinjam','0') ");

    if ($masukan_riwayat && $hapus && $saldo_kembali && $status_mobil) {
        ?>
		<script language="javascript">
			alert('DITOLAK');
			window.location = "../pinjam.php";
		</script>
<?php
    } else {
        echo mysqli_error($con);
    }
?>
