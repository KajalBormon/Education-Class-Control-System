<?php
include 'connection.php';
session_start();
if (isset($_POST['Login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['Password']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    if ($username == "" || $pass == "") {
        $err = "<font color='red' align='center'>Enter a Valid Username & Password</font>";
    } else {
        $sql = "SELECT * FROM admin WHERE username = '{$username}' AND password = '{$pass}' AND type='{$type}'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if ($result > 0 && $type == 'student') {
            $_SESSION['username'] = $_POST['username'];
            header("location:{$host}/student/");
        } else if ($result > 0 && $type == 'teacher') {
            $_SESSION['username'] = $_POST['username'];
            header("location:{$host}/teacher/");
        } else if ($result > 0 && $type == 'admin') {
            $_SESSION['username'] = $_POST['username'];
            header("location:{$host}/admin/");
        } else {
            $err = "<font color='red'>Username, Password or Role is Wrong try again...!</font>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Education Class Control System</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Bitter:wght@100;300;400&family=Bree+Serif&family=Handlee&family=Numans&family=Odibee+Sans&family=PT+Serif:wght@400;700&family=Patrick+Hand&family=Simonetta:ital,wght@0,400;0,900;1,400&family=Trade+Winds&family=Volkhov:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css.map">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">


</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-dark static-top" style="background-color: #5a0533; border-bottom:1px solid black;box-shadow: 3px 3px 5px;">
        <div class="container" style="font-family:'PT Serif';font-size:22px; margin-right:0%;" >
            <a class="navbar-brand" href="index.php" style="margin-left: -40%;">
                <h3 style="font-family:'Bitter';"><img src="images/logo.png" width="70" style="border-radius:50%;border:1px black;" height="70" alt="JKKNIU" /> <span class="mh3">JKKNIU</span><br />
                    <p style="margin-left:4%;font-size:12px;margin-top:0;position:absolute;top:65px">Trishal,Mymensingh<br />Estd. 2006</p>
                </h3>
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

                    <li class="nav-item">
                        <a class="nav-link" href="help.php"><i class="fa fa-question"></i> Help</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="font-family:'PT Serif';font-size:35px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <p class="text-center text-dark">Education Class Control System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>



    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card mcon" id="card">
                <div class="card-header" id="card-header">
                    <h3 align="center" style="color:#000">Sign - In</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <p align='center'><b><?php echo @$err; ?></b></p>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" autocapitalize="characters" autocomplete="off" class="form-control a" name="username" placeholder="Username">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="Password" placeholder="Password">
                        </div>
                        <div class="form-group" class="radio">
                            <div class="pl-2 label">
                                <label for="input1" class="control-label">Role</label>
                                <label class="ml-3">
                                    <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
                                </label>
                                <label class="ml-2">
                                    <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
                                </label>
                                <label class="ml-2">
                                    <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
                                </label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Login" style="color:white" name="Login" class="login_btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer" id="card-footer">
                    <div class="d-flex justify-content-center sign">
                        <a href="singup.php" style="text-decoration:none; color:black;">New User.? SignUP Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <!-- JS -->
    <script src="js/jquery_library.js"></script>
    <script src="js/bootstrap.js"></script>
    <?php
    include "footer.php";
    ?>
</body>
</html>