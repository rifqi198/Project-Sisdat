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
        <?php echo "<h1>Add Playlist </h1>"; ?> 
            </div>

        <div class = "d-flex justify-content-center">
        <form action=" " method="POST" class="add-playlist">
            <p class="login-text" style="font-size: 3rem; font-weight: 800;">
			<div class="input-group-lg">
				<input type="text" placeholder="username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group-lg">
				<input type="text" placeholder="playlist name" name="playlist name" value="<?php echo $playlist_name; ?>" required>
			</div>
			<div class="input-group">
                <button name ="add" class="btn btn-success"><a href="welcome.php">add</a>
            <div class = "d-flex flex-row-reverse">
                <button name ="back" class="btn btn-warning"><a href="welcome.php">back to menu</a>
		</form>
	</div>
</main>
</body>
</html>