<?php
include ('../../../database/config.php');

$id_user = $_GET['id_user'];

	$query = mysqli_query($con, "DELETE FROM tbl_user where id_user='$id_user' ");
	if($query){?>
		<script language="javascript">
			alert('Hapus Data Sukses');
			window.location = "../user.php";
		</script>
<?php
	}else{
		echo mysqli_error($con);
	}
?>
