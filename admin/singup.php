<?php
    include "../connection.php";
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
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['mail']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $pass = md5($_POST['passw2']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);

        $query = "SELECT * FROM admin WHERE username='{$username}'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            $err = "<font color='red'>Username Already Exists..!</font>";
        }else{
            $signup_insert = "INSERT INTO admin(fname,lname,username,email,phone,password,type) VALUES('{$fname}','{$lname}','{$username}','{$email}','{$phone}','{$pass}','{$type}')";

            $signup_query = mysqli_query($conn, $signup_insert) or die("Error: ".mysqli_error($conn));

            if($signup_query){
                $err = "<font color='green'>SingUp successfully...!!</font>";
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
    <link rel="stylesheet" href="../css/singup.css">

</head>


<body>
	
<!-- <header>
  <h1 class="title center y-5">Student Attendance Management System</h1>
</header> -->
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
                <div class="col-md-6"></div>
                    <div class="col-md-9">
                        <p class="text-center text-dark" style="margin-left: 30%;">Education Class Control System</p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>

<div class="container">
<div class=" mcontainer">
        <form name="register" method="post" class="myform" action="" enctype="multipart/form-data">
            <h1 class="tit mb-5">Sign Up For New Admin</h1>
            <?php echo @$err; ?>
            <hr class="mhr" color="black" height="15px" />
            <table width="100%">
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
                        <label class="label required">Username</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="username" autocomplete="off" placeholder="Username" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Email</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="email" name="mail" autocomplete="off" placeholder="student.csejkkniu@gmail.com" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="phone" autocomplete="off" name="phone" id="phone" placeholder="01700112233" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Password</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="password" name="psswd" id="pass1" placeholder="Password" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Confirm Password</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="password" name="psswd2" id="pass2" placeholder="Confirm Password" required />
                        <span id="mgs" style="color: red;"></span>
                    </td>
                </tr>
                <!-- <tr class="rolefont">

                    <td>
                        <label for="input1" class="control-label role">Role</label>
                        <label>
                            <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
                        </label> 
                        <label>
                            <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
                        </label> 
                        <label>
                            <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
                        </label>
                    </td>
               

                </tr>
  -->
                <tr>
                    <td>
                        <input type="submit" onclick="return matchPassword()" name="Register" class="login_btn" value="Submit" />
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
<script src="../js/main.js"></script>

</body>
</html>