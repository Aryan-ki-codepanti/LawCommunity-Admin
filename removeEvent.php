<?php
    include("header.php");
?>

<div class="container ps-5  py-5">

        <h1 class="text-center"> Admin Panel </h1>
        <h3> Remove an Event </h3>

        <div class="table-container">
            <table class="table table-primary table-responsive  table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Host</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // fetching course info
                        $table_name = "event";

                        // Connection
                        require_once "php/db.inc.php";

                        $results = mysqli_query($conn , "SELECT event_id , event_heading , event_host  FROM `$table_name` WHERE event_status = 'accept'; ");

                        $tableRowCode = "";

                        foreach($results as $event){
                            $tableRowCode = $tableRowCode . "
                            <tr>
                            <th scope='row'>". $event['event_id'] ."</th>
                            <td>". $event['event_heading'] ."</td>
                            <td>". $event['event_host'] ."</td>
                            <td class='status-accepted'> Accepted </td>
                            </tr>
                            ";
                        }

                        echo $tableRowCode;
                        
                    ?>
                    
                    
                </tbody>
            </table>
			<div class="btn-box mt-5">
				<form method="POST" action="removeEvent.php">
					<div class="my-3 d-flex flex-wrap gap-4">
						<input name="delId" placeholder="Enter Id of Blog you wish to delete" type="text" class="form-control id-input" id="delId" autocomplete="off">
						<input name="submit" type="submit" class="btn btn-lg btn-primary" value="Delete this Event">
					</div>
				</form>
			</div>
        </div>
    </div>

<?php

	if (isset($_POST["submit"])){
		$delId = $_POST['delId'];
		$searchRes = mysqli_query($conn , "SELECT event_id FROM `$table_name` WHERE event_id = '$delId'; ");

		if (mysqli_num_rows($searchRes) == 1){
			$delQuery = mysqli_query($conn , "DELETE FROM `$table_name` WHERE event_id = '$delId';");
			$message = "<script> alert('Event with id $delId deleted Successfully :)') </script>";
		}
		else{
			$message =  "<script> alert('Event with id $delId was not found !!  Recheck id entered'); </script>";
		}
		echo $message."<script>document.location = 'removeEvent.php';</script>";
	}

?>



<?php
    include("footer.php");
?>