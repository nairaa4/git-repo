<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQLi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=
          crossorigin="anonymous">
        </script>
        <script src="js/bootstrap.min.js"></script>

</head>
<body>	
	<div class="container" style="margin-top:20px">
	<br>
        <h1 style="color black" align="center">Tambah Siswa</h1>
		<br>
		<?php
		if(isset($_POST['submit'])){
			$nis			= $_POST['nis'];
			$nama			= $_POST['nama'];
			$kelas			= $_POST['kelas'];
			$jurusan		= $_POST['jurusan'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO siswa(nis, nama, kelas, jurusan) VALUES('$nis', '$nama', '$kelas', '$jurusan')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIS sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah.php" method="post">
		<h6>NIS </h6>
					<input type="text" name="nis" class="form-control" size="4" required>
		<br>


					<h6>Nama Lengkap</h6>
					<input type="text" name="nama" class="form-control" required>
			<br>	
					<h6>Kelas</h6>
				<select name="kelas" class="form-control" required>
                <option value="">Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
				<br>

			<h6>Jurusan</h6>
				<select name="jurusan" class="form-control" required>
                <option value="">Pilih Jurusan</option>
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="TKJ">Teknik Komputer dan Jaringan</option>
                <option value="MM">Multimedia</option>
                <option value="PKM">Perbankkan</option>
            </select>
	<br>
			<input type="submit" name="submit" class="btn btn-success" value="Simpan">
            <input class="btn btn-warning" type="reset" value="Reset">
            <a class="btn btn-danger" href="index.php" role="button">Batal</a>
			
			</div>
		</form>
		
	</div>
	
</body>
</html>