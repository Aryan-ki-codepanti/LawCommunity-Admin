<?php
    session_start();
    if (!isset($_SESSION['auth'])){
        header("location:index.php");
    }
?>

    <!doctype html>
    <html lang="en">

    <head>
        <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/adminAuth.css">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 
        
        <!-- Font-Awesome  -->
        <script src="https://kit.fontawesome.com/aacb247ff6.js" crossorigin="anonymous"></script>

        <title> Admin Auth | Millennial Courses </title>
    </head>

    <body>

        <header>
            
            <nav class ="navbar bg-dark navbar-nav bg-dark navbar-dark">
            <button id="toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class ="navbar-nav">
                        <li> <div class="img-logo" onclick="goToHome()">
                                <h3> <i class="fas fa-users-cog"></i> Admin@MC </h3>
                            </div> 
                        </li>
                        <li class ="nav-item"><a  class="nav-link" href="home.php"> <i class="fas fa-home"></i> Home </a></li>
                        <li class="nav-head"> Courses </li>
                        <li class ="nav-item"><a class="nav-link" href="addCourse.php"> <i class="fas fa-plus-square"></i> Add Course </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="removeCourse.php"> <i class="fas fa-trash"></i> Remove Course </a></li>
                        <!-- <li class ="nav-item"><a  class="nav-link" href="approveCourse.php"> <i class="fas fa-clipboard"></i> Approval</li> -->

                        <li class="nav-head"> Internships </li>
                        <li class ="nav-item"><a  class="nav-link" href="addInternship.php"> <i class="fas fa-plus-square"></i> Add Internship </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="removeInternship.php"> <i class="fas fa-trash"></i> Remove Internship </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="approveInternship.php"> <i class="fas fa-clipboard"></i> Approval</li>
                        
                        <li class="nav-head"> Blogs </li>
                        <li class ="nav-item"><a  class="nav-link" href="addBlog.php"> <i class="fas fa-plus-square"></i> Add Blog </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="removeBlog.php"> <i class="fas fa-trash"></i> Remove Blog </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="approveBlog.php"> <i class="fas fa-clipboard"></i> Approval</li>
                        
                        <li class="nav-head"> Articles </li>
                        <li class ="nav-item"><a  class="nav-link" href="#"> <i class="fas fa-plus-square"></i> Add Article </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="#"> <i class="fas fa-trash"></i> Remove Article </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="approveArticle.php"> <i class="fas fa-clipboard"></i> Approval</li>
                        
                        <li class="nav-head"> Jobs </li>
                        <li class ="nav-item"><a  class="nav-link" href="addJob.php"> <i class="fas fa-plus-square"></i> Add Job </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="removeJob.php"> <i class="fas fa-trash"></i> Remove Job </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="approveArticle.php"> <i class="fas fa-clipboard"></i> Approval</li>
                        
                        <li class="nav-head"> Events </li>
                        <li class ="nav-item"><a  class="nav-link" href="addEvent.php"> <i class="fas fa-plus-square"></i> Add Event </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="removeEvent.php"> <i class="fas fa-trash"></i> Remove Event </a></li>
                        <li class ="nav-item"><a  class="nav-link" href="approveEvent.php"> <i class="fas fa-clipboard"></i> Approval</li>
                        
                        <li class="logout-btn-box">  <a href="logout.php" class="btn btn-lg btn-outline-danger"> <i class="fas fa-sign-out-alt"></i> Logout </a> </li>
                    </ul>
                </div>
                
            
            </nav>
           
        </header>

<!-- 
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
-->


        