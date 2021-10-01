<?php
    include("header.php");
?>

<div class="container ps-5  py-5">

        <h1 class="text-center"> Admin Panel </h1>
        <h3> Remove an Internship </h3>

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
                        // fetching course info
                        
                        $table_name = "internship";

                        // Connection
                        require_once "php/db.inc.php";


                        $results = mysqli_query($conn , "SELECT internship_id , heading ,  company FROM `$table_name` WHERE internship_status = 'accept' ; ");

                        $tableRowCode = "";

                        foreach($results as $internship){
                            $tableRowCode = $tableRowCode . "
                            <tr>
                            <th scope='row'>". $internship['internship_id'] ."</th>
                            <td>". $internship['heading'] ."</td>
                            <td>". $internship['company'] ."</td>
                            <td class='status-accepted'> Accepted </td>
                            </tr>
                            ";
                        }

                        echo $tableRowCode;
                        
                    ?>
                    
                    
                </tbody>
            </table>
			<div class="btn-box mt-5">
				<form method="POST" action="removeInternship.php">
					<div class="my-3 d-flex flex-wrap gap-4">
						<input name="delId" placeholder="Enter Id of Internship you wish to delete" type="text" class="form-control id-input" id="delId" autocomplete="off">
						<input name="submit" type="submit" class="btn btn-lg btn-primary" value="Delete this Internship">
					</div>
				</form>
			</div>
        </div>

		
    </div>

<?php

	if (isset($_POST["submit"])){
		$delId = $_POST['delId'];
		$searchRes = mysqli_query($conn , "SELECT internship_id FROM `$table_name` WHERE internship_id = '$delId'; ");

		if (mysqli_num_rows($searchRes) == 1){
			$delQuery = mysqli_query($conn , "DELETE FROM `$table_name` WHERE internship_id = '$delId';");
			$message = "<script> alert('Internship with id $delId deleted Successfully :)') </script>";
		}
		else{
			$message =  "<script> alert('Internship with id $delId was not found !!  Recheck id entered'); </script>";
		}
		echo $message."<script>document.location = 'removeInternship.php';</script>";
	}

?>



<?php
    include("footer.php");
?>