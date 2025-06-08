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
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'Coordinator') {
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
    <title>Coordinator Dashboard</title>
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: Arial, sans-serif;
        }
        
        body { 
            background-color: #f5f5f5;
        }
        
        /* Header styles */
        .logo {
            background-color: #1976D2;
            padding: 10px;
            display:flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }
        
        .logo img { 
            width: 100px; 
            height: 100px; 
        }
        
        .logo-text { 
            margin-left: 15px; 
        }
        
        /* Sidebar styles */
        .sidebar {
            width: 200px;
            background-color: #2196F3;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
            color: white;
        }
        
        .sidebar button {
            display: block;
            width: 100%;
            padding: 20px;
            border: none;
            background: none;
            font-size: 16px;
            cursor: pointer;
            color: white;
            text-align: left;
            transition: background-color 0.3s;
        }
        
        .sidebar button:hover,
        .sidebar .active {
            background-color: #0D47A1;
        }
        
        /* Main content area */
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        
        .dashboard-header {
            font-size: 22px;
            margin-bottom: 30px;
            color: #333;
        }
        
        /* Main content grid layout */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        /* Graph container */
        .graph-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 450px;
            width: 550px;
            margin: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            border: 1px dashed #ccc;
            grid-column: 1;
            grid-row: 1;
            
        }
        
        /* Right column container */
        .right-column {
            grid-column: 2;
            grid-row: 1 / span 2;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        /* Pending approvals section */
        .approvals-section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 200px;
            width: 400px;
        }

        
        .section-title {
            color: #1976D2;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .approval-item {
            margin-bottom: 15px;
        }
        
        .approval-count {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        
        .approval-label {
            color: #666;
            margin-top: 5px;
        }
        
        /* Stats section */
        .stats-section {
            align-content: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: 200px;
            width: 400px;
        }
        
        .stats-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <div style="display: flex; align-items: center;">
            <img src="OIP.jpeg" alt="MyPetakom Logo">
            <div class="logo-text">
                <h3>Welcome, <?php echo htmlspecialchars($username);?> (Coordinator)</h3>
            </div>
        </div>
        <h2>MyPetakom</h2>
    </div>
    
    <div class="sidebar">
        <button class="active">Dashboard</button>
        <button>My Profile</button>
        <button>Membership Approvals</button>
        <button>Event Management</button>
        <button>Merit Approvals</button>
        <button>Reports</button>
        <button onclick="confirmLogout()">LogOut</button>
    </div>
    
    <div class="content">
        <div class="dashboard-header">Dashboard</div>
        
        <div class="dashboard-grid">
            <!-- Graph Space (left) -->
            <div class="graph-container">
                [Graph Space - Insert your chart/graph visualization here]
            </div>
            
            <!-- Right column -->
            <div class="right-column">
                <!-- Pending Approvals Section (top right) -->
                <div class="approvals-section">
                    <div class="section-title">Pending Approval</div>
                    <div class="approval-item">
                        <div class="approval-count">5</div>
                        <div class="approval-label">Membership</div>
                    </div>
                    <div class="approval-item">
                        <div class="approval-count">3</div>
                        <div class="approval-label">Event Merits</div>
                    </div>
                </div>
                
                <!-- Stats Section (bottom right) -->
                <div class="stats-section">
                    <h2 style="padding-bottom: 20px;">Note</h2>
                    <div class="stats-item">- Total Members: 120</div>
                    <div class="stats-item">- Events this month: 3</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>