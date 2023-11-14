<!-- Header -->



<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Manager Profile</title>

    <link href="../resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->







    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
         ***********************************-->
        <div class="nav-header">

            <div class="brand-logo">
                <a>
                    <span class="brand-title">

                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="pt-3"> Welcome Manager </h2>
                </div>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <br> <br>

                    <li>

                        <a href="manager_dashboard.php">
                            <i class="fa-solid fa-house"></i><span class="nav-text"> Home Page</span>
                        </a>
                    </li>
                


                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">



            <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div id="modalHead" class="modal-header">
                            <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="addMsg" class="text-center font-weight-bold"></p>
                        </div>
                        <div class="modal-footer ">
                            <div class="mx-auto">

                                <a type="button" id="closeBtn" href="#" data-dismiss="modal"
                                    class="btn btn-primary">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->

            <div class="container-fluid">






<!-- Header End -->
 <?php  
    


    // databaseconnection
    require_once "../connection.php";

    $sql_command = "SELECT * FROM admin WHERE email = '$_SESSION[email]' ";
    $result = mysqli_query($conn , $sql_command);

    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
           $name = ucwords($rows["name"]);
           $gender = ucwords($rows["gender"]);
           $dob= $rows["dob"];
            $dp = $rows["dp"];
       }

       if( empty($gender)){
           $gender = "Not Defined";
       }

       if( empty($dob)){
            $dob = "Not Defined";
            $age = "Not Defined";
        }
}
 ?>


<div class=container>
    <div class="row ">
        <div class="col-4 ">
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card shadow" style="width: 20rem;">
            <img src="Profile/<?php if(!empty($dp)){ echo $dp; }else{ echo "1.jpg"; } ?>" class="rounded img-fluid  card-img-top"  style="height: 300px "  alt="...">
                <div class="card-body">
                <h2 class="text-center mb-4"><?php echo $name; ?> </h2>
                    <p class="card-text">Email: <?php echo $_SESSION["email"] ?> </p>
                    <p class="card-text">Gender: <?php echo $gender ?> </p>
                    <p class="card-text">Date of Birth: <?php echo $dob ?> </p>
                    <p class="card-text">Age: <?php if( $dob != "Not Defined"){  
                                                    $date1=date_create($dob);
                                                    $date2=date_create("now");
                                                    $diff=date_diff($date1,$date2);
                                                    echo $diff->format("%y Years"); }?> 
                    </p>
                    
                  
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Footer -->



</div>
            <!-- #/ container -->
</div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
 
<div class="footer hide">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">InternTeam</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../resorce/plugins/common/common.min.js"></script>
    <script src="../resorce/js/custom.min.js"></script>
    <script src="../resorce/js/settings.js"></script>
    <script src="../resorce/js/gleek.js"></script>
    <script src="../resorce/js/styleSwitcher.js"></script>

</body>

</html>