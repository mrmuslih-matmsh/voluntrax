<?php
if (isset($_SESSION['user_type'])){

    $user_type = $_SESSION['user_type'];

    if ($user_type == 'individual') {
        $qry = "SELECT * FROM individuals WHERE email = '" . $_SESSION['email'] . "'";
        $res = $connection->query($qry);
    
        if ($res) {
            $row = $res->fetch_assoc();
            $pic = $row["profile_picture"];
        }
    } elseif ($user_type == 'organization') {
        $qry = "SELECT * FROM organizations WHERE email = '" . $_SESSION['email'] . "'";
        $res = $connection->query($qry);
        
        if ($res) {
            $row = $res->fetch_assoc();
            $pic = $row["organization_logo"];
        }
    }

}

?>


<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../assets/images/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav justify-content-end ">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="opportunities.php">Opportunities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>

                <?php
                if (isset($_SESSION['email'])) {
                    echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile_pictures/'.$user_type.'/'. $pic . '" class="rounded-circle" height="35" width="35" alt="Profile Picture">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li><a class="dropdown-item" href="./blocks/logout.php">Logout</a></li>
                                </ul>
                            </li>';
                } else {
                    echo '<li class="nav-item">

                                <a class="btn" href="login.php">Login</a>
        
                                </li>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>