<?php session_start();
date_default_timezone_set('Asia/Jakarta');
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_user = $_SESSION['id_user'];
    $query = mysqli_query($con, "SELECT *,tbl_rental.status AS status_pembayaran FROM tbl_rental inner join
    tbl_user on tbl_rental.id_user=tbl_user.id_user inner join
    tbl_mobil on tbl_rental.no_polisi=tbl_mobil.no_polisi left join
    tbl_minimarket on tbl_rental.id_minimarket=tbl_minimarket.id_minimarket
    where tbl_rental.id_user=$id_user");
    $query_minimarket = mysqli_query($con, "SELECT id_minimarket from tbl_rental where id_user='$id_user' ")?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">
		<h1>

			<center>MOBIL DIPINJAM</center>
		</h1>
		<table style="text-align: center;" border="3" cellpadding="4" height="auto">
			<tr>
				<th>NAMA</th>
				<th>NO POLISI</th>
				<th>MOBIL</th>
				<th>TANGGAL RENTAL</th>
        <th>TANGGAL KEMBALI</th>
        <th>MINIMARKET</th>
        <th>KODE PEMBAYARAN</th>
        <th>TOTAL HARGA</th>
        <th>SALDO DIPAKAI</th>
        <th>STATUS RENTAL</th>
        <th>SISA WAKTU PEMBAYARAN</th>
        <th>NOTA</th>
				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
        ?>
			<tr>
				<td>
					<?php echo $data['nama']; ?>
				</td>
				<td>
					<?php echo $data['no_polisi']; ?>
				</td>
        <td width="20%">
					MERK 	: <?php echo $data['merk']; ?><br>
					JENIS	: <?php echo $data['jenis']; ?>
				</td>
        <td>
					<?php echo $data['tgl_rental']; ?>
				</td>
        <td>
					<?php echo $data['tgl_kembali']; ?>
				</td>
        <td>
          <?php if ($data['minimarket'] == null) {
            echo "N/A";
        } else {
            echo $data['minimarket'];
        } ?>
        </td>
        <td>
          <?php if ($data['kode_pembayaran'] == null) {
            echo "N/A";
        } else {
            echo $data['kode_pembayaran'];
        } ?>
        </td>
        <td>
          <?php echo "Rp.".number_format($data['ttl_harga']); ?>
        </td>
        <td>
          <?php echo "Rp.".number_format($data['input_saldo_user']); ?>
        </td>
        <td>
          <?php if ($data['status_pembayaran'] == '1') {
            ?>
            <div style='color: gray;'>Mobil Dipesan</div>
          <?php
        } elseif ($data['status_pembayaran'] == '2') {
            ?>
            <div style='color: black;'>Silahkan Bayar Ke Minimarket</div>
          <?php
        } elseif ($data['status_pembayaran'] == '3') {
            ?>
            <div style='color: blue;'>Menunggu Penerimaan Admin</div>
          <?php
        } elseif ($data['status_pembayaran'] == '4') {
            ?>
            <div style='color: green;'>Sedang Dirental</div>
          <?php
        } elseif ($data['status_pembayaran'] == '5') {
            ?>
            <div style='color: brown;'>Menunggu Penerimaan Pengembalian</div>
          <?php
        } ?>
        </td>
        <td>
          <?php if ($data['status_pembayaran'] == '1') {
            ?>
            N/A
          <?php
        } elseif ($data['status_pembayaran'] == '2') {
            ?>
            <p id="demo" class="waktu_pembayaran"
              data-value='<?php echo strtotime($data['waktu_pembayaran']) ?>'
              data-id_rental='<?php echo $data['id_rental']; ?>'></p>
          <?php
        } elseif ($data['status_pembayaran'] == '3') {
            ?>
            N/A
          <?php
        } elseif ($data['status_pembayaran'] == '4') {
            ?>
            N/A
          <?php
        } elseif ($data['status_pembayaran'] == '5') {
            ?>
            N/A
          <?php
        } ?>
        </td>
        <td><?php if ($data['status_pembayaran'] < 2) {
            echo "N/A";
        } elseif ($data['status_pembayaran'] >= 2) {
            ?><form action="nota.php?id_rental=<?php echo $data['id_rental'] ?>" method="POST">
              <input type="hidden" name="id_rental" value="<?php echo $data['id_rental']; ?>">
              <input type="submit" class="button button-info" value="Lihat Nota">
            </form>
            <?php
        } ?></td>
        <td>
          <?php if ($data['status_pembayaran'] == '1') {
            ?>
            <form action="metode_pembayaran.php?id_rental=<?php echo $data['id_rental'] ?>&no_polisi=<?php echo $data['no_polisi']; ?>" method="POST">
              <input type="hidden" name="id_rental" value="<?php echo $data['id_rental']; ?>">
              <input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
              <input type="submit" class="button button-info" value="Pembayaran">
            </form>
          <?php
        } elseif ($data['status_pembayaran'] == '2') {
            ?>
            N/A
          <?php
        } elseif ($data['status_pembayaran'] == '3') {
            ?>
            N/A
          <?php
        } elseif ($data['status_pembayaran'] == '4') {
            ?>
            <form action="action/mobil_kembalikan.php" method="POST">
              <input type="hidden" name="id_rental" value="<?php echo $data['id_rental']; ?>">
              <input type="hidden" name="no_polisi" value="<?php echo $data['no_polisi']; ?>">
              <input type="submit" class="button button-info" value="kembalikan mobil">
            </form>
          <?php
        } elseif ($data['status_pembayaran'] == '5') {
            ?>
            N/A
          <?php
        } ?>
        </td>
			</tr>
      <script>
      // Set the date we're counting down to
      // 1. JavaScript
      // var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
      // 2. PHP

      // Update the count down every 1 second

      var x = setInterval(function() {
          var waktu_pembayaran = document.querySelectorAll('.waktu_pembayaran');
          let now = (new Date()).getTime();

          for (let sisa_waktu of waktu_pembayaran)
          {
          // Get todays date and time
          // 1. JavaScript
          // var now = new Date().getTime();
          // 2. PHP
          var batas_waktu_pembayaran = sisa_waktu.getAttribute('data-value');
          var id_rental = sisa_waktu.getAttribute('data-id_rental');
          var sisa_waktu_dalam_detik = batas_waktu_pembayaran * 1000;

          // Find the distance between now an the count down date
          var distance = sisa_waktu_dalam_detik - now;
          console.log('sisa: ', sisa_waktu_dalam_detik);
          console.log('sekarang: ', now);

          // Time calculations for days, hours, minutes and seconds
          const oneDay = (1000 * 60 * 60 * 24); // 86400
          var days = Math.floor(distance / oneDay);
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Output the result in an element with id="demo"
          sisa_waktu.innerHTML = days + "d " + hours + "h " +
              minutes + "m " + seconds + "s ";

          // If the count down is over, write some text
          if (distance < 0) {
              clearInterval(x);
              window.location="js_action/waktu_habis.php?id_rental="+id_rental;
              // var xhttp = new XMLHttpRequest();
              // xhttp.open('GET', 'js_action/waktu_habis.php?id_rental=' + id_rental);
              // xhttp.send();
          }
          }
      }, 1000);
      </script>
    	<?php
    } ?>
		</table>

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
