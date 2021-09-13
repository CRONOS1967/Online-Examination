<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <h1 style="margin-top:6rem;margin-left:6rem;">wellcome to <?php echo $_SESSION['Name']?>   </h1>
    <div class="" style="display:inline;">
 </div>

</body>
</html>