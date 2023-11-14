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
    <title> Change Manager Password</title>

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
                    <h2 class="pt-3"> Change Password </h2>
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
                    <li>

                        <a href="edit_manager_profile.php">
                            <i class="fa-solid fa-user-pen"></i><span class="nav-text"> Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="manager_profile_photo.php">
                            <i class="fa-solid fa-id-badge"></i><span class="nav-text">Change Profile Photo</span>
                        </a>
                    </li>

                    <li>

                        <a href="change_manager_password.php">
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






                <!-- Header End -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

                <?php
                $old_passErr = $new_passErr = $confirm_passErr = "";
                $old_pass = $new_pass = $confirm_pass = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (empty($_REQUEST["old_pass"])) {
                        $old_passErr = " <p style='color:red'>* Old Password Is required </p>";
                    } else {
                        $old_pass = trim($_REQUEST["old_pass"]);
                    }

                    if (empty($_REQUEST["new_pass"])) {
                        $new_passErr = " <p style='color:red'>* New Password Is required </p>";
                    } else {
                        $new_pass = trim($_REQUEST["new_pass"]);
                    }

                    if (empty($_REQUEST["confirm_pass"])) {
                        $confirm_passErr = " <p style='color:red'>* Please Confirm new Password! </p>";
                    } else {
                        $confirm_pass = trim($_REQUEST["confirm_pass"]);
                    }

                    if (!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass)) {

                        require_once "../connection.php";

                        $check_old_pass = "SELECT password FROM admin WHERE email = '$_SESSION[email]' && password = '$old_pass' ";
                        $result = mysqli_query($conn, $check_old_pass);
                        if (mysqli_num_rows($result) > 0) {

                            if ($new_pass === $confirm_pass) {

                                $change_pass_query = "UPDATE admin SET password = '$new_pass' WHERE email = '$_SESSION[email]' ";
                                if (mysqli_query($conn, $change_pass_query)) {
                                    session_unset();
                                    session_destroy();
                                    echo "<script>
                        $(document).ready(function() {
                            $('#addMsg').text( 'Password Updated successfully! Log in With New Password');
                            $('#linkBtn').attr('href','index.php');
                            $('#linkBtn').text('OK, Understood');
                            $('#modalHead').hide();
                            $('#closeBtn').hide();
                            $('#showModal').modal('show');
                        });
                        </script>";
                                }

                            } else {
                                $confirm_passErr = "<p style='color:red'>* Confirm did not matched new Password! </p>";
                            }

                        } else {
                            $old_passErr = " <p style='color:red'>*Sorry! Old Password is Wrong </p> ";
                        }
                    }
                }
                ?>


                <div style="margin-top:100px">
                    <div class="login-form-bg h-100">
                        <div class="container mt-5 h-100">
                            <div class="row justify-content-center h-100">
                                <div class="col-xl-6">
                                    <div class="form-input-content">
                                        <div class="card login-form mb-0">
                                            <div class="card-body pt-5 shadow">
                                                <h4 class="text-center">Change Password</h4>
                                                <form method="POST"
                                                    action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                                    <div class="form-group">
                                                        <label>Old Password : </label>
                                                        <input type="password" name="old_pass" class="form-control">
                                                        <?php echo $old_passErr; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password : </label>
                                                        <input type="password" name="new_pass" class="form-control">
                                                        <?php echo $new_passErr; ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password : </label>
                                                        <input type="password" name="confirm_pass" class="form-control">
                                                        <?php echo $confirm_passErr; ?>

                                                    </div>

                                                    <div class="btn-toolbar justify-content-between" role="toolbar"
                                                        aria-label="Toolbar with button groups">
                                                        <div class="btn-group">
                                                            <input type="submit" value="Save Changes"
                                                                class="btn btn-primary w-20 " name="save_changes">
                                                        </div>
                                                        <div class="input-group">
                                                            <a href="setting.php"
                                                                class="btn btn-primary w-20">Close</a>
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


                <!-- footer -->


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