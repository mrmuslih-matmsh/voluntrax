<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ./login.php");
}
include '../database/db.php';

$user_type = $_SESSION['user_type'];
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Voluntrax.com</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- Icon CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>

    <section class="navigation-bar">
        <?php include './blocks/navbar.php' ?>
    </section>


    <section class="dashboard">

        <?php
        if ($user_type == 'individual') {
            include './blocks/individual_dashboard.php';

        } elseif ($user_type == 'organization') {
            include './blocks/organization_dashboard.php';
        }
        ?>

    </section>



    <!-- Footer-->
    <footer class="footer">
        <?php include './blocks/footer.php' ?>
    </footer>

    <script src="../assets/js/script.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>