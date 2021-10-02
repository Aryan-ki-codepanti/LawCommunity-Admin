<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding a legal term </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addLegalTerms.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Legal-Terms General section </h3>
                <div class="mb-4">
                    <label for="legal-terms-heading" class="form-label"> Legal Terms Heading </label>
                    <input name="legal-terms-heading" placeholder="Give a heading to Legal Terms" type="text" class="form-control" id="legal-terms-heading">
                </div>
                
                <div class="mb-4">
                    <label for="legal-terms-subheading" class="form-label"> Legal Terms Sub-Heading </label>
                    <input name="legal-terms-subheading" placeholder="Give a subheading to Legal Terms" type="text" class="form-control" id="legal-terms-subheading">
                </div>
               

                <div class="mb-4">
                    <label for="legal-terms-date-posted" class="form-label"> Legal Terms date posted </label>
                    <input name="legal-terms-date-posted" type="date" class="form-control" id="legal-terms-date-posted">
                </div>


                <div class="mb-4">
                    <label for="legal-terms-content" class="form-label"> Content </label>
                    <textarea name="legal-terms-content" placeholder="Enter content for the Legal Terms" type="text" class="form-control" id="legal-terms-content"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#legal-terms-content' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>


            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Legal Terms" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $heading = $_POST["legal-terms-heading"];
        $subheading = $_POST["legal-terms-subheading"];
        $datePosted = $_POST["legal-terms-date-posted"];
        $content = addslashes($_POST["legal-terms-content"]);
        
        $table_name = "legal_term";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` ( `heading`, `subheading`, `content` ,   `date_posted`) VALUES ('$heading' , '$subheading' , '$content' ,  UTC_TIMESTAMP()); ";
        }

        else{
            $query = "INSERT INTO `$table_name` ( `heading`, `subheading`, `content` ,   `date_posted`) VALUES ('$heading' , '$subheading' , '$content' , '$datePosted'); ";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Legal Term Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Legal Term added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>