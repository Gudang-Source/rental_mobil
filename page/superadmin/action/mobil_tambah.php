<?php
include('../../../database/config.php');

$no_polisi = $_POST['no_polisi'];
$merk = $_POST['merk'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];
$hrg_sewa = $_POST['hrg_sewa'];

$foto = $_FILES['foto_mobil']['name'];
$foto_temp = $_FILES['foto_mobil']['tmp_name'];

$foto_mobil = date('dmYHis_').$foto;

$foto_path = '../../../assets/img/mobil/'.$foto_mobil;

$upload_foto = move_uploaded_file($foto_temp, $foto_path);

if ($upload_foto) {
    $query = mysqli_query($con, "INSERT into tbl_mobil values ('$no_polisi','$merk','$jenis','$foto_mobil','$keterangan','$hrg_sewa','0')");
    if ($query) {
        ?>
		<script language="javascript">
			alert('Tambah Data Sukses');
			window.location = "../mobil.php";
		</script>
<?php
    } else { ?>
      <script language="javascript">
        alert('No Polisi Sudah Ada');
        window.location = "../mobil_tambah.php";
      </script>
<?php }
} else {
    ?>
<script language="javascript">
	alert('Gagal Upload Gambar');
	window.location = "../mobil.php";
</script>
<?php
}
?>
