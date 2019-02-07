<?php session_start();
include "../database/config.php";

$username= mysql_real_escape_string($_POST['username']);
$password= mysql_real_escape_string($_POST['password']);
$query=mysqli_query($con, "select * from tbl_minimarket where username='$username' and password='$password'");
$cek=mysqli_num_rows($query);

if ($cek) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['id_minimarket']= $row['id_minimarket'];
    $_SESSION['username']= $row['username'];
    $_SESSION['password']= $row['password'];
    $_SESSION['minimarket']= $row['minimarket'];
    $_SESSION['harga']= $row['harga'];
    $_SESSION['saldo']= $row['saldo'];
    $_SESSION['hak_akses']= $row['hak_akses'];
    if ($row['hak_akses'] == '3') {
        header("location: ../page/minimarket/index.php");
    }
} else {
    ?>
<script language="javascript">
	alert("Username / Password Salah!");
	document.location = '../minimarket.php'
</script>
<?php
}

?>
