<?php session_start();
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_notifikasi  = $_GET['id_notifikasi'];
    $query = mysqli_query($con, "SELECT *,tbl_notifikasi.status AS status_notifikasi from tbl_notifikasi left join
      tbl_rental on tbl_notifikasi.id_rental = tbl_rental.id_rental left join
      riwayat_rental on tbl_notifikasi.id_rental = riwayat_rental.id_rental
      where id_notifikasi='$id_notifikasi' ");
    $data_rental  = mysqli_fetch_assoc($query); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">

		<h1 class="font1-25"><b>NOTIFIKASI</b></h1><hr>

    <h2 class="font1-20"><b> <?php echo $data_rental['judul'] ?></b></h2>
    <h3 class="font1-15"><?php echo $data_rental['isi'] ?></h3>
    <hr>
	  <a href="notifikasi.php"><button type="submit" class="button button-info" >OK</button></a>

	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php
} else {
        ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php
    } ?>
