<?php
include('../database/config.php');

$username = $_POST['username'];
$password = base64_encode($_POST['password']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$ktp = $_FILES['foto_ktp']['name'];
$ktp_temp = $_FILES['foto_ktp']['tmp_name'];
$kk = $_FILES['foto_kk']['name'];
$kk_temp = $_FILES['foto_kk']['tmp_name'];

$foto_ktp = date('dmYHis_').$ktp;
$foto_kk = date('dmYHis_').$kk;

$ktp_path = '../assets/img/user/ktp/'.$foto_ktp;
$kk_path = '../assets/img/user/kk/'.$foto_kk;

$upload_ktp = move_uploaded_file($ktp_temp, $ktp_path);
$upload_kk = move_uploaded_file($kk_temp, $kk_path);

if ($upload_ktp && $upload_kk) {
    $query = mysqli_query($con, "INSERT into tbl_user values ('','$username','$password','$nama','$alamat','$no_hp','$foto_ktp','$foto_kk','0','2')");
    if ($query) {
        ?>
		<script language="javascript">
			alert('Tambah Data Sukses');
			window.location = "../login.php";
		</script>
<?php
    } else {
        echo mysqli_error($con);
    }
} else {
    ?>
<script language="javascript">
	alert('Gagal Upload Gambar');
	window.location = "../login.php";
</script>
<?php
}
?>
