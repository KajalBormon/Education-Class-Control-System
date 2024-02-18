<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:http://localhost/studentAMS/index.php");
}

include '../connection.php';

?>

<?php include 'header.php'; ?>


    <div class="container" style="font-family:'PT Serif';font-size:40px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-3"></div>
                        <div>
                            <p class="text-center text-dark">Education Class Control System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3">
                <p>One stop solution for your class room :)</p>
                <img src="../images/tcr.png" height="200px" width="300px" />
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="../js/jquery_library.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>

</html>