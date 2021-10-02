<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding Judges </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addDifferentJudges.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Different Judges - General section </h3>

                <div class="mb-4">
                    <label for="heading" class="form-label"> Heading </label>
                    <input name="heading" placeholder="Give a heading " type="text" class="form-control" id="heading">
                </div>

                <div class="mb-4">
                    <label for="subheading" class="form-label"> Sub-Heading </label>
                    <input name="subheading" placeholder="Give a subheading " type="text" class="form-control" id="subheading">
                </div>

                <div class="mb-4">
                    <label for="judge-name" class="form-label"> Judge Name </label>
                    <input name="judge-name" placeholder="Enter judge name" type="text" class="form-control" id="judge-name">
                </div>

                <div class="mb-4">
                    <label for="judge-post" class="form-label"> Judge Post </label>
                    <input name="judge-post" placeholder="Enter post of the judge " type="text" class="form-control" id="judge-post">
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
                    <input name="submit" type="submit" value="Add to different judges" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $heading = $_POST["heading"];
        $subheading = $_POST["subheading"];
        $judgeName = $_POST["judge-name"];
        $judgePost = $_POST["judge-post"];
        $datePosted = $_POST["date-posted"];
        $content = addslashes($_POST["content"]);
        
        $table_name = "different_judges";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` ( `heading`, `subheading` , `content`, `judge_name` , `judge_post` ,  `date_posted`) VALUES ('$heading' , '$subheading' , '$content' , '$judgeName' , '$judgePost' ,  UTC_TIMESTAMP()); ";
        }

        else{
            $query = "INSERT INTO `$table_name` ( `heading`, `subheading` , `content`, `judge_name` , `judge_post` , `date_posted`) VALUES ('$heading' , '$subheading' , '$content' , '$judgeName' , '$judgePost' ,'$datePosted'); ";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Judge Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Judge added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>