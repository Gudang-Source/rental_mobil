<?php session_start();
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
$no_polisi = base64_decode($_GET['no_polisi']);
      $query = mysqli_query($con, "SELECT * FROM tbl_mobil where no_polisi='$no_polisi' ");
      $data = mysqli_fetch_assoc($query); ?>


<div class="content">
  <div class="font">

    <center>
      <h1>DETAIL MOBIL</h1>
    </center>

    <?php if ($data != null and $data['status'] != 1) {
          ?>

    <div class="container">
      <div class="produk-detail">
        <div class="produk-image" style="background-image: url(assets/img/mobil/<?php echo $data['foto_mobil']; ?>) "></div>
        <div class="produk-desc">
          <h2 class="produk-name">
            No Polisi :
            <?php echo $data['no_polisi']; ?><br>
            Merk :
            <?php echo $data['merk']; ?><br>
            Jenis :
            <?php echo $data['jenis']; ?>
          </h2>
          <p class="deskripsi">
            <b>Deskripsi: </b><br>
            <?php echo $data['keterangan']; ?>
          </p>
          <hr>
          <div class="produk-nav">
            <div class="produk-harga">
              Harga: Rp.
              <?php echo number_format($data['hrg_sewa']); ?>
            </div>
          </div>
          <br><br>
          <form action="page/member/mobil_pesan.php" method="get">
            <input type="hidden" name="no_polisi" value="<?php echo base64_encode($data['no_polisi']) ?>">
            <input type="submit" class="button button1" value="Sewa Mobil">
            <a href="index.php" class="button button-info">Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <?php
      } else {
          ?>

    <hr>
    <h3 style="color: red;">
      <center>
        404 PAGE NOT FOUND !!<br><br>
        TIDAK ADA DATA TERSEDIA, HARAP PERIKSA KEMBALI !!!
      </center>
    </h3>
    <hr>

    <?php
      } ?>

  </div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php
  } ?>
