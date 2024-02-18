<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:http://localhost/studentAMS/index.php");
}


include '../connection.php';
$batch = $_GET["batch"];
$course_name = $_GET["course_name"];

if (isset($_POST['save'])) {
    foreach ($_POST['status'] as $i => $st_status) {

        $stat_id = $_POST['stat_id'][$i];
        $count_batch = $_POST['stat_batch'][$i];
        $name = $_POST['name_stu'][$i];
        $course = $_POST['stat_course'];
        $dp = date('Y-m-d');


        $stat_sql = "INSERT INTO attendance(sid,name,course_name,batch,status,date) VALUES('$stat_id','{$name}','$course_name','$count_batch','$st_status','$dp')";

        if (mysqli_query($conn, $stat_sql)) {
            $err = "<font color='green'>Attendance Recorded Successfully</font>";
        } else {
            $err = "<font color='green'>Don't Attendance Record Successfully</font>";
        }
    }
}
?>

<?php include 'header.php'; ?>


    <div class="container" style="font-family:'PT Serif';font-size:40px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <p class="text-center text-dark">Class Management System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-2">
                <div class="bg-white">
                    <a href="course_details.php?batch=<?= $batch ?>&&course_name=<?= $course_name ?>" class="p-2 border-bottom bg-light fw-bold d-block">Student Report</a>
                    <a href="student_attendance.php?batch=<?= $batch ?>&&course_name=<?= $course_name ?>" class="p-2 border-bottom bg-light fw-bold d-block">Attendance</a>
                    <a href="content_upload.php?batch=<?= $batch ?>&&course_name=<?= $course_name ?>" class="p-2 border-bottom bg-light fw-bold d-block">Content Upload</a>
                    <a href="assignment_view.php?batch=<?= $batch ?>&&course_name=<?= $course_name ?>" class="p-2 border-bottom bg-light fw-bold d-block">Assignments</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="d-flex align-items-center justify-content-between p-2 bg-light mb-2">
                    <h4><?= $course_name ?>-<?= $batch ?>: Take Attendance</h4>
                </div>




                <div class="row">

                    <div class="content" id="content2">
                        <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
                        <br>

                        <center>
                            <p><?php echo @$err; ?></p>
                        </center>
                        <form action="" method="post" id="formbtn">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 0;
                                    $radio = 0;
                                    $sql = "SELECT * FROM students WHERE batch='$batch' ORDER BY sid ASC";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?php echo $row['sid']; ?><input type="hidden" name="stat_id[]" value="<?php echo $row['sid']; ?>"> </td>
                                                <td style="text-transform: capitalize;"><?php echo $row['fname'] . ' ' . $row['lname']; ?><input type="hidden" name="name_stu[]" value="<?php echo $row['fname'] . ' ' . $row['lname']; ?>"></td>
                                                <td style="text-transform: uppercase;"><?php echo $row['dept']; ?></td>
                                                <td><?php echo $row['batch']; ?><input type="hidden" name="stat_batch[]" value="<?php echo $row['batch']; ?>"></td>
                                                <td><?php echo $row['mail']; ?></td>

                                                <td class="radiostatus">
                                                    <label>
                                                        <input type="radio" name="status[<?php echo $radio; ?>]" value="Present" checked> Present
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="status[<?php echo $radio; ?>]" value="Absent"> Absent
                                                    </label>
                                                </td>
                                            </tr>
                                    <?php
                                            $radio++;
                                        }
                                    }

                                    ?>
                                    <td><input type="hidden" name="stat_course" value="<?php echo $course; ?>"></td>
                                </tbody>
                            </table>
                            <center>
                                <br>
                                <input type="submit" style="width: 10%; margin-left: 70%" value="Save!" name="save" />
                            </center>

                        </form>
                    </div>

                </div>





            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="../js/jquery_library.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>

</html>