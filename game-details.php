<?php
// Connect to database
include("db.php");

// Grab the id from the URL
$id = $_GET['id'];

// Get just that one game
$sql = "SELECT * FROM videogames WHERE game_id = {$id}";
$rst = mysqli_query($mysqli, $sql);
$a_row = mysqli_fetch_assoc($rst);
?>

<h1><?=$a_row['game_name']?></h1>
<p><?=$a_row['game_description']?></p>

<a href="list-games.php">&lt;&lt; Back to list</a>