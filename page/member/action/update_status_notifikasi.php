<?php
include('../../../database/config.php');

$id_notifikasi = $_GET['id_notifikasi'];

$query = mysqli_query($con, "UPDATE tbl_notifikasi set status='1' where id_notifikasi='$id_notifikasi' ");
        if ($query) {
            ?>
			<script language="javascript">
				window.location = "../baca_notifikasi.php?id_notifikasi=<?php echo $id_notifikasi ?> ";
			</script>
	<?php
        } else {
            echo mysqli_error($con);
        }
