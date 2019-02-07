<?php
include ('../../../database/config.php');

$username = $_POST['username'];
$password = $_POST['password'];
$minimarket = $_POST['minimarket'];
$kode_minimarket = $_POST['kode_minimarket'];
$harga = $_POST['harga'];

$query = mysqli_query($con, "INSERT into tbl_minimarket values ('','$username','$password','$minimarket','$kode_minimarket','$harga','0','3')");
	if($query){?>
		<script language="javascript">
			alert('Tambah Data Sukses');
			window.location = "../minimarket.php";
		</script>
<?php
	}else{
		echo mysqli_error($con);
	}
?>
