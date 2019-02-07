<?php session_start();
date_default_timezone_set('Asia/Jakarta');
if ($_SESSION && $_SESSION['hak_akses'] == '2') {
    ?>
<?php require_once('header.php'); ?>
<?php
$id_user = $_SESSION['id_user'];
    $query = mysqli_query($con, "SELECT *,tbl_notifikasi.status AS status_notifikasi ,tbl_notifikasi.id_rental AS id_rental_notifikasi
      from tbl_notifikasi left join
      tbl_rental on tbl_notifikasi.id_rental = tbl_rental.id_rental left join
      riwayat_rental on tbl_notifikasi.id_rental = riwayat_rental.id_rental
      where tbl_notifikasi.id_user='$id_user' "); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->

<div class="content">
	<div class="font">
		<h1>

			<center>NOTIFIKASI</center>
		</h1>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>NO</th>
        <th>ID RENTAL</th>
				<th>JUDUL</th>
				<th>STATUS</th>

				<th colspan="2">ACTION</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <?php if ($data['status_notifikasi'] == 0) {
            ?><tr style="color: red;"><?php
        } ?>
				<td>
					<?php echo $data['id_notifikasi']; ?>
				</td>
        <td>
          <?php echo $data['id_rental_notifikasi']; ?>
        </td>
				<td>
					<?php echo $data['judul']; ?>
				</td>
        <td>
					<?php if ($data['status_notifikasi'] == 0) {
            echo "belum di baca" ;
        } elseif ($data['status_notifikasi'] == 1) {
            echo "sudah di baca";
        } ?>
				</td>
        </div>

        <td>
          <form action="action/update_status_notifikasi.php" method="GET">
            <input type="hidden" name="id_notifikasi" value="<?php echo $data['id_notifikasi']; ?>">
            <input type="submit" class="button button-info" value="Baca">
          </form>
        </td>
        <td>
          <form action="action/hapus_notifikasi.php" method="POST">
            <input type="hidden" name="id_notifikasi" value="<?php echo $data['id_notifikasi']; ?>">
            <input type="submit" class="button button-info" value="Hapus">
          </form>
        </td>
			</tr>
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
