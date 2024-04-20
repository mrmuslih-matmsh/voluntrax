<?php


session_start();
include '../../database/db.php';

if (isset($_POST['feedback'])) {
    // Get form data
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $organization_name = $_POST['organization_name'];

    $sql_org = "SELECT org_id FROM organizations WHERE organization_name = '$organization_name'";
    $result_org = $connection->query($sql_org);

    if ($result_org->num_rows > 0) {
        // Fetch the first row (assuming organization name is unique) and get the org_id
        $row_org = $result_org->fetch_assoc();
        $org_id = $row_org['org_id'];

        // Insert feedback into database
        $sql_feedback = "INSERT INTO ratings (org_id, rating, review) VALUES ('$org_id', '$rating', '$review')";

        if ($connection->query($sql_feedback) === TRUE) {
            echo "<script>
                    alert('Feedback submitted successfully');
                    window.location.href = '../index.php';
                  </script>";
            exit();
        } else {
            echo "Error: ";
        }
    } else {
        echo "Organization not found";
    }
}

?>