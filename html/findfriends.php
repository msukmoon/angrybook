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
        @ini_set('memory_limit', '512M');

        // Login
        $host = 'localhost';
        $user = 'cse305';
        $pw = '305final';
        $dbName = 'cse305';
        $mysqli = new mysqli($host, $user, $pw, $dbName);
        if ($mysqli->connect_error) die($mysqli->connect_error);

        // Check if the user is logged in
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            // If user sends the form
            if ((isset($_POST['targetid'])) && ($_POST['targetid'] != "")) {
                // Get current user id
                $uid1 = $_SESSION['id'];

                // Get target user id
                $uid2 = $_POST['targetid'];

                // Insert into table
                $newquery1 = "INSERT INTO FriendWith (uid1, uid2) VALUES ('$uid1', '$uid2')";
                $newquery2 = "INSERT INTO FriendWith (uid1, uid2) VALUES ('$uid2', '$uid1')";
                $newresult1 = $mysqli->query($newquery1);
                $newresult2 = $mysqli->query($newquery2);
            }

            // Select all users with a query
            $myid = $_SESSION['id'];
            $query = "SELECT ID, firstName, lastName, city FROM Users 
                  WHERE ID <> '$myid' AND ID NOT IN (SELECT uid2 FROM FriendWith WHERE uid1 = '$myid')";
            $result = $mysqli->query($query);
            $numrows = $result->num_rows;

            // Get logged-in user's first name
            $query = "SELECT firstName FROM Users WHERE ID = '$myid'";
            $newresult = $mysqli->query($query);
            $newrow = mysqli_fetch_array($newresult);

            // Print number of suggestions
            echo "<h2>" .$newrow[0]. "'s Suggested Friends <span class=\"label label-danger\">$numrows</span></h2><br>";

            // If row exists
            if ($numrows > 0) {
                // Set up row, column with and counter
                echo "<div class = 'row'>";
                $colwidth = 4;
                $counter = 0;

                // Print all rows
                while ($row = $result->fetch_assoc()) {
                    // Get user's name and city
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    $city = $row['city'];

                    // Get user's state
                    $query = "SELECT state FROM cityState WHERE city = '$city'";
                    $newresult = $mysqli->query($query);
                    $newrow = mysqli_fetch_array($newresult);
                    $state = $newrow['state'];

                    // Get user's country
                    $query = "SELECT country FROM stateCountryArea WHERE state = '$state'";
                    $newresult = $mysqli->query($query);
                    $newrow = mysqli_fetch_array($newresult);
                    $country = $newrow['country'];

                    // Print suggested friend
                    echo "<div class='col-md-" .$colwidth. "'>";
                        echo "<div class='card' style='width: 100%;'>";
                            echo "<img class='card-img-top' src='images/profile_avatar.png' alt='Profile Picture'>";
                            echo "<div class='card-body'>";
                                echo "<h3 class='card-title'><a href='personal.php?targetID=" .$row['ID']. "'>$firstName $lastName</a></h3>";
                                echo "<p class='card-text'>$city, $state, $country</p>";
                            // Add friend button
                            echo "<form method='post' action='findfriends.php'>";
                            echo "<input type='hidden' name='targetid' value='". $row['ID'] ."'>";
                            echo "<button type='submit' class='btn btn-info'>Add Friend</button></td>";
                            echo "</form>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                    // Increment then check if at right end
                    $counter++;
                    if ($counter >= 3) {
                        $counter = 0;
                        echo "</div><br><div class='row'>";
                    }
                }
                echo "</div>";
            }
        }
        else {
            header("Location: login.php");
        }
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