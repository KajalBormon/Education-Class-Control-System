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

<div class = "col-lg-7 mcon m-auto">
    <h1 style = "color : purple;font-weight:bold;font-size:45px;padding-bottom:0px;padding-top:10px;margin-top:1px;text-decoration:underline dashed;text-shadow:1px 1px 2px black;" align = "center">About</h1>
    <hr color = "black" size = "2px">

    <p align="center" style = "font-size:20px;text-align:justify;">
    Our class management system is a web-based application designed to help educators to manage their classrooms more effectively. It is a software tool that can be used to automate administrative tasks, online assignment submission, provides real-time access to information about student performance and progress. The purpose of our system is to make it easier for teachers to manage their classes, save time, and create a more effective learning environment for students. On the other hand, students can check their own attendance records, access resources shared by their teachers and submit assignments there so that the respective course teacher can get that directly. It can help teachers organize and track attendance as well as provide a central location for important class resources, such as syllabus, reading materials and assignments.
    </p>
    <hr color = "black" size = "2px">

    <h1 style = "color : navy;font-weight:bold;padding-bottom:0px;padding-top:0px;margin-top:0px;text-decoration:underline dotted;text-shadow:1px 1px 2px black;">Objectives</h1>
    <ol style="padding: 10px; font-size: 18px">
        <li>To store and manage information of each course teacher.</li>
        <li>Students attendance system in a single platform.</li>
        <li>To store and manage information of particular class.</li>
        <li>Teachers can share class lectures, reference books and other related documents.</li>
        <li>Students can submit their assignments.</li>
        <li>Teachers can access all assignments submitted by each batch from one point.</li>
        <li>Integration of all attendance records of a course and show the marks obtained by each student as a form of report and the facility to download the report.</li>
        
    </ol>
</div>


<?php
    include 'footer.php';
?>


<!-- JS -->
<script src="js/jquery_library.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>