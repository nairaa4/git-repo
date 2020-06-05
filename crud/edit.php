<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQLi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel siswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$kelas			= $_POST['kelas'];
			$jurusan		= $_POST['jurusan'];
			
			$sql = mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		<br>
	<div class="container" style="margin-top:50px">
			
		<form action="edit.php?id=<?php echo $id; ?>" method="post">
		<h6>NIS </h6> 
                    <input type="number" name="nis" class="form-control" value="<?php echo $data['nis'];?>"required></td>   <br>                    
                        
                    <h6>Nama Lengkap</h6> 
                    <input type="text" class="form-control" name="nama" size="30" value="<?php echo $data['nama'];?>"required></td> <br>                            

                    <h6>Kelas</h6>            
                    <select name="kelas" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X" <?php if($data['kelas']=='X'){echo'selected';}?>>X</option>
                        <option value="XI" <?php if($data['kelas']=='XI'){echo'selected';}?>>XI</option>
                        <option value="XII" <?php if($data['kelas']=='XII'){echo'selected';}?>>XII</option>
                    </select>   <br>
                            
                    <h6>Jurusan</h6>
                    <select name="jurusan" class="form-control" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="RPL" <?php if($data['jurusan']=='RPL'){echo'selected';}?>>Rekayasa Perangkat Lunak</option>
                        <option value="TKJ" <?php if($data['jurusan']=='TKJ'){echo'selected';}?>>Teknik Komputer dan Jaringan</option>
                        <option value="MM" <?php if($data['jurusan']=='MM'){echo'selected';}?>>Multimedia</option>
                        <option value="PKM" <?php if($data['jurusan']=='PKM'){echo'selected';}?>>Perbankkan</option>
                    </select>   <br>

                    <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                    <a class="btn btn-danger" href="index.php" role="button">Batal</a>
		</form>
		
	</div>
	
</body>
</html>