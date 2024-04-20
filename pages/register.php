<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: ./dashboard.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Register | Voluntrax.com</title>

    <link rel="shortcut icon" href="../assets/images/fav.jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <section class=" register bg-white p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                    src="../assets/images/login-reg-bg.jpg" alt="voluntrax">
                            </div>
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
                                                    <h2 class="h4 text-center">Registration</h2>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="register.php" method="POST">
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
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="iAgree" id="iAgree" required>
                                                        <label class="form-check-label text-secondary" for="iAgree">
                                                            I agree to the <a href="#!" class="link">terms and
                                                                conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="register-btn btn btn-dark btn-lg" type="submit"
                                                            name="submit">Sign
                                                            up</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-0 mt-5 text-secondary text-center">Already have an account?
                                                    <a href="login.php" class="link text-decoration-none">Sign in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Include the database connection file
    include "../database/db.php";

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query for individuals table
    $qry_individuals = "SELECT * FROM individuals WHERE email=?";
    $stmt_individuals = $connection->prepare($qry_individuals);
    $stmt_individuals->bind_param("s", $email);
    $stmt_individuals->execute();
    $result_individuals = $stmt_individuals->get_result();
    $count_individuals = $result_individuals->num_rows;

    // Prepare the query for organizations table
    $qry_organizations = "SELECT * FROM organizations WHERE email=?";
    $stmt_organizations = $connection->prepare($qry_organizations);
    $stmt_organizations->bind_param("s", $email);
    $stmt_organizations->execute();
    $result_organizations = $stmt_organizations->get_result();
    $count_organizations = $result_organizations->num_rows;

    // Check if email is registered in either table
    if ($count_individuals > 0 || $count_organizations > 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Already Registered!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'login.php';
            });
        </script>";
    } else {
        $redirectUrl = "profile_creation.php?email=" . urlencode($email) . "&password=" . urlencode($password);
        echo "<script>window.location.href = '$redirectUrl';</script>";
    }
}
?>
