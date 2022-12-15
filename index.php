<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>Pokemon</h1>
    <div class="btn-group">
        <a class="btn btn-secondary" href="/index.php">Home</a>
        <a class="btn btn-primary" href="/add.php">Add</a>
        <a class="btn btn-danger" href="/delete.php">Delete</a>
    </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>HP</th>
      <th>Atk</th>
      <th>Def</th>
      <th>SpAtk</th>
      <th>SpDef</th>
      <th>Speed</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
$servername = "localhost";
$username = "herdeju1_FinalProject";
$password = "U\$gvulNHsye?";
$dbname = "herdeju1_FinalProject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from Pokemon";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["ID"]?></td>
    <td><?=$row["Name"]?></td>
    <td><?=$row["HP"]?></td>
    <td><?=$row["Atk"]?></td>
    <td><?=$row["Def"]?></td>
    <td><?=$row["SpAtk"]?></td>
    <td><?=$row["SpDef"]?></td>
    <td><?=$row["Speed"]?></td>
    <td>
        <form method="get" action="edit.php">
            <input type="hidden" id="ID" name="ID" value="<? echo $row["ID"]?>"></input>
            <button type="submit" class="btn btn-sm btn-warning">Edit</button>
        </form>        
    </td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
