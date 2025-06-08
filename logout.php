<?php
session_start();
$_SESSION['message'] = "You have been successfully logged out.";
$_SESSION['message_type'] = "success";
session_destroy();
header("Location: LoginPage.php");
exit();
?>