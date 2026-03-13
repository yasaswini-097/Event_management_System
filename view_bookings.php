<?php
session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

$sql = "SELECT users.name, events.title, bookings.booking_date
FROM bookings
JOIN users ON bookings.user_id = users.id
JOIN events ON bookings.event_id = events.id";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>View Bookings</title>

<style>

body{
font-family:Arial;
background:#f1f5f9;
margin:0;
}

/* Navbar */

nav{
background:#111827;
color:white;
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
}

nav h2{
color:#22c55e;
}

nav a{
color:white;
text-decoration:none;
background:#ef4444;
padding:8px 15px;
border-radius:5px;
}

/* Container */

.container{
width:90%;
margin:auto;
margin-top:40px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

th,td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

th{
background:#2563eb;
color:white;
}

tr:hover{
background:#f1f5f9;
}

.back{
display:inline-block;
margin-top:20px;
padding:10px 20px;
background:#22c55e;
color:white;
text-decoration:none;
border-radius:6px;
}

</style>

</head>

<body>

<nav>

<h2>Admin Panel</h2>

<a href="logout.php">Logout</a>

</nav>

<div class="container">

<h2>Event Bookings</h2>

<br>

<table>

<tr>
<th>User Name</th>
<th>Event Title</th>
<th>Booking Date</th>
</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td>".$row['booking_date']."</td>";
echo "</tr>";

}

}
else{

echo "<tr><td colspan='3'>No bookings yet</td></tr>";

}

?>

</table>

<a class="back" href="admin_dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>