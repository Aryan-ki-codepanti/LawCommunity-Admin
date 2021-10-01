<?php
    include("header.php");
?>

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Adding an Event </h3>

    <div class="course-form">
        <form enctype="multipart/form-data" method="POST" action="addEvent.php">

            <!-- General intro -->
            <div class="course-box course-title">
                <h3 class="text-center"> Event-General section </h3>
                <div class="mb-4">
                    <label for="event-heading" class="form-label"> Event Heading </label>
                    <input name="event-heading" placeholder="Give a meaningful heading" type="text" class="form-control" id="event-heading">
                </div>
                
                <div class="mb-4">
						<label for="category" class="form-label"> Event Category </label>
						<select class="form-select" aria-label="Default select example" name="category" id="category">
							<option selected> Choose a category </option>
							<option value="Moot Court">Moot Court</option>
							<option value="Workshops/Seminars">Workshops/Seminars</option>
							<option value="Quiz">Quiz</option>
							<option value="Call for Papers">Call for Papers</option>
							<option value="Courses">Courses</option>
							<option value="MUN & Fest">MUN & Fest</option>
							<option value="Debate & Essay">Debate & Essay</option>
							<option value="Others">Others</option>
						</select>
					</div>

                <div class="mb-4">
                    <label for="event-date" class="form-label"> Event Date  </label>
                    <input name="event-date" placeholder="Enter date of event" type="text" class="form-control" id="event-date">
                </div>

                <div class="mb-4">
                    <label for="event-venue" class="form-label"> Event Venue </label>
                    <input name="event-venue" placeholder="Enter venue of the event" type="text" class="form-control" id="event-venue">
                </div>

                <div class="mb-4">
						<label for="event-image" class="form-label"> Upload Event Image </label>
						<input name="event-image" class="form-control" type="file" id="event-image" accept="image/*" >
					</div>
               
                <div class="mb-4">
                    <label for="content" class="form-label"> Content </label>
                    <textarea name="content" placeholder="Content to be displayed on page here" type="text" class="form-control" id="content" rows="3"></textarea>
                </div>
                <script>
                        ClassicEditor
                            .create( document.querySelector( '#content' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                </script>
            </div>

            <!-- Host / Organiser Section -->
            <div class="course-box course-title">              
                <h3 class="text-center"> Event-Host section </h3>
                <div class="mb-4">
                    <label for="event-host" class="form-label"> Event Host </label>
                    <input name="event-host" placeholder="Enter host of the event" type="text" class="form-control" id="event-host" >
                </div>

                <div class="mb-4">
                    <label for="about-organiser" class="form-label"> About Organiser </label>
                    <textarea name="about-organiser" placeholder="Describe things  here" type="text" class="form-control" id="about-organiser" rows="3"></textarea>
                </div>
                <script>
                        ClassicEditor
                            .create( document.querySelector( '#about-organiser' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                </script>
            </div>

            <div class="d-flex justify-content-center gap-4">
                    <input name="submit" type="submit" value="Add to Events" class="btn btn-lg btn-primary">
            </div>
        </form>
    </div>

</div>

<?php
    if (isset($_POST["submit"])){

        // db
        require_once "php/db.inc.php";

        $heading = $_POST["event-heading"];
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
        $date = $_POST["event-date"];
        $venue = $_POST["event-venue"];
        $content = $_POST["content"];

        $host = $_POST["event-host"];
        $aboutOrganiser = $_POST["about-organiser"];

        // image to directory
        $eventImage = $_FILES['event-image']['name'];
        $uploaddir = 'img/event/';
        $uploadfileEvent = $uploaddir . basename($eventImage);
        move_uploaded_file($_FILES['event-image']['tmp_name'], $uploadfileEvent);

        $table_name = "event";

        $query = "INSERT INTO `$table_name` (`category`, `event_heading`, `event_date`, `event_venue`, `event_host`, `about_organiser`, `content`, `event_image` , `event_status`) VALUES ( '$category', '$heading', '$date', '$venue', '$host', '$aboutOrganiser', '$formLink', '$content', '$eventImage' , 'accept'); " ;

        $insertion = mysqli_query($conn , $query);
        $conn->close();

        echo "<script> alert('Event added Successfully') </script>" ;

    }
?>

<?php
    include("footer.php");
?>