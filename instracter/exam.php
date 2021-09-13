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
    $sql = "SELECT * FROM Courses";
    $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    ?>
    <h2 style="text-align:center; "> Add Exams</h2>
    <div class="container">
        <div class="card-form">
            <form action="" method="post">
                <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                    <div class="input">
                        <label style="color:black; font-weight: bold;margin-left: 3rem;" for="Qustion">Courses</label>
                        <select name="co" id="" style="height: 2.5rem; width: 10rem;  border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem; border-color: black;">
                            <option selected value="<?php echo $retVal = (isset($re['idCourses'])) ? $re['idCourses'] : null; ?>">Please select Exam</option>
                            <?php
                            while ($re = mysqli_fetch_assoc($que)) : ?>
                                <option value="<?php echo $re['idCourses']; ?>"><?php echo $re['Cname']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <br>
                    </div>

                    <div class="inputgroup" style="margin-top:2rem;">

                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">Title</label><br>
                            <input type="text" name="ti" id="choose:A" placeholder="please Exam title">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">Time Limit</label><br>
                            <input type="text" name="time" id="choose:B" placeholder="Pleas enter Time Limit in minuts">
                        </div>
                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">Quastion amount</label><br>
                            <input type="number" name="am" id="choose:C" placeholder="Pleas enter Question amount">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">Description</label><br>
                            <input type="text" id="choose:D" name="desc" placeholder="Pleas enter Description">
                        </div>


                    </div>

                    <button type="submit" name="add" value="add" style="margin-left:3rem;" class="bv sub">add</button>

                    <br>
                    <br>
                    <br>
                    <br>


                </div>
            </form>
        </div>
        <div class="card-table">
            <?php
            $q = "SELECT * from Exams join Courses on Exams.Courses_idCourses=idCourses";
            $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

            ?>
            <table class="table">
                <thead>
                    <!-- <th>course code</th> -->
                    <th>id</th>
                    <th>Exam Tile</th>
                    <th>Exam time</th>
                    <th>Amount</th>
                    <th>Created on</th>
                    <th>Course</th>
                    <!-- <th>Answer</th> -->
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>

                            <td><?php echo $res['idExams']; ?></td>
                            <td><?php echo $res['Title']; ?></td>
                            <td><?php echo $res['TimeLimit']; ?> min</td>
                            <td><?php echo $res['Qamount']; ?></td>
                            <td><?php echo $res['Created']; ?></td>
                            <td><?php echo $res['Cname']; ?></td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
        <br><br><br><br>
    </div>
    </div>
</body>

<?php
if (isset($_POST['add'])) {
    $data[0] = null;
    $data[1] = $_POST['ti'];
    $data[2] = $_POST['time'];
    $data[3] = $_POST['am'];
    $data[4] = $_POST['desc'];
    $data[5] = date('Y-m-d');
    $data[6] = $_POST['co'];
    $obj->setAttrs($conn, 'Exams', $data);
    // echo $obj->check_insert_query();
    $obj->insert();
    echo '<script>alert("Inserted successfully")</script>';
}

?>

</html>