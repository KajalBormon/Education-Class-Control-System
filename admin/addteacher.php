<?php
    include '../connection.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:http://localhost/studentAMS/index.php");
    }
    if(isset($_POST['Register'])){
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        //$dept = mysqli_real_escape_string($conn, $_POST['dept']);
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);
        $batch = $_POST['batch'];
        $sem = $_POST['sem'];
        $course_name = mysqli_real_escape_string($conn, $_POST['course']);
        $course_code = mysqli_real_escape_string($conn, $_POST['code']);

        $select_query = "SELECT * FROM teacher WHERE username='{$username}'";
        $result1 = mysqli_query($conn,$select_query);
        
        if(mysqli_num_rows($result1)>0){
            $err = "<font color='red'>Username already Exist...!</font>";
        }else{
            $sql = "INSERT INTO teacher(fname,lname,username,mail,batch,sem,course_name,course_code) VALUES('{$fname}','{$lname}','{$username}','{$mail}',{$batch},{$sem},'{$course_name}','{$course_code}')";
            if(mysqli_query($conn,$sql)){
                $err = "<font color='green'>Add Teacher Successfully</font>"; 
            }else{
                $err = "<font color='red'>Invalid Teacher information...!</font>";
            }
        }
    }

?>


<?php include 'header.php'; ?>


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
            <h1 class="tit mb-5">Add Teacher</h1>
            <p align='center'><b><?php echo @$err; ?></b></p> 
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
                        <label class="label required">username</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" name="username" autocomplete="off" placeholder="Username" required />
                    </td>
                </tr>

                <!-- <tr>
                    <td>
                        <label class="label required">Department</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="dept" autocomplete="off" placeholder="Department" required />
                    </td>
                </tr> -->

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
                        <label>Semester</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="number" autocomplete="off" name="sem" id="phone" placeholder="Semester" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Course Name</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="text" name="course" id="course" placeholder="Course Name" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label required">Course Code</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="text" name="code" id="course" placeholder="Course Code" required />
                    </td>
                </tr>
 
                <tr>
                    <td>
                        <input type="submit" onclick="return matchPassword()" name="Register" class="login_btn" value="Add Teacher" />
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