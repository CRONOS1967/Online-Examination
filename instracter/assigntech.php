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
    $sql = "SELECT * FROM Exams";
    $que = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    ?>
    <h2 style="text-align:center; "> Add qustions</h2>
    <div class="container">
        <div class="card-form">
            <form action="" method="post">
                <div class="big-card" style="margin-left:1rem;margin-top:1rem;">
                    <div class="input">
                        <label style="color:black; font-weight: bold;margin-left: 3rem;" for="Qustion">Exam</label>
                        <select name="fa" id="" style="height: 2.5rem; width: 10rem;  border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; border-radius: .3rem; margin-top: .25rem; border-color: black;">
                                <option selected value="<?php echo $retVal = (isset($re['idExams'])) ? $re['idExams'] : null; ?>">Please select Exam</option>
                                <?php
                                while ($re = mysqli_fetch_assoc($que)) : ?>
                                    <option value="<?php echo $re['idExams']; ?>"><?php echo $re['Title']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        <br> <br><label style="color:black; font-weight: bold;margin-left: 3rem;" for="Qustion">Qustion</label><br>
                        <br> <textarea placeholder="Pleas enter Qustion" id="Qustion" style="width:68%;margin-left: 3rem;" name="qu" id="" cols="11" rows="6"></textarea>
                    </div>
                    <div class="inputgroup" style="margin-top:2rem;">

                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">choose:A</label><br>
                            <input type="text" name="ca" id="choose:A" placeholder="Pleas enter choose:A">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">choose:B</label><br>
                            <input type="text" name="cb" id="choose:B" placeholder="Pleas enter choose:B">
                        </div>
                        <div class="input">
                            <label style="color:black;  width: 100%; font-weight: bold;" for="mname">choose:C</label><br>
                            <input type="text" name="cc" id="choose:C" placeholder="Pleas enter choose:C">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="lname">choose:D</label><br>
                            <input type="text" id="choose:D" name="cd" placeholder="Pleas enter choose:D">
                        </div>
                        <div class="input">
                            <label style="color:black; width: 100%; font-weight: bold;" for="age">Answer</label><br>
                            <input type="text" id="Answer" name="aa" placeholder="Pleas enter Answer">
                        </div>

                    </div>

                    <button type="type" value="add" name="add" style="margin-left:3rem;" class="bv sub">add</button>

                    <br>
                    <br>
                    <br>
                    <br>


                </div>
            </form>
        </div>
        <div class="card-table">
            <?php
            $q = "SELECT * from Questions join Exams on Questions.Exams_idExams=Exams.idExams";
            $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

            ?>
            <table class="table">
            <thead>
                    <th>Exam</th>
                    <th>id</th>
                    <th>question</th>
                    <th>choose:A</th>
                    <th>choose:B</th>
                    <th>choose:C</th>
                    <th>choose:D</th>
                    <th>Answer</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                        <td><?php echo $res['Title']; ?></td>
                            <td><?php echo $res['idQuestions']; ?></td>
                            <td><?php echo $res['Question']; ?></td>
                            <td><?php echo $res['Ch1']; ?></td>
                            <td><?php echo $res['Ch2']; ?></td>
                            <td><?php echo $res['Ch3']; ?></td>
                            <td><?php echo $res['Ch4']; ?></td>
                            <td><?php echo $res['Answer']; ?></td>
                            <td><?php echo $res['Status']; ?></td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
        <br><br><br><br>
    </div>
    </div>
</body>

</html>
<?php
    if (isset($_POST['add'])) {
        $data[0] = null;
        $data[1] = $_POST['qu'];
        $data[2] = $_POST['ca'];
        $data[3] = $_POST['cb'];
        $data[4] = $_POST['cc'];
        $data[5] = $_POST['cd'];
        $data[6] = $_POST['aa'];
        $data[7] = 'pending';
        $data[8] = $_POST['fa'];

        $obj->setAttrs($conn, 'Questions', $data);
        $obj->insert();
        echo '<script>alert("Inserted successfully")</script>';
    }

?>