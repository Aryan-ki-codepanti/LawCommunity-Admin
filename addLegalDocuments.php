<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding Legal Document </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addLegalDocuments.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Legal Documents - General section </h3>

                <div class="mb-4">
                    <label for="heading" class="form-label"> Heading </label>
                    <input name="heading" placeholder="Give a heading " type="text" class="form-control" id="heading">
                </div>

                <div class="mb-4">
                    <label for="category" class="form-label"> Category </label>
                    <input name="category" placeholder="Give a category " type="text" class="form-control" id="category">
                </div>

               

                <div class="mb-4">
                    <label for="date-posted" class="form-label"> Date posted </label>
                    <input name="date-posted" type="date" class="form-control" id="date-posted">
                </div>


                <div class="mb-4">
                    <label for="content" class="form-label"> Content </label>
                    <textarea name="content" placeholder="Enter content " type="text" class="form-control" id="content"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#content' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>


            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Legal Documents" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $heading = $_POST["heading"];
        $category = $_POST["category"];
        $datePosted = $_POST["date-posted"];
        $content = addslashes($_POST["content"]);
        
        $table_name = "legal_docs";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` ( `heading`, `category` , `content`,  `date_posted`) VALUES ('$heading' , '$category' , '$content' ,  UTC_TIMESTAMP()); ";
        }

        else{
            $query = "INSERT INTO `$table_name` ( `heading`, `category` , `content`,  `date_posted`) VALUES ('$heading' , '$category' , '$content' , '$datePosted'); ";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Legal Document Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Legal Document added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>