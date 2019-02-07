<?php
include('../../../database/config.php');

$id_minimarket = $_POST['id_minimarket'];
$username = $_POST['username'];
$password = $_POST['password'];
$minimarket = $_POST['minimarket'];
$kode_minimarket = $_POST['kode_minimarket'];
$harga = $_POST['harga'];

  $query = mysqli_query($con, "UPDATE tbl_minimarket set username='$username', password='$password', minimarket='$minimarket', kode_minimarket='$kode_minimarket', harga='$harga' where id_minimarket='$id_minimarket' ");
  if ($query) {
      ?>
	<script language="javascript">
		alert('Edit Data Sukses');
		window.location = "../minimarket.php";
	</script>
<?php
  } else {
      echo mysqli_error($con);
  }
?>
