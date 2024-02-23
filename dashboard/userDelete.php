<?php
session_start();
require "../database/database.php";

$userId = $_GET["id"];
$sql = "DELETE FROM users WHERE id = $userId";
$query = mysqli_query($dbConnect, $sql);

$_SESSION["success"] = "User deleted successfully.";
header("location: userList.php");

?>