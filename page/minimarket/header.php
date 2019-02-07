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
		<center>MINIMARKET</center>
	</h1>
	<hr>
	<div class="menuatas">
		<div class="dropdown">
			<button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="index.php">HOME</a>
				<a href="pembayaran.php">Pembayaran</a>
				<a href="riwayat_pembayaran.php">Riwayat Pembayaran</a>
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
			<a href="pembayaran.php"><button class="button button1">Pembayaran</button></a><br>
			<a href="riwayat_pembayaran.php"><button class="button button1">Riwayat Pembayaran</button></a><br>
		</div>
	</div>
