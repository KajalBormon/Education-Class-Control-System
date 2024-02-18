<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:http://localhost/studentAMS/index.php");
}

include "../connection.php";

if (isset($_POST['delete'])) {

    $del_id = $_POST["del_id"];
    $sql = "DELETE FROM teacher WHERE id = $del_id";
    mysqli_query($conn, $sql);
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

    <div class="container-fluid">
        <div class="content">
            <h3 style="text-align: center; margin-bottom: 30px">My Class Information</h3>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <!-- <th scope="col">Department</th> -->
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../connection.php';
                    $sql = "SELECT * FROM teacher WHERE username = '{$_SESSION['username']}'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td style="text-transform: capitalize;"><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <!-- <td style="text-transform: uppercase;"><?php echo $row['dept']; ?></td> -->
                                <td style="text-transform: capitalize;"><?php echo $row['course_name']; ?></td>
                                <td style="text-transform: uppercase;"><?php echo $row['course_code']; ?></td>
                                <td><?php echo $row['batch']; ?></td>
                                <td><?php echo $row['sem']; ?></td>
                                <td><?php echo $row['mail']; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure want to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="del_id" value="<?= $row['id'] ?>">
                                                        <input class="btn btn-danger" type="submit" name="delete" value="Confirm Delete">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="../js/jquery_library.js"></script>
    <script src="../js/bootstrap.js"></script> -->

</body>

</html>