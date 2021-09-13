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
    <?php include 'sidebar.php'; ?>
    <br> <br><label style="color:black; font-weight: bold;margin-left: 35rem;" for="Qustion">Student result</label><br>

    <div class="card-table">
        <?php
        $obj = new Backend;
        $conn = $obj->connection();
        $q = "SELECT * from Results join Students on Results.Students_idStudents=Students.idStudents join Users on Students.Users_username=Users.Username";
        $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

        ?>
        <table class="table">
            <thead>
                <th>id</th>
                <th>fname</th>
                <th>lname</th>
                <th>Course</th>
                <!-- <th>out of</th> -->
                <th>result</th>


            </thead>
            <tbody>
                <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                    <tr>

                        <td><?php echo $res['idStudents']; ?></td>
                        <td><?php echo $res['Fname']; ?></td>
                        <td><?php echo $res['Lname']; ?></td>
                        <td><?php echo $res['Cname']; ?></td>
                        <td><?php echo $res['Mark']; ?></td>
                        <!-- <td><?php echo $res['Created']; ?></td> -->
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</body>

</html>