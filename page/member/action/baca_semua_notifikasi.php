<?php
include('../../../database/config.php');
include('../../../helper/enkripsi.php');

$id_user = $_GET['id_user'];

$query = mysqli_query($con, "UPDATE tbl_notifikasi set status='1' where id_user='$id_user' ");
        if ($query) {
            ?>
			<script language="javascript">
				window.location = "../";
			</script>
	<?php
        } else {
            echo mysqli_error($con);
        }
