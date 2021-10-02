<?php
    include("header.php");
?> 

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding a Judgement </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addJudgement.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Judgement General section </h3>
                <div class="mb-4">
                    <label for="party1" class="form-label"> Party One </label>
                    <input name="party1" placeholder="Enter name of party one" type="text" class="form-control" id="party1">
                </div>
                
                <div class="mb-4">
                    <label for="party2" class="form-label"> Party Two </label>
                    <input name="party2" placeholder="Enter name of party two" type="text" class="form-control" id="party2">
                </div>
               

                <div class="mb-4">
                    <label for="judgement-date-posted" class="form-label"> Judgement date posted </label>
                    <input name="judgement-date-posted" type="date" class="form-control" id="judgement-date-posted">
                </div>


                <div class="mb-4">
                    <label for="provisions-involved" class="form-label"> Provisions Involved </label>
                    <textarea name="provisions-involved" placeholder="Enter provisions involved for the Judgement" type="text" class="form-control" id="provisions-involved"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#provisions-involved' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
                
                <div class="mb-4">
                    <label for="sitetation" class="form-label"> Sitetation </label>
                    <textarea name="sitetation" placeholder="Enter sitetation for the Judgement" type="text" class="form-control" id="sitetation"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#sitetation' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                <div class="mb-4">
                    <label for="facts" class="form-label"> Facts </label>
                    <textarea name="facts" placeholder="Enter facts for the Judgement" type="text" class="form-control" id="facts"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#facts' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                <div class="mb-4">
                    <label for="observations" class="form-label"> Observations </label>
                    <textarea name="observations" placeholder="Enter observation for the Judgement" type="text" class="form-control" id="observations"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#observations' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
                
                <div class="mb-4">
                    <label for="issues" class="form-label"> Issues </label>
                    <textarea name="issues" placeholder="Enter issues for the Judgement" type="text" class="form-control" id="issues"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#issues' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

                <div class="mb-4">
                    <label for="held" class="form-label"> Held </label>
                    <textarea name="held" placeholder="Enter held for the Judgement" type="text" class="form-control" id="held"></textarea>
                </div>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#held' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>

            </div>


            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Judgements" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php

    if (isset($_POST["submit"])){
        // db
        require_once "php/db.inc.php";

        $party1 = $_POST["party1"];
        $party2 = $_POST["party2"];
        $datePosted = $_POST["judgement-date-posted"];
        $provisionsInvolved = addslashes($_POST["provisions-involved"]);
        $sitetation = addslashes($_POST["sitetation"]);
        $facts = addslashes($_POST["facts"]);
        $observations = addslashes($_POST["observations"]);
        $issues = addslashes($_POST["issues"]);
        $held = addslashes($_POST["held"]);
        
        $table_name = "judgement";


        if (empty($datePosted)){
            $query = "INSERT INTO `$table_name` (`party1`, `party2`, `sitetation`, `provisions_involved`, `facts`, `observations`, `issues`, `held`, `date_posted`) VALUES ('$party1', '$party2', '$sitetation', '$provisionsInvolved', '$facts', '$observations', '$issues', '$held', UTC_TIMESTAMP());";
        }
        
        else{
            $query = "INSERT INTO `$table_name` (`party1`, `party2`, `sitetation`, `provisions_involved`, `facts`, `observations`, `issues`, `held`, `date_posted`) VALUES ('$party1', '$party2', '$sitetation', '$provisionsInvolved', '$facts', '$observations', '$issues', '$held',
            '$datePosted');";
        }

        $insertion = mysqli_query($conn , $query);
        if (!$insertion){
            echo "<script> alert('Judgement Failed $conn->error') </script>" ;
        }
        else{
            echo "<script> alert('Judgement added Successfully ') </script>" ;
        }
        
    }

?>

<?php
    include("footer.php");
?>