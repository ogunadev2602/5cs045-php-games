<h1>Search results</h1>

<?php
// Connect to database
include("db.php");

// Read what was typed in the search box
$keywords = $_POST['keywords'];

// Find games whose name contains the keywords
$sql = "SELECT * FROM videogames
        WHERE game_name LIKE '%{$keywords}%'
        ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);
?>

<table>
<?php while($a_row = mysqli_fetch_assoc($results)): ?>
  <tr>
    <td><a href="game-details.php?id=<?=$a_row['game_id']?>"><?=$a_row['game_name']?></a></td>
    <td><?=$a_row['rating']?></td>
  </tr>
<?php endwhile; ?>
</table>

<a href="list-games.php">&lt;&lt; Back to list</a>