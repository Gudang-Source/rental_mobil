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
		<center>ADMIN</center>
	</h1>
	<hr>
	<div class="menuatas">
		<div class="dropdown">
			<button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="index.php">HOME</a>
				<a href="pinjam.php">Permintaan Peminjaman</a>
				<a href="kembali.php">Permintaan Pengembalian</a>
				<a href="dipinjam.php">Data Mobil Dipinjam</a>
				<a href="action/logout.php">LogOut</a>
			</div>
		</div>
	</div>

	<div class="sidebar">
		<br><br>
		<div class="font">
			<h2>MENU</h2>
			<a href="profil.php"><button class="button button1">Profile</button></a>
			<a href="action/logout.php"><button class="button button3">LogOut</button></a><br>
			<a href="pinjam.php"><button class="button button1">Permintaan Peminjaman</button></a><br>
			<a href="kembali.php"><button class="button button1">Permintaan Pengembalian</button></a><br>
			<a href="dipinjam.php"><button class="button button1">Data Mobil Dipinjam</button></a><br>
		</div>
	</div>
