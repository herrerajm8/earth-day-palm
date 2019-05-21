<?php
    $db = mysqli_connect("localhost", "root", "", "edp");

    if(!$db){
        echo"ERROR CONNECTING TO DATABASE";
        exit();
        
    }

?>