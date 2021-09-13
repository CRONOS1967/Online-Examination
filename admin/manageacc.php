<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'sidebar.php';
    $obj = new Backend;
    $conn = $obj->connection();
    if (isset($_GET['edit'])) {
        $re = $obj->fetch($conn, 'Users', $_GET['edit'], 'Username');
        $_SESSION['un'] = $re['Username'];
    }
    ?>
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="text-align:center;">Manage all account
            </h2><br><br>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="inputgroup">
                    <!-- <div class="input">
                        <label style="color:black; font-weight: bold;" for="Id">Id</label><br>
                        <input type="text"  readonly id="Id" placeholder="Pleas enter Id">
                    </div> -->
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="username">username</label><br>
                        <input type="text" id="username" <?php echo $retVal = (isset($re['Username'])) ? 'disabled' : null; ?> value="<?php echo $retVal = (isset($re['Username'])) ? $re['Username'] : null; ?>" name="uname" placeholder="Pleas enter username">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="password">password</label><br>
                        <input type="password" id="password" name="pass" placeholder="Pleas enter password">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="fname">First name</label><br>
                        <input type="text" value="<?php echo $retVal = (isset($re['Fname'])) ? $re['Fname'] : null; ?>" id="fname" name="fname" placeholder="Pleas enter first name">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="lname">Last name</label><br>
                        <input type="text" value="<?php echo $retVal = (isset($re['Lname'])) ? $re['Lname'] : null; ?>" id="lname" name="lname" placeholder="Pleas enter first name">
                    </div>

                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="phone">email</label><br>
                        <input type="email" value="<?php echo $retVal = (isset($re['Email'])) ? $re['Email'] : null; ?>" id="email" name="mail" placeholder="Pleas enter email" style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                    </div>
                    <div class="input">
                        <label style="color:black; font-weight: bold;" for="phone">phone</label><br>
                        <input type="number" value="<?php echo $retVal = (isset($re['Phone'])) ? $re['Phone'] : null; ?>" id="phone" name="ph" placeholder="Pleas enter phone" style="height: 2.5rem; border-radius: .3rem; margin-top: .25rem;">
                    </div>
                    <div class="input" style="margin-top: 1rem;">
                        <label style="color:black; font-weight: bold;" for="sex">Role</label><br>
                        <select name="role" id="">
                            <option value="<?php echo $retVal = (isset($re['Role'])) ? $re['Role'] : null; ?>" selected>Pleas select role</option>
                            <option value="instracter">instracter</option>
                            <option value="student">student</option>
                            <option value="admin">admin</option>
                            <option value="ec">exam commite</option>
                        </select>
                    </div>
                    <div style="margin-top: 1rem; margin-right:1rem;">
                        <label style="color:black; font-weight: bold;" for="States">States</label><br>
                        active <input checked="checked" type="radio" value="on" id="States" name="sts" placeholder="Pleas enter your States">

                        inactive <input type="radio" value="off" id="States" name="sts" placeholder="Pleas enter your States">
                    </div>
                </div>
                <div class="classbn">
                    <?php if (isset($_GET['edit'])) : ?>
                        <div class="buttt"><button type="submit" name="update" class="bv sub">Update</button>
                        </div>
                    <?php else : ?>
                        <div class="buttt"><button type="submit" name="save" class="bv sub">Add</button>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div><br>
    <div class="card-table" style="margin-top:5rem;">
        <?php
        $sql = "SELECT * FROM Users";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        ?>
        <table class="table">
            <thead>

                <th>username</th>
                <!-- <th>password</th> -->
                <th>fname</th>
                <th>lname</th>
                <th>role</th>
                <th>states</th>
                <th>Action</th>
            </thead>
            <tbody>

                <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                    <tr>

                        <td><?php echo $res['Username']; ?></td>

                        <td><?php echo $res['Fname']; ?></td>
                        <td><?php echo $res['Lname']; ?></td>
                        <td><?php echo $res['Role']; ?></td>
                        <td><?php echo $res['Status']; ?></td>
                        <td><a href="?edit=<?php echo $res['Username']; ?>">Edit</a> </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
        <br> <br> <br> <br> <br> <br>
    </div>
</body>


</html>
<?php
$obj = new Backend;
$conn = $obj->connection();
$data = array();
if (isset($_POST['save'])) {
    $data[0] = $_POST['uname'];
    $data[1] = $_POST['fname'];
    $data[2] = $_POST['lname'];
    $data[3] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $data[4] = $_POST['role'];
    $data[5] = $_POST['sts'];
    $data[6] = $_POST['mail'];
    $data[7] = $_POST['ph'];
    $obj->setAttrs($conn, 'Users', $data);
    $obj->insert();
    if ($data[4] == 'student') {
        $data1 = array();
        $data1[0] = null;
        $data1[1] = $data[0];
        $obj->setAttrs($conn, 'Students', $data1);
        $obj->insert();
    }
    echo '<script>alert("Inserted successfully")</script>';
    // header('location:manageacc.php');
}
if (isset($_POST['update'])) {
    # code...
    $Q = "UPDATE `Users` SET `Fname`='" . $_POST['fname'] . "',`Lname`='" . $_POST['lname'] . "',`Pass`='" . password_hash($_POST['pass'], PASSWORD_DEFAULT) . "',`Role`='" . $_POST['role'] . "',`Status`='" . $_POST['sts'] . "',`Email`='" . $_POST['mail'] . "',`Phone`='" . $_POST['ph'] . "' WHERE `Username`='" . $_SESSION['un'] . "'";
    mysqli_query($conn,$Q) or die(mysqli_error($conn));
    echo '<script>alert("Updated successfully")</script>';
}

?>