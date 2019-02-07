<?php
include ('../../../database/config.php');

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = base64_encode($_POST['password']);
$repassword = base64_encode($_POST['repassword']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

if($password == $repassword){
	if($_FILES['foto_ktp']['name']!=null && $_FILES['foto_kk']['name']!=null){
		$ktp = $_FILES['foto_ktp']['name'];
		$ktp_temp = $_FILES['foto_ktp']['tmp_name'];
		$kk = $_FILES['foto_kk']['name'];
		$kk_temp = $_FILES['foto_kk']['tmp_name'];

		$foto_ktp = date('dmYHis_').$ktp;
		$foto_kk = date('dmYHis_').$kk;

		$ktp_path = '../../../assets/img/user/ktp/'.$foto_ktp;
		$kk_path = '../../../assets/img/user/kk/'.$foto_kk;

		$upload_ktp = move_uploaded_file($ktp_temp,$ktp_path);
		$upload_kk = move_uploaded_file($kk_temp,$kk_path);

		if ($upload_ktp && $upload_kk) {
			$query = mysqli_query($con, "UPDATE tbl_user set username='$username', password='$password', nama='$nama', alamat='$alamat', no_hp='$no_hp', foto_ktp='$foto_ktp', foto_kk='$foto_kk' where id_user='$id_user' ");
			if($query){?>
				<script language="javascript">
					alert('Edit Data Sukses');
					window.location = "logout.php";
				</script>
		<?php
			}else{
				echo mysqli_error($con);
			}
		}else{ ?>
		<script language="javascript">
			alert('Gagal Upload Gambar');
			window.location = "../profil.php";
		</script>
		<?php
		}
	}elseif($_FILES['foto_ktp']['name']!=null){
		$ktp = $_FILES['foto_ktp']['name'];
		$ktp_temp = $_FILES['foto_ktp']['tmp_name'];

		$foto_ktp = date('dmYHis_').$ktp;

		$ktp_path = '../../../assets/img/user/ktp/'.$foto_ktp;

		$upload_ktp = move_uploaded_file($ktp_temp,$ktp_path);

		if ($upload_ktp) {
			$query = mysqli_query($con, "UPDATE tbl_user set username='$username', password='$password', nama='$nama', alamat='$alamat', no_hp='$no_hp', foto_ktp='$foto_ktp' where id_user='$id_user' ");
			if($query){?>
				<script language="javascript">
					alert('Edit Data Sukses');
					window.location = "logout.php";
				</script>
		<?php
			}else{
				echo mysqli_error($con);
			}
		}else{ ?>
		<script language="javascript">
			alert('Gagal Upload Gambar');
			window.location = "../profil.php";
		</script>
		<?php
		}
	}elseif($_FILES['foto_kk']['name']!=null){
		$kk = $_FILES['foto_kk']['name'];
		$kk_temp = $_FILES['foto_kk']['tmp_name'];

		$foto_kk = date('dmYHis_').$kk;

		$kk_path = '../../../assets/img/user/kk/'.$foto_kk;

		$upload_kk = move_uploaded_file($kk_temp,$kk_path);

		if ($upload_kk) {
			$query = mysqli_query($con, "UPDATE tbl_user set username='$username', password='$password', nama='$nama', alamat='$alamat', no_hp='$no_hp', foto_kk='$foto_kk' where id_user='$id_user' ");
			if($query){?>
				<script language="javascript">
					alert('Edit Data Sukses');
					window.location = "logout.php";
				</script>
		<?php
			}else{
				echo mysqli_error($con);
			}
		}else{ ?>
		<script language="javascript">
			alert('Gagal Upload Gambar');
			window.location = "../profil.php";
		</script>
		<?php
		}
	}else{
		$query = mysqli_query($con, "UPDATE tbl_user set username='$username', password='$password', nama='$nama', alamat='$alamat', no_hp='$no_hp' where id_user='$id_user' ");
		if($query){?>
			<script language="javascript">
				alert('Edit Data Sukses');
				window.location = "logout.php";
			</script>
	<?php
		}else{
			echo mysqli_error($con);
		}
	}
}else{ ?>
	<script language="javascript">
		alert('PASSWORD TIDAK SAMA');
		window.location = "../profil.php";
	</script>
<?php } ?>
