<?php
    /*session_start();
    require("connect.php");
    $user = $_SESSION['email'];
    
    $query = "SELECT * FROM subject";
    $ret = mysqli_query($db, $query);
    
    $query2 = "SELECT * FROM teacher WHERE email = '$user'";
    $ret2 = mysqli_query($db, $query2);

    while($row = mysqli_fetch_assoc($ret2)){
        $fname = $row['fName'];
        $lname = $row['lName'];
        $course = $row['courseType'];
        $age = $row['age'];
        $ID = $row['teachersID'];
        
    }

    if(isset($_POST['passBtn'])){
        $old_pass = md5(mysqli_real_escape_string($db, $_POST['oldpass']));
        $new_pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
        $confirm_pass = md5(mysqli_real_escape_string($db, $_POST['pass_confirm']));
        
        $catcher = "SELECT password FROM teacher WHERE email = '$user'";
        $oldpass = mysqli_query($db, $catcher);
        $row = mysqli_fetch_assoc($oldpass);
        $oldpassword_database = $row['password'];
        
        if($old_pass == $oldpassword_database){
            
            if($new_pass != $confirm_pass){
                $message = "Invalid!!";
				echo "<script type='text/javascript'>alert('$message');</script>";
            }else{
                $query = "UPDATE teacher SET password = '$new_pass' WHERE email = '$user'";
                mysqli_query($db, $query);
                $message = "Password has been changed!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				
				header("refresh: 0; URL = admin.php");
            }
        }
    }
    
    $managementQuery = "SELECT * FROM stud_enrollment AS SE 
                        JOIN students AS S ON SE.studentid = S.studId
                        JOIN subjectschedule AS SS ON SE.subjectscheduleid = SS.subSchedID
                        JOIN teacher AS T ON SS.teacherid = T.teachersID
                        JOIN subject AS SU ON SS.subjectid = SU.subjectID
                        WHERE T.teachersID = '$ID'
                        ORDER BY subjectCode";
        
    

    $Query = mysqli_query($db, $managementQuery);
    $Q = mysqli_query($db, $managementQuery);
    
*/foreach($teach as $val){
      $email = $val->email;
      $fname = $val->fName;
      $lname = $val->lName;
      $course = $val->courseType;
      $age = $val->age;
      $ID = $val->teachersID;
    }
    echo $ID;
?>

<html>
<head>
    
<style>
    
    .allClasses{
        padding: 10px;
    }
    .input{
        margin-left: 20px;
        display: none;
    }
</style>
    
<title>WELCOME</title>
<link rel = "stylesheet" href = "bootstrap/css/bootstrap.css">
<link rel = "stylesheet" href = "style.css">
<script src = "jquery/jquery-3.2.1.min.js"></script>
<script src = "bootstrap/js/bootstrap.min.js"></script>
</head>
<header>
<nav class = "nav navbar-default-top2 main_nav">
        
      <?php include 'admin/asite-head.php'?>
    <div class="container-fluid">
        
     
   
        
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style = "color: black; font-size: 40px;">
                            Master of <?php echo $course?>
                        </h4>
                    </div>

                    <div class="modal-body">
                        <?php
                            echo"
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class = 'info'>Full Name&nbsp&nbsp&nbsp&nbsp</td>
                                            <td class = 'db_info'>{$fname} {$lname}</td>
                                        </tr>
                                        <tr>
                                            <td class = 'info'>Teacher ID&nbsp&nbsp&nbsp&nbsp</td>
                                            <td class = 'db_info'>{$user}</td>
                                        </tr>
                                         <tr>
                                            <td class = 'info'>Age&nbsp&nbsp&nbsp&nbsp</td>
                                            <td class = 'db_info'>{$age}</td>
                                        </tr>
                                        <tr>
                                            <td class = 'info'>ID&nbsp&nbsp&nbsp&nbsp</td>
                                            <td class = 'db_info'>{$ID}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            ";
                        ?>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type = "button" class = "btn btn-default" data-toggle = "modal" data-target="#passwordModal">Change Password</button>
                    </div>

              </div>

            </div>
        </div>
        
        <div id="passwordModal" class="modal fade"  role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style = "color: black; font-size: 40px;">Change Password</h4>
                    </div>
                    <div class="modal-body" style="background-color: #48211b;">
                        <div style = "margin-left: 200px;">
                            <form action="<?php echo base_url('welcome/management'); ?>" method="post">
                                <div class = 'row' style = 'margin-bottom: 10px;'>
                                    <input type = password name = 'oldpass' style = 'border-radius: 2px;' placeholder = 'Current Password'>
                                </div>
                                <div class = 'row' style = 'margin-bottom: 10px;'>
                                    <input type = password name = 'pass' style = 'border-radius: 2px;' placeholder = 'New Password'>
                                </div>
                                <div class = 'row' style = 'margin-bottom: 10px;'>
                                    <input type = password name = 'pass_confirm' style = 'border-radius: 2px;' placeholder = 'Confirm Password'>
                                </div>
                                <div class = 'row' style = 'margin-bottom: 10px;'>
                                    <button type = "submit" class = "btn btn-default" name = "passBtn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        
        
        <div class = "col-md-offset-11" style = "margin-top: 61px;">
             <?php if((isset($_SESSION['email']))){ ?>
                    <div class = "col-md-1">
                        <a href = "logout.php"><button type="button" class = "btn btn-danger" style = "margin-top: 5px;">Logout</button></a>
                    </div>
            <?php } ?>
        </div>
    </div>
</nav>
    

    
</header>
<body>
    <?php
        echo"
            <table>
                    <thead>
                    <form method = 'POST' action = 'makeClass'>
                        <tr style = 'border:medium'>
                            <td class = 'allClasses'>
                                <b>Subject Name&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'subjectName' style = 'border-radius: 2px;' placeholder = 'Subject Name'>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Subject Code&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'subjectCode' style = 'border-radius: 2px;' placeholder = '(Acting101, etc.)'>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Course&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'course' style = 'border-radius: 2px;' placeholder = 'Acting, Cinema, Animation'>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Teacher&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'teacherfName' style = 'border-radius: 2px;' placeholder = 'First Name'>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Teacher&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'teacherlName' style = 'border-radius: 2px;' placeholder = 'Surname'>
                                <hr>
                            </td>    
                            
                        </tr>
                    </thead>
                    <tbody>
                    
        ";

    
    ?>
    
    <?php
        echo"
            </tbody>
            </table>
            
    <div class='row'>
        <table>
            <thead>
                <tbody>
                    <tr style = 'border:medium'>
                        <td class = 'allClasses'>
                                <b>&nbsp&nbsp&nbsp&nbspAcademic Year Start&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                &nbsp&nbsp
                                &nbsp&nbsp
                                &nbsp&nbsp
                                &nbsp&nbsp
                                
                                <select name='aca_start'>";

                                   for($i = 2016 ; $i <= date('Y'); $i++){
                                      echo "<option>$i</option>";
                                   }
                                echo "</select>
                                <hr>
                                
                            </td>
                            <td class = 'allClasses'>
                                <b>Academic Year End&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                                &nbsp&nbsp
                                &nbsp&nbsp
                                &nbsp&nbsp
                                &nbsp&nbsp
                                
                                <select name='aca_end'>";

                                   for($i = 2030 ; $i > date('Y'); $i--){
                                      echo "<option>$i</option>";
                                   }

                                echo "</select>
                                <hr>
                                
                            </td>
                            <td class = 'allClasses'>
                                <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSemester</b>
                                <br>
                                <hr>
                                &nbsp&nbsp
                                &nbsp&nbsp
                                &nbsp&nbsp
                                
                                
                                <select name='semester'>

                                   <option value = 'First'>First</option>
                                   <option value = 'Second'>Second</option>
                                       ";

                                echo "</select>
                                
                                <hr>
                            </td>
                    </tr>
                </tbody>
            </thead>    
        </table>
    </div>
            
            
            
    <div class='row'>
        <table>
            <thead>
                <tbody>
                    <tr style = 'border:medium'>
                        <td class = 'allClasses'>
                            <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime Start</b>
                                <br>
                                <hr>
                                &nbsp&nbsp&nbsp
                                
    
                                <select name = 'time_start'>";

                                    for($hours=0; $hours<24; $hours++)
                                    {
                                        for($mins=0; $mins<60; $mins+=30)
                                        { 
                                            $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT).':00';
                                            echo '<option value= "'.$time.'">'.$time.'</option>';
                                        }
                                    }

                        echo"</select>
    
                        
                    
                                <hr>
                        </td>
                        <td class = 'allClasses'>
                            <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime End</b>
                                <br>
                                <hr>
                                
                                <select name = 'time_end'>";

                                    for($hours=0; $hours<=24; $hours++)
                                    {
                                        for($mins=0; $mins<60; $mins+=30)
                                        { 
                                            $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT).':00';
                                            echo '<option value= "'.$time.'">'.$time.'</option>';
                                        }
                                    }

                    echo "</select>
                                
                                <hr>
                        </td>
                        <td class = 'allClasses'>
                            <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDay</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'day' style = 'border-radius: 2px;' placeholder = 'Monday, Tuesday, etc.'>
                       
                                <hr>
                        </td>
                        <td class = 'allClasses'>
                            <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRoom Number</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'room' style = 'border-radius: 2px;'>
                                <hr>
                        </td>
                        <td class = 'allClasses'>
                            <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUnits</b>
                                <br>
                                <hr>
                                
                                <input type = 'text' name = 'units' style = 'border-radius: 2px;'>
                                <hr>
                        </td>

                        
                    </tr>
                </tbody>
            </thead>    
        </table>
    </div>
            
            
    <div class='row'>
        <table>
            <thead>
                <tbody>
                    <tr style = 'border:medium'>
                        <td class = 'allClasses'>
                            <button type='submit' class = 'btn btn-success' name = 'subjectSubmit'>
                            Submit</button>
                        </td>
                    </tr>
                </tbody>
                </form>
            </thead>    
        </table>
    </div>
        ";
    
    ?>
    <?php
        if(isset($_POST['subjectSubmit'])){
            $subName = mysqli_real_escape_string($db, $_POST['subjectName']);
            $subCode = mysqli_real_escape_string($db, $_POST['subjectCode']);
            
            $course = mysqli_real_escape_string($db, $_POST['course']);
            
            $teacherfName = mysqli_real_escape_string($db, $_POST['teacherfName']);
            $teacherlName = mysqli_real_escape_string($db, $_POST['teacherlName']);
            
            $academicStart = $_POST['aca_start'];
            $academicEnd = $_POST['aca_end'];
            
            $semester = $_POST['semester'];
            
            $timeStart = $_POST['time_start'];
            $timeEnd = $_POST['time_end'];
            
            $day = mysqli_real_escape_string($db, $_POST['day']);
            
            $room = mysqli_real_escape_string($db, $_POST['room']);
            
            $units = mysqli_real_escape_string($db, $_POST['units']);
            
            $subQuery = "INSERT INTO subject 
            (subjectID, subjectCode, subjectName, units, courseType)
            VALUES(null, '$subCode', '$subName', '$units', '$course')";
            
            mysqli_query($db, $subQuery);
            
            if($timeStart <= 5){
                $message = "Cannot create class before 6am!";
                echo"<script type = 'text/javascript'>alert('$message');</script>";
                exit();
            }
            
            if($timeEnd > 21){
                $message = "Cannot end class after 9pm!";
                echo"<script type = 'text/javascript'>alert('$message');</script>";
                exit();
            }
            
            foreach($semester as $s){
                if($semester){
                    $schedQuery = "INSERT INTO subjectschedule 
                                    (subSchedID, 
                                    roomid, 
                                    subjectid, 
                                    teacherid, 
                                    time_start,
                                    time_end,
                                    day, 
                                    semester, 
                                    academic_year_start, 
                                    academic_year_end)

                                    VALUES(null, 

                                    (SELECT roomID FROM room WHERE roomID = '$room'),

                                    (SELECT subjectID FROM subject WHERE subjectCode = '$subCode'),

                                    (SELECT teachersID FROM teacher WHERE fName = '$teacherfName' 
                                    AND lName = '$teacherlName'),

                                    '$timeStart', '$timeEnd', '$day', '$s', '$academicStart', '$academicEnd')";

                                    mysqli_query($db, $schedQuery);

                                    $message = "Subject and schedule created!";
                                    echo"<script type = 'text/javascript'>alert('$message');</script>";
                                    
                }
                
            }
            
            
            
            
        }
    ?>
    


    
</body>
</html>
<script src="js/highcharts.js"></script>
<script src="js/dark-unica.js"></script>
<script src="js/modules/exporting.js"></script>
<script>

</script>