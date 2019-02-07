<?php
session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    include('../../../database/config.php');

    date_default_timezone_set('Asia/Jakarta');

    $id_rental        = $_POST['id_rental'];
    $id_user          = $_POST['id_user'];
    $input_saldo      = $_POST['input_saldo'];
    $total_harga_post = $_POST['total_harga_post'];
    $no_hp            = $_POST['no_hp'];
    $no_polisi        = $_POST['no_polisi'];
    $id_minimarket    = $_POST['id_minimarket'];
    $input_saldo      = $_POST['input_saldo'];

    $ttl_harga = $total_harga_post-$input_saldo;

    $query_user = mysqli_query($con, "SELECT * from tbl_user where id_user='$id_user'");
    $data_user = mysqli_fetch_assoc($query_user);
    $get_saldo  = $data_user['saldo'];

    $saldo_asli = $get_saldo-$input_saldo;

    $update_saldo = mysqli_query($con, "UPDATE tbl_user set saldo='$saldo_asli' where id_user='$id_user' ");

    $query_minimarket = mysqli_query($con, "SELECT * from tbl_minimarket where id_minimarket='$id_minimarket' ");
    $data_minimarket = mysqli_fetch_assoc($query_minimarket);
    $kode_minimarket = $data_minimarket['kode_minimarket'];

    $query_rental = mysqli_query($con, "SELECT * from tbl_rental where id_user='$id_user' AND id_minimarket='$id_minimarket' ORDER BY kode_pembayaran desc ");
    $jumlah_rental = mysqli_num_rows($query_rental);
    $kode = 1 ;
    if ($jumlah_rental == '0') {
        $kode_pembayaran = $kode_minimarket.$no_hp.$kode;

        $waktu_pembarayan =  date('Y-m-d H:i:s', time() + (60 * 30));
        $query = mysqli_query($con, "UPDATE tbl_rental set ttl_harga='$total_harga_post', waktu_pembayaran='$waktu_pembarayan',
          input_saldo_user = '$input_saldo', id_minimarket='$id_minimarket',
          kode_pembayaran='$kode_pembayaran', status='2' where id_rental='$id_rental' ");
    } else {
        $data_rental = mysqli_fetch_assoc($query_rental);
        $kode_pembayaran_db = $data_rental['kode_pembayaran'];
        $kode_minimarket = substr($kode_pembayaran_db, 0, -12); // im0
        $sub_kode        = substr($kode_pembayaran_db, 3); //08*****
        $sub_kode++;
        $kode_pembayaran = $kode_minimarket.$sub_kode;

        $waktu_pembarayan =  date('Y-m-d H:i:s', time() + (60 * 30));

        $query = mysqli_query($con, "UPDATE tbl_rental set ttl_harga='$total_harga_post', waktu_pembayaran='$waktu_pembarayan',
          input_saldo_user = '$input_saldo', id_minimarket='$id_minimarket',
          kode_pembayaran='$kode_pembayaran', status='2' where id_rental='$id_rental' ");
    }

    $status_mobil = mysqli_query($con, "UPDATE tbl_mobil set status='1' where no_polisi='$no_polisi' ");

    $query_notif = mysqli_query($con, "INSERT into tbl_notifikasi
      values('','$id_user','$id_rental','Ayo Selesaikan Pembayaranmu!','Selesaikan Pembayaran Untuk Transaksi $kode_pembayaran sebelum $waktu_pembarayan','0') ");

    if ($query) {
        ?>
  <script language="javascript">
    alert('pesan mobil sukses');
    window.location = "../nota.php?id_rental=<?php echo $id_rental ?>";
  </script>
        <?php
    } else {
        echo mysqli_error($con);
    }
} else {
    ?>
  <script language="javascript">
    alert('tidak bisa memesan silahkan login terlebih dahulu');
    window.location = "../../../login.php";
  </script>
  <?php
}
// $id_user = $_POST['id_user'];
// $tgl_rental = $_POST['tgl_rental'];
// $tgl_kembali = $_POST['tgl_kembali'];
// $hrg_sewa = $_POST['hrg_sewa'];
$query_minimarket = mysqli_query($con, "SELECT * from tbl_minimarket where id_minimarket='$id_minimarket' ");
$data_minimarket = mysqli_fetch_assoc($query_minimarket);
$kode_minimarket = $data_minimarket['kode_minimarket'];
// $hrg_minimarket = $data_minimarket['harga'];

// $selisih = strtotime($tgl_kembali)-strtotime($tgl_rental);
// $total_hari = $selisih/(60*60*24);

// $ttl_harga1 = $hrg_sewa*$total_hari;
// $ttl_harga2 = $ttl_harga1+$hrg_minimarket;

  // } else {
      while ($data_rental = mysqli_fetch_array($query_rental)) {
          $kode_pembayaran_db = $data_rental['kode_pembayaran'];
          $sub_kode = substr($kode_pembayaran_db, 2);
          $sub_minimarket = substr($kode_pembayaran_db, 0, -14);
          $kode_pembayaran = $sub_minimarket.$sub_kode++;
      }
  // }
