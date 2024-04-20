<?php

$email = $_SESSION['email'];

$sql = "SELECT o.*, os.total_hours, os.opportunities_completed, os.impact_achieved, os.last_updated, oht.progress_bar_percentage
FROM organizations o
LEFT JOIN organization_statistics os ON o.org_id = os.org_id
LEFT JOIN organization_hours_tracker oht ON o.org_id = oht.org_id
WHERE o.email = '$email'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $organizationId = $row["org_id"];
        $organizationName = $row["organization_name"];
        $organizationEmail = $row["organization_email"];
        $organizationPhoneNumber = $row["organization_phone_number"];
        $organizationWebsite = $row["organization_website"];
        $organizationAddress = $row["organization_address"];
        $organizationDescription = $row["organization_description"];
        $organizationLogo = $row["organization_logo"];

        // Organization statistics
        $totalHours = $row["total_hours"];
        $opportunitiesCompleted = $row["opportunities_completed"];
        $impactAchieved = $row["impact_achieved"];
        $lastUpdated = $row["last_updated"];

        // Retrieve data from the volunteer_hours_tracker table
        $progress_bar_percentage = $row["progress_bar_percentage"];
    }
}

?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- meta -->
                <div class="profile-user-box card-box bg-custom">
                    <div class="row">
                        <div class="col-sm-6">
                            <span class="float-left mr-3">
                                <img src="../assets/images/profile_pictures/organization/<?php echo ($organizationLogo); ?>"
                                    alt="" class="thumb-lg rounded-circle"></span>
                            <div class="media-body text-white">
                                <h4 class="mt-1 mb-1 font-18 text-black">
                                    <?php echo ($organizationName); ?>
                                </h4>
                                <p class="font-13 text-black">
                                    <?php echo ($email); ?>
                                </p>
                                <p class="text-black mb-0">
                                    <?php echo ($organizationAddress); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-4">
                <!-- Personal-Information -->
                <div class="card-box">
                    <h4 class="header-title mt-0">Organization Details</h4>
                    <div class="panel-body">
                        <p class="text-muted font-13">
                            <?php echo ($organizationDescription); ?>
                        </p>
                        <hr>
                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Organization Name :</strong> <span class="m-l-15">
                                    <?php echo ($organizationName); ?>
                                </span></p>
                            <p class="text-muted font-13"><strong>Phone Number : </strong><span class="m-l-15">
                                    <?php echo ($organizationPhoneNumber); ?>
                                </span></p>
                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">
                                    <?php echo ($email); ?>
                                </span></p>
                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">
                                    <?php echo ($organizationAddress); ?>
                                </span>
                            </p>
                            <p class="text-muted font-13"><strong>Website :</strong> <span class="m-l-15">
                                    <?php echo ($organizationWebsite); ?>
                                </span>

                        </div>
                        <ul class="social-links list-inline mt-4 mb-0">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip"
                                    class="tooltips" href="" data-original-title="Facebook"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip"
                                    class="tooltips" href="" data-original-title="Twitter"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip"
                                    class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Personal-Information -->
                <div class="card-box ribbon-box">
                    <div class="ribbon ribbon-primary">Messages</div>
                    <div class="clearfix"></div>
                    <div class="inbox-widget">
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Kurafire</p>
                                <p class="inbox-item-text">Nice to meet you</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Shahedk</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar6.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Adhamdannaway</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img
                                        src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle"
                                        alt=""></div>
                                <p class="inbox-item-author">Stillnotdavid</p>
                                <p class="inbox-item-text">This theme is awesome!</p>
                                <p class="inbox-item-date">
                                    <button type="button"
                                        class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-layers float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Total Volunteer Hours</h6>
                            <h2 class="" data-plugin="counterup">
                                <?php echo ($totalHours); ?>
                            </h2> <span class="text-muted">From
                                previous period</span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-paypal float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Opportunities Completed</h6>
                            <h2 class=""><span data-plugin="counterup">
                                    <?php echo ($opportunitiesCompleted); ?>
                                </span></h2> <span class="text-muted">From
                                previous period</span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-rocket float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Impact Achieved</h6>
                            <h2 class="" data-plugin="counterup">
                                <?php echo ($impactAchieved); ?>
                            </h2> <span class="text-muted">From
                                previous period</span>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="card-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mt-0 mb-3">Volunteer Hours Tracker</h4>
                        <a href="./blocks/generate_report.php" class="btn btn-primary">
                            Generate Report <i class="fas fa-file-alt ms-1"></i>
                        </a>
                    </div>
                    <!-- Progress Bar -->
                    <div class="mb-4">
                        <p class="fw-bold mb-2">Progress Bar</p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: <?php echo ($progress_bar_percentage); ?>%;" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100">
                                <?php echo ($progress_bar_percentage); ?>%
                            </div>
                        </div>
                    </div>
                    <!-- Detailed Breakdown -->
                    <div>
                        <p class="fw-bold mb-2">Detailed Breakdown</p>
                        <div class="accordion" id="hoursBreakdownAccordion">
                            <!-- Daily Breakdown -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Daily
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#hoursBreakdownAccordion">
                                    <div class="accordion-body">
                                        <?php
                                        $sql = "SELECT * FROM organizations_daily_breakdown";
                                        // Execute the query
                                        $result = $connection->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve data from the current row
                                                $odb_day = $row["odb_day"];
                                                $odb_hours = $row["odb_hours"];

                                                // Display the data (you can format it as needed)
                                                echo "<p>$odb_day: $odb_hours hours</p>";
                                            }
                                        } else {
                                            // If no rows are returned, display a message
                                            echo "No results";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Weekly Breakdown -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Weekly
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#hoursBreakdownAccordion">
                                    <div class="accordion-body">
                                        <?php
                                        $sql = "SELECT * FROM organizations_weekly_breakdown";
                                        // Execute the query
                                        $result = $connection->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve data from the current row
                                                $owb_week_number = $row["owb_week_number"];
                                                $owb_hours = $row["owb_hours"];

                                                // Display the data (you can format it as needed)
                                                echo "<p>$owb_week_number: $owb_hours hours</p>";
                                            }
                                        } else {
                                            // If no rows are returned, display a message
                                            echo "No results";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Monthly Breakdown -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Monthly
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#hoursBreakdownAccordion">
                                    <div class="accordion-body">
                                        <?php
                                        $sql = "SELECT * FROM organizations_monthly_breakdown";
                                        // Execute the query
                                        $result = $connection->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve data from the current row
                                                $omb_month = $row["omb_month"];
                                                $omb_hours = $row["omb_hours"];

                                                // Display the data (you can format it as needed)
                                                echo "<p>$omb_month: $omb_hours hours</p>";
                                            }
                                        } else {
                                            // If no rows are returned, display a message
                                            echo "No results";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-box">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-3">My Posts</h4>
                        <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#postFormModal">
                            New Post <i class="fas fa-plus ml-1"></i>
                        </a>
                    </div>
                    <div class="row">
                        <?php
                        $sql = "SELECT o.*, op.*
                        FROM opportunities op
                        JOIN organizations o ON op.org_id = o.org_id
                        WHERE o.email = '$email'";
                        $result = $connection->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-md-4 my-2">
                                    <div class="col">
                                        <div class="card rounded-30 border-0 shadow" id="card">
                                            <div class="ratio ratio-16x9">
                                                <img src="../assets/images/profile_pictures/organization/<?php echo $row["organization_logo"]; ?>"
                                                    class="card-img-top rounded-top" alt="Image">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">
                                                    <?php echo $row["title"]; ?>
                                                </h5>
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-building me-2"></i>
                                                    <p class="card-text mb-0">
                                                        <?php echo $row["organization_name"]; ?>
                                                    </p>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-calendar-alt me-2"></i>
                                                    <p class="card-text mb-0">
                                                        <?php echo $row["start_date"]; ?> to
                                                        <?php echo $row["end_date"]; ?>
                                                    </p>
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-clock me-2"></i>
                                                    <p class="card-text mb-0">
                                                        <?php echo $row["time"]; ?>
                                                    </p>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fas fa-map-marker-alt me-2"></i>
                                                    <p class="card-text mb-0">
                                                        <?php echo $row["location"]; ?>
                                                    </p>
                                                </div>
                                                <p class="card-text mb-4">
                                                    <?php echo $row["description"]; ?>
                                                </p>
                                                <!-- Edit and Delete icons with links -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="edit_opportunity.php?opp_id=<?php echo $row["opp_id"]; ?>">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                    <a href="#" onclick="confirmDelete(<?php echo $row['opp_id']; ?>)">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            echo "<div class='col justify-content-center'>
                    <h4 class='text-center'>No Posts</h4>
                        </div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3">Recent Activity</h4>
                    <!-- Filter Option -->
                    <div class="mb-3">
                        <label for="activityFilter" class="form-label">Filter by:</label>
                        <select class="form-select" id="activityFilter">
                            <option selected>All Activities</option>
                            <option value="signup">Opportunities Signed Up For</option>
                            <option value="hours">Hours Logged</option>
                            <option value="messages">Messages Sent</option>
                        </select>
                    </div>
                    <!-- Activity Log -->
                    <ul class="list-group">
                        <!-- Example Activity 1: Opportunity Signed Up For -->
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-primary me-2">Signed Up</span>
                                    Signed up for <b>Teaching English</b> opportunity
                                </div>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </li>
                        <!-- Example Activity 2: Hours Logged -->
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-success me-2">Logged Hours</span>
                                    Logged <b>4 hours</b> for <b>Community Cleanup</b> opportunity
                                </div>
                                <small class="text-muted">1 day ago</small>
                            </div>
                        </li>
                        <!-- Example Activity 3: Message Sent -->
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-info me-2">Message Sent</span>
                                    Sent a message to <b>Volunteer Coordinator</b> regarding <b>Upcoming
                                        Training Session</b>
                                </div>
                                <small class="text-muted">3 days ago</small>
                            </div>
                        </li>
                        <!-- Add more activities as needed -->
                    </ul>
                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- container -->
</div>



<!-- New Post Popup -->
<div id="postFormModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--header -->
            <div class="modal-header">
                <h5 class="modal-title">New Post</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- body -->
            <div class="modal-body">
                <!-- Form fields -->
                <form action="dashboard.php" method="POST">
                    <input type="hidden" class="form-control" id="org_id" name="org_id"
                        value="<?php echo ($organizationId) ?>">
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label for="postDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="postDescription" name="postDescription" rows="3"
                            placeholder="Description"></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate">
                        </div>
                        <div class="col">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="endDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="postTime" class="form-label">Time</label>
                            <input type="time" class="form-control" id="postTime" name="postTime">
                        </div>
                        <div class="col">
                            <label for="postLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="postLocation" name="postLocation"
                                placeholder="Location">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="postLocationType" class="form-label">Location Type</label>
                        <select class="form-select" id="postLocationType" name="postLocationType">
                            <option selected>Select location type...</option>
                            <option value="type1">Type 1</option>
                            <option value="type2">Type 2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="postType" class="form-label">Type</label>
                        <input type="text" class="form-control" id="postType" name="postType" placeholder="Type">
                    </div>
                    <div class="mb-3">
                        <label for="postObjectives" class="form-label">Objectives</label>
                        <textarea class="form-control" id="postObjectives" name="postObjectives" rows="3"
                            placeholder="Objectives"></textarea>
                    </div>
            </div>
            <!--footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="post">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>


<?php

if (isset($_POST['post'])) {

    // Get form data
    $org_id = $_POST["org_id"];
    $postTitle = $_POST["postTitle"];
    $postDescription = $_POST["postDescription"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $postTime = $_POST["postTime"];
    $postLocation = $_POST["postLocation"];
    $postLocationType = $_POST["postLocationType"];
    $postType = $_POST["postType"];
    $postObjectives = $_POST["postObjectives"];

    $qry = "INSERT INTO opportunities (org_id, title, description, start_date, end_date, time, location, location_type, type, objectives) 
        VALUES ('$org_id', '$postTitle', '$postDescription', '$startDate', '$endDate', '$postTime', '$postLocation', '$postLocationType', '$postType', '$postObjectives')";

    // Execute the insert query
    $res = $connection->query($qry);

    if ($res) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Post successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'dashboard.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Post failed!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'dashboard.php';
                });
              </script>";
    }

}
?>