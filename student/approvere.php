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
    // echo $_SESSION['user'];/
    if (isset($_GET['yes'])) {
        $q = "SELECT * FROM Exams Where idExams =" . $_GET['yes'] . ";";
        $_SESSION['exid'] = $_GET['yes'];
        $qu = mysqli_query($conn, $q);
        $re = mysqli_fetch_assoc($qu);
        $i = $re['Qamount'];
        $q = "SELECT * FROM Exams join Questions on idExams = Exams_idExams where idExams =" . $_GET['yes'] . " ORDER BY rand() LIMIT $i";
        $que = mysqli_query($conn, $q);
        // ORDER BY rand()
        $k = 1;
    }
    ?>

    <div class="container">
        <label style="color:black; font-weight: bold;" for="fname">exam: <?php echo $re['Title'] ?></label><br>
        <div class="card"> <br>
            <div class="page-title-actions mr-5" style="font-size: 20px;">
                <form name="cd">
                    <input type="hidden" name="" id="timeExamLimit" value="<?php echo $re['TimeLimit']; ?>">
                    <label>Remaining Time : </label>
                    <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                </form>
            </div>
            <br><br>
            <form action="" method="post">
                <input name="amount" type="number" hidden value="<?php echo $re['Qamount']; ?>" />
                <?php while ($res = mysqli_fetch_assoc($que)) :
                    $questId = $res['idQuestions'];
                ?>

                    <?php echo $k++; ?> .) <label style="color:black; font-weight: bold;" for="mname"><?php echo $res['Question'] ?></label>
                    <br><br><br>
                    <label for="">A.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch1'] ?>"><?php echo $res['Ch1'] ?>
                    <label for="" style="margin-left:7.5rem;"> B.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch2'] ?>"><?php echo $res['Ch2'] ?>
                    <br>
                    <label for="">C.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch3'] ?>"> <?php echo $res['Ch3'] ?>
                    <label for="" style="margin-left:6rem;"> D.</label><input type="radio" name="ans<?php echo $res['idQuestions'] ?>" value="<?php echo $res['Ch4'] ?>">
                    <?php echo $res['Ch4'] ?><br><br><br>
                    <input type="text" hidden class="bv pre " name="<?php echo $res['idQuestions'] ?>" value="<?php echo $res['idQuestions'] ?>">
                <?php endwhile; ?>
                <button type="submit" class="bv next" name="submit">Submit</button>
            </form><br><br>


        </div>





    </div>

    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $data = array();
    $data[0] = null;
    $data[1] = 0;
    $data[2] = $_SESSION['exid'];
    $data[3] = $_SESSION['user'];
    # code...
    $q = "SELECT * FROM Exams join Questions on idExams = Exams_idExams where idExams =" . $_SESSION['exid'] . " ";
    $ques = mysqli_query($conn, $q) or die(mysqli_error($conn));
    while ($res = mysqli_fetch_assoc($ques)) {
        $q = strval($res['idQuestions']);
        if (isset($_POST["ans" . $q])) {
            if ($_POST[$q] == $res['idQuestions']) {
                # code...
                if ($_POST["ans" . $q] == $res['Answer']) {
                    # code...
                    $data[1]++;
                }
            }
        }
    }
    $obj->setAttrs($conn, 'Results', $data);
    $obj->insert();
    $q = "UPDATE `StuExams` SET `StuSts`='taken' WHERE `Users_Username`='" . $_SESSION['user'] . "' and `Exams_idExams`='" . $_SESSION['exid'] . "'";
    mysqli_query($conn,$q);
    echo '<script>alert("You have taken the test")</script>';
    echo '
    <script>
      location.replace("course.php")

    </script>';
} ?>