<?php
    $row = $obj->fetch($conn, 'Users', $_SESSION['user'], 'Username');
switch ($_SESSION['role']) {
    case 'admin':
        # code...
        if ($row['Status'] == 'on') {
            header("location:../admin/dash.php");
            # code...
            // $_SESSION['empid'] = $row['idE'];
        }
        break;
    case 'instracter':
        # code...
        if ($row['Status'] == 'on') {
        header('location:../instracter/dash.php');}
        break;
    case 'student':
        # code...
        // $row = $obj->fetch($conn, 'Employees', $_SESSION['id'], 'idUsers');
        if ($row['Status'] == 'on') {
        header("location:../student/dash.php");}
        break;
    case 'ec':
        # code...
        if ($row['Status'] == 'on') {
        header('location:../exam-commite/dash.php');}
        break;
    
    default:
        header("location:../public/login.php");
        break;
}
    // echo "<script> console.log(".$result['Fname'].")</script>";
