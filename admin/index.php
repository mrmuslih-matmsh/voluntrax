<?php include 'components/layouts/header.php';

include 'php/database.php';

// session_start();

// if (!isset($_SESSION['username'])) {
//   header("Location: login.php");

// }


?>


 
<?php  include 'components/layouts/navigation.php'; ?>

<!-- Main Content Area -->
<main class="container">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white p-4 py-14 flex">
            <ul>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('daily_breakdown')">Daily Breakdown</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('monthly_breakdown')">Monthly Breakdown</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('volunteer_hours_tracker')">Volunteer Hours Tracker</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('volunteer_statistics')">Volunteer Statistics</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('weekly_breakdown')">Weekly Breakdown</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('organizations_daily_breakdown')">Organizations Daily Breakdown</button>
                </li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('organizations_monthly_breakdown')">Organizations Monthly
                        Breakdown</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('organizations_weekly_breakdown')">Organizations Weekly Breakdown</button>
                </li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('organization_hours_tracker')">Organization Hours Tracker</button></li>
                <li><button
                        class="w-full bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-lg mb-2"
                        onclick="showContent('organization_statistics')">Organization Statistics</button></li>
            </ul>
        </div>

        <!-- Content Area -->
        <div id="contentArea" class="w-3/4 p-4 ml-4">

                
                <?php 
                
                // Dayly Breakdown
                include 'components/dayly_breakdown.php'; 

                // Monthly Breakdown 
                include 'components/monthly_breakdown.php'; 

                // Volunteer Hours Tracker
                include 'components/volunteer_hours_tracker.php'; 
                
                // Volunteer Statistics
                include 'components/volunteer_statistics.php'; 
                
                // Weekly Breakdown
                include 'components/weekly_breakdown.php'; 

                // Organizations Daily Breakdown
                include 'components/organizations_daily_breakdown.php'; 

                /// Organizations Monthly Breakdown
                include 'components/organizations_monthly_breakdown.php'; 

                // Organizations Weekly Breakdown
                include 'components/organizations_weekly_breakdown.php'; 

                // Organization Hours Tracker
                include 'components/organization_hours_tracker.php'; 

                // Organization Statistics
                include 'components/organization_statistics.php'; 
                
                ?>

        </div>
    </div>
</main>

<!-- Link To JavaScript -->
<script src="js/script.js"></script>
</body>

</html>