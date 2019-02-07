<?php
include('../../../database/config.php');

$id_rental = $_POST['id_rental'];
$no_polisi = $_POST['no_polisi'];

$query_rantal = mysqli_query($con, "SELECT * from tbl_rental inner join
  tbl_mobil on tbl_rental.no_polisi = tbl_mobil.no_polisi where id_rental='$id_rental' ");
$data_rental  = mysqli_fetch_assoc($query_rantal);
$id_rental    = $data_rental['id_rental'];
$id_user      = $data_rental['id_user'];
$no_polisi    = $data_rental['no_polisi'];
$hrg_sewa     = $data_rental['hrg_sewa'];
$tgl_rental   = $data_rental['tgl_rental'];
$tgl_kembali  = $data_rental['tgl_kembali'];
$ttl_harga    = $data_rental['ttl_harga'];
$id_minimarket = $data_rental['id_minimarket'];
$kode_pembayaran = $data_rental['kode_pembayaran'];
$tanggal_sekarang = date('Y-m-d');
if ($tanggal_sekarang >= $tgl_kembali) {
    $selisih_tanggal = strtotime($tanggal_sekarang)-strtotime($tgl_kembali);
    $itung_hari = $selisih_tanggal/(60*60*24);
    $itung_denda = $itung_hari*$hrg_sewa;
    $masukan_riwayat = mysqli_query($con, "INSERT into riwayat_rental values ('','$id_rental','$id_user','$no_polisi','$tgl_rental','$tgl_kembali','$ttl_harga','$itung_denda','$id_minimarket','$kode_pembayaran','1')");
} else {
    $masukan_riwayat = mysqli_query($con, "INSERT into riwayat_rental values ('','$id_rental','$id_user','$no_polisi','$tgl_rental','$tgl_kembali','$ttl_harga','0','$id_minimarket','$kode_pembayaran','1')");
}
    $hapus = mysqli_query($con, "DELETE FROM tbl_rental where id_rental='$id_rental' ");
    $status_mobil= mysqli_query($con, "UPDATE tbl_mobil set status='0' where no_polisi='$no_polisi' ");
    $query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
        values('','$id_user','$id_rental','Pengembalian mobil telah berhasil',
          'terima kasih telah melakukan peminjaman mobil di rental mobil kami','0') ");


    if ($masukan_riwayat && $hapus && $status_mobil) {
        ?>
		<script language="javascript">
			alert('DITERIMA');
			window.location = "../kembali.php";
		</script>
<?php
    } else {
        echo mysqli_error($con);
    }
?>
