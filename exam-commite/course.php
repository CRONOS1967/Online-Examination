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
   <br> <h2 style="text-align:center; "> Approve exam</h2>
    <div class="container">
     
     <!--   <div class="card-table">
            <table class="table">
                <thead>
                    <th>course code</th>
                    <th>id</th>
                    <th>question</th>
                    <th>choose:A</th>
                    <th>choose:B</th>
                    <th>choose:C</th>
                    <th>choose:D</th>
                    <th>Answer</th>
                    <th>Action</th>

                </thead>
                <tbody>
                    <tr>
                        <td>is4312</td>
                        <td>01</td>
                        <td>one is not type of information system?</td>
                        <td>A.operation support system</td>
                        <td>B.desion support system</td>
                        <td>C.managemnt information system</td>
                        <td>D.none</td>
                        <td>D</td>
                        <td><a href="" class="bv sub">view</a></td>
                    </tr>
                    <tr>
                    <td>is4312</td>
                        <td>02</td>
                        <td>one is not type of information system?</td>
                        <td>A.operation support system</td>
                        <td>B.desion support system</td>
                        <td>C.managemnt information system</td>
                        <td>D.none</td>
                        <td>A</td>
                        <td><a href="" class="bv sub">view</a></td>
                    </tr>
                    <tr>
                    <td>is4312</td>
                        <td>03</td>
                        <td>one is not type of information system ?</td>
                        <td>A.operation support system</td>
                        <td>B.desion support system</td>
                        <td>C.managemnt information system</td>
                        <td>D.none</td>
                        <td>B</td>
                        <td><a href="" class="bv sub">view</a></td>
                    </tr>
                    <tr>
                    <td>is4312</td>
                        <td>04</td>
                        <td>one is not type of information system ?</td>
                        <td>A.operation support system</td>
                        <td>B.desion support system</td>
                        <td>C.managemnt information system</td>
                        <td>D.none</td>
                        <td>C</td>
                        <td><a href="" class="bv sub">view</a></td>
                    </tr>
                  
                </tbody>
            </table>
        </div>

    </div>-->

    
    <div class="card-table">
            <?php
             $obj = new Backend;
             $conn = $obj->connection();
            $q = "SELECT * from Questions join Exams on Questions.Exams_idExams=Exams.idExams where Questions.Status='pending'";
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
                    <th>Action</th>
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
                            <td><a href="?yes=<?php echo $res['idQuestions']; ?>">yes</a> // <a href="?no=<?php echo $res['idQuestions']; ?>">No</a> </td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
        </div>

</body>

</html>
<?php
if (isset($_GET['yes'])) {
    # code...
    $q = "Update Questions set Status='yes' where idQuestions=".$_GET['yes']."";
    mysqli_query($conn,$q);
}
if (isset($_GET['no'])) {
    # code...
    $q = "Update Questions set Status='no' where idQuestions=".$_GET['no']."";
    mysqli_query($conn,$q);
}
?>