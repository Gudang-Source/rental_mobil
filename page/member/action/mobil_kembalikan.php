<?php
include('../../../database/config.php');

$id_rental = $_POST['id_rental'];

    $status_rental = mysqli_query($con, "UPDATE tbl_rental set status='5' where id_rental='$id_rental' ");
    if ($status_rental) {
        ?>
		<script language="javascript">
			alert('DIKEMBALIKAN');
			window.location = "../mobil_dipinjam.php";
		</script>
<?php
    } else {
        echo mysqli_error($con);
    }
?>
