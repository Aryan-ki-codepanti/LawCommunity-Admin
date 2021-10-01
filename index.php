<?php
    session_start();

    if (isset($_SESSION['auth'])){
        header("location:home.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <title> Admin Login - Millenial Courses </title>

    
</head>

<body>

    <div class="container my-5 py-5">

        <h1 class="text-center"> Admin Login </h1>

        <div class="login-box">
            <form method="POST" action="index.php">
                <div class="mb-3">
                    <label for="admin-email" class="form-label text-big"> Admin Email </label>
                    <input name="admin-email" placeholder="Enter Admin Email" type="email" class="form-control" id="admin-email" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="admin-password" class="form-label text-big"> Password </label>
                    <input name="admin-password" placeholder="Enter Admin Password" type="password" class="form-control" id="admin-password" autocomplete="off">
                </div>

                <div class="admin-submit-box">
                    <input name="admin-submit" id="admin-submit" type="submit" value="Login" class="btn btn-lg btn-primary mt-4">
                    <a href="../index.php" class="btn btn-lg btn-danger mt-4"> Go to Home </a>
                </div>
            </form>    
                <!-- Login Logic -->
                <?php

                    if (isset($_POST['admin-submit'])){
                        $email = $_POST['admin-email'];
                        $password = $_POST['admin-password'];


                        // Opening DB
                        require_once "php/db.inc.php";


                        $table_name = "admin";
                        

                        $result = mysqli_query($conn , "SELECT * FROM `$table_name` WHERE email = '$email' AND password = '$password';");

                        if (mysqli_num_rows($result) == 1){
                            $_SESSION['auth'] = true;
                            header("location:home.php");
                        }

                        else{
                            echo "<p class='text-center text-danger mt-3'> Incorrect Login Credentials <p>" ;
                        }
                    }

                ?>
            
        </div>

    </div>



    <!-- Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>