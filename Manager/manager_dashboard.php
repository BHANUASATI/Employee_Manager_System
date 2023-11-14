<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard | Manager</title>
    <link rel="stylesheet" href="manager_dashboard.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <nav class="raja">
            <ul>
                <li><a href="#" class="logo">
                        <img src="images/hughes logo.png" alt="">
                        <span class="nav-item">Manager</span>
                    </a></li>
                <li><a href="#">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a></li>
                <li><a href="profile_manager.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a></li>

                <!-- <li><a href="">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-item">Trainee List</span>
                    </a></li> -->
                <!-- <li><a href="">
                        <i class="fas fa-tasks"></i>
                        <span class="nav-item">Tasks</span>
                    </a></li> -->
                <!-- <li><a href="">
                        <i class="fas fa-calendar-week"></i>
                        <span class="nav-item">Holiday List</span>
                    </a></li> -->
                <li><a href="setting.php">
                        <i class="fas fa-cog"></i>
                        <span class="nav-item">Settings</span>
                    </a></li>
                <!-- <li><a href="">
                        <i class="fas fa-comment-dots"></i>
                        <span class="nav-item">Feedback</span>
                    </a></li> -->
                <!-- <li><a href="">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
                    </a></li> -->
                <li><a href="logout.php" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Welcome To Hughes Systique </h1>
                <i class="fas fa-user-cog" onclick="window.location.href = 'profile_manager.php';" > </i>
            </div>
            <div class="main-skills">
                <div class="card">
                    <i class="fas fa-user-friends"></i>
                    <br>
                    <h4>Meeting With Employee</h4>
                    <br>
                    <p></p>
                    <button onclick="window.location.href = 'https://us05web.zoom.us/j/2306535981?pwd=f14ca5jih1SXBVWNsjQQhnJV4m2yVT.1';">Join</button>
                </div>
                <!-- <div class="card">
                    <i class="fas fa-envelope-open-text"></i>
                    <h3>Notice</h3>
                    <p></p>
                    <button>Generate Notice</button>
                </div> -->
                <div class="card">
                <i class="fa-solid fa-magnifying-glass"></i>
                    <h3>Search Employee</h3>
                    <p></p>
                    <button onclick="window.location.href = 'search.php';">Search</button>
                </div>
                <div class="card">
                    <i class="far fa-clock"></i>
                    <h3>Pending Request</h3>
                    <p></p>
                    <button onclick="window.location.href = 'manage_employee_leave.php';">Approve/Reject</button>
                </div>
            </div>



            <section class="main-course">
                <h1>Some Important Link</h1>

                <div class="course-box">
                    <ul>
                        <li class="active">Important link</li>

                    </ul>
                    <div class="course">
                        <div class="box">
                            <h3>Help Request by Employee</h3>
                            <p></p>
                            <button onclick="window.location.href = 'https://teams.microsoft.com/l/chat/0/0?users=bhanu.asati@hsc.com';">Show</button>
                            <i class="fas fa-hands-helping" style="color: #000000;"></i>
                        </div>
                        
                      
                    </div>
                </div>
            </section>
        </section>
    </div>
</body>

</html>