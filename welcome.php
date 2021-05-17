<?php 

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

        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Playlist Name</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    <?php


                    if(isset($_POST['read'])){
                        $result = getData();

                        if($result){

                            while ($row = mysqli_fetch_assoc($result)){ ?>

                                <tr>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['Playlist_name']; ?></td>
                                    <td ></td>
                                </tr>
                                <?php
                            }

                        }
                    }
                    ?>
                    </div>

        <div class="d-flex flex-row-reverse">
            <div class="p-2">
                <button type="button" class="btn btn-danger"><a href="deleteplaylist.php">del</a></button>  
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-success"><a href="music.php">add</a></button>  
            </div>

        <div class="align-text-bottom">
        <button type="button" class="btn btn-success"><a href="addplaylist.php">add playlist</a></button> </div>
        
        <div class = "fixed-bottom">
            <a href="logout.php">Logout</a>

</main>
</body>
</html>