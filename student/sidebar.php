<?php
session_start();
    if (isset($_SESSION['role']) && $_SESSION['role'] = 'student') {
        # code...
    }else{
        header('location:../public/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/package/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <title>Sidebar menu responsive</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
          
            <span style="color:white;" id="header-toggle">&#9776;</span>
        </div>
        <div class=".header__img ">
        <div class="dropdown" >
            <button class="dropbtn">
                <i class='bx bx-user-circle' style="color:white; font-size:1.6rem"> </i>
            </button>
            <div class="dropdown-content">
                <a href="edit.php" style="font-size:.9rem"><i style="color:black;font-size:1.1rem"class='bx bxs-edit'></i>edit</a>
                <a href="../public/login.php" style="font-size:.9rem"><i style="color:black;"class='bx bx-log-out nav__icon'></i>logout</a>

            </div>
        </div>
        </div>
        

    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="dash.php" class="nav__logo active">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Student dashbord</span>
                </a>

                <div class="nav__list">
                <a href="course.php" class="nav__link ">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Take exam</span>
                    </a>
                    <a href="assigntech.php" class="nav__link">
                    <i class='bx bxs-report'></i>
                        <span class="nav__name">See result</span>
                    </a>
                  
                </div>
            </div>

            <a href="../Backend/logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <script src="../assets/js/main.js"></script>
</body>

</html>
<?php
  require_once '../Backend/Backend.php';
  ?>