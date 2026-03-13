<?php
session_start();

if(!isset($_SESSION['admin']))
{
header("Location: admin_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

$events = $conn->query("SELECT * FROM events");
$bookings = $conn->query("SELECT * FROM bookings");

$total_events = $events->num_rows;
$total_bookings = $bookings->num_rows;

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

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
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
}

nav h2{
color:#22c55e;
}

nav a{
text-decoration:none;
background:#ef4444;
color:white;
padding:8px 15px;
border-radius:6px;
}

/* CONTAINER */

.container{
width:90%;
margin:auto;
margin-top:40px;
background:white;
padding:40px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

/* STATS */

.cards{
display:flex;
gap:30px;
margin-bottom:40px;
}

.card{
flex:1;
background:#f9fafb;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
text-align:center;
transition:0.3s;
}

.card:hover{
transform:translateY(-8px);
}

.card h3{
font-size:35px;
color:#2563eb;
margin-bottom:10px;
}

/* ACTION BUTTONS */

.actions{
margin-bottom:30px;
}

.actions a{
display:inline-block;
margin-right:15px;
padding:10px 18px;
background:#22c55e;
color:white;
text-decoration:none;
border-radius:6px;
}

.actions a:hover{
background:#16a34a;
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
margin-top:20px;
}

th{
background:#2563eb;
color:white;
padding:12px;
}

td{
padding:10px;
text-align:center;
border-bottom:1px solid #ddd;
}

tr:hover{
background:#f1f5f9;
}

/* BUTTONS */

.edit{
background:#3b82f6;
color:white;
padding:6px 10px;
text-decoration:none;
border-radius:5px;
margin-right:5px;
}

.delete{
background:#ef4444;
color:white;
padding:6px 10px;
text-decoration:none;
border-radius:5px;
}

.edit:hover{
background:#2563eb;
}

.delete:hover{
background:#dc2626;
}

</style>

</head>

<body>

<nav>

<h2>Admin Panel</h2>

<a href="logout.php">Logout</a>

</nav>

<div class="container">

<h1>Welcome Admin 👋</h1>

<br>

<!-- STATISTICS -->

<div class="cards">

<div class="card">
<h3><?php echo $total_events; ?></h3>
<p>Total Events</p>
</div>

<div class="card">
<h3><?php echo $total_bookings; ?></h3>
<p>Total Bookings</p>
</div>

</div>

<!-- ACTIONS -->

<div class="actions">

<a href="create_event.php">+ Create Event</a>

<a href="view_bookings.php">View Bookings</a>

</div>

<!-- EVENTS TABLE -->

<h2>Manage Events</h2>

<table>

<tr>
<th>ID</th>
<th>Title</th>
<th>Date</th>
<th>Location</th>
<th>Price</th>
<th>Manager</th>
<th>Mobile</th>
<th>Actions</th>
</tr>

<?php

$events = $conn->query("SELECT * FROM events");

if($events->num_rows > 0){

while($row = $events->fetch_assoc()){

echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td>".$row['event_date']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>₹".$row['price']."</td>";
echo "<td>".$row['manager_name']."</td>";
echo "<td>".$row['manager_mobile']."</td>";

echo "<td>
<a class='edit' href='edit_event.php?id=".$row['id']."'>Edit</a>
<a class='delete' href='delete_event.php?id=".$row['id']."' 
onclick=\"return confirm('Delete this event?')\">Delete</a>
</td>";

echo "</tr>";

}

}else{

echo "<tr><td colspan='8'>No events found</td></tr>";

}

?>

</table>

</div>

</body>
</html>