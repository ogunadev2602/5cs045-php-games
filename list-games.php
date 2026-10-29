
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Games</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- Purple colours (Bootstrap has no purple class, so we make our own) -->
  <style>
    body {
      background-color: #f3eefc;      /* very light purple page */
    }
    h1 {
      color: #6f42c1;                 /* purple heading */
    }
    .card-purple {
      border: 2px solid #6f42c1;
    }
    .card-purple .card-header {
      background-color: #6f42c1;      /* purple top strip on each card */
      color: white;
      font-weight: bold;
    }
    .btn-purple {
      background-color: #6f42c1;
      border-color: #6f42c1;
      color: white;
    }
    .btn-purple:hover {
      background-color: #59339d;      /* darker purple on hover */
      border-color: #59339d;
      color: white;
    }
  </style>
</head>
<body>
<div class="container my-4">

<h1>List of ALL my games!!!</h1>

<a href="add-game-form.php" class="btn btn-purple">Add a game</a>

<form action="search-games.php" method="post" class="d-flex gap-2 my-3">
  <input type="text" name="keywords" placeholder="Search" class="form-control">
  <input type="submit" value="Go!" class="btn btn-purple">
</form>

<?php
// Connect to database
include("db.php");

// Run SQL query
$sql = "SELECT * FROM videogames ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);
?>

<!-- Grid of cards: 1 per row on phones, 2 on tablets, 3 on laptops -->
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
<?php while($a_row = mysqli_fetch_assoc($results)): ?>
  <div class="col">
    <div class="card card-purple h-100">
      <div class="card-header">
        Rating: <?=$a_row['rating']?>/10
      </div>
      <div class="card-body">
        <h5 class="card-title"><?=$a_row['game_name']?></h5>
        <p class="card-text"><?=$a_row['game_description']?></p>
        <p class="card-text text-muted">
          Released: <?=date('j M Y', strtotime($a_row['released_date']))?>
        </p>
      </div>
      <div class="card-footer bg-transparent">
        <a href="game-details.php?id=<?=$a_row['game_id']?>" class="btn btn-purple btn-sm">View details</a>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

</div>
</body>
</html>