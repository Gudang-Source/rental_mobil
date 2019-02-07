<?php
include ('../../../database/config.php');

$id_minimarket = $_GET['id_minimarket'];

	$query = mysqli_query($con, "DELETE FROM tbl_minimarket where id_minimarket='$id_minimarket' ");
	if($query){?>
		<script language="javascript">
			alert('Hapus Data Sukses');
			window.location = "../minimarket.php";
		</script>
<?php
	}else{
		echo mysqli_error($con);
	}
?>
