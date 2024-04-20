<?php
session_start();
include '../database/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | Voluntrax.com</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- Icon CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>

    <section class="navigation-bar">
        <?php include './blocks/navbar.php' ?>
    </section>

    <section class="event">
        <div class="event-schedule-area-two bg-color pad100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <div class="title-text">
                                <h2>Volunteer Upcoming Events</h2>
                            </div>
                            <p>
                                Check out our upcoming events and get involved in volunteering!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">
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
            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="footer">
        <?php include './blocks/footer.php' ?>
    </footer>


    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>