<?php
/**
 * Authors:
 * Myungsuk Moon (myungsuk.moon@stonybrook.edu)
 * Haneul Lee (haneul.lee.1@stonybrook.edu)
 * Ji Won Choi (jiwon.choi.2@stonybrook.edu)
 */

// Start the session first
session_start();

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

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #a00000;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         
             <!--  수정된 부분  -->

            <?php
            /**
             * Authors:
             * Myungsuk Moon (myungsuk.moon@stonybrook.edu)
             * Haneul Lee (haneul.lee.1@stonybrook.edu)
             * Ji Won Choi (jiwon.choi.2@stonybrook.edu)
             */

              if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                  // Logged in user id
                  $id = $_SESSION['id'];

                  // Login
                  $host = 'localhost';
                  $user = 'cse305';
                  $pw = '305final';
                  $dbName = 'cse305';
                  $mysqli = new mysqli($host, $user, $pw, $dbName);

                  // Get all notifications of the chosen user
                  $sql = "SELECT * FROM notice WHERE uid='$id';";
                  $result = $mysqli->query($sql);

                  // Number of notifications
                  $numrows = $result->num_rows;

                  if($numrows != 0)
                  {
                     echo "<table>";
                        echo "<tr>";
                          echo "<td>";
                            echo "<span class='sr-only'>Toggle navigation</span>";
                            echo "<span class='icon-bar'></span>";
                            echo "<span class='icon-bar'></span>";
                            echo "<span class='icon-bar'></span>";
                          echo "</td>";
                          echo "<td>";
                           echo "<span class='badge badge-light' style='margin-left: 7px;'>$numrows</span>";
                          echo "</td>";
                        echo "</tr>";
                      echo "</table>";
                  }
                  else
                  {
                    echo "<span class='sr-only'>Toggle navigation</span>";
                    echo "<span class='icon-bar'></span>";
                    echo "<span class='icon-bar'></span>";
                    echo "<span class='icon-bar'></span>";
                  }
              }
            ?>
            <!--  수정된 부분  -->
          </button>
          <a class="navbar-brand" href="timeLine.php" style="color: #f7c8d0;">Angrybook</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form method="post" action="search.php" class="navbar-form navbar-left">
              <div class="form-group">
                  <input type="text" name="search" placeholder="Search User by First Name" class="form-control" required="required">
              </div>
              <button type="submit" class="btn btn-success">Search</button>
          </form>
          <form method="post" action="logout.php" class="navbar-form navbar-right">
              <button type="submit" class="btn btn-danger">Sign Out</button>
          </form>
                    <?php include("notice.php"); ?>

          <form method="post" action="findfriends.php" class="navbar-form navbar-right">
              <button type="submit" class="btn btn-danger">Find Friends</button>
          </form>
          <form method="post" action="timeLine.php" class="navbar-form navbar-right">
              <button type="submit" class="btn btn-info">Home</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">


<?php

    // Check if the user is logged in
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

        @ini_set('memory_limit', '512M');

        // Login
        $host = 'localhost';
        $user = 'cse305';
        $pw = '305final';
        $dbName = 'cse305';
        $mysqli = new mysqli($host, $user, $pw, $dbName);

        // Target user's personal page
        $targetID = $_GET['targetID'];

        // Logged in user
        $id = $_SESSION['id'];

        if ((isset($_POST['pid'])) && ($_POST['pid'] != "")) {
            $pid = $_POST['pid'];

            if ((isset($_POST['comment'])) && ($_POST['comment'] != "")) {
                $comment = $_POST['comment'];
                $comment = addslashes($comment);

                $sql = "INSERT INTO Comments (uid, pid, cid, content) values('$id', $pid, 0, '$comment');";
                $result = $mysqli->query($sql);
            }
            else {
                $sql = "SELECT * FROM dislike WHERE uid = '$id' AND pid = $pid;";
                $result = $mysqli->query($sql);
                $row = mysqli_fetch_array($result);

                if ($row != null) {
                    $sql = "DELETE FROM dislike WHERE uid = '$id' AND pid = $pid;";
                    $result = $mysqli->query($sql);
                    $sql = "UPDATE Posts SET disnum = disnum - 1 WHERE pid = $pid;";
                    $result = $mysqli->query($sql);
                }
                else {
                    $sql = "INSERT INTO dislike (uid, pid) values('$id', $pid);";
                    $result = $mysqli->query($sql);

                    if ($result) {
                        $sql = "UPDATE Posts SET disnum = disnum + 1 WHERE pid = $pid;";
                        $result = $mysqli->query($sql);
                    }
                }
            }
            echo("<script>location.href='personal.php?targetID=$targetID';</script>");
        }

        echo "<div class='row'>";
            // Left column
            echo "<div class='col-md-4'>";

                // Get target user's name and city
                $sql = "SELECT firstName, lastName, city FROM Users WHERE ID = '$targetID'";
                $result = $mysqli->query($sql);
                $row = mysqli_fetch_array($result);
                $firstName = $row[0];
                $lastName = $row[1];
                $city = $row[2];

                // Get target user's state
                $sql = "SELECT state FROM cityState WHERE city = '$city'";
                $result = $mysqli->query($sql);
                $row = mysqli_fetch_array($result);
                $state = $row[0];

                // Get target user's country
                $sql = "SELECT country FROM stateCountryArea WHERE state = '$state'";
                $result = $mysqli->query($sql);
                $row = mysqli_fetch_array($result);
                $country = $row[0];

                // Print user info card
                echo "<div class='card' style='width: 100%;'>";
                    echo "<img class='card-img-top' src='images/profile_avatar.png' alt='Profile Picture'>";
                    echo "<div class='card-body'>";
                        echo "<h3 class='card-title'>$firstName $lastName</h3>";
                        echo "<p class='card-text'>$city, $state, $country</p>";
                    echo "<a href='friendlist.php?targetid=$targetID' class='btn btn-primary'>$firstName's Friends</a>";
                    echo "</div>";
                echo "</div>";

            echo "</div>";

            // Right column
            echo "<div class='col-md-8'>";

            // Get target user's posts
            $sql = "SELECT U.firstName, U.lastName, U.ID, P.content, P.disnum, P.pid FROM Users U, Posts P, Upload D  WHERE U.ID = D.uid AND P.pid = D.pid AND U.ID = '$targetID' ORDER BY P.pid DESC";
            $result = $mysqli->query($sql);

            while($row = mysqli_fetch_array($result)) {

                // Print post as panel
                echo "<div class='panel panel-danger'>";
                    echo "<div class='panel-heading'><a href='personal.php?targetID=$row[2]'><h3> $row[0] $row[1] </h3></a></div>";
                    $content = stripslashes($row[3]);
                    echo "<div class='panel-body'>$content </div>";
                        echo "<div class='panel-footer' style=\"background-color: #f3d3d3;\">";
                        echo "<p class='text-warning'><small><strong>$row[4]</strong> DISLIKES! </small></p>";
                        echo "<table class='table' style='margin-bottom: 0px;'>";
                            echo "<tr>";
                    echo "<form method='post' action='personal.php?targetID=$targetID'>";
                    echo "<input type='hidden' name='pid' value='$row[5]'>";

                // Get number of dislikes
                $sql = "SELECT * FROM dislike WHERE uid = '$id' AND pid = $row[5];";
                $dresult = $mysqli->query($sql);
                $drow = mysqli_fetch_array($dresult);

                // Dislike button
                if($drow != null) {
                    echo "<td width='10%'><button type='submit' class='btn btn-danger'><img class='img-rounded' src='images/dislike.png'></button></td>";
                }
                else {
                    echo "<td width='10%'><button type='submit' class='btn btn-success'><img class='img-rounded' src='images/dislike.png'></button></td>";
                }
                echo "</form>";

                // Write a comment
                echo "<form method='post' action='personal.php?targetID=$targetID'>";
                echo "<input type='hidden' name='pid' value='$row[5]'>";
                echo "<td width='70%'><input type='text' name='comment' placeholder='Make an angry comment!' class='form-control' required='required'></td>";
                echo "<td width='20%'><button type='submit' class='btn btn-info'>Comment</button></td>";
                echo "</tr>";
                echo "</form>";

                // Print comments
                $sql = "SELECT U.firstName, U.lastName, C.content, C.uid FROM Comments C, Users U WHERE C.pid = $row[5] AND C.uid = U.ID;";
                $cresult = $mysqli->query($sql);

                while($crow = mysqli_fetch_array($cresult)) {
                    echo "<tr>";
                    echo "<td width='10%'></td>";
                    echo "<td width='70%'>";

                    echo "<div class='bs-callout bs-callout-danger' style='background:white'>";
                        echo "<a href='personal.php?targetID=$crow[3]'><h4>$crow[0] $crow[1]</h4></a>";
                        $comment = stripslashes($crow[2]);
                        echo "<p><small>$comment</small></p>";
                    echo "</div>";

                    echo "</td>";
                    echo "<td width='20%'></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "<br>";
            }
            echo "<p>End of crazy posts...</p>";
            echo "</div>";
            echo "</div>";
    }
    else {
        header("Location: login.php");
    }
?>

      </div>
    </div>

    <hr>
    <footer class="container" >
      <p>CSE 305 Final Project: Haneul Lee, Ji Won Choi, Myungsuk Moon</p>
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