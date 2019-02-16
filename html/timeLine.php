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

    <nav class="navbar navbar-inverse navbar-fixed-top"style="background-color: #a00000;">
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
          <a class="navbar-brand" href="timeLine.php"style="color: #f7c8d0;">Angrybook</a>
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

              <div class='btn-group navbar-form navbar-right'>
                <button type="submit" class="btn btn-danger" onclick = "location.href = 'findfriends.php'" style="background-color: rgba(180,94,103,0.94)">Find Friends</button>
              </div>
          <div class='btn-group navbar-form navbar-right'>
              <button type="submit" class="btn btn-info" style="background-color: #ff9d9e" onclick = "location.href = 'personal.php?targetID=<?php echo $_SESSION['id']?>'" style = "border-color: #ffdadd"><?php echo $_SESSION['firstName'] ?></button>
           </div>


      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: rgba(235, 235, 235, 0.85);">
      <div class="container">


<?php
    @ini_set('memory_limit', '512M');





    // Check if the user is logged in
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        // Timeline body
       $id = $_SESSION['id'];


        echo "<div class='row'>";
            echo "<div class='col-md-2'></div>";

            echo "<div class='col-md-9'>";
            $host = 'localhost';
            $user = 'cse305';
            $pw = '305final';
            $dbName = 'cse305';
            $mysqli = new mysqli($host, $user, $pw, $dbName);


            if ((isset($_POST['content'])) && ($_POST['content'] != "")) {


                $sql = "SHOW TABLE STATUS WHERE name='Posts'";
                $result = $mysqli->query($sql);
                $row = mysqli_fetch_array($result);
                $index = $row["Auto_increment"];



                $content = $_POST['content'];
                $content = addslashes($content);
                $sql = "INSERT INTO Posts (pid, content) values($index,'$content');";
                $result = $mysqli->query($sql);


                $sql = "INSERT INTO Upload (pid, uid) values( $index, '$id');";
                $result = $mysqli->query($sql);
                echo("<script>location.href='timeLine.php';</script>");                 


            }

            if ((isset($_POST['pid'])) && ($_POST['pid'] != "")) {
                $pid = $_POST['pid'];

                if ((isset($_POST['comment'])) && ($_POST['comment'] != "")) {
                  // comment
                  $comment = $_POST['comment'];
                  $comment = addslashes($comment);

                  $sql = "INSERT INTO Comments (uid, pid, cid, content) values('$id', $pid, 0, '$comment');";
                  $result = $mysqli->query($sql);


                  $sql = "SELECT  U.uid FROM Posts P, Upload U where P.pid = U.pid  AND P.pid = $pid;";
                  $result = $mysqli->query($sql);
                  $row = mysqli_fetch_array($result);
                  $targetID = $row[0];
                  if(strcmp( $targetID, $id))
                  {
                    $sql = "INSERT INTO notice (uid, type, targetID, pid, nid) values('$targetID', 1, '$id', $pid, 0);";
                    $result = $mysqli->query($sql);
                  }

                } 
                else
                {


                  $sql = "SELECT * FROM dislike WHERE uid = '$id' AND pid = $pid;";
                  $result = $mysqli->query($sql);
                  $row = mysqli_fetch_array($result);
                  if($row != null)
                  {
                    //un dislike
                    $sql = "DELETE FROM dislike WHERE uid = '$id' AND pid = $pid;";
                    $result = $mysqli->query($sql);
                    $sql = "UPDATE Posts SET disnum = disnum - 1 WHERE pid = $pid;";
                    $result = $mysqli->query($sql);


                    $sql = "SELECT  U.uid FROM Posts P, Upload U where P.pid = U.pid  AND P.pid = $pid;";
                      $result = $mysqli->query($sql);
                      $row = mysqli_fetch_array($result);
                      $targetID = $row[0];
                      if(strcmp($targetID, $id))
                      {
                        $sql = "DELETE FROM notice WHERE uid = '$targetID' AND targetID = '$id' AND pid = $pid;";
                        $result = $mysqli->query($sql);
                      }

                  }
                  else
                  {
      
                    $sql = "INSERT INTO dislike (uid, pid) values('$id', $pid);";
                    $result = $mysqli->query($sql);

                    if ($result) {
                      // dislike

                      $sql = "UPDATE Posts SET disnum = disnum + 1 WHERE pid = $pid;";
                      $result = $mysqli->query($sql);


                      $sql = "SELECT  U.uid FROM Posts P, Upload U where P.pid = U.pid  AND P.pid = $pid;";
                      $result = $mysqli->query($sql);
                      $row = mysqli_fetch_array($result);
                      $targetID = $row[0];
                      if(strcmp( $targetID, $id))
                      {
                        $sql = "INSERT INTO notice (uid, type, targetID, pid, nid) values('$targetID', 2, '$id', $pid, 0);";
                        $result = $mysqli->query($sql);
                      }


                    }
                  }
                }
                echo("<script>location.href='timeLine.php';</script>");                 

            }



            echo "<form method='post' action='timeLine.php'>";

            echo "<div class='panel panel-danger'>";
            echo "<div class='panel-body'><textarea class='form-control' placeholder='Share your enraging thoughts!' required='required' rows='9' style='background-color: #fcefef;' name='content'></textarea></div>";
            echo "<div class='panel-footer'><button type='submit' class='btn btn-success'>Post</button> </div>";
            echo "</div>";

            echo "</form>";

            $sql = "SELECT U.firstName, U.lastName, U.ID, P.content, P.disnum, P.pid FROM Users U, Posts P, Upload D  WHERE U.ID = D.uid AND P.pid = D.pid AND (U.ID = '$id' OR  U.ID IN (SELECT uid2 FROM FriendWith WHERE uid1 = '$id') ) ORDER BY P.pid DESC";
            $result = $mysqli->query($sql);

            echo "<br><br>";
            while($row = mysqli_fetch_array($result))
            {

       
                echo "<div class='panel panel-danger'>";
                echo " <div class='panel-heading'> <a href='personal.php?targetID=$row[2]'> <h3> $row[0] $row[1] </h3> </a> </div> ";
                $content = stripslashes($row[3]);
                echo "<div class='panel-body'>$content </div>";


                echo "<div class='panel-footer' style=\"background-color: #f3d3d3;\">";
                echo "<p class='text-warning'><small><strong>$row[4]</strong> DISLIKES! </small></p>";

                echo "<table  class='table' style='margin-bottom: 0px;'>";
                

                echo "<tr>";
                echo "<form method='post' action='timeLine.php'>";
                echo "<input type='hidden' name='pid' value='$row[5]'>";

                $sql = "SELECT * FROM dislike  WHERE uid = '$id' AND pid = $row[5];";
                $dislikeResult = $mysqli->query($sql);
                $dislikeRow = mysqli_fetch_array($dislikeResult);
                if($dislikeRow != null)
                {
                  echo "<td width='10%'><button type='submit' class='btn btn-danger'><img class='img-rounded' src='images/dislike.png'></button>  </td>";

                }
                else
                {
                  echo "<td width='10%'><button type='submit' class='btn btn-success'><img class='img-rounded' src='images/dislike.png'></button>  </td>";
                }
                echo "</form>";



                echo "<form method='post' action='timeLine.php'>";
                echo "<input type='hidden' name='pid' value='$row[5]'>";

                echo "<td width='70%'><input type='text' name='comment' placeholder='Make an angry comment!' class='form-control' required='required'>  </td>";
                echo "<td width='20%'><button type='submit' class='btn btn-info'>Comment</button></td>";
                echo "</tr>";

                echo "</form>";




                //코멘트 여기에 위치 
                

                $sql = "SELECT U.firstName, U.lastName, C.content, C.uid FROM Comments C, Users U WHERE C.pid = $row[5] AND C.uid = U.ID;";
                $commentResult = $mysqli->query($sql);
                while($commentRow = mysqli_fetch_array($commentResult))
                {
                  echo "<tr>";
                  echo "<td width='10%'></td>";
                  echo "<td width='70%'>";

                  echo "<div class='bs-callout bs-callout-danger' style='background:white'>";
                  echo "<a href='personal.php?targetID=$commentRow[3]'> <h4>$commentRow[0] $commentRow[1] ";
                  echo "</h4></a>";
                  $comment = stripslashes($commentRow[2]);
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
    <footer class="container">
      <p>CSE 305 Final Project: Haneul Lee, Ji Won Choi, Myungsuk Moon </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js">




    </script>

  
  </body>
</html>