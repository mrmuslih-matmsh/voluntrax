<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile Creation | Voluntrax.com</title>

    <link rel="shortcut icon" href="../assets/images/fav.jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="" href="../assets/css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Profile Creation Section -->
    <section class="profile-creation bg-white p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-11">
                    <div class="card border-light-subtle shadow-sm">
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
                                                    <h2 class="h4 text-center">Profile Creation</h2>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Switch Buttons -->
                                        <div class="row justify-content-center mb-3">
                                            <div class="btn-group col-auto" role="group" aria-label="Basic example">
                                                <button id="individual-btn" type="button"
                                                    class="btn btn-secondary btn-round switch-btn active">Individual</button>
                                                <button id="organization-btn" type="button"
                                                    class="btn btn-secondary btn-round switch-btn">Organization</button>
                                            </div>
                                        </div>

                                        <!-- Individual Form -->
                                        <div id="individual-form" class="login-form">
                                            <form action="profile_creation.php" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row gy-3">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="fullName">Full Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="fullName"
                                                                name="fullName" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="dob">Date of Birth <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" id="dob" name="dob"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="gender">Gender <span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-select" id="gender" name="gender"
                                                                required>
                                                                <option value="">Select Gender</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="address">Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber">Phone Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control" id="phoneNumber"
                                                                name="phoneNumber" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="interests">Interests <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="interests"
                                                                name="interests" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="skills">Skills <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="skills"
                                                                name="skills" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="profilePicture">Profile Picture <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="file" class="form-control" id="profilePicture"
                                                                name="profilePicture" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" class="form-control" id="email" name="email"
                                                    value="<?php echo ($_GET['email']) ?>">
                                                <input type="hidden" class="form-control" id="password" name="password"
                                                    value="<?php echo ($_GET['password']) ?>">

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="pc-btn btn btn-dark btn-lg" type="submit"
                                                            name="int_submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Organization Form -->
                                        <div id="organization-form" class="login-form" style="display: none;">
                                            <form action="profile_creation.php" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="row gy-3">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationName">Organization Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="organizationName" name="organizationName" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationEmail">Organization Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" class="form-control"
                                                                id="organizationEmail" name="organizationEmail"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationDescription">Description <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" id="organizationDescription"
                                                                name="organizationDescription" rows="3"></textarea required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationWebsite">Website <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="url" class="form-control"
                                                                id="organizationWebsite" name="organizationWebsite" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationAddress">Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="organizationAddress" name="organizationAddress" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationPhoneNumber">Phone
                                                                Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control"
                                                                id="organizationPhoneNumber"
                                                                name="organizationPhoneNumber" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="organizationLogo">Organization Logo <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="file" class="form-control"
                                                                id="organizationLogo" name="organizationLogo" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" class="form-control" id="email" name="email" value="<?php echo ($_GET['email']) ?>">
                                                <input type="hidden" class="form-control" id="password" name="password" value="<?php echo ($_GET['password']) ?>">
                                                
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="pc-btn btn btn-dark btn-lg" type="submit"
                                                            name="org_submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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
// Check if the form is submitted
if (isset($_POST['int_submit'])) {

    // Include the database connection file
    include "../database/db.php";

    // Get form data
    $fullname = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phoneNumber'];
    $interests = $_POST['interests'];
    $skills = $_POST['skills'];


    // Extract file details
    $filename = $_FILES['profilePicture']["name"];
    $tempname = $_FILES['profilePicture']["tmp_name"];
    $folder = __DIR__ . "/../assets/images/profile_pictures/individual/" . $filename;

    // Move the uploaded file to the destination folder
    if (move_uploaded_file($tempname, $folder)) {

        // Insert data into the 'gallery' table after a successful file upload
        $qry = "INSERT INTO individuals (full_name, email, password, dob, gender, address, phone_number, interests, skills, profile_picture, created_at) 
        VALUES ('$fullname', '$email', '$password', '$dob', '$gender', '$address', '$phonenumber', 
        '$interests', '$skills', '$filename', current_timestamp());";

        // Execute the insert query
        $res = $connection->query($qry);

        // Display success or error message using SweetAlert library
        if ($res) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Register successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'login.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Register failed!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'register.php';
                });
            </script>";
        }
    } else {
        // Display an alert if file upload fails
        echo "<script>alert('File upload failed: " . $_FILES['profilePicture']['error'] . "')</script>";
    }

}


if (isset($_POST['org_submit'])) {

    // Include the database connection file
    include "../database/db.php";

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $organizationName = $_POST['organizationName'];
    $organizationEmail = $_POST['organizationEmail'];
    $organizationDescription = $_POST['organizationDescription'];
    $organizationWebsite = $_POST['organizationWebsite'];
    $organizationAddress = $_POST['organizationAddress'];
    $organizationPhoneNumber = $_POST['organizationPhoneNumber'];

    // Extract file details
    $filename = $_FILES['organizationLogo']["name"];
    $tempname = $_FILES['organizationLogo']["tmp_name"];
    $folder = __DIR__ . "/../assets/images/profile_pictures/organization/" . $filename;

    // Move the uploaded file to the destination folder
    if (move_uploaded_file($tempname, $folder)) {

        // Insert data into the 'gallery' table after a successful file upload
        $qry = "INSERT INTO organizations (email,password,organization_name, organization_email, organization_description, organization_website, organization_address, organization_phone_number, organization_logo, created_at) 
        VALUES ('$email','$password','$organizationName', '$organizationEmail', '$organizationDescription', '$organizationWebsite', '$organizationAddress', '$organizationPhoneNumber', '$filename', current_timestamp())";

        // Execute the insert query
        $res = $connection->query($qry);

        // Display success or error message using SweetAlert library
        if ($res) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Register successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'login.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Register failed!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'register.php';
                });
            </script>";
        }
    } else {
        // Display an alert if file upload fails
        echo "<script>alert('File upload failed: " . $_FILES['profilePicture']['error'] . "')</script>";
    }

}
?>