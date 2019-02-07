<?php
include ('../../../database/config.php');

$no_polisi = $_GET['no_polisi'];

	$query = mysqli_query($con, "DELETE FROM tbl_mobil where no_polisi='$no_polisi' ");
	if($query){?>
		<script language="javascript">
			alert('Hapus Data Sukses');
			window.location = "../mobil.php";
		</script>
<?php
	}else{
		echo mysqli_error($con);
	}
?>
