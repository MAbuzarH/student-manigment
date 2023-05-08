<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Login</title>

</head>
<style>
    /* .op {
        opacity: 0.5;
        display: flex;
        justify-content: center;
        align-items: center;
    } */
</style>

<body class="d-flex  justify-content-center align-items-center  bg-primary opacity-1  p-4">
    <div class="login align-items-center justify-content-center border border-1 bg-light border-light p-4 rounded-3 col-4 d-flex flex-column">
        <h1>Hello Again</h1>
        <form method="post" class="row need-validation">
            <div class="form-group row was-validated">
                <label class="fs-5 d-block form-label" for="email">Email adress</label>
                <input class=" m-2 form-control" name="email" type="email" id="email" required>
                <div class="invalid-feedback">Please enter your email</div>
            </div>
            <div class="form-group row was-validated">
                <label class="fs-5 d-block form-label" for="password">Password</label>
                <input class=" m-2 form-control" type="password" name="password" id="password" required>
                <div class="invalid-feedback">Please enter your password</div>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" id="check">
                <label class="form-check-label" for="check">Rember Me</label>

            </div>
            <div class=" ">
                <input class="btn btn-success col-12" type="submit" name="submit" value="LOG IN">

            </div>

        </form>
        <p>If you are new <a href="http://localhost/school/signup/index.php">SIGN UP</a> Here</p>
    </div>
    <!-- "" -->
</body>

</html>

<?php
session_start();
require_once("../dashbord/connection.php");



if (isset($_POST['submit'])) {
    // Get form input
    // $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // echo  $password, $email;
    $sql = "SELECT * FROM login WHERE  email= '$email' AND pasword='$password' ";
    $result = mysqli_query($conn, $sql);
    // echo $sql;
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result) === 1) {
        // Start session and redirect to dashboard

        $_SESSION['email'] = $email;
        $_SESSION['pasword'] = $password;
        $_SESSION['submit'] = true;
        // echo "i am good";
        header("Location: http://localhost/school/student/index.php");
        exit;
    } else {
        // Login failed, redirect to login with error message
?>
        <script>
            alert("error kindly signup");
            window.open('http://localhost/school/signup/index.php', '-self');
        </script>
<?php
    }
}
session_destroy();
?>