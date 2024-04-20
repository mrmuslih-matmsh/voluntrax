<?php

$email = $_SESSION['email'];

$sql = "SELECT individuals.*, volunteer_statistics.*, vht.*,
               db.db_day, db.db_hours,
               wb.wb_week_number, wb.wb_hours,
               mb.mb_month, mb.mb_hours
        FROM individuals
        LEFT JOIN volunteer_statistics ON individuals.int_id = volunteer_statistics.int_id
        LEFT JOIN volunteer_hours_tracker vht ON individuals.int_id = vht.int_id
        LEFT JOIN daily_breakdown db ON vht.vht_id = db.vht_id
        LEFT JOIN weekly_breakdown wb ON vht.vht_id = wb.vht_id
        LEFT JOIN monthly_breakdown mb ON vht.vht_id = mb.vht_id
        WHERE individuals.email = '$email'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Retrieve data from the joined result
        $int_id = $row["int_id"];
        $full_name = $row["full_name"];
        $email = $row["email"];
        $password = $row["password"];
        $dob = $row["dob"];
        $gender = $row["gender"];
        $address = $row["address"];
        $phone_number = $row["phone_number"];
        $interests = $row["interests"];
        $skills = $row["skills"];
        $profile_picture = $row["profile_picture"];

        // Data from volunteer_statistics table
        $total_hours = $row["total_hours"];
        $opportunities_completed = $row["opportunities_completed"];
        $impact_achieved = $row["impact_achieved"];
        $last_updated = $row["last_updated"];

        // Retrieve data from the volunteer_hours_tracker table
        $vht_id = $row["vht_id"];
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
                        <div class="col-sm-6"><span class="float-left mr-3"><img
                                    src="../assets/images/profile_pictures/individual/<?php echo ($profile_picture); ?>"
                                    alt="" class="thumb-lg rounded-circle"></span>
                            <div class="media-body text-white">
                                <h4 class="mt-1 mb-1 font-18 text-black">
                                    <?php echo ($full_name); ?>
                                </h4>
                                <p class="font-13 text-black">
                                    <?php echo ($email); ?>
                                </p>
                                <p class="text-black mb-0">
                                    <?php echo ($address); ?>
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
                    <h4 class="header-title mt-0">Personal Information</h4>
                    <div class="panel-body">
                        <p class="text-muted font-13">Hey, I’m
                            <?php echo ($full_name); ?> and I'm passionate about making a positive impact in the
                            community. I dedicate my time to volunteering and contributing to meaningful causes. With a
                            focus on enhancing user experiences and creating intuitive interfaces, I collaborate on
                            projects that strive to make a difference. Let's connect and discuss how we can work
                            together to support our community. Feel free to reach out with any questions or
                            opportunities for collaboration.
                        </p>
                        <hr>
                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">
                                    <?php echo ($full_name); ?>
                                </span></p>
                            <p class="text-muted font-13"><strong>Mobile : </strong><span class="m-l-15">
                                    <?php echo ($phone_number); ?>
                                </span></p>
                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">
                                    <?php echo ($email); ?>
                                </span></p>
                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15">
                                    <?php echo ($address); ?>
                                </span>
                            </p>
                            <p class="text-muted font-13"><strong>Interests :</strong> <span class="m-l-15">
                                    <?php echo ($interests); ?>
                                </span>
                            <p class="text-muted font-13"><strong>Skills :</strong> <span class="m-l-15">
                                    <?php echo ($skills); ?>
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
                                <?php echo ($total_hours); ?>
                            </h2> <span class="text-muted">From
                                previous period</span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-paypal float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Opportunities Completed</h6>
                            <h2 class=""><span data-plugin="counterup">
                                    <?php echo ($opportunities_completed); ?>
                                </span></h2> <span class="text-muted">From
                                previous
                                period</span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-rocket float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Impact Achieved</h6>
                            <h2 class="" data-plugin="counterup">
                                <?php echo ($impact_achieved); ?>
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
                        <a href="#" class="btn btn-primary">
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
                                        $sql = "SELECT * FROM daily_breakdown";
                                        // Execute the query
                                        $result = $connection->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve data from the current row
                                                $db_day = $row["db_day"];
                                                $db_hours = $row["db_hours"];

                                                // Display the data (you can format it as needed)
                                                echo "<p>$db_day: $db_hours hours</p>";
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
                                        $sql = "SELECT * FROM weekly_breakdown";
                                        // Execute the query
                                        $result = $connection->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve data from the current row
                                                $wb_week_number = $row["wb_week_number"];
                                                $wb_hours = $row["wb_hours"];

                                                // Display the data (you can format it as needed)
                                                echo "<p>$wb_week_number: $wb_hours hours</p>";
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
                                        $sql = "SELECT * FROM monthly_breakdown";
                                        // Execute the query
                                        $result = $connection->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve data from the current row
                                                $mb_month = $row["mb_month"];
                                                $mb_hours = $row["mb_hours"];

                                                // Display the data (you can format it as needed)
                                                echo "<p>$mb_month: $mb_hours hours</p>";
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
                        <h4 class="header-title mb-3">Upcoming Opportunities</h4>
                        <a href="opportunities.php" class="text-primary mb-3">View all</a>
                    </div>
                    <div class="row">
                        <?php
                        $sql = "SELECT o.*, op.* FROM opportunities op JOIN organizations o ON op.org_id = o.org_id LIMIT 3";
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
                                                <a href="signup_opportunities.php?opp_id=<?php echo $row["opp_id"]; ?>"
                                                    class="read-more btn btn-sm float-end">Join now</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php
                            }
                        } else {
                            echo "<div class='col justify-content-center'>
                    <h4 class='text-center'>No results</h4>
                        </div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3">Event Calender</h4>
                    <div class="table-responsive">
                        <table class="table text-center table-bordered align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Event</th>
                                    <th>Location</th>
                                    <th>Organization name</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT o.*, op.* FROM opportunities op JOIN organizations o ON op.org_id = o.org_id ORDER BY op.start_date DESC";

                                $result = $connection->query($sql);

                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo $row["start_date"]; ?></td>
                                            <td><?php echo $row["title"]; ?></td>
                                            <td><?php echo $row["location"]; ?></td>
                                            <td><?php echo $row["organization_name"]; ?></td>
                                            <td><a href="signup_opportunities.php?opp_id=<?php echo $row["opp_id"]; ?>"
                                                    class="read-more btn">Read More</a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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