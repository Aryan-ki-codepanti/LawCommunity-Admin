<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding an article </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addArticle.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Article-General section </h3>
                <div class="mb-4">
                    <label for="article-heading" class="form-label"> Article Heading </label>
                    <input name="article-heading" placeholder="Give a heading to Article" type="text" class="form-control" id="article-heading">
                </div>

                <div class="mb-4">
                    <label for="article-subheading" class="form-label"> Article Sub-Heading </label>
                    <input name="article-subheading" placeholder="Give a meaningful subheading" type="text" class="form-control" id="article-subheading">
                </div>

                <div class="mb-4">
                    <label for="article-date-posted" class="form-label"> Article date posted </label>
                    <input name="article-date-posted" placeholder="Enter date posted" type="date" class="form-control" id="article-date-posted">
                </div>

                <div class="mb-4">
                    <label for="article-image" class="form-label"> Article Image </label>
                    <input name="article-image"  type="file" accept="image/*" class="form-control" id="article-image">
                </div>

                <div class="mb-4">
                    <label for="article-content" class="form-label"> Content </label>
                    <textarea name="article-content" placeholder="Enter content for the Article" type="text" class="form-control" id="article-content"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#article-content' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>


            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Articles" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $heading = $_POST["article-heading"];
        $subheading = $_POST["article-subheading"];
        $datePosted = $_POST["article-date-posted"];
        $content = addslashes($_POST["article-content"]);

        $articleImage = $_FILES["article-image"]["name"];

        //uploading images to blog directory
        $uploaddir = 'img/article/';
        $uploadfileArticle = $uploaddir . basename($articleImage);

        move_uploaded_file($_FILES['article-image']['tmp_name'], $uploadfileArticle);
        
        $table_name = "article";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` ( `article_heading`, `article_status`,  `article_subheading`, `article_content`, `article_image` , `date_posted`) VALUES ('$heading', 'accept', '$subheading', '$content' , '$articleImage',  UTC_TIMESTAMP()); ";
        }

        else{
            $query = "INSERT INTO `$table_name` ( `article_heading`, `article_status`,  `article_subheading`, `article_content`, `article_image` , `date_posted`) VALUES ('$heading', 'accept', '$subheading', '$content' , '$articleImage',  '$datePosted'); ";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Article Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Article added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>