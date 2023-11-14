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
    <title> Employee Profile Edit</title>

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
                    <h2 class="pt-3"> Employee Profile Edit </h2>
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

                        <a href="edit_employee_profile.php">
                        <i class="fa-solid fa-user-pen"></i><span class="nav-text"> Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile_photo_employee.php">
                        <i class="fa-solid fa-id-badge"></i><span class="nav-text">Change Profile Photo</span>
                        </a>
                    </li>
               
                    <li>

                        <a href="change_employee_password.php">
                        <i class="fa-solid fa-lock"></i><span class="nav-text">Change Password</span>
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
<!-- Header  End-->





<?php  
    // database connection
        require_once "../connection.php";
        
    $session_email =  $_SESSION["email_emp"];
    $sql = "SELECT * FROM employee WHERE email= '$session_email' ";
    $result = mysqli_query($conn , $sql);

if(mysqli_num_rows($result) > 0 ){
   
    while($rows = mysqli_fetch_assoc($result) ){
        $name = $rows["name"];
        $email = $rows["email"];
        $dob = $rows["dob"];
        $gender = $rows["gender"];
    }
}
        $nameErr = $emailErr = "";
        // $name = $email = $dob = $gender = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
 
            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }


            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
                $email = "";
            }else{
                $email = $_REQUEST["email"];
            }


            if( !empty($name) && !empty($email) ){
            
                // database connection
                require_once "../connection.php";
                $sql_select_query = "SELECT email FROM employee WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    $sql = "UPDATE employee SET name = '$name', email = '$email', dob = '$dob', gender= '$gender' WHERE email='$_SESSION[email_emp]' ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $_SESSION['email_emp']= $email;
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'profile_employee.php');
                            $('#linkBtn').text('View Profile');
                            $('#addMsg').text('Profile Edited Successfully!!');
                            
                            $('#closeBtn').text('Close');
                        })
                    </script>
                    ";
                    }
                }

            }
        }
?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">Edit Your Profile</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Date-of-Birth :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" >  
                                   
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>


                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="setting.php" class="btn btn-primary w-20">Close</a>
                                    </div>
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