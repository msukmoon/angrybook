
<?php
    session_start();


    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            // Timeline body
        $id = $_SESSION['id'];

        $host = 'localhost';
        $user = 'cse305';
        $pw = '305final';
        $dbName = 'cse305';
        $mysqli = new mysqli($host, $user, $pw, $dbName);
        $uid = $_GET['uid'];
        $type = $_GET['type'];
        $targetID = $_GET['targetID'];
        $pid = $_GET['pid'];
        $nid = $_GET['nid'];

        
        $sql = "DELETE FROM notice WHERE uid = '$uid' AND type = $type AND targetID = '$targetID' AND pid = $pid AND nid = $nid;";
        $result = $mysqli->query($sql);
    }
	
?>

<script>
   history.back();
</script>