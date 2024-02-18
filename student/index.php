<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:http://localhost/studentAMS/index.php");
}

include "../connection.php";

?>

<?php include 'header.php'; ?>


    <div class="container" style="font-family:'PT Serif';font-size:40px;">
        <div class="mt-1">
           <div class="row">
                    <div class="col-md-6"></div>
                        <div class="col-md-9">
                            <p class="text-center text-dark">Education Class Control System</p>
                    </div>
                    <div class="col-md-3"></div>
            </div>
        </div>
                
    </div>




    <div class="container-fluid">
        <div class="row g-0 mt-5">
            <div class="col-md-4">
                <div class="content">
                    <strong>
                        <p>Be Attentive and be Regular</p>
                    </strong>
                    <img src="../images/tcr.png" height="200px" width="300px" />
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="../js/jquery_library.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>

</html>