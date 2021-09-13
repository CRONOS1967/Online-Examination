<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <br>
    <h2 style="text-align:center; "> Add course</h2>
    <div class="container">
        <div class="card-form">
            <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
<form action="" method="post">
                <div class="inputgroup" style="margin-top:2rem;">
                    <div class="input">
                    <?php
                            // require '../Backend/Backend.php';
                            $obj = new Backend;
                            $conn = $obj->connection();
                            $sql = "SELECT * FROM Depts";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            if (isset($_GET['edit'])) {
                                $sql = "SELECT * FROM Courses WHERE idCourses=" . $_GET['edit'] . ";";
                                $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                $re = mysqli_fetch_assoc($q);
                                $_SESSION['did'] = $re['idCourses'];
                            }
                            ?>
                        <label style="color:black; font-weight: bold;" for="mname">department</label><br>
                        <select name="dep" id=""
                            style="height: 2.5rem; width: 16rem;  border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem; border-color: black;">
                            <option value="<?php echo $retVal = (isset($re['idDepts'])) ? $re['idDepts'] : null; ?>" selected>Pleas select department</option>
                            <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                                    <option value="<?php echo $res['idDepts']; ?>"><?php echo $res['Name']; ?></option>
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="mname">course name</label><br>
                        <input type="text" id="mname" require name="cname" value="<?php echo $retVal = (isset($re['Cname'])) ? $re['Cname'] : null; ?>" placeholder="Pleas enter course name">
                    </div>
                    <!-- <div class="input">
                        <label style="color:black; font-weight: bold;" for="mname">course code</label><br>
                        <input type="text" id="course code" placeholder="Pleas enter course code">
                    </div> -->

                </div>
                <?php
                    if (isset($_GET['edit'])) :
                    ?>
                        <br> <br><button type="submit" name="edit" style="margin-left:3rem;" class="bv sub">Edit</button>

                    <?php else : ?>
                        <br> <br><button type="submit" name="add" style="margin-left:3rem;" class="bv sub">Add</button>
                    <?php endif; ?>
                    </form>
                <br>
                <br>
                <br>
                <br>


            </div>

        </div>
        <div class="card-table">
        <?php
            // require '../Backend/Backend.php';

            $sql = "SELECT * FROM Courses join Depts on Courses.Depts_idDepts = Depts.idDepts";
            $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            ?>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>departement</th>
                    <th>course </th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php while ($res = mysqli_fetch_assoc($que)) : ?>
                        <tr>
                            <td><?php echo $res['idCourses']; ?></td>
                            <td><?php echo $res['Name']; ?></td>
                            <td><?php echo $res['Cname']; ?></td>
                            <td><a href="?edit=<?php echo $res['idCourses']; ?>">Edit</a>
                            <a href="?del=<?php echo $res['idCourses']; ?>" onclick="return confirm('Are You sure Want to Delete?');">Delete</a>
                            </td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
<?php

if (isset($_POST['add'])) {
    $data = array();
    $data[0] = null;
    $data[1] = $_POST['cname'];
    $data[2] = $_POST['dep'];
    $obj->setAttrs($conn, 'Courses', $data);
    // echo  $obj->check_insert_query();
    $obj->insert();
    echo '<script>alert("Inserted successfully")</script>';
}
if (isset($_POST['edit'])) {
    $qq = "UPDATE Courses SET Cname='" . $_POST['cname']."', Depts_idDepts=".$_POST['dep']." WHERE idCourses=" . $_SESSION['did'] . ";";
    mysqli_query($conn, $qq) or die(mysqli_error($conn));
    echo '<script>alert("Updated successfully")</script>';
}
if (isset($_GET['del'])) {
    # code...
    $q = "DELETE FROM `Courses` WHERE idCourses=".$_GET['del'].";";
    mysqli_query($conn,$q) or die(mysqli_error($conn));
}
?>