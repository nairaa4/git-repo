<?php
//memasukkan file config.php
include('config.php');
?>
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
<body> <br>     
	<h2 align="center">Daftar Siswa di SMK Bina Informatika</h2> <br> <br>
	<div class="container">
        <div align="left">
        <a href="tambah.php" class="btn btn-success">+ Tambah Data</a> 
        <div align="right"><a href="../admin/logout.php" class="btn btn-danger">LOGOUT</a></div>  <br>
      </div>

		<table width='80%' height='20%' border=2>
          <table class="table table-bordered">
            <div class="row">
				<tr>
					<th><center>No.</center></th>
					<th><center>NIS</center></th>
					<th><center>Nama Lengkap</center></th>
					<th><center>Kelas</center></th>
					<th><center>Jurusan</center></th>
					<th><center>Opsi</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel siswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr> 
							<td><center>'.$no.'</center></td>
							<td>'.$data['nis'].'</td>
							<td>'.$data['nama'].'</td>
							<td><center>'.$data['kelas'].'</center></td>
							<td><center>'.$data['jurusan'].'</center></td>
							<td> <center>
								<a href="edit.php?id='.$data['id'].'" class="btn btn-warning">Edit</a>
								<a href="delete.php?id='.$data['id'].'" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>
							</center>
							</td>
						</tr> 
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>
	</div>
</body>
</html>