<?php
    /*session_start();
    require("connect.php");
    $user = $_SESSION['email'];
    
    $query = "SELECT * FROM subject ORDER BY units";
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
        
        $catcher = "SELECT password FROM teacher WHERE teachersID = '$ID'";
        $oldpass = mysqli_query($db, $catcher);
        $row = mysqli_fetch_assoc($oldpass);
        $oldpassword_database = $row['password'];
        
        if($old_pass == $oldpassword_database){
            
            if($new_pass!=$confirm_pass){
                $message = "Invalid!!";
				echo "<script type='text/javascript'>alert('$message');</script>";
            }else{
                $query = "UPDATE teacher SET password = '$new_pass' WHERE teachersID = '$ID'";
                mysqli_query($db, $query);
                $message = "Password has been changed!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				
				header("refresh: 0; URL = homepage.php");
            }
        }
    }*/
    
    
    foreach($teach as $val){
      $email = $val->email;
      $fname = $val->fName;
      $lname = $val->lName;
      $course = $val->courseType;
      $age = $val->age;
      $ID = $val->teachersID;
    }

?>

<html>
<head>
<style>
    .allClasses{
        padding: 10px;
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
        <?php include 'asite-head.php'?>
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
                    <form action="<?php echo base_url('welcome/adminClasses'); ?>" method="post">
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
    
    <button class = 'btn btn-info' style = 'margin-left:20px;' data-toggle = "modal" data-target="#studentModal">View Total Population</button>
    
        <div id="studentModal" class="modal fade"  role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style = "color: black; font-size: 40px;">
                            Students
                        </h4>
                    </div>
                    <div class="modal-body" style="background-color: #48211b;">
                        <div id="chart">



                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    
    <?php
        echo"
            <table>
                    <thead>
                        <tr style = 'border:medium'>
                            <td class = 'allClasses'>
                                <b>Course Code&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Course Name&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Units</b>
                                <br>
                                <hr>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    
        ";
        
        foreach($subj as $row){


            echo"
                <tr>
                    <td>
                        &nbsp&nbsp{$row->subjectCode}&nbsp<hr>
                    </td>
                    <td>
                        &nbsp&nbsp{$row->subjectName}&nbsp<hr>
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp&nbsp&nbsp{$row->units}<hr>
                    </td>
                </tr>

            ";
        }
        echo"
            </tbody>
            </table>
        ";
    
    ?>
    

</body>
</html>
<script src="js/highcharts.js"></script>
<script src="js/dark-unica.js"></script>
<script src="js/modules/exporting.js"></script>
<script>
<?php
        $mCount = "SELECT COUNT(studId) AS cnt FROM students
                        WHERE studentGender = 'MALE'
                        ";
        $mQuery = mysqli_query($db, $mCount);
        
    
        $fCount = "SELECT COUNT(studId) AS cnt FROM students
                        WHERE studentGender = 'FEMALE'
                        ";      
        $fQuery = mysqli_query($db, $fCount);
    ?>
    Highcharts.chart("chart", {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Number of Students ',
            },
            xAxis: {
                categories: ['']
            },
            yAxis: {
                title: {
                    text: 'AMOUNT OF STUDENTS'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Male',
                data: [<?php 
                        while($values = mysqli_fetch_assoc($mQuery)){
                            echo $values['cnt'];
                        }
                       ?>
                      ]
            },
            {
                name: 'Female',
                data: [<?php 
                        while($values = mysqli_fetch_assoc($fQuery)){
                            echo $values['cnt'];
                       }
                       ?>]
            }]
        });
</script>











