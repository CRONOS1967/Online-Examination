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
    <h2 style="text-align:center; ">See result</h2>
    <div class="container">
        <div class="card-form">
        <div class="card-table">
            <?php
            $obj = new Backend;
            $conn = $obj->connection();
            $q = "SELECT * FROM Results join Exams on idExams=Results.Exams_idExams join Courses on Courses_idCourses=idCourses Where Users_Username = '" . $_SESSION['user'] . "'";
            $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

            ?>
            <table class="table">
                <thead>
                    <th>Exam</th>
 
                    <th>Course</th>
                    <th>Time Limit</th>
                    <!-- <th>Question Amount</th> -->
                    <th>Mark/Out of*</th>
                    <th>Created on</th>
                    <!-- <th>Answer</th> -->
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?php echo $res['Title']; ?></td>
                            
                            <td><?php echo $res['Cname']; ?></td>
                            <td><?php echo $res['TimeLimit']; ?> min</td>
                            <td><?php echo $res['Mark']."/". $res['Qamount'];?></td>
                            <td><?php echo $res['Created']; ?></td>

                            
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
                <br>
                <br>
                <br>
                <br>


            </div>

        </div>

    </div>
</body>

</html>