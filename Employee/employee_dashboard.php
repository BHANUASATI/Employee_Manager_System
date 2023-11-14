<?php

// database connection
require_once "../connection.php";




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Employee</title>

  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="employee_dashboard.css">
</head>

<body>
  <div class="container">

    <nav>

      <ul>

        <li><a href="#" class="logo">
            <img src="hughes logo.png" alt="">
            <span class="nav-item">Employee</span>
          </a></li>
        <li><a href="#">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a></li>
        <li><a href="profile_employee.php">
            <i class="fas fa-user"></i>
            <span class="nav-item">Profile</span>
          </a></li>
        <li><a href="leave_employee.php">
            <i class="fas fa-calendar-week"></i>
            <span class="nav-item">Apply Leave</span>
          </a></li>


        <li><a href="setting.php">
            <i class="fas fa-cog"></i>
            <span class="nav-item">Settings</span>
          </a></li>


        <li><a href="logout.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>

      </ul>
    </nav>

    <section class="main">

      <div class="main-top">
        <h1>Welcome To Hughes Systique </h1>
        <i class="fas fa-user-cog" style="color: #00eeff;" onclick="window.location.href = 'profile_employee.php';"></i>

      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-user-friends" style="color: #00eeff;"></i>
          <h3>Join Team Meeting</h3>
          <p></p>
          <button
            onclick="window.location.href = 'https://us05web.zoom.us/j/2306535981?pwd=f14ca5jih1SXBVWNsjQQhnJV4m2yVT.1';">Join</button>
        </div>
        <div class="card">
          <i class="fas fa-envelope-open-text" style="color: #00ff62;"></i>
          <h3>Mail</h3>
          <p></p>

          <button onclick="window.location.href = 'https://outlook.office.com/mail/?actSwt=true';">Open Mail</button>
        </div>
        <!-- <div class="card">
          <i class="fas fa-envelope-open-text" style="color: #ffdd00;"></i>
          <h3>Mail</h3>
          <p></p>

          <button>Open Mail</button>
        </div> -->

        <div class="card">
          <i class="far fa-clock" style="color: #ff4000;"></i>
          <h3>Track Request</h3>
          <p></p>
          <button onclick="window.location.href = 'leave_status.php';">Track</button>
        </div>
      </div>

      <section class="main-course">
        <h1>Some Important Link </h1>
        <div class="course-box">
          <ul>
            <li class="active">Important link</li>




          </ul>
          <div class="course">
            <div class="box">
              <h3>Help From Manager</h3>
              <p></p>
              <button
                onclick="window.location.href = 'https://teams.microsoft.com/l/chat/0/0?users=bhanu.asati@hsc.com';">Help</button>
              <i class="fas fa-hands-helping" style="color: #4bd5d8;"></i>
            </div>


          </div>
        </div>
      </section>
    </section>
  </div>
</body>

</html>