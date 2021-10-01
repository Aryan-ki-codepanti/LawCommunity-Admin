<?php
	include("header.php");
?>
<div class="container ps-5  py-5">

        <h1 class="text-center"> Admin Panel </h1>
        <h3> Remove a Course </h3>

        <div class="table-container">
            <table class="table table-primary table-responsive  table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Instructor</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // fetching course info
                        $table_name = "course";

                        // Connection
                        require_once "php/db.inc.php";

                        $results = mysqli_query($conn , "SELECT id , course_title ,  instructor_name FROM `$table_name` ; ");

                        $tableRowCode = "";

                        foreach($results as $course){
                            $tableRowCode = $tableRowCode . "
                            <tr>
                            <th scope='row'>". $course['id'] ."</th>
                            <td>". $course['course_title'] ."</td>
                            <td>". $course['instructor_name'] ."</td>
                            </tr>
                            ";
                        }
                        echo "$tableRowCode";
                    ?>
                    
                </tbody>
            </table>
			<div class="btn-box mt-5">
				<form method="POST" action="removeCourse.php">
					<div class="my-3 d-flex flex-wrap gap-4">
						<input name="delId" placeholder="Enter Id of Course you wish to delete" type="text" class="form-control id-input" id="delId" autocomplete="off">
						<input name="submit" type="submit" class="btn btn-lg btn-primary" value="Delete this Course">
					</div>
				</form>
			</div>
        </div>
    </div>

<?php

	if (isset($_POST["submit"])){
		$delId = $_POST['delId'];
		$searchRes = mysqli_query($conn , "SELECT id FROM `$table_name` WHERE id = '$delId'; ");

		if (mysqli_num_rows($searchRes) == 1){
			$delQuery = mysqli_query($conn , "DELETE FROM `$table_name` WHERE id = '$delId';");
			$message = "<script> alert('Course with id $delId deleted Successfully :)') </script>";
		}
		else{
			$message =  "<script> alert('Course with id $delId was not found !!  Recheck id entered'); </script>";
		}
		echo $message."<script>document.location = 'removeCourse.php';</script>";
	}

?>

<?php
    include("footer.php");
?>