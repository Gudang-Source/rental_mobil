<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '1'){ ?>
<?php require_once('header.php'); ?>

<div class="content">
	<div class="font">
		<h1>Selamat Datang...</h1>
		<?php
	echo "<h2><strong><font color=blue>".$_SESSION['nama']."</h2></strong></font><p>";
		?>
		</center>
		</h1>
	</div>
</div>

<?php require_once('footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
