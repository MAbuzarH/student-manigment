<?php
session_start();

// Check if user is not logged in
if ((!isset($_SESSION['submit'])) || ($_SESSION['submit'] !== true)) {
    // Redirect to login page
    header("Location: http://localhost/school/login/index.php");
    exit;
} else {
    include("connection.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("head.php");
        ?>
        <title>DASHBORD</title>
    </head>

    <body>
        <div class="d-flex ">

            <div class="nav-bar text-center col-2 p-0 ">
                <div class="nav bg-dark flex-column  align-items-center pt-5 min-vh-100">
                    <h1 class="text-light bolder fs-1">LMS</h1>
                    <hr class="text-primary">
                    <p class="text-light bolder fs-5"><a class="nav-link text-light active" aria-current="page" href="http://localhost/school/dashbord/">DASHBORD</a></p>
                    <p class="text-light bolder fs-5"><a class="nav-link text-light" href="http://localhost/school/student/">STUDENTS</a></p>
                </div>
            </div>
            <!-- main content -->
            <div class="main col-10  p-0 m-0 ">
                <div class="navebar2 bg-light p-0 m-0">
                    <nav class="navbar pt-2 pb-3">
                        <div class="container">
                            <span class="navbar-brand mb-0 ">Navbar</span>
                            <form method="post">
                                <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                            </form>
                        </div>
                        <hr class="h-40 text-primary">
                    </nav>
                </div>
                <!-- cards parent -->
                <div class="h-75">
                    <div class="cardsp  justify-content-evenly align-items-center card  h-100">
                        <div></div>
                        <div class="card bg-light  text-center col-10">
                            <div class="card-body">
                                <h4 class="card-title">Total Student</h4>
                                <p class="card-text">
                                    <?php
                                    $count = 'SELECT COUNT(*) AS total_count FROM student';
                                    $result = mysqli_query($conn, $count);
                                    // fetch the result as an array
                                    $row = $result->fetch_assoc();

                                    // get the total count
                                    $total_count = $row['total_count'];

                                    // display the total count
                                    echo $total_count;
                                    ?>

                                </p>
                            </div>
                        </div>
                        <div class="card bg-light  text-center col-10">
                            <div class="card-body">
                                <h4 class="card-title">New Student (7 days)</h4>
                                <p class="card-text">
                                    <?php
                                    // $newS = "SELECT COUNT(*) AS seven FROM student WHERE 'date' >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
                                    // $resultOfn = mysqli_query($conn, $newS);
                                    // $row1 = mysqli_fetch_array($resultOfn);
                                    // $res = $row1['seven'];
                                    // echo $res;
                                    $newr = "SELECT *  FROM student";
                                    $result1 = $conn->query($newr);
                                    if ($result1->num_rows > 0) {

                                        // Create an array to store the dates from the database
                                        $dates = array();
                                        // echo "2";
                                        // Loop through each row and add the date to the array
                                        while ($row1 = $result1->fetch_assoc()) {
                                            $dates[] = $row1['date'];
                                            // echo "2";
                                        }
                                        // var_dump($row['date']);
                                        // var_dump($dates);
                                        // Compare each date with the current date
                                        $count1 = 0;

                                        foreach ($dates as $date) {
                                            if (date("Y-m-d", strtotime($date)) <= date("Y-m-d", strtotime('-7 days'))) {
                                                $count1++;

                                                // echo "The date " . date("Y-m-d", strtotime('-7 days')) . " is the same as the current date<br>";
                                            }
                                            // echo $date;
                                        }
                                    } else {
                                        echo "No results found.";
                                    }
                                    echo $total_count - $count1;
                                    ?>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-light text-center pt-3 pb-3">
                        <p>copyright abuzar 2022</p>
                    </div>
                </div>

            </div>


        </div>

    </body>

    </html>
<?php
}
session_start();

// Handle the logout request
if (isset($_POST['logout'])) {
    // Clear session data
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: http://localhost/school/login/index.php");
    exit;
}
?>