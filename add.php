<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Pokemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>Add Pokemon</h1>
    <div class="btn-group">
        <a class="btn btn-secondary" href="/index.php">Home</a>
        <a class="btn btn-primary" href="/add.php">Add</a>
        <a class="btn btn-danger" href="/delete.php">Delete</a>
    </div>
    <form method="post" action="add.php">
      <div class="mb-3">

        <label for="ID" class="form-label">ID</label>
        <input type="text" class="form-control" id="ID" name="ID">

        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" id="Name" name="Name">

        <label for="HP" class="form-label">Health Points</label>
        <input type="text" class="form-control" id="HP" name="HP">

        <label for="Atk" class="form-label">Attack</label>
        <input type="text" class="form-control" id="Atk" name="Atk">

        <label for="Def" class="form-label">Defense</label>
        <input type="text" class="form-control" id="Def" name="Def">

        <label for="SpAtk" class="form-label">Special Attack</label>
        <input type="text" class="form-control" id="SpAtk" name="SpAtk">

        <label for="SpDef" class="form-label"> Special Defense</label>
        <input type="text" class="form-control" id="SpDef" name="SpDef">

        <label for="Speed" class="form-label">Speed</label>
        <input type="text" class="form-control" id="Speed" name="Speed">

        <label for="Type1" class="form-label">Type 1</label>
        <input type="text" class="form-control" id="Type1" name="Type1">

        <label for="Type2" class="form-label">Type 2</label>
        <input type="text" class="form-control" id="Type2" name="Type2">

      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $ID = $_POST["ID"];
            $Name = $_POST["Name"];
            $HP = $_POST["HP"];
            $Atk = $_POST["Atk"];
            $Def = $_POST["Def"];
            $SpAtk = $_POST["SpAtk"];
            $SpDef = $_POST["SpDef"];
            $Speed = $_POST["Speed"];
            $Type1 = $_POST["Type1"];
            $Type2 = $_POST["Type2"];

            $stmt = $conn->prepare("INSERT INTO Pokemon (ID, Name, HP, Atk, Def, SpAtk, SpDef, Speed, Type1, Type2) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('isiiiiiiss',  $ID, $Name, $HP, $Atk, $Def, $SpAtk, $SpDef, $Speed, $Type1, $Type2);

            $stmt->execute();
            printf("%d row inserted.\n", $stmt->affected_rows);        
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>