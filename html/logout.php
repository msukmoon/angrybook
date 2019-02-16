<?php
/**
 * Created by PhpStorm.
 * User: myungsuk
 * Date: 27/05/2018
 * Time: 3:47 AM
 */

// Start the session first
session_start();

// Remove session variables then destroy
session_unset();
session_destroy();

// Redirect to the welcome page
header("Location: index.php");
exit();
?>