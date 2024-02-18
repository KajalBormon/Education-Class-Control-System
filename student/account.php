<?php 
    include '../connection.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:http://localhost/studentAMS/index.php");
    }
    if(isset($_POST['done'])){
        $s_id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dept = $_POST['department'];
        $batch = $_POST['batch'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];

        $update_sql = "UPDATE students SET fname='{$fname}',lname='{$lname}',dept='{$dept}',batch='{$batch}',phone='{$phone}',mail='{$mail}' WHERE sid=$s_id";

        $update_res = mysqli_query($conn, $update_sql);
        if($update_res){
            $err = "<font color='green'>Updated Successfully</font>"; 
        }else{
            $err = "<font color='red'>Updated Unsuccessfully</font>"; 
        }
    } 

?>

<?php include 'header.php'; ?>


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
        <h3>Update Account</h3>
        <?php echo @$err; ?>
        <br>
        <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3 selectform">

            <div class="form-group">
                <table>
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
        <?php
            if(isset($_POST['sr_btn'])){
                $id = $_POST['sr_id'];
                $sql = "SELECT students.sid,students.fname,students.lname,students.dept,students.mail,students.batch,students.phone,admin.username FROM students JOIN admin WHERE sid = $id AND username='{$_SESSION['username']}'";
                $fetch_sql = mysqli_query($conn, $sql);
                if(mysqli_num_rows($fetch_sql)>0){
                    while($row = mysqli_fetch_assoc($fetch_sql)){
            
        ?>
        <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
            <table class="table table-striped changes1">
                <tbody>
                <tr>
                    <td> <strong> Student ID: </strong></td>
                    <td><input type="number" name="s_id" id="" value="<?php echo $row['sid']; ?>"></td>
                </tr>

                <tr>
                    <td> <strong> Student Firstname: </strong></td>
                    <td style="text-transform: capitalize;"><input type="text" name="fname" id="" value="<?php echo $row['fname'];?>"></td>
                </tr>
                <tr>
                    <td> <strong> Student Lastname: </strong></td>
                    <td style="text-transform: capitalize;"><input type="text" name="lname" id="" value="<?php echo $row['lname']; ?>"></td>
                </tr>
                
                <tr>
                    <td><strong>Department: </strong></td>
                    <td style="text-transform: uppercase;"><input type="text" name="department" id="" value="<?php echo $row['dept']; ?>"></td>
                </tr>
                
                <tr>
                    <td><strong>Batch: </strong></td>
                    <td><input type="number" name="batch" id="" value="<?php echo $row['batch']; ?>"></td>
                </tr> 
                <tr>
                    <td><strong>Phone: </strong></td>
                    <td><input type="number" name="phone" id="" value="<?php echo $row['phone']; ?>"> </td>
                </tr>

                <tr>
                    <td><strong>Email: </strong></td>
                    <td><input type="email" name="mail" id="" value="<?php echo $row['mail']; ?>"> </td>
                </tr>
                <input style="display: none;" type="hidden" name="id" value="<?php echo $id; ?>">
          
                <tr><td></td></tr>
                <tr>
                        <td></td>
                        <td><input type="submit" value="Update" name="done" /></td>
                        
                </tr>

                </tbody>
            </table>
        </form>
        <?php } } else{echo "Your Account Status Not Updated YET!!! Please Wait...";} } ?>
    </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>




<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>


</body>
</html>
