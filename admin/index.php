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
    <div class="content m-5">
        <strong><p>Welcome To Class Management System</p></strong>
        <img src="../images/logo.png" height="300px" width="270px" />
    </div>
</div>


<!-- JS -->
<script src="../js/jquery_library.js"></script>
<script src="../js/bootstrap.js"></script>

</body>
</html