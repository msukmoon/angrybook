<?php


// Start the session first
session_start();

if ((isset($_POST['id'])) && ($_POST['id'] != "")) {
    $id = $_POST['id'];
}
else {
    $id = "";
}

if ((isset($_POST['password'])) && ($_POST['password'] != "")) {
    $password = md5($_POST['password']);
}
else {
    $password = "";
}

if ((isset($_POST['firstName'])) && ($_POST['firstName'] != "")) {
    $firstName = $_POST['firstName'];
}
else {
    $firstName = "";
}

if ((isset($_POST['lastName'])) && ($_POST['lastName'] != "")) {
    $lastName = $_POST['lastName'];
}
else {
    $lastName = "";
}

if ((isset($_POST['country'])) && ($_POST['country'] != "")) {
    $country = $_POST['country'];
}
else {
    $country = "";
}

if ((isset($_POST['state'])) && ($_POST['state'] != "")) {
    $state = $_POST['state'];
}
else {
    $state = "";
}

if ((isset($_POST['city'])) && ($_POST['city'] != "")) {
    $city = $_POST['city'];
}
else {
    $city = "";
}

if ((isset($_POST['countryCode'])) && ($_POST['countryCode'] != "")) {
    $countryCode = $_POST['countryCode'];
}
else {
    $countryCode = "";
}

if ((isset($_POST['areaCode'])) && ($_POST['areaCode'] != "")) {
    $areaCode = $_POST['areaCode'];
}
else {
    $areaCode = "";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/fabicon.png">

    <title>Angrybook</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top navbar-dark bg-dark" style="background-color: #a00000;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color: #f7c8d0;" href="index.php">Angrybook</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <form method="post" action="login.php" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" name="id" placeholder="ID" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control" required="required">
                </div>
                <button type="submit" class="btn btn-success"style="background-color: #5cb85c;">Sign in</button>
          </form>

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: rgba(235, 235, 235, 0.85);">
      <div class="container">

        <?php
          @ini_set('memory_limit', '512M');
          
          $host = 'localhost'; 
          $user = 'cse305';
          $pw = '305final';
          $dbName = 'cse305';
          $mysqli = new mysqli($host, $user, $pw, $dbName);

          if ($mysqli->connect_error) die($mysqli->connect_error);


          $sql = "INSERT INTO Users (ID, password, firstName, lastName, city) VALUES ('$id', '$password', '$firstName', '$lastName', '$city')";

          $result = $mysqli->query($sql);

          if (!$result) {
            echo "<h1>Regester Failed!</h1>";
            echo "<p>Try again.</p>";
            echo "<input type='button' value='Back' class='btn btn-danger' onclick='javascripｔ:history.go(-1)'>";
            echo "<br>";
            die ("Database access failed: " . $mysqli->error);
          }
          else
          {
            echo "<h1>Welcome, $firstName $lastName!</h1>";
            echo "<p>You are now a user of Angrybook!</p>";
            echo "<input type='button' value='Back' class='btn btn-success' onclick='javascripｔ:history.go(-1)'>";
          }


          $sql = "INSERT INTO cityState (city, state) VALUES ('$city', '$state')";

          $result = $mysqli->query($sql);


          $sql = "INSERT INTO countryCountryCode (country, countryCode) VALUES ('$country', '$countryCode')";

          $result = $mysqli->query($sql);

          $sql = "INSERT INTO stateCountryArea (state, country, areaCode) VALUES ('$state', '$country', '$areaCode')";

          $result = $mysqli->query($sql);

        ?>

      </div>
    </div>

    <hr>

     
    <footer class="container">
      <p>CSE 305 Final Project: Haneul Lee, Ji Won Choi, Myungsuk Moon </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
