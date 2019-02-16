<?php

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
            <button type="submit" class="btn btn-success" style="background-color: #5cb85c;">Sign in</button>
          </form>

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron"  style="background-color: rgba(235, 235, 235, 0.85);">
      <div class="container">
        <table> 
          <tr>
            <td width="45%">
              <h1>Welcome to Angrybook!</h1>
              <p>Angrybook is a general social network website that let users post to the timeline and then their friends can view it. A user can view each other’s posts.</p>

            </td>
            <td width="10%">
            </td>
            <td width="45%">
              <br><br>
              <form method="post" action="register.php" class="form-horizontal navbar-right">
                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="id" placeholder="ID" class="form-control" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="password" name="password" placeholder="Password" class="form-control" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">          
                    <input type="text" name="firstName" placeholder="First Name" class="form-control" required="required">
                  </div>
                  <div class="col-sm-6">          
                    <input type="text" name="lastName" placeholder="LastName" class="form-control" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">          
                    <input type="text" name="country" placeholder="Country" class="form-control" required="required">
                  </div>
                  <div class="col-sm-4">          
                    <input type="text" name="state" placeholder="State" class="form-control" required="required">
                  </div>
                  <div class="col-sm-4">          
                    <input type="text" name="city" placeholder="City" class="form-control" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-6">          
                    <input type="text" name="countryCode" placeholder="Country Code" class="form-control" required="required">
                  </div>
                  <div class="col-sm-6">          
                    <input type="text" name="areaCode" placeholder="Area Code" class="form-control" required="required">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" class="btn btn-primary btn-lg" style="background-color: #912713;">Register &raquo;</button>
              </form>

            </td>
          </tr>
        </table>
       
       
      </div>
    </div>

      <!-- Example row of columns -->
      
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
