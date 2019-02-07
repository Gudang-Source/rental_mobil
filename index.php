<?php session_start();
include('database/config.php');
?>
<?php
if ($_SESSION && $_SESSION['hak_akses'] == '0') {
    header("location: page/superadmin");
} elseif ($_SESSION && $_SESSION['hak_akses'] == '1') {
    header("location: page/admin");
} elseif ($_SESSION && $_SESSION['hak_akses'] == '2') {
    header("location: page/member");
} else {
    ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$query = mysqli_query($con, "select * from tbl_mobil where status='0' ");
    $query_cek = mysqli_query($con, "select * from tbl_mobil where status='0' ");
    $data_cek = mysqli_fetch_assoc($query_cek) ?>

<div class="content">
  <div class="font">

    <h1>
      <center>MOBIL TERSEDIA</center>
    </h1>
<?php if ($data_cek != null) {
        ?>
<?php while ($data = mysqli_fetch_assoc($query)) {
            ?>
    <div class="box">
      <div class="produk-image" style="background-image: url(assets/img/mobil/<?php echo $data['foto_mobil']; ?>) "></div>
      <div class="produk-desc">
        <h2 class="produk-name"><a href="#"><?php echo $data['jenis']; ?> - <?php echo $data['merk']; ?></a></h2>
        <p class="produk-harga">
          Rp. <?php echo number_format($data['hrg_sewa']); ?>
        </p>
      </div>
      <div class="produk-nav">
        <a class="btn" href="mobil_detail.php?no_polisi=<?php echo base64_encode($data['no_polisi']); ?>">Sewa / Detail</a>
      </div>
    </div>
<?php
        } ?>
<?php
    } else {
        ?>
<hr>
<center>
  <h4 style="color: red;">
MAAF! SAAT INI TIDAK ADA MOBIL YANG TERSEDIA
</h4>
</center>
<hr>
<?php
    } ?>

  </div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>

<?php
} //--------------------------------------------------------------------------------------------------------
        ?>
