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
    <?php include 'sidebar.php';
    $obj = new Backend;
    $conn = $obj->connection();
    if (isset($_GET['edit'])) {
        $sql = "SELECT * FROM Facultys WHERE idFacultys=" . $_GET['edit'] . ";";
        $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $re = mysqli_fetch_assoc($q);
        $_SESSION['fid'] = $re['idFacultys'];
    }
    ?>
    <br>
    <h2 style="text-align:center; "> Add faculity</h2>
    <div class="container">
        <div class="card-form">
            <div class="big-card" style="margin-left:1rem;margin-top:1rem;">

                <div class="inputgroup" style="margin-top:2rem;">
                    <!-- <div class="input">
                        <label style="color:black; font-weight: bold;" for="campus">campus</label><br>
                        <select name="campus" id="campus"
                            style="height: 2.5rem; width: 16rem;  border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem; border-color: black;">
                            <option selected>Pleas select campus</option>
                            <option value="informstics">atse tedros</option>
                            <option value="other health">atse fasil</option>
                            <option value="compitition">maraki</option>
                            <option value="compitition">agricultural</option>
                            <option value="compitition">medicen</option>
                        </select>
                    </div> -->
                    <form method="post">
                        <div class="input">
                            <label style="color:black; font-weight: bold;" for="faculity">faculity name</label><br>
                            <input type="text" id="faculity" name="fa" placeholder="Pleas enter faculity name" value="<?php echo $retVal = (isset($re['Fname'])) ? $re['Fname'] : null; ?>">
                        </div>
                        <?php
                        if (isset($_GET['edit'])) :
                        ?>
                            <br> <br><button type="submit" name="edit" style="margin-left:3rem;" class="bv sub">Edit</button>

                        <?php else : ?>
                            <br> <br><button type="submit" name="submit" style="margin-left:3rem;" class="bv sub">Add</button>
                        <?php endif; ?>
                    </form>
                </div>

                <br>
                <br>
                <br>
                <br>


            </div>

        </div>
        <div class="card-table">
            <?php
            // require '../Backend/Backend.php';

            $sql = "SELECT * FROM Facultys";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            ?>
            <table class="table">
                <thead>
                    <th>id</th>

                    <th>faculity name</th>
                    <th>Action </th>
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>

                            <td><?php echo $res['idFacultys']; ?></td>
                            <td><?php echo $res['Fname']; ?></td>
                            <td><a href="?edit=<?php echo $res['idFacultys']; ?>">Edit</a>
                                <a href="?del=<?php echo $res['idFacultys']; ?>" onclick="return confirm('Are You sure Want to Delete?');">Delete</a>
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

if (isset($_POST['submit'])) {
    $data = array();
    $data[0] = null;
    $data[1] = $_POST['fa'];

    $obj->setAttrs($conn, 'Facultys', $data);
    // echo  $obj->check_insert_query();
    $obj->insert();
    echo '<script>alert("Inserted successfully")</script>';
}
if (isset($_POST['edit'])) {
    $qq = "UPDATE Facultys SET Fname='" . $_POST['fa'] . "' WHERE idFacultys=" . $_SESSION['fid'] . ";";
    mysqli_query($conn, $qq) or die(mysqli_error($conn));
    echo '<script>alert("Updated successfully")</script>';
}
if (isset($_GET['del'])) {
    # code...
    $q = "DELETE FROM `Facultys` WHERE idFacultys=".$_GET['del'].";";
    mysqli_query($conn,$q) or die(mysqli_error($conn));
}

?>