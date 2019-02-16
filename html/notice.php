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

    // Create a dropdown button
    echo "<div class='btn-group navbar-right'>";
        echo "<a class='btn dropdown-toggle btn-danger' data-toggle='dropdown' style='margin-top:8px' href='#'>";
              echo "Notifications <span class='badge badge-light'>$numrows</span>";
        echo "</a>";

        // Content of dropdown menu (notifications)
        echo "<ul class='dropdown-menu'>";
	        $sql = "SELECT * FROM notice WHERE uid='$id';";
	    	$result = $mysqli->query($sql);
	    
	    	while($row = mysqli_fetch_array($result)) {
	    		$sql = "SELECT * FROM Users WHERE ID='$row[2]';";
	    		$newresult = $mysqli->query($sql);
                $newrow = mysqli_fetch_array($newresult);

	    		if($row[1] == 1) {
	    			echo "<li class='list-group-item list-group-item-danger' role='presentation'>
                            <a role='menuitem' tabindex='-1' href='checkNotice.php?uid=$row[0]&type=$row[1]&targetID=$row[2]
                                &pid=$row[3]&nid=$row[4]'>$newrow[2] $newrow[3] wrote an offending comment on your post!</a></li>";
	    		}
	    		else {
	    			echo "<li class='list-group-item list-group-item-danger' role='presentation'>
                            <a role='menuitem' tabindex='-1' href='checkNotice.php?uid=$row[0]&type=$row[1]&targetID=$row[2]
                                &pid=$row[3]&nid=$row[4]'>$newrow[2] $newrow[3] rudely disliked your post!</a></li>";

	    		}
	    	}
	    	echo "<li role='presentation'><a role='menuitem' tabindex='-1' href='#'>No More Notifications...</a></li>";
	    echo "</ul>";
	echo "</div>";
    }
?>