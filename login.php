<?php
    //   dbconnect 
    
    $login =false;
    $showErr = false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            require 'partials/_dbconnect.php';
        
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // $exist = false;
           
           
             $showErr= "password do not match";
            // $sql = " SELECT * from users where username= '$username' AND password = '$password' ";
            $sql = " SELECT * from users where username= '$username'  ";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                while($row=mysqli_fetch_assoc($result)){
                    if(password_verify($password, $row['password'])){
                        $login = true;
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $username;
                        header("location: welcome.php");
                    }
                    // else {
                    //     //   password do not match then show this error on below the navbar 
                    //     $showErr = "Invalid Credentials";
                    //   }
            
                }
               
              }
               
          else {
            //   password do not match then show this error on below the navbar 
            $showErr = "Invalid Credentials";
          }

        
    }
         
          
     





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body>
    <!-- navbar  -->
    <?php   require 'partials/_nav.php'  ?>

        <!-- alert  -->
 
 

        <?php
    if($login){
        echo  '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your  are login.
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

    
    <!-- login  form  -->
<div class="container">
    <h1 class = "text-center my-3">Login Please.</h1>
    <div class="container col-md-6">
            <form action="login.php " method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User name</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                 

                <button type="submit" class="btn btn-primary col-md-12">login</button>
            </form>
        </div>
    </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>