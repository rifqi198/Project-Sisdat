<?php 

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="pagestyle.css">
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-music"></i> RHYTM</h1>
        <h1 class="py-4 white rounded"><i class="far fa-user"></i><?php echo $_SESSION['username'] ?></h1>

        <div class = "d-flex justify-content-align">
            <?php echo "<h1>Playlist </h1>"; ?>
            </div>

        <div class="table-responsive">          
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>No </th>
                        <th>Playlist Name</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <?php             
                               //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                $sql = mysqli_query($conn, "SELECT playlist_name FROM playlist") or die(mysqli_error($conn));
                                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                                if(mysqli_num_rows($sql) > 0){
                                    //membuat variabel $no untuk menyimpan nomor urut
                                    $no = 1;
                                    //melakukan perulangan while dengan dari dari query $sql
                                    while($data = mysqli_fetch_assoc($sql)){
                                        //menampilkan data perulangan
                                        echo '
                                        <tr>
							<td>'.$no.'</td>
							<td>'.$data['playlist_name'].'</td>
							<td>
                                <a href = "updateplaylist.php?page=editplaylist='.$data['playlist_id'].'"class="btn btn-basic"><a href="updateplaylist.php"><i class="fas fa-pen-fancy"></i></a>
                                <a href = "songlist.php?page=editplaylist='.$data['playlist_id'].'<a href="songlist.php"><i class="fas fa-eye"></i></a>
                                <a href = "music.php?page=editplaylist='.$data['playlist_id'].'<a href="music.php"><i class="fas fa-plus"></i></a>
                                <a href = "delplaylist.php?page=editplaylist='.$data['playlist_id'].'<a href="delplaylist.php"><i class="fas fa-trash-alt"></i>
							</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				} 
                            ?>
                            </td>
                        <tr>
                    </tbody>
                    </div>
    </div>                                    

        <div class="d-flex justify-content-align">
        <button type="button" class="btn btn-success"><a href="addplaylist.php">add playlist</a></button> </div>
        
        <div class = "fixed-bottom">
            <a href="logout.php">Logout</a> </div>

</main>
</body>
</html>