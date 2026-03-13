<?php
session_start();

if(!isset($_SESSION['user_id']))
{
header("Location: user_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

$user_id = $_SESSION['user_id'];

$sql = "SELECT events.title, events.event_date, events.location, bookings.booking_date
FROM bookings
JOIN events ON bookings.event_id = events.id
WHERE bookings.user_id='$user_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:linear-gradient(135deg,#3b82f6,#9333ea);
min-height:100vh;
}

/* NAVBAR */

nav{
background:#111827;
color:white;
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 40px;
}

nav h2{
color:#22c55e;
}

nav a{
color:white;
text-decoration:none;
background:#ef4444;
padding:8px 15px;
border-radius:6px;
}

nav a:hover{
background:#dc2626;
}

/* CONTAINER */

.container{
width:85%;
margin:auto;
margin-top:40px;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

h1{
text-align:center;
margin-bottom:30px;
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
}

th{
background:#2563eb;
color:white;
padding:12px;
}

td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

tr:hover{
background:#f1f5f9;
}

/* BUTTON */

.back{
display:inline-block;
margin-top:25px;
padding:10px 20px;
background:#22c55e;
color:white;
text-decoration:none;
border-radius:6px;
}

.back:hover{
background:#16a34a;
}

.no{
text-align:center;
padding:20px;
color:#666;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav>

<h2>EventHub</h2>

<a href="user_dashboard.php">Dashboard</a>

</nav>

<!-- CONTENT -->

<div class="container">

<h1>My Booked Events</h1>

<table>

<tr>
<th>Event Name</th>
<th>Event Date</th>
<th>Location</th>
<th>Booked On</th>
</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

echo "<tr>";

echo "<td>".$row['title']."</td>";
echo "<td>".$row['event_date']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['booking_date']."</td>";

echo "</tr>";

}

}else{

echo "<tr><td colspan='4' class='no'>No bookings yet</td></tr>";

}

?>

</table>

<center>
<a class="back" href="user_dashboard.php">← Back to Dashboard</a>
</center>

</div>

</body>
</html>