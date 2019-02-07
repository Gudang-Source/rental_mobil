<?php
include('../../database/config.php');
?>

<html>

<head>
	<title>Rental Mobil</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
	<link rel='shortcut icon' href='../../assets/icon/favicon.png'>
</head>

<body bgcolor="#0D9F5">
	<h1>
		<center>SUPER ADMIN</center>
	</h1>
	<hr>
	<div class="menuatas">
		<div class="dropdown">
			<button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="index.php">Beranda</a>
				<a href="profil.php">Profil</a>
				<a href="user.php">Data User</a>
				<a href="mobil.php">Data Mobil</a>
				<a href="minimarket.php">Data Minimarket</a>
				<a href="pinjam.php">Permintaan Peminjaman</a>
				<a href="kembali.php">Permintaan Pengembalian</a>
				<a href="dipinjam.php">Data Mobil Dipinjam</a>
				<a href="laporan_peminjaman.php">Laporan Peminjaman</a>
				<a href="action/logout.php">LogOut</a>
			</div>
		</div>
	</div>

	<div class="sidebar">
		<br><br>
		<div class="font">
			<h2>MENU</h2>
			<a href="index.php"><button class="button button1">Beranda</button></a>
			<a href="profil.php"><button class="button button1">Profil</button></a>
			<a href="action/logout.php"><button class="button button-danger">LogOut</button></a><br>
			<a href="user.php"><button class="button button1">Data User</button></a><br>
			<a href="mobil.php"><button class="button button1">Data Mobil</button></a><br>
			<a href="minimarket.php"><button class="button button1">Data Minimarket</button></a><br>
			<a href="pinjam.php"><button class="button button1">Permintaan Peminjaman</button></a><br>
			<a href="kembali.php"><button class="button button1">Permintaan Pengembalian</button></a><br>
			<a href="dipinjam.php"><button class="button button1">Data Mobil Dipinjam</button></a><br>
			<a href="laporan_peminjaman.php"><button class="button button1">Laporan Peminjaman</button></a><br>
		</div>
	</div>
