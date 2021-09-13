
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
    <h2 style="text-align:center; "> Add departement</h2>
    <div class="container">
        <div class="card-form">
            <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                <form method="post">
                    <div class="inputgroup" style="margin-top:2rem;">
                        <div class="input">
                            <label style="color:black; font-weight: bold;" for="mname">faculity</label><br>
                            <?php
                            // require '../Backend/Backend.php';
                            $obj = new Backend;
                            $conn = $obj->connection();
                            $sql = "SELECT * FROM Facultys";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            if (isset($_GET['edit'])) {
                                $sql = "SELECT * FROM Depts WHERE idDepts=" . $_GET['edit'] . ";";
                                $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                $re = mysqli_fetch_assoc($q);
                                $_SESSION['did'] = $re['idDepts'];
                            }
                            ?>
                            <select name="fa" id="" style="height: 2.5rem; width: 16rem;  border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem; border-color: black;">
                                <option selected value="<?php echo $retVal = (isset($re['Fid'])) ? $re['Fid'] : null; ?>">Pleas select faculity</option>
                                <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                                    <option value="<?php echo $res['idFacultys']; ?>"><?php echo $res['Fname']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="input">
                            <label style="color:black; font-weight: bold;" for="cn">deprtement name</label><br>
                            <input type="text" id="cn" name="cn" value="<?php echo $retVal = (isset($re['Name'])) ? $re['Name'] : null; ?>" placeholder="Pleas enter course name">
                        </div>
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

            $sql = "SELECT * FROM Depts as d join Facultys as f on d.Fid = f.idFacultys";
            $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            ?>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>faculity</th>
                    <th>departement name</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($que)) : ?>
                        <tr>
                            <td><?php echo $res['idDepts']; ?></td>
                            <td><?php echo $res['Fname']; ?></td>
                            <td><?php echo $res['Name']; ?></td>
                            <td><a href="?edit=<?php echo $res['idDepts']; ?>">Edit</a>
                            <a href="?del=<?php echo $res['idDepts']; ?>" onclick="return confirm('Are You sure Want to Delete?');">Delete</a>
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
    $data[1] = $_POST['cn'];
    $data[2] = $_POST['fa'];
    $obj->setAttrs($conn, 'Depts', $data);
    // echo  $obj->check_insert_query();
    $obj->insert();
    echo '<script>alert("Inserted successfully")</script>';
}
if (isset($_POST['edit'])) {
    $qq = "UPDATE Depts SET Name='" . $_POST['cn']."', Fid=".$_POST['fa']." WHERE idDepts=" . $_SESSION['did'] . ";";
    mysqli_query($conn, $qq) or die(mysqli_error($conn));
    echo '<script>alert("Updated successfully")</script>';
}
if (isset($_GET['del'])) {
    # code...
    $q = "DELETE FROM `Depts` WHERE idDepts=".$_GET['del'].";";
    mysqli_query($conn,$q) or die(mysqli_error($conn));
}
?>