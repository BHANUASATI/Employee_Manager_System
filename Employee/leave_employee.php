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
    <title> Employee Leave Form</title>

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
                    <h2 class="pt-3"> Employee Leave </h2>
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

                        <a href="employee_dashboard.php">
                            <i class="fa-solid fa-house"></i><span class="nav-text"> Home Page</span>
                        </a>
                    </li>
                   
                    <li>

                        <a href="leave_status.php">
                            <i class="fa-solid fa-person-walking-arrow-right"></i><span class="nav-text">Leave
                                Status</span>
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

<?php 



$reasonErr = $startdateErr = $lastdateErr = "";
$reason = $startdate = $lastdate = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if( empty($_REQUEST["reason"]) ){
        $reasonErr = "<p style='color:red'>* Reason is Required</p>";    
    }else{
        $reason = $_REQUEST["reason"];
    }
 
    if( empty($_REQUEST["startDate"]) ){
        $startdateErr = "<p style='color:red'>* Start Date is Required</p>";    
    }else{
        $startdate = $_REQUEST["startDate"];
    }
     
    if( empty($_REQUEST["lastDate"]) ){
        $lastdateErr = "<p style='color:red'>* Last Date is Required</p>";    
    }else{
        $lastdate = $_REQUEST["lastDate"];
    }

        if( !empty($reason) && !empty($startdate) && !empty($lastdate) ){
          
            // database connection 
            require_once "../connection.php";

            $sql = "INSERT INTO emp_leave( reason , start_date , last_date , email , status ) VALUES( '$reason' , '$startdate' , '$lastdate' , '$_SESSION[email_emp]' , 'pending' )";
            $result = mysqli_query($conn , $sql);
            if($result){
                $reason = $startdate = $lastdate = "";
                echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#addMsg').text('leave Applied , Please Wait until it is approved!!');
                $('#linkBtn').attr('href', 'leave-status.php');
                $('#linkBtn').text('Check Leave Status');
                $('#closeBtn').text('Apply Another');
            })
        </script>
        ";
            }
        }
}
?>


<div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6 pt-5">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">
                              
                                    <h4 class="text-center">Apply For Leave</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                
                                    <div class="form-group">
                                        <label >Reason :</label>
                                        <input type="text" class="form-control" value="<?php echo $reason; ?> " name="reason" >  
                                        <?php echo $reasonErr; ?>           
                                    </div>

                                    <div class="form-group">
                                        <label >Staring Date :</label>
                                        <input type="date" class="form-control"  value="<?php echo $startdate; ?>"  name="startDate" >
                                        <?php echo $startdateErr; ?>
                                    </div>
                                    <div class="form-group">
                                        <label >Last Date :</label>
                                        <input type="date" class="form-control"  value="<?php echo $lastdate; ?>"  name="lastDate" >
                                        <?php echo $lastdateErr; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Apply Now" class="btn btn-primary btn-lg w-100 " name="signin" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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