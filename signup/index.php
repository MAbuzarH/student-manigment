<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIGN UP</title>
</head>

<body class="d-flex  justify-content-center align-items-center  bg-primary opacity-1  p-4">

<div class="login align-items-center justify-content-center border border-1 bg-light border-light p-4 rounded-3 col-4 d-flex flex-column">
        <h1>Rigestre Now</h1>
        <form method="post" class="row need-validation">
        <div class="form-group row ">
                <label class="fs-5 d-block form-label" for="name">Name</label>
                <input class=" m-2 form-control" name="name" type="name" id="name" required>
                
            </div>
            <div class="form-group row">
                <label class="fs-5 d-block form-label" for="email">Email adress</label>
                <input class=" m-2 form-control" name="email" type="email" id="email" required>
                
            </div>
            <div class="form-group row">
                <label class="fs-5 d-block form-label" for="password">Password</label>
                <input class=" m-2 form-control" type="password" name="password" id="password" required>
                
            </div>
          
            <div class="row  gap-4 p-2">
                <input class="btn btn-success col-5" type="submit" name="submit" value="Save">
                <a  href="http://localhost/school/login/index.php" class="btn btn-danger col-5"> Back</a>
            </div>

        </form>

    </div>
    </div>

</body>

</html>
<?php

require_once("../dashbord/connection.php");



if (isset($_POST['submit'])) {
    // Get form input
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // echo $username, $password, $email;
    // $sql = "SELECT * FROM login WHERE fname='$username' AND email= '$email' AND pasword='$password' ";
    $sql = "INSERT INTO `login` ( `fname`,  `email`,`pasword` ) VALUES ( '$username','$email', '$password')";
    $result = mysqli_query($conn, $sql);
    // echo $sql;
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header("Location: http://localhost/school/login/index.php");
    }
}

?>