 <!-- Monthly Breakdown Content Area -->
    <div id="monthly_breakdown" class="content hidden">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Monthly Breakdown</h2>
            <button
                class="bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-xl flex items-center"
                id="addMEntryBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm-2-7a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm-2 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                        clip-rule="evenodd" />
                </svg>
                Add Entry
            </button>
                
        </div>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Volunteer Id</th>
                    <th class="px-4 py-2">Monthly Breakdown Month</th>
                    <th class="px-4 py-2">Monthly Breakdown Hours</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $qry = "SELECT * FROM monthly_breakdown";

                $result = $connection->query($qry);

                $id = 1;

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['mb_id'];
                    $vhtid = $row['vht_id'];
                    $mbm = $row['mb_month'];
                    $mbh = $row['mb_hours'];

                    ?>
                <tr>
                    <td class="border px-4 py-2">
                        <?php echo $id?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $vhtid?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $mbm?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $mbh?>
                    </td>
                    <td class="border px-4 py-2">
                        <a href="editmonthly_breakdown.php?id=<?php echo $id ?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-2 rounded-lg mr-2">Edit</a>
                        <a href="php/deletemonthly_breakdown.php?id=<?php echo $id ?>" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded-lg">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Script To Add Entry Button To Click To => addmonthly_breakdownform.php -->
<script>
    document.getElementById('addMEntryBtn').addEventListener('click', function() {
    window.location.href = 'addmonthly_breakdownform.php'; 
});

</script>
