<?php 
    error_reporting(0); 
    include '../connection.php'; 
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:http://localhost/studentAMS/index.php");
    }
  
    if(isset($_POST['save'])){
        foreach ($_POST['status'] as $i=> $st_status) {
            
            $stat_id = $_POST['stat_id'][$i];
            $count_batch = $_POST['stat_batch'][$i];
            $name = $_POST['name_stu'][$i];
            $course = $_POST['stat_course'];
            $dp = date('Y-m-d');
        
        
            $stat_sql = "INSERT INTO attendance(sid,name,course_name,batch,status,date) VALUES('$stat_id','{$name}','$course','$count_batch','$st_status','$dp')";

            if(mysqli_query($conn, $stat_sql)){
                $err = "<font color='green'>Attendance Recorded Successfully</font>"; 
            }else{
                $err = "<font color='green'>Don't Attendance Record Successfully</font>"; 
            }
    
        }
    
    }
  
?>

<?php include 'header.php'; ?>


<div class="container" style="font-family:'PT Serif';font-size:40px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-3 center"></div>
                        <div class="col-md-9">
                            <p class="text-center text-dark" style="margin-right: 30%;">Education Class Control System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>


<center>

<div class="row">

    <div class="content" id="content2">
        <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
        <br>

        <center><p><?php echo @$err; ?></p></center> 

        <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
            <div class="form-group" id="showattbtn">
                <table>
                    <tr>
                        <td>
                            <label class="mr-4">Select Batch</label> 
                        </td>
                        <td></td>
                        <td>
                  
                            <select name="whichbatch" class="select1" id="input1">
                                <?php
                                    $sql1 = "SELECT * FROM teacher WHERE username = '{$_SESSION['username']}'";
                                    $res1 = mysqli_query($conn, $sql1);
                                    if(mysqli_num_rows($res1)>0){
                                       while( $row1 = mysqli_fetch_assoc($res1)){   
                                ?>
                                <option><?php echo $row1['batch']; ?></option>
                                
                               <?php } } ?>
                            </select>
                            
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label >Select Course</label>
                        </td>
                        <td></td>
                        <td>
                            <select name="whichcourse" class="select1" id="input1">
                                <?php
                                    $sql1 = "SELECT * FROM teacher WHERE username = '{$_SESSION['username']}'";
                                    $res1 = mysqli_query($conn, $sql1);
                                    if(mysqli_num_rows($res1)>0){
                                       while( $row1 = mysqli_fetch_assoc($res1)){   
                                ?>
                                <option><?php echo $row1['course_name']; ?></option>
                                <?php } } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            
                <input type="submit" value="Show!" name="batch" />  
            </div> 
                
            </form>

        
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
                            
                            if(isset($_POST['batch'])){

                            $i=0;
                            $radio = 0;
                            $batch = $_POST['whichbatch'];
                            $course = $_POST['whichcourse'];
                            $sql = "SELECT * FROM students WHERE batch='$batch' ORDER BY sid ASC";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $row['sid']; ?><input type="hidden" name="stat_id[]" value="<?php echo $row['sid']; ?>"> </td>
                            <td style="text-transform: capitalize;"><?php echo $row['fname'].' '.$row['lname']; ?><input type="hidden" name="name_stu[]" value="<?php echo $row['fname'].' '.$row['lname']; ?>"></td>
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

    </center>


<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/main.js"></script>

</body>
</html>
