<?php

session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

$id = $_GET['id'];

$conn->query("DELETE FROM events WHERE id='$id'");

header("Location: admin_dashboard.php");

?>