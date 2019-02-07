<?php
include('../../database/config.php');
$id_user = $_SESSION['id_user'];
?>

<html>

<head>
	<title>Rental Mobil</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
	<link rel='shortcut icon' href='../../assets/icon/favicon.png'>
</head>

<body bgcolor="#0D9F5">
	<h1>
		<center>MEMBER</center>
	</h1>
	<hr>
	<div class="menuatas">
		<!-- <div class="dropdown">
			<button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="index.php">HOME</a>
				<a href="mobil.php">Mobil Tersedia</a>
				<a href="mobil_dipinjam.php">Mobil Dipinjam</a>
				<a href="riwayat_pinjam.php">Riwayat Pinjam</a>
				<a href="action/logout.php">LogOut</a>
			</div>
		</div> -->
		<a href="index.php"><button class="btnatas-success">HOME</button></a>
		<a href="profil.php"><button class="btnatas-success">PROFIL</button></a>
		<?php
				$query_notif = mysqli_query($con, "SELECT COUNT(*) as jumlah FROM tbl_notifikasi where status ='0' AND id_user='$id_user' ");
				$data_notif  = mysqli_fetch_array($query_notif);
				$jumlah_notif_belum_di_baca = $data_notif['jumlah'];
			?>
		<div class="notif">
			<button class="notifbtn">
				<?php if($jumlah_notif_belum_di_baca > 0) { ?>
					<div>NOTIFIKASI (<?php echo $jumlah_notif_belum_di_baca ?>)</div>
				<?php } else { ?>
					NOTIFIKASI
				<?php } ?>
			</button>
			<div class="notif-content">
				<div class="notif-main">
					<div class="notif-main-header">
						<h2>
							<?php if($jumlah_notif_belum_di_baca > 0) { ?>
								<div style="color: red">NOTIFIKASI (<?php echo $jumlah_notif_belum_di_baca ?>)</div>
							<?php } else { ?>
								NOTIFIKASI
							<?php } ?>
						</h2>
						<a href="notifikasi.php" class="button button-info">Lihat Semua Notifikasi</a>
						<a href="action/update_status_notifikasi_all.php?id_user=<?php echo $id_user; ?>" class="button button1">Tandai Baca Semua</a>
					</div>
					<hr>
					<?php
					$query_notifikasi = mysqli_query($con, "SELECT * FROM tbl_notifikasi where id_user='$id_user' ORDER BY id_notifikasi DESC ");
					while ($data_notifikasi = mysqli_fetch_assoc($query_notifikasi)) { ?>
					<a href="action/update_status_notifikasi.php?id_notifikasi=<?php echo $data_notifikasi['id_notifikasi']; ?>" class="a">
						<div class="<?php if ($data_notifikasi['status'] == 0) echo 'notif-main-content'; else echo 'notif-main-content-baca'; ?>">
						<h3>
							<?php echo $data_notifikasi['judul']; ?>
						</h3>
						<?php echo $data_notifikasi['isi']; ?>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<a href="mobil.php"><button class="btnatas-info">MOBIL TERSEDIA</button></a>
		<a href="mobil_dipinjam.php"><button class="btnatas-info">MOBIL DIPINJAM</button></a>
		<a href="riwayat_pinjam.php"><button class="btnatas-info">RIWAYAT PINJAM</button></a>
		<a href="action/logout.php"><button class="btnatas-danger" style="float: right;">LOGOUT</button></a>
	</div>

	<!-- <div class="sidebar">
		<br><br>
		<div class="font">
			<h2>MENU</h2>
			<a href="profil.php"><button class="button button1">Profile</button></a>
			<a href="action/logout.php"><button class="button button3">LogOut</button></a><br>
			<a href="mobil.php"><button class="button button1">Mobil Tersedia</button></a><br>
			<a href="mobil_dipinjam.php"><button class="button button1">Mobil Dipinjam</button></a><br>
			<a href="riwayat_pinjam.php"><button class="button button1">Riwayat Pinjam</button></a><br>
		</div>
	</div> -->
