<?php session_start();
include "../database/config.php";

$username= mysql_real_escape_string($_POST['username']);
$password= base64_encode(mysql_real_escape_string($_POST['password']));
$query=mysqli_query($con, "select * from tbl_user where username='$username' and password='$password'");
$cek=mysqli_num_rows($query);

if ($cek) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['id_user']= $row['id_user'];
    $_SESSION['username']= $row['username'];
    $_SESSION['password']= base64_decode($row['password']);
    $_SESSION['nama']= $row['nama'];
    $_SESSION['alamat']= $row['alamat'];
    $_SESSION['no_hp']= $row['no_hp'];
    $_SESSION['foto_ktp']= $row['foto_ktp'];
    $_SESSION['foto_kk']= $row['foto_kk'];
    $_SESSION['saldo']= $row['saldo'];
    $_SESSION['hak_akses']= $row['hak_akses'];
    if ($row['hak_akses'] == '0') {
        header("location: ../page/superadmin/index.php");
    } elseif ($row['hak_akses'] == '1') {
        header("location: ../page/admin/index.php");
    } elseif ($row['hak_akses'] == '2') {
        header("location: ../page/member/index.php");
    }
} else {
    ?>
<script language="javascript">
	alert("Username / Password Salah!");
	document.location = '../login.php'
</script>
<?php
}

?>
