<?php include 'components/layouts/header.php';

include 'php/database.php';


// Check if the 'save' button is clicked
if (isset($_POST['save'])) {

    // Include the database connection file
  
    // Extract form data
    $totalh = $_POST['totalh'];
    $oppc = $_POST['oppc'];
    $impacta = $_POST['impacta'];
    $lastup = $_POST['lastup'];
    $intid = $_POST['intid'];

    // Prepare the insert query
    $qry = "INSERT INTO volunteer_statistics (total_hours, opportunities_completed, impact_achieved, last_updated, int_id) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)";

    // Prepare the statement
    $stmt = $connection->prepare($qry);
  
    // Bind parameters
    $stmt->bind_param("isss", $totalh, $oppc, $impacta, $intid);
  
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
          window.location.href = 'addvolunteer_statisticsform.php';
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
    <h2 class="text-2xl font-semibold mb-4">Add Volunteer Statisticsr</h2>
    <form action="#" method="POST" class="w-full">
        <div class="mb-4">
            <label for="th" class="block text-sm font-medium text-gray-700">Total Hours</label>
            <input type="text" id="th" name="totalh" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="oc" class="block text-sm font-medium text-gray-700">Opportunities Completed</label>
            <input type="text" id="oc" name="oppc" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="ia" class="block text-sm font-medium text-gray-700">Impact Achieved</label>
            <input type="text" id="ia" name="impacta" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="lp" class="block text-sm font-medium text-gray-700">Last Updated</label>
            <input type="text" id="lp" name="lastup" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" readonly>
        </div>
        <div class="mb-4">
            <label for="volunteer_id" class="block text-sm font-medium text-gray-700">Individuals ID</label>
            <select id="volunteer_id" name="intid" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="">Select Individuals ID</option>

                <?php

                include 'php/database.php';

                $qry = "SELECT * FROM individuals";

                $result = $connection->query($qry);

                while ($row = mysqli_fetch_array($result)) {
                    $intid = $row['int_id'];

                ?>
                <option><?php echo ($intid)?></option>

                <?php
                }
                ?>
            </select>
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

<!-- Link To JavaScript -->
<script src="js/time.js"></script>

</body>
</html>
