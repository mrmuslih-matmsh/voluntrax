<?php include 'components/layouts/header.php';

include 'php/database.php';


// Check if the 'save' button is clicked
if (isset($_POST['save'])) {

    // Include the database connection file
  
    // Extract form data
    $vhtid = $_POST['vhtid'];
    $mbm = $_POST['mbm'];
    $mbh = $_POST['mbh'];
    
    // Prepare the insert query
    $qry = "INSERT INTO monthly_breakdown (mb_id, vht_id, mb_month, mb_hours) VALUES (NULL, ?, ?, ?)";
  
    // Prepare the statement
    $stmt = $connection->prepare($qry);
  
    // Bind parameters
    $stmt->bind_param("iss", $vhtid, $mbm, $mbh);
  
    // Execute the statement
    $res = $stmt->execute();
  
    // Check if the execution was successful
    if ($res) {
      // Display success message using SweetAlert
      echo "<script>
      Swal.fire({
          icon: 'success',
          title: 'Saved successfully',
          showConfirmButton: false,
          timer: 1500
      }).then(() => {
          // Redirect to a new page after success
          window.location.href = 'addmonthly_breakdownform.php';
      });
      </script>";
    } else {
      // Display error message using SweetAlert
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Save failed!',
          showConfirmButton: false,
          timer: 1500
      });
      </script>";
    }
  
    // Close the statement
    $stmt->close();
    // Close the database connection
    $connection->close();
  }

?>

<div class="max-w-md mx-auto bg-white rounded p-6 shadow-md flex flex-col items-center">
    <h2 class="text-2xl font-semibold mb-4">Add Monthly Breakdown</h2>
    <form action="#" method="POST" class="w-full">
        <div class="mb-4">
            <label for="volunteer_id" class="block text-sm font-medium text-gray-700">Volunteer Hours ID</label>
            <select id="volunteer_id" name="vhtid" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="">Select Volunteer Hours ID</option>

                <?php

                include 'php/database.php';

                $qry = "SELECT * FROM volunteer_hours_tracker";

                $result = $connection->query($qry);

                while ($row = mysqli_fetch_array($result)) {
                    $vhtid = $row['vht_id'];

                ?>
                <option><?php echo ($vhtid)?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="Month" class="block text-sm font-medium text-gray-700">Monthly Breakdown Month</label>
            <input type="text" id="Month" name="mbm" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="hours" class="block text-sm font-medium text-gray-700">Monthly Breakdown Hours</label>
            <input type="text" id="hours" name="mbh" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" name="save" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mr-2">Add</button>
            <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('cancelBtn').addEventListener('click', function() {
    window.location.href = 'index.php'; 
});
</script>


</body>
</html>
