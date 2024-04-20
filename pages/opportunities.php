<?php
session_start();
include '../database/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Opportunities | Voluntrax.com</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- Icon CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation bar -->
    <section class="navigation-bar">
        <?php include './blocks/navbar.php' ?>
    </section>

    <!-- Main content -->
    <section class="opportunities" style="padding-top:130px;">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <!-- Page Title -->
                    <h2 class="display-6 mb-4 mb-md-5 text-center">All Volunteer Opportunities</h2>
                    <!-- Horizontal line -->
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark">
                    <!-- Search form -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <form method="GET" action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search opportunities"
                                        name="search">
                                    <button class="search-btn" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Another horizontal line -->
                    <hr class="w-200 mx-auto mb-5 mb-xl-9 border-dark">
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Filter and Search Options -->
            <form method="get" action="opportunities.php">
                <div class="row mb-4">
                    <!-- Filter by Type -->
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-filter"></i></span>
                            <select class="form-select" aria-label="Filter by Type" name="type">
                                <option selected>Filter by Type</option>
                                <option value="one-time">One-time</option>
                                <option value="long-term">Long-term</option>
                                <option value="ongoing">Ongoing</option>
                            </select>
                        </div>
                    </div>
                    <!-- Filter by Location -->
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <select class="form-select" aria-label="Filter by Location" name="location_type">
                                <option selected>Filter by Location</option>
                                <option value="city">City</option>
                                <option value="region">Region</option>
                            </select>
                        </div>
                    </div>
                    <!-- Filter by Objectives -->
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                            <select class="form-select" aria-label="Filter by Objectives" name="objectives">
                                <option selected>Filter by Objectives</option>
                                <option value="teaching">Teaching</option>
                                <option value="cleaning">Cleaning</option>
                                <option value="building">Building</option>
                                <!-- Add more objectives as needed -->
                            </select>
                        </div>
                    </div>
                    <!-- Apply Filters button -->
                    <div class="col-md-2">
                        <div class="input-group">
                            <button type="submit" class="filter">Apply Filters</button>
                        </div>
                    </div>
                    <!-- Sort by options -->
                    <div class="col-md-2 ms-auto">
                        <form method="get" action="opportunities.php">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-sort"></i></span>
                                <select class="form-select" aria-label="Sort by" name="sort">
                                    <option selected>Sort by</option>
                                    <option value="title_asc">Title (A-Z)</option>
                                    <option value="title_desc">Title (Z-A)</option>
                                    <option value="start_date_asc">Start Date (Ascending)</option>
                                    <option value="start_date_desc">Start Date (Descending)</option>
                                </select>
                                <button type="submit" class="sort">Sort</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>

            <!-- Cards -->
            <div class="row">
                <?php
                // Check if search term is provided
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    // Escape special characters to prevent SQL injection
                    $searchTerm = mysqli_real_escape_string($connection, $_GET['search']);
                    // Modify the SQL query to include search functionality
                    $sql = "SELECT o.*, op.* FROM opportunities op JOIN organizations o ON op.org_id = o.org_id 
                     WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
                } else {
                    // Default SQL query to retrieve all opportunities
                    $sql = "SELECT o.*, op.* FROM opportunities op JOIN organizations o ON op.org_id = o.org_id";
                }

                // // Check if all filter options are provided
                // if (isset($_GET['type']) && isset($_GET['location_type']) && isset($_GET['objectives'])) {
                //     // Retrieve filter options
                //     $type = mysqli_real_escape_string($connection, $_GET['type']);
                //     $location = mysqli_real_escape_string($connection, $_GET['location_type']);
                //     $objectives = mysqli_real_escape_string($connection, $_GET['objectives']);

                //     $sql .= " WHERE type = '$type' AND location_type = '$location' AND objectives = '$objectives'";
                // }

                // Check if sorting option is selected
                if (isset($_GET['sort'])) {
                    // Get the selected sorting option
                    $sortOption = $_GET['sort'];
                    switch ($sortOption) {
                        case 'title_asc':
                            $sql .= " ORDER BY op.title ASC";
                            break;
                        case 'title_desc':
                            $sql .= " ORDER BY op.title DESC";
                            break;
                        case 'start_date_asc':
                            $sql .= " ORDER BY op.start_date ASC";
                            break;
                        case 'start_date_desc':
                            $sql .= " ORDER BY op.start_date DESC";
                            break;
                        default:
                            // Default sorting option if none is selected
                            $sql .= " ORDER BY op.start_date DESC";
                            break;
                    }
                }

                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-3 my-2">
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
                                            class="read-more btn btn-sm float-end">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Display message if no results found
                    echo "<div class='col justify-content-center'>
                    <h4 class='text-center'>0 results</h4>
                        </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" style=" padding-top:50px;">
        <?php include './blocks/footer.php' ?>
    </footer>

    <!-- Bootstrap and Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>