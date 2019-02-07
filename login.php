<?php session_start();
include('database/config.php');
?>
<?php
if ($_SESSION && $_SESSION['hak_akses'] == '0') {
    header("location: page/superadmin");
} elseif ($_SESSION && $_SESSION['hak_akses'] == '1') {
    header("location: page/admin");
} elseif ($_SESSION && $_SESSION['hak_akses'] == '2') {
    header("location: page/member");
} else {
    ?>
<?php require_once('header.php'); ?>
<?php
$query = mysqli_query($con, "select * from tbl_mobil where status='0' "); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<div class="content">
	<div class="font">
    <center>

    <h2>LOGIN</h2>
			<form action="action/login.php" method="post">
				<table>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" size="20" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" size="20" required></td>
					</tr>
					<tr>
						<td><button class="button button1" type="submit" name="Login" value="Login">LOGIN</button></td>
						<td><a href="user_tambah.php" class="button button2">REGISTER</a></td>
					</tr>
				</table>
			</form>
    </center>
	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>

<?php
} //--------------------------------------------------------------------------------------------------------
        ?>
