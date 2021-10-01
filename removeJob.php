<?php
    include("header.php");
?>

<div class="container ps-5  py-5">

        <h1 class="text-center"> Admin Panel </h1>
        <h3> Remove a Job </h3>

        <div class="table-container">
            <table class="table table-primary table-responsive  table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Company</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // fetching job info
                        $table_name = "job";

                        // Connection
                        require_once "php/db.inc.php";

                        $results = mysqli_query($conn , "SELECT job_id , heading ,  company FROM `$table_name` WHERE job_status = 'accept'; ");

                        $tableRowCode = "";

                        foreach($results as $job){
                            $tableRowCode = $tableRowCode . "
                            <tr>
                            <th scope='row'>". $job['job_id'] ."</th>
                            <td>". $job['heading'] ."</td>
                            <td>". $job['company'] ."</td>
                            <td class='status-accepted'> Accepted </td>
                            </tr>
                            ";
                        }

                        echo $tableRowCode;
                        
                    ?>
                    
                    
                </tbody>
            </table>
			<div class="btn-box mt-5">
				<form method="POST" action="removeJob.php">
					<div class="my-3 d-flex flex-wrap gap-4">
						<input name="delId" placeholder="Enter Id of Job you wish to delete" type="text" class="form-control id-input" id="delId" autocomplete="off">
						<input name="submit" type="submit" class="btn btn-lg btn-primary" value="Delete this Job">
					</div>
				</form>
			</div>
        </div>

	
    </div>

<?php

	if (isset($_POST["submit"])){
		$delId = $_POST['delId'];
		$searchRes = mysqli_query($conn , "SELECT job_id FROM `$table_name` WHERE job_id = '$delId'; ");

		if (mysqli_num_rows($searchRes) == 1){
			$delQuery = mysqli_query($conn , "DELETE FROM `$table_name` WHERE job_id = '$delId';");
			$message = "<script> alert('Job with id $delId deleted Successfully :)') </script>";
		}
		else{
			$message =  "<script> alert('Job with id $delId was not found !!  Recheck id entered'); </script>";
		}
		echo $message."<script>document.location = 'removeJob.php';</script>";;
	}

?>



<?php
    include("footer.php");
?>