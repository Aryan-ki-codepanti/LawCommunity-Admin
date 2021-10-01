<?php
    include("header.php");

    // Connection to Database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "mc";
    $table_name = "event";

    $conn = new mysqli($server , $user , $pass , $db_name);
?>

<div class="container ps-5  py-5 login-container">

    <h1 class="text-center"> Admin Panel </h1>
    <h3> Approving Blogs </h3>

    <?php
        $fetchBlogs = mysqli_query($conn , "SELECT * FROM `$table_name` WHERE event_status = 'none';");
        
        if (mysqli_num_rows($fetchBlogs) == 0){
            echo '<h3 class="text-center my-5 p-4 border border-2 rounded rounded-2"> No Events available to approve or reject <i class="fas fa-smile"></i> </h3>';
        }

        else{
            $html = '';
            foreach($fetchBlogs as $event){
                $html = $html . '
                    <div class="blog-box">
                        <h4>'. $event['event_heading'] .'</h4>
                        <h4> At: '. $event['event_venue'] .' , On : '. $event['event_date'] .'</h4>
                        '.$event['content'].'
                        <div class="blog-link-box">
                            <div class="blog-links">
                            ';

                if ($blog['author_image']){
                    $html = $html .
                    '<a href="img/event/'.$event['event_image'].'" target="_blank"  class="btn btn-light mx-2"> Author Image </a>';
                }
                else{
                    $html = $html .
                    '<a href="img/event/'.$event['event_image'].'" target="_blank"  class="btn btn-light mx-2 disabled"> Author Image </a>';
                }

                $html = $html.'
                            </div>
                            <div class="blog-btn-box">
                                <a class="btn btn-lg mx-2 btn-outline-success" id="accept'.$event['event_id'].'" onclick="acceptId(this.id)"> Approve </a>
                                <a class="btn btn-lg mx-2 btn-outline-danger" id="reject'.$event['event_id'].'" onclick="rejectId(this.id)"> Reject </a>
                            </div>
                        </div>
                    </div>
                '; 
            }

            $html = $html . '
                <button class="btn btn-lg btn-primary my-2" id="saveBtn"> Save Changes </button>
                <form method="POST" action="approveEvent.php">
                    <input name="dataAccept" id="dataAccept" hidden>
                    <input name="dataReject" id="dataReject" hidden>
                    <input name="submit" id="submit" type="submit" class="btn btn-lg btn-info" value="Apply Changes">
                </form>
            ';
            echo $html;
        }
    ?>

    

</div>

<?php

    if (isset($_POST["submit"])){

        $accepted = $_POST["dataAccept"];
        $rejected = $_POST["dataReject"];

        $queryAccept = "UPDATE `$table_name` SET event_status = 'accept' WHERE event_id IN ($accepted);";
        $queryReject = "DELETE FROM `$table_name` WHERE event_id IN ($rejected);";

        $accepting = mysqli_query($conn , $queryAccept);
        $rejecting = mysqli_query($conn , $queryReject);
        $conn->close();
        echo "<script> alert('Changes made successfully') </script>" ;
        echo "<script>document.location = 'approveEvent.php';</script>";
    }

?>

<?php
    include("footer.php");
?>
<script src="js/approveEvent.js"></script>