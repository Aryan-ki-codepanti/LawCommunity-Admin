<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding a blog </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addBlog.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Blog-General section </h3>
                <div class="mb-4">
                    <label for="blog-title" class="form-label"> Blog Title </label>
                    <input name="blog-title" placeholder="Give a title to Blog" type="text" class="form-control" id="blog-title">
                </div>

                <div class="mb-4">
                    <label for="blog-heading" class="form-label"> Blog Heading </label>
                    <input name="blog-heading" placeholder="Give a meaningful heading" type="text" class="form-control" id="blog-heading">
                </div>

                <div class="mb-4">
                    <label for="blog-date-posted" class="form-label"> Blog date posted </label>
                    <input name="blog-date-posted" placeholder="Enter date posted" type="text" class="form-control" id="blog-date-posted">
                </div>

                <div class="mb-4">
                    <label for="blog-image" class="form-label"> Blog Image </label>
                    <input name="blog-image"  type="file" accept="image/*" class="form-control" id="blog-image">
                </div>

                <div class="mb-4">
                    <label for="blog-content" class="form-label"> Content </label>
                    <textarea name="blog-content" placeholder="Enter content for the Blog" type="text" class="form-control" id="blog-content"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#blog-content' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>

            <!-- Author Section -->
            <div class="course-box">
                <h3 class="text-center"> Blog-Author section </h3>
                <div class="mb-4">
                    <label for="blog-author" class="form-label"> Author Name </label>
                    <input name="blog-author" placeholder="Enter name of author" type="text" class="form-control" id="blog-author">
                </div>
                <div class="mb-4">
                    <label for="blog-author-image" class="form-label"> Author Image </label>
                    <input name="blog-author-image" class="form-control" type="file" id="blog-author-image" accept="image/*">
                </div>
            </div>

            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Blogs" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $title = $_POST["blog-title"];
        $heading = $_POST["blog-heading"];
        $datePosted = $_POST["blog-date-posted"];
        $content = addslashes($_POST["blog-content"]);
        $author = $_POST["blog-author"];

        $blogImage = $_FILES["blog-image"]["name"];
        $authorImage = $_FILES["blog-author-image"]["name"];

        //uploading images to blog directory
        $uploaddir = 'img/blog/';
        $uploadfileBlog = $uploaddir . basename($blogImage);
        $uploadfileAuthor = $uploaddir . basename($authorImage);

        move_uploaded_file($_FILES['blog-image']['tmp_name'], $uploadfileBlog);
        move_uploaded_file($_FILES['blog-author-image']['tmp_name'], $uploadfileAuthor);

        // Connection to Database
        
        $table_name = "blog";

        $query = "INSERT INTO `$table_name` ( `blog_heading`, `blog_status`, `blog_author`, `blog_title`, `blog_content`, `blog_image`, `author_image`, `date_posted`) VALUES ('$heading', 'accept', '$author', '$title', '$content', '$blogImage', '$authorImage', '$datePosted'); ";

        $insertion = mysqli_query($conn , $query);
        // $conn->close();
        if (!$insertion){
            echo "<script> alert('Blog Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Blog added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>