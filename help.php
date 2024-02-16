<!DOCTYPE html>
<html>
<head>

	<title>Student Attendance Management System</title>
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
    <div class="container" style = "font-family:'PT Serif';font-size:22px;padding-right:0px;margin-right:0%;">
        <a class="navbar-brand" href="index.php" style="margin-left: -40%;">
            <h3 style = "font-family:'Bitter';" ><img src="images/logo.png" width="70" style = "border-radius:50%;border:1px black;" height="70" alt="JKKNIU"/> <span class = "mh3">JKKNIU</span><br />  <p style="margin-left:4%;font-size:12px;margin-top:0;position:absolute;top:65px">Trishal,Mymensingh<br />Estd. 2006</p></h3>
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

<div class = "col-lg-6 m-auto mcon" style = "border-radius: none;">
      <h1 style = "color : Navy;font-size:45px;letter-spacing: 2px;padding-bottom:0px;padding-top:15px;margin-top:1px;text-decoration:underline dashed;font-weight:bold;text-shadow:1px 1px 2px black;" align="center"></strong>INSTRUCTIONS</strong></h1>
      <hr color = "black" height = "20px"/>
      <h2><strong> How To Process Class Management System? </strong></h2>
      <p align="center" style = "padding-left:5px;text-shadow: 0.5px 0.5px black;padding-right: 10px;
				color:black;font-size:20px;text-align:justify;">
      1. First Students Has To Register.<br/>
      2. By Filling Out The Registration Form which contains basic details 
      Like (Username, Name, Mobile, Email, & Set The Password..)<br/>
      3. After Registering Go To Login Page & <br /> 
      4. Enter The Login Details Which You Have Set During the time of Registration.<br / >
      5. Once Login is Successful then check your attendance report<br />
      6. You can also upload your assignment.<br />
      7. Teacher can upload course content and also upload internal number.<br />
      8. If not show the information to communicate with admin<br />
      </p>
      <hr color =  "black" size = "2px" />
         
   </div>
   <?php
include "footer.php";
?>


<!-- JS -->
<script src="js/jquery_library.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>