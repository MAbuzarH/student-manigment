<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['submit']) || $_SESSION['submit'] !== true) {
    // Redirect to login page
    header("Location: http://localhost/school/login/index.php");
    exit;
} else {
    require_once("../../dashbord/connection.php");
    include("../../dashbord/head.php");
    // get the current date
    $current_date = date('Y-m-d');

    // print the current date
    // echo "The current date is: " . $current_date;
    $id = $_GET['id'];
    global $conn;
    $result = "SELECT * FROM student WHERE rollnumber = '$id'";
    $data = mysqli_query($conn, $result);
    $row = mysqli_fetch_array($data);
    $sql = "SELECT rollnumber FROM student";
    $result1 = mysqli_query($conn, $sql);

    $map = false;
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $ids = $row1['rollnumber'];
        if ($data and $ids == $id) {
            $map = true;
        }
    }
    if ($map) {


?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <title>Edit</title>
        </head>

        <body>
            <div class="d-flex">
            <div class="nav-bar text-center col-2 p-0 ">
                <div class="nav bg-dark flex-column  align-items-center pt-5 min-vh-100">
                    <h1 class="text-light bolder fs-1">LMS</h1>
                    <hr class="text-primary">
                    <p class="text-light bolder fs-5"><a class="nav-link text-light" aria-current="page" href="http://localhost/school/dashbord/">DASHBORD</a></p>
                    <p class="text-light bolder fs-5"><a class="nav-link text-light" href="http://localhost/school/student/">STUDENTS</a></p>
                </div>
            </div>
                <div class="main col-10" >
                <div class="navebar2 bg-light p-0 m-0">
                    <nav class="navbar pt-2 pb-3">
                        <div class="container">
                            <span class="navbar-brand mb-0 ">Navbar</span>
                        </div>
                        <hr class="h-40 text-primary">
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center h-75">
                    <div class="cardsp card p-4 h-75 col-10 bg-light" >
                    <div  class="d-flex justify-content-between p-1" >
                        <h4 class="bolder ">Admin | Edit</h4>
                        <a class="btn btn-primary" href="http://localhost/school/student/index.php">Go Back</a>
                    </div>
                        <div class="">
                            <form class="row g-3" method="post">
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">First name *</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $row['fname']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last name *</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row['lname']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <div class="input-group ">
                                        <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" id="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="pnumber" class="form-label">Phone number *</label>
                                    <input type="text" name="pnumber" value="<?php echo $row['pnumber']; ?>" class="form-control" id="pnumber" required>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="edit" name="edit">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </div>

</div>
                    <div >
                    <div class="bg-light text-center pt-3 pb-3">
                        <p>copyright abuzar 2022</p>
                    </div>
                </div>
                </div>


            </div>
            <?php
            if (isset($_POST['edit'])) {
                $fn = $_POST['firstname'];
                $ln = $_POST['lastname'];
                $pn = $_POST['pnumber'];
                $em = $_POST['email'];
                $da = $current_date;
                $update = "UPDATE `student` SET `rollnumber`='$id' ,`fname`='$fn', `lname`='$ln', `email`='$em', `pnumber`='$pn', `date`='$da' WHERE  `student`.`rollnumber`= '$id'";

                $dataupdated = mysqli_query($conn, $update);


                if ($dataupdated) {
                    // echo "New record created successfully";
            ?>
                    <script type="text/javascript">
                        alert(' record updated successfully');
                        window.open('http://localhost/school/student/index.php', '-self');
                    </script>
                <?php
                } else {
                ?>
                    <script type="text/javascript">
                        alert('error');
                    </script>

            <?php
                    // echo "Error:".$sql."<br/>";
                }
            }
        } else {
            ?>
            <script>
                alert('error');
                window.open('http://localhost/school/student/index.php', '_self');
            </script>
        <?php

        }
        ?>

        </body>

</html>
<?php } ?>