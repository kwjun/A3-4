<?php
session_start();
include("config.php");
include("lib/db.php");

if (!isset($_GET['aid'])) {
    header("Location: /"); 
}

$aid = $_GET['aid'];
#echo "aid=".$aid."<br>";

if ($_SESSION['authenticated']){
    if(strcmp($_SESSION['role'], "admin") == 0){ //If the role is admin they can delete any post
        $result = delete_article($dbconn, $aid);
        echo $_SESSION['role'];
        # Check result
        header("Location: /admin.php");
    }else{
        //Retreive the article to get Username
        $result=get_article($dbconn, $aid);
        $row = pg_fetch_array($result, 0);
        echo $_SESSION['username'];
        echo $row['author'];
        //Check if the author of the article matches wit the user who tries to delete it

        if($_SESSION['username'] == $row['author']){
            $result = delete_article($dbconn, $aid);
        }else{
            echo "You don't have permission to ".$aid."<br>";
        }
        
    }


}else{
    echo "You don't have permission to ".$aid."<br>";
}
?>