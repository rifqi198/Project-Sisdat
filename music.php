<?php 

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: welcome.php");
}
if (isset($_POST['add'])) {
	$username = $_POST['username'];
	$playlist_name = $_POST['playlist_name'];

	if ($username == $_SESSION['username']) {
		$sql = "SELECT * FROM playlist WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO playlist (username, playlist_name)
					VALUES ('$username', '$playlist_name')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('you added a playlist.')</script>";
				$username = "";
				$playlist_name = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! playlist name already exist.')</script>";
		}
		
	} else {
		echo "<script>alert('Wrong username.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Playlist</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="pagestyle.css">
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-music"></i> RHYTM</h1> 

        <div class = "d-flex justify-content-center">
        <?php echo "<h1>Music list </h1>"; ?> 
            </div>

    <div class="table-responsive">          
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Artist_id</th>
            <th>Album_id</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>    </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>2002</td>
            <td>1234</td>
            <td>4321</td>
            <td>pop</td>
            <td>3:60</td>
            <td>
                <div class="p-2">
                <button type="button" class="btn btn-success"><a href="music.php">add</a></button>  
            </div></td>
        </tr>
        </tbody>
        </div>
</main>
</body>
</html>