<?php session_start();
include('database/config.php');
?>
<?php
if ($_SESSION && $_SESSION['hak_akses'] == '3') {
    header("location: page/minimarket");
} else {
    ?>

<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
  <link rel='shortcut icon' href='assets/icon/favicon.png'>
</head>

<body bgcolor="#0D9F5D">
	<h1>
		<center>LOGIN MINIMARKET</center>
	</h1>
	<hr>

	<div class="menuatas">
		<!-- <div class="dropdown">
			<button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="index.php">HOME/LOGIN</a>
			</div>
		</div> -->
    <a href="index.php"><button class="btnatas-success">HOME</button></a>
		<a href="login.php"><button class="btnatas-info">LOGIN</button></a>
		<a href="user_tambah.php"><button class="btnatas-info">REGISTER</button></a>
		<a href="minimarket.php"><button class="btnatas-warning" style="float: right;">MINIMARKET LOGIN</button></a>
	</div>
	<div class="content1">
		<div class="font" align="center">
			<br>
			<h2>Login Minimarket</h2>
			<form action="action/login_minimarket.php" method="post">
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

					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="footer">
		<div class="font">
		</div>
	</div>
	</table>
</body>

</html>

<?php
} //--------------------------------------------------------------------------------------------------------
        ?>
