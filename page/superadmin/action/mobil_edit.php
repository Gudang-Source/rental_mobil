<?php
include('../../../database/config.php');

$no_polisi = $_POST['no_polisi'];
$merk = $_POST['merk'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];
$hrg_sewa = $_POST['hrg_sewa'];

if ($_FILES['foto_mobil']['name']!=null) {
    $foto = $_FILES['foto_mobil']['name'];
    $foto_temp = $_FILES['foto_mobil']['tmp_name'];

    $foto_mobil = date('dmYHis_').$foto;

    $foto_path = '../../../assets/img/mobil/'.$foto_mobil;

    $upload_foto = move_uploaded_file($foto_temp, $foto_path);

    if ($upload_foto) {
        $query = mysqli_query($con, "UPDATE tbl_mobil set merk='$merk', jenis='$jenis', foto_mobil='$foto_mobil', keterangan='$keterangan', hrg_sewa='$hrg_sewa' where no_polisi='$no_polisi' ");
        if ($query) {
            ?>
			<script language="javascript">
				alert('Edit Data Sukses');
				window.location = "../mobil.php";
			</script>
	<?php
        } else {
            echo mysqli_error($con);
        }
    } else {
        ?>
	<script language="javascript">
		alert('Gagal Upload Gambar');
		window.location = "../mobil.php";
	</script>
	<?php
    }
} else {
    $query = mysqli_query($con, "UPDATE tbl_mobil set merk='$merk', jenis='$jenis', keterangan='$keterangan', hrg_sewa='$hrg_sewa' where no_polisi='$no_polisi' ");
    if ($query) {
        ?>
		<script language="javascript">
			alert('Edit Data Sukses');
			window.location = "../mobil.php";
		</script>
<?php
    } else {
        echo mysqli_error($con);
    }
}
?>
