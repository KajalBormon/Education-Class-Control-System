<?php 
    include '../connection.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:http://localhost/studentAMS/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Attendance Management System</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Bitter:wght@100;300;400&family=Bree+Serif&family=Handlee&family=Numans&family=Odibee+Sans&family=PT+Serif:wght@400;700&family=Patrick+Hand&family=Simonetta:ital,wght@0,400;0,900;1,400&family=Trade+Winds&family=Volkhov:wght@400;700&display=swap" rel="stylesheet"> 
	<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css.map">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/singup.css">
    

</head>
<body style="background-color: white;">
<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark static-top" style="background-color: #5a0533; border-bottom:1px solid black;box-shadow: 3px 3px 5px;">
    <div class="container" style = "font-family:'PT Serif';font-size:22px;padding-right:0px;margin-right:0%;">
        <a class="navbar-brand" href="index.php" style="margin-left: -40%;">
            <h3 style = "font-family:'Bitter';" ><img src="../images/logo.png" width="70" style = "border-radius:50%;border:1px black;" height="70" alt="JKKNIU"/> <span class = "mh3">JKKNIU</span><br /><p style = "margin-left:6%;font-size:12px;margin-top:0;position:absolute;top:60px">Trishal,Mymensingh<br />Estd. 2006</p></h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mnav" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span class="sr-only">(current)</span>
                </li>
            
               <!--  <li class="nav-item">
                    <a class="nav-link" href="student.php"><i class="fa fa-users"></i> Student</a>
                </li> -->
                
               <li class="nav-item">
                    <a class="nav-link" href="account.php"><i class="fa fa-user"></i> My Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php"><i class="fa fa-file"></i> My Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="container" style="font-family:'PT Serif';font-size:40px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-6"></div>
                        <div class="col-md-9">
                            <p class="text-center text-dark" style="margin-left: 30%;">Education Class Control System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>

<center>

<!-- Content, Tables, Forms, Texts, Images started -->
<div class="row">
  <div class="content" id="content2">
    <h3>Student Report</h3>
    
    <br>
    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3 selectform">

        <div class="form-group">
            <table>
                <tr>
                    <td>
                        <label style="font-size: 20px;" for="input1" class="control-label mr-4">Select Course</label>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="form-group">
                            <select name="whichcourse" class="select1" id="input1">
                                <?php
                                    $sql1 = "SELECT course_name FROM teacher";
                                    $res1 = mysqli_query($conn, $sql1);
                                    if(mysqli_num_rows($res1)>0){
                                       while( $row1 = mysqli_fetch_assoc($res1)){   
                                ?>
                                    <option><?php echo $row1['course_name']; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-size: 20px;" for="input1" class="control-label">Your ID</label>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="changeplaceholder">
                            <input type="number" name="sr_id" id="input1" placeholder="Enter Your Id" />
                        </div> 
                    </td>
                </tr>
            </table>
            <input type="submit" id="show" value="Show!" name="sr_btn" />

        </div>
        
    </form>
    <br>

    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">
    <?php
        if(isset($_POST['sr_btn'])){
            $course = $_POST['whichcourse'];
            $id = $_POST['sr_id'];
            $sql = "SELECT * FROM attendance WHERE sid={$id} AND course_name='{$course}'";
            $res = mysqli_query($conn, $sql);
            $count_total = mysqli_num_rows($res);
            if($count_total>0){
                $count_pre = 0;
                $i = 0;
                while($row = mysqli_fetch_array($res)){
                $i++;
                if($row['status']=='Present'){
                    $count_pre++;
                }
                $percentage = ($count_pre/$count_total)*100;
                if($percentage>=90 && $percentage<=100){
                    $mark = 10;
                }
                else if($percentage>=85 && $percentage<90){
                    $mark = 9;
                }
                else if($percentage>=80 && $percentage<85){
                    $mark = 8;
                }
                else if($percentage>=75 && $percentage<80){
                    $mark = 7;
                }
                else if($percentage>=70 && $percentage<75){
                    $mark = 6;
                }
                else if($percentage>=65 && $percentage<70){
                    $mark = 5;
                }
                else if($percentage>=60 && $percentage<65){
                    $mark = 4;
                }
                else if($percentage>=55 && $percentage<60){
                    $mark = 3;
                }
                else if($percentage>=50 && $percentage<55){
                    $mark = 2;
                }else{
                    $mark = 0;
                }
                if($i<=1){
    ?>
    <tbody>
      <tr>
          <td>Student ID: </td>
          <td><?php echo $row['sid']; ?></td>
      </tr>

      <tr>
          <td>Student Name: </td>
          <td><?php echo $row['name']; ?></td>
      </tr>
      
      <tr>
          <td>Course: </td>
          <td><?php echo $row['course_name']; ?></td>
      </tr>
      
      <tr>
          <td>Batch: </td>
          <td><?php echo $row['batch']; ?></td>
      </tr> 
      <?php } }?>
      <tr>
        <td>Total Class (Days): </td>
        <td><?php echo $count_total; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $count_pre; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td> <?php echo $count_total - $count_pre; ?> </td>
      </tr>
      <tr>
        <td>Percentage: </td>
        <td> <?= round($percentage, 2) ?>%</td>
      </tr>
      <tr>
        <td>Marks: </td>
        <td> <?php echo $mark;?> </td>
      </tr>
    </tbody>
    <?php 
            }
            else{
                $err = "<font color='red'>NO Found Data. Please contact with the admin.....!</font>";  
            }  
        }
    ?>
    </table>
  </form>
  <h3><?php echo @$err; ?></h3>
  </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>




<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>


</body>
</html>
