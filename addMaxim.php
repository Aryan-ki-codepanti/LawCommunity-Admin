<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding an maxim </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addMaxim.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Maxim-General section </h3>
                <div class="mb-4">
                    <label for="maxim-heading" class="form-label"> Maxim Heading </label>
                    <input name="maxim-heading" placeholder="Give a heading to Maxim" type="text" class="form-control" id="maxim-heading">
                </div>

               

                <div class="mb-4">
                    <label for="maxim-date-posted" class="form-label"> Maxim date posted </label>
                    <input name="maxim-date-posted" type="date" class="form-control" id="maxim-date-posted">
                </div>

                <!-- TextBoxes -->
                <div class="mb-4">
                    <label for="definition" class="form-label"> Definition </label>
                    <textarea name="definition" placeholder="Enter definition for the Maxim" type="text" class="form-control" id="definition"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#definition' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                <div class="mb-4">
                    <label for="literal-translation" class="form-label"> Literal Translation </label>
                    <textarea name="literal-translation" placeholder="Enter literal-translation for the Maxim" type="text" class="form-control" id="literal-translation"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#literal-translation' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                <div class="mb-4">
                    <label for="illustration" class="form-label"> Illustration </label>
                    <textarea name="illustration" placeholder="Enter illustration for the Maxim" type="text" class="form-control" id="illustration"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#illustration' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                <div class="mb-4">
                    <label for="case-law" class="form-label"> Case Law </label>
                    <textarea name="case-law" placeholder="Enter case law for the Maxim" type="text" class="form-control" id="case-law"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#case-law' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

            </div>


            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Maxim" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $heading = $_POST["maxim-heading"];
        $datePosted = $_POST["maxim-date-posted"];
        $definition = addslashes($_POST["definition"]);
        $literalTranslation = addslashes($_POST["literal-translation"]);
        $illustration = addslashes($_POST["illustration"]);
        $caseLaw = addslashes($_POST["case-law"]);
        
        $table_name = "maxim";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` (`definition`, `literal_translation`, `illustration`, `case_law`, `maxim_status`, `date_posted`, `maxim_heading`) VALUES ( '$definition', '$literalTranslation', '$illustration', '$caseLaw', 'accept', UTC_TIMESTAMP(), '$heading');";
        }
        
        else{
            $query = "INSERT INTO `$table_name` (`definition`, `literal_translation`, `illustration`, `case_law`, `maxim_status`, `date_posted`, `maxim_heading`) VALUES ( '$definition', '$literalTranslation', '$illustration', '$caseLaw', 'accept', '$datePosted', '$heading');";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Maxim Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Maxim added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>