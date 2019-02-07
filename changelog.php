<?php
include('database/config.php');
?>
<?php require_once('header.php'); ?>
<?php
$query = mysqli_query($con, "select * from tbl_mobil where status='0' "); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<div class="content">
	<div class="font">

    <h2>CHANGE LOG</h2>

<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
<hr>Version: v4.0 - PURWA
<pre>
Change Log:
- CRUD MINIMARKET DI SUPERADMIN
- BUG FIX SUPERADMIN
- FIX TAMPILAN DETAIL MOBIL TANPA LOGIN
- FULL EDIT MINIMARKET

! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->
<hr>
<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
<br>Version: v5.0 - YUDA
<pre>
Last Update:
- BUG FIX JAVASCRIPT IN METODE PEMBAYARAN <BR>AND MOBIL PESAN <br>
- BISA BAYAR DENGAN SALDO <br>
- KETIKA KLIK METODE PEMBAYARAN AUTOMATIS <br>MEMESAN MOBIL <br>
- +ACTION METODE PEMBAYARAN PADA MOBIL <br>DI PINJAM IF STATUS==1 <br>
- FIX INPUT DATA PADA SAAT KLIK BAYAR <br>

YG BELUM KARENA GUA NGANTUK  <br> TAPI UDH ADA LOGIKANYA <br>
-KODE PEMBAYARAN ++
-VALIDASI RANGE TANGGAL
-INCLUDE WAKTU_HABIS.PHP PADA CONFIG.PHP

JIKA ADA MISS DATA MOHON MAAF
KARENA SAYA MANUSIA:)

! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->
<hr>
<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
<br>Version: v6.0 - YUDA
<pre>
Last Update:
-TAMBAH SYARAT DAN KETENTUAN <br> PADA METODE PEMBAYARAN
-FIX bug in pesan mobil tanpa login
-FIX kodepembayaran
-FIX error url metode pembayaran pada<Br> mobil di pinjam
-FIX duit kembali ketika waktu <br> pembayaran habis <br>

YG BELUM KARENA GUA NGANTUK  <br> TAPI UDH ADA LOGIKANYA <br>
-VALIDASI RANGE TANGGAL
-INCLUDE WAKTU_HABIS.PHP PADA CONFIG.PHP

JIKA ADA MISS DATA MOHON MAAF
KARENA SAYA MANUSIA:)

! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->
<hr>
<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
Version: v8.0 - PURWA
<pre>
Change Log:
- RUBAH SEMUA TAMPILAN PAGE SEBELUM LOGIN
- PENYESUAIAN STATUS MOBIL DI SUPERADMIN
- PENYESUAIAN STATUS MOBIL DI MINIMARKET
- PERUBAHAN TAMPILAN PAGE MEMBER
- PERAPIHAN CODINGAN MOBIL_DIPINJAM.PHP DI MEMBER
- PERAPIHAN TAMPILAN MOBIL DIPINJAM DI MEMBER
- PERAPIHAN CODINGAN RIWAYAT_PINJAM.PHP DI MEMBER
- PERAPIHAN TAMPILAN RIWAYAT PINJAM DI MEMBER
- PEMBUATAN SEMUA FITUR ADMIN

<div style="color: red;">
BUG KNOWS:
- KODE PEMBAYARAN TIDAK MASUK KE RIWAYAT PINJAM -- DI PAGE MEMBER
</div>
! DELETE THIS IF THIS PROJECT IS DONE !
</pre>

<hr>
<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
Version: v9.0 - YUDA
<pre>
Change Log:
- Penambahan NOTA (nota muncul apabila status >=2)
- Penambahan Notifikasi(Notifikasi muncul di setiap proses yang menyangkut rental mobil)

<div style="color: red;">
YANG BELUM :
-Desain dropdown untuk notifikasi
-Include skrip untuk cek waktu expired
-Menambahkan Jam pada setiap pemesanan
-Menambahkan enkripsi untuk setiap url yang isinya ada $_GET
</div>
! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->
<hr>
<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
Version: v10.0 - PURWA
<pre>
Change Log:
- PERBAIKAN VERSI CHANGE LOG, DIMANA TERDAPAT 2 VERSI 8
- PERBAIKAN QUERY NOTIFIKASI SAAT PINJAM TERIMA / TOLAK SUPERADMIN
- PERBAIKAN QUERY NOTIFIKASI SAAT PINJAM TERIMA / TOLAK ADMIN
- PEMBUATAN DESAIN NOTIFIKASI DI PAGE MEMBER
- PERUBAHAN ACTION UPDATE_STATUS_NOTIFIKASI.PHP DI PAGE MEMBER DARI $_POST MENJADI $_GET

<div style="color: red;">
BUG KNOWS :
- X
</div>
<div style="color: green;">
YANG BELUM :
- Include skrip untuk cek waktu expired
- Menambahkan Jam pada setiap pemesanan
- Menambahkan enkripsi untuk setiap url yang isinya ada $_GET
- Pembuatan script TANDAI BACA SEMUA
</div>
! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->
<hr>
<!-- WARNING DELETE THIS IF THIS PROJECT IS DONE -->
Version: v10.1 - PURWA
<pre>
Change Log:
- PERUBAHAN TAMPILAN NOTA PADA MOBIL DIPINJAM -- DI PAGE MEMBER
- PEMBUATAN PRINT NOTA PADA NOTA MOBIL DIPINJAM -- DI PAGE MEMBER
- PERUBAHAN TAMPILAN NOTA PADA RIWAYAT NOTA -- DI PAGE MEMBER
- PEMBUATAN PRINT NOTA PADA NOTA RIWAYAT NOTA -- DI PAGE MEMBER
- PEMBUATAN HALAMAN + PRINT LAPORAN PEMINJAMAN -- DI PAGE SUPER ADMIN
- PEMBUATAN FAV ICON PADA SETIAP HEADER.PHP -- DI SEMUA PAGE
- PEMBUATAN SCRIPT TANDAI BACA SEMUA NOTIFIKASI DI ACTION -- DI PAGE MEMBER
- PEMBUATAN SCRIPT HAPUS NOTIFIKASI DI ACTION -- DI PAGE MEMBER
- PERUBAHAN TAMPILAN BACA NOTIFIKASI -- DI PAGE MEMBER

<div style="color: red;">
BUG KNOWS :
- X
</div>
<div style="color: green;">
YANG BELUM :
- Include skrip untuk cek waktu expired
- Menambahkan Jam pada setiap pemesanan
- Menambahkan enkripsi untuk setiap url yang isinya ada $_GET
</div>
! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<hr>
Version: v10.2 - YUDA
<pre>
Change Log:
- PENAMBAHAN PERSAYARATAN PEMESANAN - TAMPILAN MOBIL PESAN
- PENAMBAHAN DENDA PADA TABEL RIWAYAT RENTAL
- PENAMBAHAN DENDA JIKA TELAT MENGEMBALIKAN MOBIL
- PENAMBAHAN TOTAL DENDA PADA NOTA DI RIWAYAT RENTAL
<div style="color: red;">
BUG KNOWS :
- ERROR QUERY_NOTIF (ADMIN) -> FIXED;
</div>
<div style="color: green;">
YANG BELUM :
- Penambahan scroll dropdown pada notifikasi supaya tampil notifikasi ngga kebawah-bawah
- Include skrip untuk cek waktu expired (skip)
- Menambahkan Jam pada setiap pemesanan (skip)
- Menambahkan enkripsi untuk setiap url yang isinya ada $_GET (skip)
</div>
! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->
<hr>
Version: v11 FINAL VERSION --- PURWA SABRANG RAMADHAN
<pre>
Change Log:
- FIX NOTA ERROR JIKA BAYAR DENGAN SALDO -- PAGE MEMBER
- FIX ERROR JIKA NO POLISI SAMA -- PAGE SUPERADMIN
<div style="color: red;">
BUG KNOWS :
- X
</div>
<div style="color: green;">
YANG BELUM :
- Penambahan scroll dropdown pada notifikasi supaya tampil notifikasi ngga kebawah-bawah (skip)
- Include skrip untuk cek waktu expired (skip)
- Menambahkan Jam pada setiap pemesanan (skip)
- Menambahkan enkripsi untuk setiap url yang isinya ada $_GET (skip)
</div>
! DELETE THIS IF THIS PROJECT IS DONE !
</pre>
<!-- WARNING END OF DELETE -->

	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
