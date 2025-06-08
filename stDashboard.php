<?php

session_start();
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';
//exit();

if (isset($_SESSION['message']) && $_SESSION['message_type'] === 'success') {
    $message = $_SESSION['message'];
    echo "<script>alert('$message');</script>";
    // Clear message so it doesn't show again on refresh
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}

// Check if user is logged in as student
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'Student') {
    header("Location: LoginPage.html");
    exit();
}


$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "logout.php";
            }
        }
    </script>
   
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background-color: #f5f5f5; }

        .logo {
            background-color: aquamarine;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo img { width: 100px; height: 100px; }
        .logo-text { margin-left: 15px; }

        .sidebar {
            width: 200px;
            background-color: aquamarine;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }

        .sidebar button {
            display: block;
            width: 100%;
            padding: 20px;
            border: none;
            background: none;
            font-size: 16px;
            cursor: pointer;
            color: black;
            text-align: left;
        }

        .sidebar button:hover,
        .sidebar .active {
            background-color: cadetblue;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .dashboard-header {
            font-size: 22px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .button {
            padding: 10px 15px;
            margin-top: 10px;
            background-color: #2196F3;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0b7dda;
        }

        .events {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="logo">
    <div style="display: flex; align-items: center;">
        <img src="OIP.jpeg" alt="MyPetakom Logo">
        <div class="logo-text">
            <h3>Welcome, <?php echo htmlspecialchars($username); ?> (Student)</h3>
        </div>
    </div>
    <h2>MyPetakom</h2>
</div>

<div class="sidebar">
    <button class="active">Dashboard</button>
    <button>My Profile</button>
    <a href="stMembership.php">
    <button>Apply Membership</button>
    </a>
    <button>My Event</button>
    <button>My Merits</button>
    <button onclick="confirmLogout()">LogOut</button>
</div>

<div class="content">
    <div class="dashboard-header">Dashboard</div>

    <div class="card">
        <h3>Membership Status: <span style="color: green;">Approved</span></h3>
        <p>Expired: 2025-12-31</p>

        <button class="button">Upload New Student Card</button><br>
        <button class="button">View Membership Certificate</button>
    </div>

    <div class="events">
        <h3>Upcoming Events</h3>
        <ul>
            <li>Event 1 (2025-06-01)</li>
            <li>Event 2 (2025-06-15)</li>
        </ul>
    </div>
</div>

</body>
</html>
