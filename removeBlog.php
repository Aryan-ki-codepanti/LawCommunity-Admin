<?php
    include("header.php");
?>

<div class="container ps-5  py-5">

        <h1 class="text-center"> Admin Panel </h1>
        <h3> Remove a Blog </h3>

        <div class="table-container">
            <table class="table table-primary table-responsive  table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Author</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // fetching course info
                        $server = "localhost";
                        $user = "root";
                        $pass = "";
                        $db_name = "mc";
                        $table_name = "blog";

                        // Connection
                        $conn = new mysqli($server  , $user , $pass , $db_name);

                        $results = mysqli_query($conn , "SELECT blog_id , blog_heading ,  blog_author FROM `$table_name` WHERE blog_status = 'accept'; ");

                        $tableRowCode = "";

                        foreach($results as $blog){
                            $tableRowCode = $tableRowCode . "
                            <tr>
                            <th scope='row'>". $blog['blog_id'] ."</th>
                            <td>". $blog['blog_heading'] ."</td>
                            <td>". $blog['blog_author'] ."</td>
                            <td class='status-accepted'> Accepted </td>
                            </tr>
                            ";
                        }

                        echo $tableRowCode;
                        
                    ?>
                    
                    
                </tbody>
            </table>
			<div class="btn-box mt-5">
				<form method="POST" action="removeBlog.php">
					<div class="my-3 d-flex flex-wrap gap-4">
						<input name="delId" placeholder="Enter Id of Blog you wish to delete" type="text" class="form-control id-input" id="delId" autocomplete="off">
						<input name="submit" type="submit" class="btn btn-lg btn-primary" value="Delete this Blog">
					</div>
				</form>
			</div>
        </div>
    </div>

<?php

	if (isset($_POST["submit"])){
		$delId = $_POST['delId'];
		$searchRes = mysqli_query($conn , "SELECT blog_id FROM `$table_name` WHERE blog_id = '$delId'; ");

		if (mysqli_num_rows($searchRes) == 1){
			$delQuery = mysqli_query($conn , "DELETE FROM `$table_name` WHERE blog_id = '$delId';");
			$message = "<script> alert('Blog with id $delId deleted Successfully :)'); </script>";
		}
		else{
			$message =  "<script> alert('Blog with id $delId was not found !!  Recheck id entered'); </script>";
		}
		echo $message."<script>document.location = 'removeBlog.php';</script>";
        

	}

?>



<?php
    include("footer.php");
?>