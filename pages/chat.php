<?php
session_start();
include '../database/db.php';

$user_type = $_SESSION['user_type'];
$email = $_SESSION['email'];

if ($user_type == 'individual') {
    $sql = "SELECT * FROM individuals WHERE email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["int_id"];
        }
    }

} elseif ($user_type == 'organization') {
    $sql = "SELECT * FROM organizations WHERE email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["org_id"];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Opportunities | Voluntrax.com</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- Icon CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>

    <section class="navigation-bar">
        <?php include './blocks/navbar.php' ?>
    </section>


    <section class="chat-section">
        <main class="content">
            <div class="container p-0">

                <h1 class="h3 mb-3">Messages</h1>

                <div class="card">
                    <div class="row g-0">
                        <div class="col-12 col-lg-5 col-xl-3 border-right">

                            <div class="px-4 d-none d-md-block">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control my-3" placeholder="Search...">
                                    </div>
                                </div>
                            </div>

                            <!-- Private Chats Section -->
                            <div class="px-4 d-none d-md-block mb-3">
                                <h6 class="text-muted mb-3">Private Chats</h6> <!-- Add a title -->
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Fetch private chats from the database
                                        $sql = "SELECT pc.private_chat_id, CONCAT(sender.full_name) AS sender_name
                                                    FROM private_chats pc JOIN individuals sender ON pc.sender_id = sender.int_id";

                                        $result = $connection->query($sql);

                                        // Display private chats as list items
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $sender_name = $row["sender_name"];
                                                $private_chat_id = $row["private_chat_id"];
                                                echo '<a href="chat.php?private_chat_id=' . $private_chat_id . '&sender_name=' . urlencode($sender_name) . '" class="list-group-item list-group-item-action border-0">';
                                                echo '<div class="d-flex align-items-start">';
                                                echo '<img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="Group" width="40" height="40">';
                                                echo '<div class="flex-grow-1 ml-3">' . $sender_name . '<div class="small">Private</div> </div>';
                                                echo '</div>';
                                                echo '</a>';
                                            }
                                        } else {
                                            echo "No private chats found";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Group Chats Section -->
                            <div class="px-4 d-none d-md-block mb-3">
                                <h6 class="text-muted mb-3">Group Chats</h6> <!-- Add a title -->
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Fetch group chats from the database
                                        $sql = "SELECT DISTINCT group_name FROM group_chat";
                                        $result = $connection->query($sql);

                                        // Display group chats as list items
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $group_name = $row["group_name"];
                                                echo '<a href="chat.php?group_name=' . $group_name . '" class="list-group-item list-group-item-action border-0">';
                                                echo '<div class="d-flex align-items-start">';
                                                echo '<img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="Group" width="40" height="40">';
                                                echo '<div class="flex-grow-1 ml-3">' . $group_name . '<div class="small">Group</div> </div>';
                                                echo '</div>';
                                                echo '</a>';
                                            }
                                        } else {
                                            echo "No group chats found";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <hr class="d-block d-lg-none mt-1 mb-0">
                        </div>

                        <div class="col-12 col-lg-7 col-xl-9">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                            class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong>
                                            <?php
                                            if (isset($_GET['group_name'])) {
                                                echo htmlspecialchars($_GET['group_name']);
                                            } else if (isset($_GET['sender_name'])) {
                                                echo htmlspecialchars($_GET['sender_name']);
                                            } else {
                                                echo ("Select the chat");
                                            }
                                            ?>
                                        </strong>
                                        <div class="text-muted small"><em>chat here</em></div>
                                    </div>
                                    <div>
                                        <button class="btn btn-light border btn-lg px-3"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-horizontal feather-lg">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative">
                                <div class="chat-messages p-4">

                                    <?php
                                    // Check if the 'group_name' parameter is set in the URL
                                    if (isset($_GET['group_name'])) {
                                        // Fetch messages from the database for the specified group
                                        $group_name = $_GET['group_name'];
                                        $sql = "SELECT gc.*, sender.full_name AS sender_name, sender.profile_picture
                                                FROM group_chat gc
                                                JOIN individuals sender ON gc.participant_id = sender.int_id
                                                WHERE gc.group_name = '$group_name'
                                                ORDER BY gc.timestamp DESC";
                                        $result = $connection->query($sql);

                                        // Display messages
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $message_content = $row["message_content"];
                                                $sender = $row["participant_id"];
                                                $sender_name = $row["sender_name"];
                                                $profile=$row["profile_picture"];
                                                $timestamp = $row["timestamp"];

                                                // Determine the CSS class for the message box based on the sender
                                                $message_class = ($sender == $id) ? "chat-message-right" : "chat-message-left";

                                                // Output the message HTML
                                                echo "<div class='$message_class pb-4'>";
                                                echo "<div>";
                                                echo "<img src='../assets/images/profile_pictures/individual/$profile' class='rounded-circle mr-1' alt='Sender' width='40' height='40'>";
                                                echo "<div class='text-muted small text-nowrap mt-2'>$timestamp</div>";
                                                echo "</div>";
                                                echo "<div class='flex-shrink-1 bg-light rounded py-2 px-3 " . (($sender == $id) ? "mr-3" : "ml-3") . "'>";
                                                echo "<div class='font-weight-bold mb-1'>$sender_name</div>";
                                                echo "$message_content";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        } else {
                                            // If no messages found for the group, display a message
                                            echo "No messages found for $group_name";
                                        }
                                    } else {

                                    }

                                    if (isset($_GET['private_chat_id'])) {
                                        // Fetch messages from the database for the specified private chat
                                        $private_chat_id = $_GET['private_chat_id'];
                                        $sql = "SELECT pc.*, sender.full_name AS sender_name, sender.profile_picture
                                        FROM private_chats pc
                                        JOIN individuals sender ON pc.sender_id = sender.int_id
                                        WHERE pc.private_chat_id = $private_chat_id
                                        ORDER BY pc.timestamp DESC";

                                        $result = $connection->query($sql);

                                        // Display messages
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $message_content = $row["message_content"];
                                                $sender = $row["sender_id"];
                                                $sender_name = $row["sender_name"];
                                                $timestamp = $row["timestamp"];
                                                $profile = $row["profile_picture"];

                                                // Determine the CSS class for the message box based on the sender
                                                $message_class = ($sender == $id) ? "chat-message-right" : "chat-message-left";

                                                // Output the message HTML
                                                echo "<div class='$message_class pb-4'>";
                                                echo "<div>";
                                                echo "<img src='../assets/images/profile_pictures/individual/$profile' class='rounded-circle mr-1' alt='Sender' width='40' height='40'>";
                                                echo "<div class='text-muted small text-nowrap mt-2'>$timestamp</div>";
                                                echo "</div>";
                                                echo "<div class='flex-shrink-1 bg-light rounded py-2 px-3 " . (($sender == $id) ? "mr-3" : "ml-3") . "'>";
                                                echo "<div class='font-weight-bold mb-1'>$sender_name</div>";
                                                echo "$message_content";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        } else {
                                            // If no messages found for the private chat, display a message
                                            echo "No messages found for this private chat";
                                        }
                                    } else {

                                    }


                                    ?>
                                </div>
                            </div>

                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type your message">
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <!-- Footer-->
    <footer class="footer">
        <?php include './blocks/footer.php' ?>
    </footer>


    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>