<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome- <?php echo   $_SESSION['username']  ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <!-- nav_bar  -->
    <?php require 'partials/_nav.php'  ?>
     
    

    <div class="container my-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">  Welcome - <?php echo   $_SESSION['username']  ?> </h4>
            <p> hey welcome to php login site now we are login  </p>
            <hr>
            <p class="mb-0"> Hey <?php echo   $_SESSION['username']  ?>    Whenever you need, to be sure to logout   <a href="logout.php">using this link </a> </p>
        </div>
    </div>





    <!-- javascript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>