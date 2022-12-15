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
    <form method="post" action="add.php">
      <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" id="Name" name="Name">
        <div id="nameHelp" class="form-text">Enter the pokemon's name.</div>
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
    if($_POST['Name'] != null){
    $Name = $_POST['Name'];

    $sql = "insert into Pokemon (Name) value (?)";
    //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $Name);
        $stmt->execute();
    }
    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>