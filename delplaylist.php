<?php 

include 'config.php';

if(isset($_GET['playlist_id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$playlist_id = $_GET['playlist_id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($conn, "SELECT * FROM playlist WHERE playlist_id='$playlist_id'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($conn, "DELETE FROM playlist WHERE playlist_id='$playlist_id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus playlist."); document.location="index.php?page=tampil_mhs";</script>';
		}else{
			echo '<script>alert("Gagal menghapus playlist."); document.location="index.php?page=tampil_mhs";</script>';
		}
	}else{
		echo '<script>alert("playlist tidak ditemukan di database."); document.location="index.php?page=tampil_mhs";</script>';
	}
}else{
	echo '<script>alert("playlist tidak ditemukan di database."); document.location="index.php?page=tampil_mhs";</script>';
}

?>