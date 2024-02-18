<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:http://localhost/studentAMS/index.php");
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

<div class="row">
    <div class="content">
        <h3 style="text-align: center; margin-bottom: 30px">Teacher List</h3>
        <table class="table table-stripped">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <!-- <th scope="col">Department</th> -->
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Semester</th>
                <th scope="col">Batch</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../connection.php';
                    $sql = "SELECT * FROM teacher";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                
                ?>
                <tr>
                <td style="text-transform: capitalize;"><?php echo $row['fname'].' '.$row['lname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td style="text-transform: capitalize;"><?php echo $row['course_name']; ?></td>
                <td style="text-transform: uppercase;"><?php echo $row['course_code']; ?></td>
                <td><?php echo $row['sem']; ?></td>
             
                <td><?php echo $row['batch']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                </tr>
                <?php } } ?>
            </tbody>       
        </table>
    </div>
</div>

<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>

</body>
</html>