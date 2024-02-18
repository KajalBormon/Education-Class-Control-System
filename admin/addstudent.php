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

<?php include 'header.php'; ?>



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