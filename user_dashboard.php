<?php
session_start();

if(!isset($_SESSION['user_id']))
{
header("Location: user_login.php");
}

$conn = new mysqli("localhost","root","","events_managements1");

/* SEARCH FEATURE */

if(isset($_GET['search']))
{
$search = $_GET['search'];

$sql = "SELECT * FROM events 
WHERE title LIKE '%$search%' 
OR location LIKE '%$search%'";
}
else
{
$sql = "SELECT * FROM events";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>

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

.menu a{
text-decoration:none;
color:white;
margin-left:15px;
padding:8px 14px;
border-radius:6px;
transition:0.3s;
}

.menu a:hover{
background:#22c55e;
}

/* WELCOME */

.welcome{
padding:30px 40px;
color:white;
}

/* SEARCH */

.search-box{
text-align:center;
margin-bottom:30px;
}

.search-box input{
padding:10px;
width:250px;
border-radius:6px;
border:none;
}

.search-box button{
padding:10px 15px;
border:none;
background:#22c55e;
color:white;
border-radius:6px;
cursor:pointer;
}

/* CONTAINER */

.container{
width:90%;
margin:auto;
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

/* EVENTS GRID */

.events{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:25px;
}

/* EVENT CARD */

.card{
background:#f9fafb;
border-radius:12px;
overflow:hidden;
box-shadow:0 6px 18px rgba(0,0,0,0.2);
transition:0.4s;
}

.card:hover{
transform:translateY(-10px) scale(1.03);
}

.card img{
width:100%;
height:180px;
object-fit:cover;
}

.card-content{
padding:18px;
}

.card-content h3{
margin-bottom:10px;
color:#111827;
}

.card-content p{
margin-bottom:6px;
color:#555;
font-size:14px;
}

/* BOOK BUTTON */

.book{
display:inline-block;
margin-top:10px;
background:#3b82f6;
color:white;
padding:8px 15px;
text-decoration:none;
border-radius:6px;
font-size:14px;
}

.book:hover{
background:#2563eb;
}

.price{
color:#16a34a;
font-weight:bold;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav>

<h2>EventHub</h2>

<div class="menu">

<a href="user_dashboard.php">Home</a>
<a href="user_bookings.php">My Bookings</a>
<a href="logout.php">Logout</a>

</div>

</nav>

<!-- WELCOME -->

<div class="welcome">

<h2>Welcome <?php echo $_SESSION['user_name']; ?> 👋</h2>
<p>Explore and book your favorite events</p>

</div>

<!-- SEARCH -->

<div class="search-box">

<form method="GET">

<input type="text" name="search" placeholder="Search events or location">

<button type="submit">Search</button>

</form>

</div>

<!-- EVENTS -->

<div class="container">

<h2>Available Events</h2>

<br>

<div class="events">

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

echo "<div class='card'>";

echo "<img src='https://images.unsplash.com/photo-1511578314322-379afb476865'>";

echo "<div class='card-content'>";

echo "<h3>".$row['title']."</h3>";

echo "<p>".$row['description']."</p>";

echo "<p><b>Date:</b> ".$row['event_date']."</p>";

echo "<p><b>Location:</b> ".$row['location']."</p>";

echo "<p class='price'>Price: ₹".$row['price']."</p>";

echo "<p><b>Manager:</b> ".$row['manager_name']."</p>";

echo "<p><b>Mobile:</b> ".$row['manager_mobile']."</p>";

echo "<a class='book' href='book_event.php?event_id=".$row['id']."'>Book Event</a>";

echo "</div>";

echo "</div>";

}

}else{

echo "<p>No events available</p>";

}

?>

</div>

</div>

</body>
</html>