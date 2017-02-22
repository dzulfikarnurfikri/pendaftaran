<html>
	<head>
		<title>Halaman Pendaftaran</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
	<body>
		<div class="box-form">
			<?php
				include "koneksi.php";
				if(isset($_POST['daftar'])){
					$daftar = mysqli_query($conn, "INSERT INTO tb_daftar VALUES
					('".$_POST['id']."',
					'".$_POST['nama']."',
					'".$_POST['jk']."',
					'".$_POST['telp']."',
					'".$_POST['alamat']."',
					'".$_POST['tgl_lhr']."',
					NULL)");
					if($daftar){
						echo 'Berhasil daftar';
					}else{
						echo 'Gagal daftar';
					}
				}
			?>
			<h2>Silahkan Isi Data Diri Anda di Bawah Ini!!</h2>
			<form action="" method="post">
				<?php
					$data = mysqli_query($conn, "SELECT MAX(id_pendaftaran) AS idp FROM
					tb_daftar");
					$data_akhir = mysqli_fetch_array($data);
					$id1 = $data_akhir['idp'];
					$id2 = substr($id1,3,2); //USR01
					$id3 = $id2 + 1;
					$id4 = 'USR'.sprintf('%02s',$id3);
				?>
				<input type="hidden" name="id" value="<?php echo $id4 ?>" /><br>
				Nama Lengkap<br>
				<input type="text" name="nama" value="" /><br>
				Jenis Kelamin<br>
				<input type="radio" name="jk" value="P" title="Pria" />P &nbsp;&nbsp;&nbsp;
				<input type="radio" name="jk" value="W" title="Wanita"/>W<br>
				Telepon / Hp<br>
				<input type="text" name="telp" required /><br>
				Alamat<br>
				<textarea name="alamat" rows="4" cols="50" required></textarea><br>
				Tanggal Lahir<br>
				<input type="date" name="tgl_lhr" required /><br>
				
				<input type="submit" name="daftar" value="Daftar" /><br>
			</form>
		</div>
	</body>
</html>