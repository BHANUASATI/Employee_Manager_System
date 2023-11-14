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
 
  $email = $_SESSION["email_emp"];
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM emp_leave WHERE email = '$email'  ";
$result = mysqli_query($conn , $sql);

$i = 1;

?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <h4 class="text-center pb-3">Leave Status</h4>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>Starting Date</th>
        <th>Ending Date</th> 
        <th>Total Days</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Action</th>

    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $start_date= $rows["start_date"];
            $last_date = $rows["last_date"];
            $email= $rows["email"];
            $reason = $rows["reason"];
            $status = $rows["status"]; 
            $id = $rows["id"];   
            ?>
        <tr>
        <td><?php echo "$i."; ?></td>
        <td><?php echo date("jS F", strtotime($start_date)); ?></td>
        <td><?php echo date("jS F", strtotime($last_date)); ?></td>
        <td><?php $date1=date_create($start_date);
                  $date2=date_create($last_date);
                   $diff=date_diff($date1,$date2); 
                   echo $diff->format("%a days");
            ?></td>
        <td><?php echo $reason; ?></td> 
        <td><?php echo $status; ?></td> 
        <td>  <?php 
                $delete_icon = " <a href='delete_leave.php?id={$id}' id='bin' class='btn-sm btn-primary '> <span ><i class='fa fa-trash '></i></span> </a>";
                echo  $delete_icon;
             ?> 
        </td>
    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#addMsg').text('No leave Applied by you!!');
                
                $('#linkBtn').text('Apply for Leave');
                $('#closeBtn').text('Remind me Later');
            })
        </script>
        ";
        }
    ?>
     </tr>
    </table>
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