<?php
    include("header.php");
?>

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding an internship </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addInternship.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Internship-General section </h3>
                <div class="mb-4">
                    <label for="internship-heading" class="form-label"> Internship Heading </label>
                    <input name="internship-heading" placeholder="Give a meaningful heading" type="text" class="form-control" id="internship-heading">
                </div>
                <div class="mb-4">
                    <label for="internship-company-name" class="form-label"> Company Name </label>
                    <input name="internship-company-name" placeholder="Enter name of company" type="text" class="form-control" id="internship-company-name">
                </div>

                <!-- Student Section -->
                <div class="mb-4">
                    <label for="internship-date-posted" class="form-label"> Date Posted </label>
                    <input name="internship-date-posted" placeholder="Enter date posted " type="text" class="form-control" id="internship-date-posted">
                </div>
                <div class="mb-4">
                    <label for="internship-stipend" class="form-label"> Stipend </label>
                    <input name="internship-stipend" placeholder="Enter stipend (write NA for no stipend)" type="text" class="form-control" id="internship-stipend">
                </div>

                <!-- other -->
                <div class="mb-4">
                    <label for="internship-location" class="form-label"> Location </label>
                    <input name="internship-location" placeholder="Enter location of internship " type="text" class="form-control" id="internship-location">
                </div>
                <div class="mb-4">
                    <label for="internship-duration" class="form-label"> Internship duration (days) </label>
                    <input name="internship-duration" placeholder="Enter duration of internship" type="text" class="form-control" id="internship-duration">
                </div>

                <div class="mb-4">
                    <label for="internship-openings" class="form-label"> Openings </label>
                    <input name="internship-openings" placeholder="Enter number of openings" type="text" class="form-control" id="internship-openings">
                </div>

                
                <div class="mb-4">
                    <label for="internship-description" class="form-label"> Description </label>
                    <textarea name="internship-description" placeholder="Describe internship here" type="text" class="form-control" id="internship-description" rows="3"></textarea>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#internship-description' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>
                
                


            </div>

            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Internships" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php
    if (isset($_POST["submit"])){

        $heading = $_POST["internship-heading"];
        $companyName = $_POST["internship-company-name"];
        $datePosted = $_POST["internship-date-posted"];
        $stipend = $_POST["internship-stipend"];
        $location = $_POST["internship-location"];
        $duration = $_POST["internship-duration"];
        $openings = $_POST["internship-openings"];
        $description = addslashes($_POST["internship-description"]);

        // Connection to DB

        $server = "localhost";
        $user = "root";
        $pass = "";
        $db_name = "mc";
        $table_name = "internship";

        $conn = new mysqli($server , $user , $pass , $db_name);

        $query = "INSERT INTO `$table_name` (`heading`, `company`, `date_posted`, `stipend`, `location`, `description`, `openings`, `duration`,  `internship_status`) VALUES ( '$heading', '$companyName', '$datePosted', '$stipend', '$location', '$description', '$openings', '$duration' , 'accept'); " ;

        $insertion = mysqli_query($conn , $query);
        $conn->close();

        echo "<script> alert('Internship added Successfully') </script>" ;

    }
?>

<?php
    include("footer.php");
?>