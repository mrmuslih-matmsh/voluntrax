<?php
session_start();

// Check if the user is already logged in by checking if the 'email' session variable is set.
// If the user is already logged in, redirect them to the dashboard page.
if (isset($_SESSION['email'])) {
    header("Location: ./dashboard.php");
}

// HTML code for the login page.
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Voluntrax.com</title>

    <link rel="shortcut icon" href="../assets/images/fav.jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="" href="../assets/css/main.css"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Login Section -->
    <section class="login bg-white p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm" >
                        <div class="row g-0">
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="#!">
                                                            <img src="../assets/images/logo.png" alt="voluntrax Logo"
                                                                width="55" height="55">
                                                        </a>
                                                    </div>
                                                    <h2 class="h4 text-center">Login</h2>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="login.php" method="POST">
                                            <div class="row gy-3 overflow-hidden">
                                                <div class="col-12">
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="Email" required>
                                                        <label for="email"
                                                            class="form-label visually-hidden">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-lock"></i></span>
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Password" required>
                                                        <label for="password"
                                                            class="form-label visually-hidden">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="login-btn btn btn-dark btn-lg" type="submit"
                                                            name="login">Login</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-0 mt-5 text-secondary text-center">Don't have an account?
                                                    <a href="register.php"
                                                        class="link">Sign
                                                        up</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                    src="../assets/images/login-reg-bg.jpg" alt="voluntrax">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>

<?php

// PHP code for handling form submission.
// Check if the login form is submitted.
if (isset($_POST['login'])) {

    // Include the database connection file
    include "../database/db.php";

    // Retrieve username and password from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to select user from 'individuals' table based on email and password
    $qry = "SELECT * FROM individuals WHERE email = ? AND password = ?";

    // Prepare and execute the first SELECT statement
    $stmt = $connection->prepare($qry);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result_individuals = $stmt->get_result();

    // SQL query to select user from 'organizations' table based on email and password
    $qry = "SELECT * FROM organizations WHERE email = ? AND password = ?";

    // Prepare and execute the second SELECT statement
    $stmt = $connection->prepare($qry);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result_organizations = $stmt->get_result();

    // Combine the results of both SELECT statements
    $result = array_merge($result_individuals->fetch_all(MYSQLI_ASSOC), $result_organizations->fetch_all(MYSQLI_ASSOC));


    if ($result_individuals->num_rows == 1) {

        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = 'individual';
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        exit;
    } elseif ($result_organizations->num_rows == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = 'organization';
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        exit;
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Username and Password!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
    }

    $stmt->close();
    $connection->close();
}
?>
