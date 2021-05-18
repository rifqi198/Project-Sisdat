<?php 

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: addplaylist.php");
}

if (isset($_POST['add'])) {
	if ($username == $_SESSION['username']) {
		$sql = "SELECT * FROM playlist WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO playlist (username, playlist_name)
					VALUES ('$username', '$playlist_name')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('you added a song.')</script>";
				$username = "";
				$playlist_name = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! song already exist.')</script>";
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
    <title>Music</title>

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
            <th>Artist</th>
            <th>Album</th>         
            <th>Duration</th>
            <th>    </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>Faded</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Instrument</td>
                <td>3:30</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>ignite</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Instrument</td>
                <td>2:40</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Routine</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Instrument</td>
                <td>2:47</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Alone</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Remix</td>
                <td>2:50</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Spectre</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Remix</td>
                <td>3:51</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>On My Way</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Remix</td>
                <td>3:15</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Lily</td>
                <td><a href="123artist.php">Alan Walker</a></td>
                <td>Remix</td>
                <td>3:00</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Nandemonaiya</td>
                <td><a href="321artist.php">Radwimps</a></td>
                <td>Your Name</td>
                <td>4:00</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Sparkle</td>
                <td><a href="321artist.php">Radwimps</a></td>
                <td>Your Name</td>
                <td>8:00</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Grand Escape</td>
                <td><a href="321artist.php">Radwimps</a></td>
                <td>Tenki No Ko</td>
                <td>5:00</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Rain Again</td>
                <td><a href="321artist.php">Radwimps</a></td>
                <td>Tenki No Ko</td>
                <td>2:30</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>We ll Be Alright</td>
                <td><a href="321artist.php">Radwimps</a></td>
                <td>Tenki No Ko</td>
                <td>4:00</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Perfectly</td>
                <td><a href="132artist.php">Taylor Swift</a></td>
                <td>Populer</td>
                <td>4:30</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Willow</td>
                <td><a href="132artist.php">Taylor Swift</a></td>
                <td>Populer</td>
                <td>3:30</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Love Story</td>
                <td><a href="132artist.php">Taylor Swift</a></td>
                <td>Populer</td>
                <td>3:35</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Just Like This</td>
                <td><a href="231artist.php">TC</a></td>
                <td>Coldplay</td>
                <td>4:07</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Closer</td>
                <td><a href="231artist.php">TC</a></td>
                <td>Coldplay</td>
                <td>3:30</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>Dont Let Me Down</td>
                <td><a href="231artist.php">TC</a></td>
                <td>Coldplay</td>
                <td>3:00</td>
                <td><div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button name="add" class="btn btn-success">add</i></button>  
                                </div></td>
            </tr>
        </tbody>
        </div>

</main>
</body>
</html>