<?php
session_start();

$host = 'localhost';
$dbname = 'login_system';
$usernameDB = 'root';
$passwordDB = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Login logic continues here...
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login WHERE Username = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username, $password]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['username'] = $user['Username'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['loggedin'] = true;

    $_SESSION['message'] = "Login successful!";
    $_SESSION['message_type'] = "success";

    switch(strtolower($user['role'])) {
      case 'student':
          header("Location: stDashboard.php");
          break;
      case 'coordinator':
          header("Location: cdDashboard.php");
          break;
      case 'advisor':
          header("Location: adDashboard.php");
          break;
      // Add more roles as needed
      default:
          header("Location: defaultDashboard.php");
          break;
  }
  exit();

} else {
    $_SESSION['message'] = "Invalid credentials, please try again.";
    $_SESSION['message_type'] = "error";
    header("Location: LoginPage.php");
    exit();
}
?>