<?php
    include("header.php");
?>

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding a Job </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addJob.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Job-General section </h3>
                <div class="mb-4">
                    <label for="job-heading" class="form-label"> Job Heading </label>
                    <input name="job-heading" placeholder="Give a meaningful heading" type="text" class="form-control" id="job-heading">
                </div>
                <div class="mb-4">
                    <label for="job-company-name" class="form-label"> Company Name </label>
                    <input name="job-company-name" placeholder="Enter name of company" type="text" class="form-control" id="job-company-name">
                </div>

                <div class="mb-4">
                    <label for="job-date-posted" class="form-label"> Date Posted </label>
                    <input name="job-date-posted" placeholder="Enter date posted " type="text" class="form-control" id="job-date-posted">
                </div>
                <div class="mb-4">
                    <label for="job-salary" class="form-label"> Salary </label>
                    <input name="job-salary" placeholder="Enter salary (write NA for no salary)" type="text" class="form-control" id="job-salary">
                </div>

                <div class="mb-4">
                    <label for="job-location" class="form-label"> Location </label>
                    <input name="job-location" placeholder="Enter location of job" type="text" class="form-control" id="job-location">
                </div>
               


                
                <div class="mb-4">
                    <label for="job-description" class="form-label"> Description </label>
                    <textarea name="job-description" placeholder="Describe job here" type="text" class="form-control" id="job-description" rows="3"></textarea>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#job-description' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                </div>
                
                

            </div>

            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Jobs" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php
    if (isset($_POST["submit"])){

        $heading = $_POST["job-heading"];
        $companyName = $_POST["job-company-name"];
        $datePosted = $_POST["job-date-posted"];
        $salary = $_POST["job-salary"];
        $location = $_POST["job-location"];
        $description = addslashes($_POST["job-description"]);

        // Connection to DB

        $server = "localhost";
        $user = "root";
        $pass = "";
        $db_name = "mc";
        $table_name = "job";

        $conn = new mysqli($server , $user , $pass , $db_name );

        $query = "INSERT INTO `$table_name` ( `heading`, `company`, `date_posted`, `salary`, `location`, `description`, `job_status`) VALUES ( '$heading', '$companyName', '$datePosted', '$salary', '$location', '$description', 'accept'); " ;

        $insertion = mysqli_query($conn , $query);
        $conn->close();

        echo "<script> alert('Job added Successfully') </script>" ;

    }
?>

<?php
    include("footer.php");
?>