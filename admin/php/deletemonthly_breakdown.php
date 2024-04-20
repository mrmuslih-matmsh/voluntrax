<?php 

include '../components/layouts/header.php';
include '../php/database.php';


if (isset($_GET['id']))
{
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query
    $sql = "DELETE FROM monthly_breakdown WHERE mb_id = '$id'";
    
    if(mysqli_query($connection,$sql)) {
        echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Deleded successfully',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        // Redirect to a new page after success
        window.location.href = '../index.php';
    });
    </script>";
    } else{
        // Display error message using SweetAlert
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Deleded failed!',
        showConfirmButton: false,
        timer: 1500
    });
    </script>";
    }

    $connection->close();
        
}


?>