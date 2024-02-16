<?php
    include '../connection.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:http://localhost/studentAMS/index.php");
    }
    if(isset($_POST['Register'])){
        $isvalue=true;

        //validate contact
        if(!preg_match("/^[0]{1}[1]{1}[3-9]{1}[0-9]{8}$/",$_POST['phone'])){
            ?>
            <script> alert("Invalid Number");</script>
            <?php
        $isvalue=false;
        }
        
        else{
        $sid = $_POST['sid'];
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);
        $batch =$_POST['batch'];
        $phone = $_POST['phone'];
        $sql_check_sid = "SELECT sid FROM students WHERE sid = {$sid}";
        $query = mysqli_query($conn,$sql_check_sid);
        if(mysqli_num_rows($query)>0){
            $err = "<font color='red'>This student id already Exist....!</font>"; 
        }else{
            $sql = "INSERT INTO students(sid,fname,lname,dept,mail,batch,phone) VALUES({$sid},'{$fname}','{$lname}','{$dept}','{$mail}',{$batch},{$phone})";
            if(mysqli_query($conn,$sql)){
                $err = "<font color='green'>Add Student Successfully</font>"; 
            }else{
                $err = "<font color='red'>Invalid student information...!</font>";
            }
        }
        
    }
}

?>


<!DOCTYPE html>
<html>
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
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
    <link rel="stylesheet" href="../css/singup.css">

</head>
<body>
	

<nav class="navbar navbar-expand-lg navbar-dark static-top" style="background-color: #5a0533; border-bottom:1px solid black;box-shadow: 3px 3px 5px;">
    <div class="container" style = "font-family:'PT Serif';font-size:22px;padding-right:0px;margin-right:0%;">
        <a class="navbar-brand" href="index.php" style="margin-left: -40%;">
            <h3 style = "font-family:'Bitter';" ><img src="../images/logo.png" width="70" style = "border-radius:50%;border:1px black;" height="70" alt="JKKNIU"/> <span class = "mh3">JKKNIU</span><br /><p style="margin-left:4%;font-size:12px;margin-top:0;position:absolute;top:65px">Trishal,Mymensingh<br />Estd. 2006</p></h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mnav" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="singup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Create Users</a>
                    <span class="sr-only">(current)</span>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="addteacher.php"><i class="fa fa-plus"></i> Add Teacher</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="addstudent.php"><i class="fa fa-plus"></i> Add Student</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="teacherlist.php"><i class="fa fa-users"></i> Teacher List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="studentlist.php"><i class="fa fa-users"></i> Student List</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="font-family:'PT Serif';font-size:40px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <p class="text-center text-dark" style="margin-right: 30%;">Education Class Control System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>

<div class="container">
    <div class=" mcontainer">
        <form name="register" method="post" class="myform" action="" enctype="multipart/form-data">
            <h1 class="tit mb-5">Add Student</h1>
            <p align='center'><b><?php echo @$err; ?></b></p> 
            <hr class="mhr" color="black" height="15px" />
            <table width="100%">
                <tr>
                    <td>
                        <label class="label required">Student ID</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="number" autocomplete="off" name="sid" placeholder="Student ID" class="required" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label required">First Name</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" autocomplete="off" name="fname" placeholder="First Name" class="required" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Last Name</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" name="lname" autocomplete="off" placeholder="Last Name" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label required">Department</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="dept" autocomplete="off" placeholder="Department" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Email</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="email" name="mail" autocomplete="off" placeholder="csejkkniu@gmail.com" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Batch</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="number" autocomplete="off" name="batch" id="phone" placeholder="Continue Batch" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Phone</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="text" name="phone" id="sem" placeholder="Phone Number" required />
                    </td>
                </tr>
 
                <tr>
                    <td>
                        <input type="submit" onclick="return matchPassword()" name="Register" class="login_btn" value="Add Student" />
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="reset" onClick="window.location.href=window.location.href" class="reset_btn" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>

</body>
</html>