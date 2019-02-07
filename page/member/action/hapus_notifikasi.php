<?php
include('../../../database/config.php');

$id_notifikasi = $_POST['id_notifikasi'];

$query = mysqli_query($con, "DELETE FROM tbl_notifikasi where id_notifikasi='$id_notifikasi' ");
        if ($query) {
            ?>
			<script language="javascript">
				window.location = "../notifikasi.php";
			</script>
	<?php
        } else {
            echo mysqli_error($con);
        }
