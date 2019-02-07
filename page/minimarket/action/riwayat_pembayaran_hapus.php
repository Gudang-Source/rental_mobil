<?php session_start();
include ('../../../database/config.php');

$id_minimarket = $_SESSION['id_minimarket'];

	$query = mysqli_query($con, "DELETE FROM riwayat_pembayaran where id_minimarket='$id_minimarket' ");
	if($query){?>
		<script language="javascript">
			alert('Hapus Data Sukses');
			window.location = "../riwayat_pembayaran.php";
		</script>
<?php
	}else{
		echo mysqli_error($con);
	}
?>
