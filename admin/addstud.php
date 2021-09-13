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
    <div class="card-form">
        <div class="big-card" style="margin-left:1rem;">
            <h2 class="section-title" style="text-align:center;">Assign Student Students
            </h2>

        </div>
    </div><br>
    <div class="card-table" style="margin-top:5rem;">
        <?php
        // require '../Backend/Backend.php';
        $obj = new Backend;
        $conn = $obj->connection();
        $sql = "SELECT * FROM Users Where Role='student'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $sql = "SELECT * FROM Exams";
        $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        ?>
        <table class="table">
            <thead>

                <th>username</th>

                <th>fname</th>
                <th>lname</th>

                <th>states</th>
                <th>Exam</th>
                <th>Assign</th>
            </thead>
            <tbody>
                <!-- <td><?php echo $res['Username']; ?></td> -->
                <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $res['Username']; ?></td>
                        <td><?php echo $res['Fname']; ?></td>
                        <td><?php echo $res['Lname']; ?></td>
                        <td><?php echo $res['Status']; ?></td>
                        <form action="" method="post">
                        <td> <select name="fa" id="" style="height: 2.5rem; width: 10rem;  border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem; border-color: black;">
                                <option selected value="<?php echo $retVal = (isset($re['Fid'])) ? $re['Fid'] : null; ?>">Please select Exam</option>
                                <?php
                                while ($re = mysqli_fetch_assoc($que)) : ?>
                                    <option value="<?php echo $re['idExams']; ?>"><?php echo $re['Title']; ?></option>
                                <?php endwhile; ?>
                            </select></td>
                            <td><button type="submit" name="un" value="<?php echo $res['Username']; ?>">Assign</button></td>
                            </form>
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
if (isset($_POST['un'])) {
    $data[0] = null;
    $data[1] = $_POST['un'];
    $data[2] = $_POST['fa'];
    $data[3] = 'pending';
    $obj->setAttrs($conn,'StuExams',$data);
    $obj->insert();
    echo '<script>alert("Inserted successfully")</script>';
}

?>