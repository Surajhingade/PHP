<?php
    //   dbconnect 
    $showAlert =false;
     
    $showErr = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            require 'partials/_dbconnect.php';
        
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            // $exist = false;


            // if check user exist or not 

            $existSql = " SELECT * FROM `users`  WHERE  username = '$username'  ";
            $result = mysqli_query($conn,$existSql);
            $existNumRows = mysqli_num_rows($result);
            if($existNumRows > 0){
                $showErr = "User already exist.";
            }
            else{

            if($password == $cpassword)  {
                $hash = password_hash($password,PASSWORD_DEFAULT);
             $showErr= "password do not match";
            // $sql = " INSERT INTO `users` (  `username`, `password` ) VALUES ( '$username', '$password') ";
            $sql = " INSERT INTO `users` (  `username`, `password` ) VALUES ( '$username', '$hash') ";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showAlert = true;
                $showErr=false;             
               }
             }   
          else {
            //   password do not match then show this error on below the navbar 
            $showErr = "Password do not match";
          }
        }
       
    }
         
          
     





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <!-- nav_bar  -->
    <?php require 'partials/_nav.php'  ?>

    <!-- alert  -->

    <?php
    if($showAlert){
        echo  '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your signup is success now we can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
    if($showErr){
        echo  '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong>  '.$showErr.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
 

    ?>

    <div class="container">
        <h1 class="text-center my-2">Signup to our website</h1>
    </div>
    <div class="container">


        <!-- signup form  -->
        <div class="container col-md-6">
            <form action="signup.php " method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User name</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                    <div id="emailHelp" class="form-text">Make sure the password is same.</div>
                </div>

                <button type="submit" class="btn btn-primary col-md-12">Signup</button>
            </form>
        </div>
    </div>




    <!-- javascript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>