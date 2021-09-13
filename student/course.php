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
    <h2 style="text-align:center; "> Exam Take</h2>
    <div class="container">




        <div class="card-table">
            <?php
            $obj = new Backend;
            $conn = $obj->connection();
            $q = "SELECT * FROM StuExams join Exams on Exams_idExams = idExams join Courses on idCourses = Courses_idCourses join Depts on Depts_idDepts = idDepts Where Users_Username = '" . $_SESSION['user'] . "' and StuSts='pending'";
            $query = mysqli_query($conn, $q) or die(mysqli_error($conn));

            ?>
            <table class="table">
                <thead>
                    <th>Exam</th>
                    <th>Department</th>
                    <th>Course</th>
                    <th>Time Limit</th>
                    <th>Question Amount</th>
                    <th>Description</th>
                    <th>Created on</th>
                    <!-- <th>Answer</th> -->
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php while ($res = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?php echo $res['Title']; ?></td>
                            <td><?php echo $res['Name']; ?></td>
                            <td><?php echo $res['Cname']; ?></td>
                            <td><?php echo $res['TimeLimit']; ?> min</td>
                            <td><?php echo $res['Qamount']; ?></td>
                            <td><?php echo $res['Desc']; ?></td>
                            <td><?php echo $res['Created']; ?></td>

                            <td><a href="approvere.php?yes=<?php echo $res['Exams_idExams']; ?>">Take Exam</a> </td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
