<?php
error_reporting(0);
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

<center>
<div class="row">
  <div class="content">
    <h3 class="s_head">Student List</h3>
    <br>
    <?php
       
    
    ?>
    <form method="post" action="">
      <div class="form-group">
        <input type="number" placeholder="Continue Batch" name="sr_batch" style="width: 30%; display: block;">
        <input type="submit" name="sr_btn" value="Go!" >
      </div>
    </form>
    
    <br>
    <table class="table table-stripped">
        <thead>
            <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Batch</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include '../connection.php';
                if(isset($_POST['sr_btn'])){
                    $search_batch = $_POST['sr_batch'];
                    $sql = "SELECT * FROM students WHERE batch = {$search_batch} order by sid";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){ 
            ?>
            <tr>
            <td><?php echo $row['sid']; ?></td>
            <td style="text-transform: capitalize;"><?php echo $row['fname'].' '.$row['lname']; ?></td>
            <td style="text-transform: uppercase;"><?php echo $row['dept']; ?></td>
            <td><?php echo $row['batch']; ?></td>
            <td><?php echo '+880'.$row['phone']; ?></td>
            <td><?php echo $row['mail']; ?></td>
            </tr>
            <?php } } }?>
        </tbody>
            
    </table>

  </div>

</div>


<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>

</body>
</html>