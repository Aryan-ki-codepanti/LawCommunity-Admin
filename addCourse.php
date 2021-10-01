<?php

   include("header.php");
?>


    <div class="container ps-5  py-5 login-container">

        <h1 class="text-center"> Admin Panel </h1>

        <h3> Adding a course </h3>

        <div class="course-form">
            <form enctype="multipart/form-data" method="POST" action="addCourse.php">

                <!-- General intro -->
                <div class="course-box course-title">
                    <h3 class="text-center"> Course-General section </h3>
                    <div class="mb-4">
                        <label for="course-title" class="form-label"> Course Title </label>
                        <input name="course-title" placeholder="Give a meaningful title" type="text" class="form-control" id="course-title">
                    </div>
                    <div class="mb-4">
                        <label for="course-teaser-url" class="form-label"> Course Teaser Video </label>
                        <input name="course-teaser-url" placeholder="Enter youtube  embed code here" type="text" class="form-control" id="course-teaser-url">
                    </div>

                    <!-- Pricing -->
                    <div class="mb-4">
                        <label for="course-mrp" class="form-label"> Course selling price </label>
                        <input name="course-mrp" placeholder="Enter price of course" type="text" class="form-control" id="course-mrp">
                    </div>
                    <div class="mb-4">
                        <label for="course-sp" class="form-label"> Course discounted price </label>
                        <input name="course-sp" placeholder="Enter discounted price of course" type="text" class="form-control" id="course-sp">
                    </div>

                    <!-- Duration -->
                    <div class="mb-4">
                        <label for="course-date-duration" class="form-label"> Course duration (date) </label>
                        <input name="course-date-duration" placeholder="Enter duration of course in date Eg: 4-10 October 2021 " type="text" class="form-control" id="course-date-duration">
                    </div>
                    <div class="mb-4">
                        <label for="course-day-duration" class="form-label"> Course duration (days) </label>
                        <input name="course-day-duration" placeholder="Enter duration of course in days Eg: 7 days" type="text" class="form-control" id="course-day-duration">
                    </div>

                </div>


                <!-- Instructor Section -->
                <div class="course-box course-instructor">
                    <h3 class="text-center"> Course-Instructor section </h3>
                    <div class="mb-4">
                        <label for="instructor-name" class="form-label">Instructor name</label>
                        <input name="instructor-name" placeholder="Enter name of  instructor" type="text" class="form-control" id="instructor-name">
                    </div>

                    <div class="mb-4">
                        <label for="instructor-post" class="form-label">Instructor Post</label>
                        <input name="instructor-post" placeholder="Enter current post of  instructor" type="text" class="form-control" id="instructor-post">
                    </div>

                    <div class="mb-4">
                        <label for="instructor-desc1" class="form-label">Instructor Description </label>
                        <textarea name="instructor-desc1" placeholder="Enter some details of instructor to be viewed on course page" class="form-control" id="instructor-desc1" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#instructor-desc1' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                    <div class="mb-4">
                        <label for="instructor-desc2" class="form-label">Instructor Description (part 2 in footer)</label>
                        <textarea name="instructor-desc2" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="instructor-desc2" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#instructor-desc2' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                    <div class="mb-4">
                        <label for="instructor-desc3" class="form-label"> Instructor Description (part 3 in footer) </label>
                        <textarea name="instructor-desc3" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="instructor-desc3" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#instructor-desc3' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                    <div class="mb-4">
                        <label for="instructor-pic1" class="form-label">Instructor Picture 1 (Profile on top)</label>
                        <input name="instructor-pic1" class="form-control" type="file" id="instructor-pic1">
                    </div>

                    <div class="mb-4">
                        <label for="instructor-pic2" class="form-label">Instructor Picture 2 (For footer)</label>
                        <input name="instructor-pic2" class="form-control" type="file" id="instructor-pic2">
                    </div>

                    <div class="mb-4">
                        <label for="instructor-pic3" class="form-label">Instructor Picture 3 (For footer)</label>
                        <input name="instructor-pic3" class="form-control" type="file" id="instructor-pic3">
                    </div>

                </div>


                <!-- Module section -->
                <!-- Module-1 -->
                <div class="course-box course-module">
                    <h3 class="text-center"> Course Module section </h3>
                    <div class="mb-4">
                        <label for="module1" class="form-label"> Module 1 </label>
                        <textarea name="module1" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module1" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module1' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                

                <!-- Module 2 -->
                    <div class="mb-4">
                        <label for="module2" class="form-label"> Module 2 </label>
                        <textarea name="module2" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module2" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module2' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                <!-- Module 3 -->
                    <div class="mb-4">
                        <label for="module3" class="form-label"> Module 3 </label>
                        <textarea name="module3" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module3" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module3' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                <!-- Module 4 -->
                    <div class="mb-4">
                        <label for="module4" class="form-label"> Module 4 </label>
                        <textarea name="module4" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module4" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module4' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                <!-- Module 5 -->
                    <div class="mb-4">
                        <label for="module5" class="form-label"> Module 5 </label>
                        <textarea name="module5" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module5" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module5' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                <!-- Module 6 -->
                    <div class="mb-4">
                        <label for="module6" class="form-label"> Module 6 </label>
                        <textarea name="module6" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module6" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module6' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                <!-- Module 7 -->
                    <div class="mb-4">
                        <label for="module7" class="form-label"> Module 7 </label>
                        <textarea name="module7" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module7" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module7' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>

                <!-- Module 8 -->
                    <div class="mb-4">
                        <label for="module8" class="form-label"> Module 8 </label>
                        <textarea name="module8" placeholder="Enter some details of instructor to be viewed on footer" class="form-control" id="module8" rows="3"></textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#module8' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>

                <!-- Flowchart -->

                <div class="course-box course-title">
                    <h3 class="text-center"> Flowchart section </h3>
                    <div class="mb-4">
                        <label for="flowchart-h1" class="form-label"> Flowchart head 1 </label>
                        <input name="flowchart-h1" placeholder="Mention about this step" type="text" class="form-control" id="flowchart-h1">
                    </div>
                    <div class="mb-4">
                        <label for="flowchart-h2" class="form-label"> Flowchart head 2 </label>
                        <input name="flowchart-h2" placeholder="Mention about this step" type="text" class="form-control" id="flowchart-h2">
                    </div>
                    <div class="mb-4">
                        <label for="flowchart-h3" class="form-label"> Flowchart head 3 </label>
                        <input name="flowchart-h3" placeholder="Mention about this step" type="text" class="form-control" id="flowchart-h3">
                    </div>
                    <div class="mb-4">
                        <label for="flowchart-h4" class="form-label"> Flowchart head 4 </label>
                        <input name="flowchart-h4" placeholder="Mention about this step" type="text" class="form-control" id="flowchart-h4">
                    </div>
                    <div class="mb-4">
                        <label for="flowchart-h5" class="form-label"> Flowchart head 5 </label>
                        <input name="flowchart-h5" placeholder="Mention about this step" type="text" class="form-control" id="flowchart-h5">
                    </div>
                    <div class="mb-4">
                        <label for="flowchart-h6" class="form-label"> Flowchart head 6 </label>
                        <input name="flowchart-h6" placeholder="Mention about this step" type="text" class="form-control" id="flowchart-h6">
                    </div>
                </div>

                <!-- Feedback -->
                <div class="course-box course-title">
                    <h3 class="text-center"> Feedback section </h3>
                    <div class="mb-4">
                        <label for="feedback-url1" class="form-label"> Feedback embed code 1 </label>
                        <input name="feedback-url1" placeholder="Enter youtube embed code here" type="text" class="form-control" id="feedback-url1">
                    </div>
                    <div class="mb-4">
                        <label for="feedback-url2" class="form-label"> Feedback embed code 2 </label>
                        <input name="feedback-url2" placeholder="Enter youtube embed code here" type="text" class="form-control" id="feedback-url2">
                    </div>
                    <div class="mb-4">
                        <label for="feedback-url3" class="form-label"> Feedback embed code 3 </label>
                        <input name="feedback-url3" placeholder="Enter youtube embed code here" type="text" class="form-control" id="feedback-url3">
                    </div>
                </div>


                

                <div class="d-flex justify-content-center gap-4">
                        <input name="submit" type="submit" value="Add to Courses" class="btn btn-lg btn-primary">
                </div>
            </form>
        </div>

    </div>

    
<?php

    if (isset($_POST["submit"])){

        // db
        require_once "php/db.inc.php";

        // General Section
        $courseTitle = $_POST["course-title"];
        $courseTeaserUrl = $_POST["course-teaser-url"];
        // Pricing
        $courseMrp = $_POST["course-mrp"];
        $courseSp = $_POST["course-sp"];
        // Duration
        $courseDayDuration = $_POST["course-day-duration"];
        $courseDateDuration = $_POST["course-date-duration"];

        // Instructor
        $instructorName = $_POST["instructor-name"];
        $instructorPost = $_POST["instructor-post"];
        $instructorDesc1 = $_POST["instructor-desc1"];
        $instructorDesc2 = $_POST["instructor-desc2"];
        $instructorDesc3 = $_POST["instructor-desc3"];
        $instructorPic1 = $_FILES["instructor-pic1"]["name"];
        $instructorPic2 = $_FILES["instructor-pic2"]["name"];
        $instructorPic3 = $_FILES["instructor-pic3"]["name"];

        // Uploading pics
        $uploaddir = '../assets/img/uploads/';
        $uploadpic1 = $uploaddir . basename($instructorPic1);
        $uploadpic2 = $uploaddir . basename($instructorPic2);
        $uploadpic3 = $uploaddir . basename($instructorPic3);
        move_uploaded_file($_FILES['instructor-pic1']['tmp_name'], $uploadpic1);
        move_uploaded_file($_FILES['instructor-pic2']['tmp_name'], $uploadpic2);
        move_uploaded_file($_FILES['instructor-pic3']['tmp_name'], $uploadpic3);

        // Module 1
        $module1 = $_POST["module1"];
       
        // Module 2
        $module2 = $_POST["module2"];
       
        // Module 3
        $module3 = $_POST["module3"];
        
        // Module 4
        $module4 = $_POST["module4"];
        
        // Module 5
        $module5 = $_POST["module5"];
        
        // Module 6
        $module6 = $_POST["module6"];
        
        // Module 7
        $module7 = $_POST["module7"];
        
        // Module 8
        $module8 = $_POST["module8"];
        
        // Flowchart
        $flowchartH1 = $_POST["flowchart-h1"];
        
        // Feedback
        $feedbackUrl1 = $_POST["feedback-url1"];
        $feedbackUrl2 = $_POST["feedback-url2"];
        $feedbackUrl3 = $_POST["feedback-url3"];

        
        $table_name = "course";


        $query = "INSERT INTO `course` (`course_title`, `course_teaser_url`, `course_mrp`, `course_sp`, `course_day_duration`, `course_date_duration`, `instructor_name`, `instructor_post`, `instructor_desc1`, `instructor_desc2`, `instructor_desc3`, `instructor_pic1`, `instructor_pic2`, `instructor_pic3`, `module1`, `module2`, `module3`, `module4`, `module5`, `module6`, `module7`, `module8` , `flowchart_h1`, `flowchart_h2`, `flowchart_h3`, `flowchart_h4`, `flowchart_h5`, `flowchart_h6`, `feedback_url1`, `feedback_url2`, `feedback_url3`) VALUES ('$courseTitle', '$courseTeaserUrl', '$courseMrp', '$courseSp', '$courseDayDuration', '$courseDateDuration', '$instructorName', '$instructorPost', '$instructorDesc1', '$instructorDesc2', '$instructorDesc3', '$instructorPic1', '$instructorPic2', '$instructorPic3', '$module1', '$module2' , '$module3', '$module4', '$module5', '$module6', '$module7', '$module8', '$flowchartH1', '$flowchartH2', '$flowchartH3', '$flowchartH4', '$flowchartH5', '$flowchartH6', '$feedbackUrl1', '$feedbackUrl2' , '$feedbackUrl3');";

        // Execute Query
        $insertion = mysqli_query($conn , $query);
        $conn->close();
        echo "<script> alert('Course added Successfully') </script>" ;
    }

?>

<?php
    include("footer.php");
?>