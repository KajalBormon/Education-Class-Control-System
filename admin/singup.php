<?php
include "../connection.php";
if (isset($_POST['Register'])) {
    $isvalue = true;
    if (!preg_match("/^[a-zA-Z- ']*$/", $_POST['fname'])) {
?>
        <script>
            alert("Invalid First Name");
        </script>
    <?php
        $isvalue = false;
    }

    //validate fname
    if (!preg_match("/^[a-zA-Z- ']*$/", $_POST['lname'])) {
    ?>
        <script>
            alert("Invalid Last Name");
        </script>
    <?php
        $isvalue = false;
    }
    if (!preg_match("/^[0]{1}[1]{1}[3-9]{1}[0-9]{8}$/", $_POST['phone'])) {
    ?>
        <script>
            alert("Invalid Number");
        </script>
    <?php
        $isvalue = false;
    }


    if (!$isvalue) {
    ?>
        <script>
            alert("Submit Again");
        </script>
<?php
    } else {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['mail']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pass = md5($_POST['passw2']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);

        $query = "SELECT * FROM admin WHERE username='{$username}'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $err = "<font color='red'>Username Already Exists..!</font>";
        } else {
            $signup_insert = "INSERT INTO admin(fname,lname,username,email,phone,password,type) VALUES('{$fname}','{$lname}','{$username}','{$email}','{$phone}','{$pass}','{$type}')";

            $signup_query = mysqli_query($conn, $signup_insert) or die("Error: " .mysqli_error($conn));

            if ($signup_query) {
                $err = "<font color='green'>SingUp successfully...!!</font>";
            }
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
                <h1 class="tit mb-5">Sing Up</h1>
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
                            <input type="phone" autocomplete="off" name="phone" id="phone" placeholder="01XXXXXXXXX" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="label required">Password</label>
                        </td>
                        <td>

                        </td>
                        <td class="td1" class="label required">
                            <input type="password" name="passw1" id="pass1" placeholder="Password" required />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="label required">Confirm Password</label>
                        </td>
                        <td>

                        </td>
                        <td class="td1" class="label required">
                            <input type="password" name="passw2" id="pass2" placeholder="Confirm Password" required />
                            <p id="mgss" style="color: red;"></p>
                        </td>
                    </tr>
                    <tr class="rolefont">

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