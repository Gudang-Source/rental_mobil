<?php
$server="localhost";
$user="root";
$pass="";

    $con = mysqli_connect($server, $user, $pass) or die("Koneksi Gagal");
    mysqli_select_db($con, 'rental_mobil')or die("Database Tidak Ada");
