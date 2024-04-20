<?php
session_start();
include '../../database/db.php';

$opp_id = ($_GET['opp_id']);

if (isset($_GET['opp_id'])) {
    $sql = "DELETE FROM opportunities WHERE opp_id = $opp_id ;";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../dashboard.php");
    }

}
?>