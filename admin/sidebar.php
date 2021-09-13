<?php
session_start();
    if (isset($_SESSION['role']) && $_SESSION['role'] = 'admin') {
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
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../for icon/icon/all.css">
    <!-- <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="../assets/package/css/boxicons.min.css">
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
               <i class="fa fa-tachometer" style="background-color:white;"></i>
                    <span class="nav__logo-name">Admin dashbord</span>
                </a>

                <div class="nav__list">
                    <a href="manageacc.php" class="nav__link ">
                        <i class='bx bx-merge'></i>
                        <span class="nav__name">Manage account</span>
                    </a>
                    <a href="adddepar.php" class="nav__link">
                    <i class='bx bxs-report'></i>
                        <span class="nav__name">Manage department</span>
                    </a>
                    <a href="course.php" class="nav__link">
                        <i class='bx bx-comment-detail'></i>
                        <span class="nav__name">Manage course</span>
                    </a>
              
                     <a href="faculity.php" class="nav__link">
                        <i class='bx bxs-report'></i>
                        <span class="nav__name">Manage facility</span>
                    </a>
                     
                    <a href="addstud.php" class="nav__link">
                        <i class='bx bx-calendar-week'></i>
                        <span class="nav__name">Assign student</span>
                    </a> 
                </div>
            </div>

            <a href="../Backend/logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name"><a href="../Backend/logout.php"></a> Log Out</span>
            </a>
        </nav>
    </div>

    <script src="../assets/js/main.js"></script>
</body>

</html>
<?php
  require_once '../Backend/Backend.php';
  ?>
  <script src=",,/assets/jquery-ui-1.10.1.custom.min.js"></script>
  <script src="../assets/jquery-ui-1.10.1.custom.min.js"></script>
  <script src="../assets/datatables/jquery.dataTables.js"></script>
  <script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>