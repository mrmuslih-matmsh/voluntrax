<?php
session_start();
include '../database/db.php';

if (!isset($_GET['opp_id'])) {
    header("Location: opportunities.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Opportunities | Voluntrax.com</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- Icon CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>

    <section class="navigation-bar">
        <?php include './blocks/navbar.php' ?>
    </section>


    <section class="signup_opportunities">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php

                    $opp_id = $_GET['opp_id'];

                    $sql = "SELECT o.*, op.* FROM opportunities op JOIN organizations o ON op.org_id = o.org_id WHERE op.opp_id = '$opp_id'";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $opportunityTitle = $row["title"];
                            $organizationLogo = $row["organization_logo"];
                            $opportunityDescription = $row["organization_description"];
                            $organizationName = $row["organization_name"];
                            $organizationEmail = $row["organization_email"];
                            $organizationPhoneNumber = $row["organization_phone_number"];
                            $organizationWebsite = $row["organization_website"];
                            $organizationAddress = $row["organization_address"];
                        }
                    }
                    ?>

                    <div class="col-md-8">
                        <!-- Opportunity Details -->
                        <div class="opp-card card shadow-sm mb-4">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <?php echo $opportunityTitle; ?>
                                </h3>
                                <p class="card-text">
                                    <?php echo $opportunityDescription; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="opp-card card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Contact Information</h5>
                                <!-- Organization Logo -->
                                <div class="mb-3 text-center">
                                    <img src="../assets/images/profile_pictures/organization/<?php echo $organizationLogo; ?>"
                                        class="img-fluid rounded-circle" style="max-width: 100px;"
                                        alt="Organization Logo">
                                </div>
                                <p class="card-text"><strong>Organization Name:</strong>
                                    <?php echo $organizationName; ?>
                                </p>
                                <p class="card-text"><strong>Contact Email:</strong>
                                    <?php echo $organizationEmail; ?>
                                </p>
                                <p class="card-text"><strong>Contact Phone:</strong>
                                    <?php echo $organizationPhoneNumber; ?>
                                </p>
                                <p class="card-text"><strong>Website:</strong> <a
                                        href="<?php echo $organizationWebsite; ?>" target="_blank">
                                        <?php echo $organizationWebsite; ?>
                                    </a></p>
                                <p class="card-text"><strong>Address:</strong>
                                    <?php echo $organizationAddress; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <!-- Sign-Up Form -->
                    <h4 class="text-center mb-4">Opportunity Sign-Up Form</h4>
                    <form action="signup_opportunities.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <select class="form-select" id="availability" name="availability">
                                    <option selected>Select availability</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control form-control-m" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control form-control-m" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control form-control-m" id="phone" name="phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                <input class="form-control form-control-m" type="file" id="document" name="document"
                                    required>
                            </div>
                        </div>
                        <input type="hidden" name="opp_id" value="<?php echo ($_GET['opp_id']) ?>">
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="opp-btn btn btn-primary btn-md"
                                    name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </section>

    <hr>

    <section class="write-review py-5" id="write-review">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Overall Rating Section -->
                <div class="col-md-6">
                    <div class="text-center mb-4">
                        <h5>Overall Rating</h5>
                        <div class="text-warning">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                    </div>
                    <hr width="80%">
                    <!-- Individual Rating Sections -->
                    <div class="row">
                        <div class="col-md-6">
                            <p>Organization Leadership</p>
                        </div>
                        <div class="col-md-6 text-warning">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>

                        <div class="col-md-6">
                            <p>Communication</p>
                        </div>
                        <div class="col-md-6 text-warning">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star-half"></i><i class="fa fa-star-o"></i>
                        </div>

                        <div class="col-md-6">
                            <p>Impact</p>
                        </div>
                        <div class="col-md-6 text-warning">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i><i
                                class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                        </div>

                        <div class="col-md-6">
                            <p>Organizational Culture</p>
                        </div>
                        <div class="col-md-6 text-warning">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                        </div>

                    </div>
                    <!-- Repeat for other rating categories -->
                </div>
                <!-- Write Review Section -->
                <div class="col-md-4 my-5 py-5">
                    <div class="text-center">
                        <h6>Rate and Review Volunteer Opportunity</h6>
                        <p>Your feedback will help others choose the best opportunities</p>
                    </div>
                    <!-- Feedback Form -->
                    <form action="./blocks/feedback.php" method="post" class="mt-4">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (1-5):</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review:</label>
                            <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                        </div>
                        <input type="hidden" name="organization_name" value="<?php echo $organizationName; ?>">
                        <button type="submit" class="feedback-btn btn" name="feedback">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer">
        <?php include './blocks/footer.php' ?>
    </footer>


    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>


<?php

if (isset($_POST['submit'])) {

    // Get form data
    $opp_id = $_POST['opp_id'];
    $availability = $_POST['availability'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Extract file details
    $filename = $_FILES['document']["name"];
    $tempname = $_FILES['document']["tmp_name"];
    $folder = __DIR__ . "/../assets/document/" . $filename;

    // Move the uploaded file to the destination folder
    if (move_uploaded_file($tempname, $folder)) {

        $qry = "INSERT INTO volunteers_signup (int_id, name, email, phone, availability, document, registration_date, opp_id)
        VALUES (1, '$name', '$email', '$phone', '$availability', '$filename', CURRENT_TIMESTAMP(), $opp_id)";

        // Execute the insert query
        $res = $connection->query($qry);

        if ($res) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Register successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'opportunities.php';
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
                    window.location.href = 'opportunities.php';
                });
            </script>";
        }
    } else {
        echo "<script>alert('File upload failed: " . $_FILES['document']['error'] . "')</script>";
    }

}


?>