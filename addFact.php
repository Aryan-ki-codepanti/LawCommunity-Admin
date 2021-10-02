<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding an fact </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addFact.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Fact-General section </h3>
                <div class="mb-4">
                    <label for="fact-heading" class="form-label"> Fact Heading </label>
                    <input name="fact-heading" placeholder="Give a heading to Fact" type="text" class="form-control" id="fact-heading">
                </div>

               

                <div class="mb-4">
                    <label for="fact-date-posted" class="form-label"> Fact date posted </label>
                    <input name="fact-date-posted" placeholder="Enter date posted" type="date" class="form-control" id="fact-date-posted">
                </div>


                <div class="mb-4">
                    <label for="fact-content" class="form-label"> Content </label>
                    <textarea name="fact-content" placeholder="Enter content for the Fact" type="text" class="form-control" id="fact-content"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#fact-content' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>


            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Facts" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $heading = $_POST["fact-heading"];
        $datePosted = $_POST["fact-date-posted"];
        $content = addslashes($_POST["fact-content"]);
        
        $table_name = "fact";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` ( `fact_heading`, `fact_content`,  `date_posted`) VALUES ('$heading' , '$content' ,  UTC_TIMESTAMP()); ";
        }

        else{
            $query = "INSERT INTO `$table_name` ( `fact_heading`, `fact_content`, `date_posted`) VALUES ('$heading', '$content', '$datePosted'); ";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Fact Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Fact added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>