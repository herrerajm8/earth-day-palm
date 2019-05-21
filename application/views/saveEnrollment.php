<?php
    require("connect.php");

    
       /*$SQL = "SELECT * FROM grados AS g
                JOIN `pre-req` AS pr
                ON pr.subject_prereq = g.subjectid
                WHERE g.studentid = '{$_POST['id']}'
                AND g.subjectid = '{$_POST['subject']}'
                ";
        $RETURN = mysqli_query($db, $SQL);*/

        $ifNull = "
        SELECT subject 
        FROM`pre-req` AS pr 
        JOIN subject AS s 
        ON pr.subject = s.subjectID 
        WHERE pr.subject_prereq IS Null ";
        $nullQuery = mysqli_query($db, $ifNull);
        $catcher = mysqli_num_rows($nullQuery);
        if($catcher != 0){
            $sql = "INSERT INTO stud_enrollment
            VALUES(null, '{$_POST['id']}', '{$_POST['data']}')";

            $ret = mysqli_query($db, $sql);
        } 
        
    

    
    
   /* $sql = "INSERT INTO stud_enrollment
            VALUES(null, '{$_POST['id']}', '{$_POST['data']}')";

    $ret = mysqli_query($db, $sql);
    
    if($ret){
        $message = "You are now enrolled in this class";
        echo"<script type = 'text/javascript'>alert('$message');</script>";
        header("refresh: 0; URL = enrollment.php");
    }else{
        mysqli_error($db);
    }*/

?>