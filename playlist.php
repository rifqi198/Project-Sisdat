<?php 

include 'config.php';

error_reporting(0);

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist</title>

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
            <th>Song</th>
            <th>Artist</th>
            <th>    </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                    $conn = mysqli_connect("127.0.0.1:3308", "root", "", "login");
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT artist_id, album_id, name,  genre, duration FROM song";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["artist_id"]. "</td><td>" . $row["album_id"] . "</td><td>"
                    . $row["name"]. "</td><td>" . $row["genre"]."</td><td>" . $row["duration"]. "</td></tr>";
                    }
                    echo "</table>";
                    } else { echo "0 results"; }
                    $conn->close();
                    ?>
                    <div class="d-flex flex-row-reverse">
                            <div class="p-2">
                                    <button type="button" class="btn btn-success"><a href="music.php">add</a></button>  
                                </div>
                    </td>
            </tr>
        </tbody>

        </div>

</main>
</body>
</html>