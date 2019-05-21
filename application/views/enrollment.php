<?php
    // session_start();
    // require("connect.php");
    // $user = $_SESSION['email'];
    //
    // $query2 = "SELECT * FROM students WHERE email = '$user'";
    // $ret2 = mysqli_query($db, $query2);
    // while($row = mysqli_fetch_assoc($ret2)){
    //     $fname = $row['firstName'];
    //     $lname = $row['lastName'];
    //     $course = $row['course'];
    //     $year = $row['year'];
    //     $age = $row['age'];
    //     $ID = $row['studId'];
    // }
    //
    // $query = "SELECT * FROM subjectschedule AS ss
    //          JOIN subject as s
    //          ON ss.subjectid = s.subjectID
    //          JOIN teacher as t
    //          ON ss.teacherid = t.teachersID
    //          WHERE s.courseType = '$course' ORDER BY s.subjectCode";
    // $ret = mysqli_query($db, $query);
    //
    // $ret4 = mysqli_query($db, $query);
    //
    //
    // $ret5 = mysqli_query($db, $query);
    // while($row = mysqli_fetch_assoc($ret5)){
    //     $subSched_id = $row['subSchedID'];
    // }

foreach($info as $val2){
    $roomid = $val2->roomid;
}
?>

<html>
<head>
<style>
    .allClasses{
        padding: 10px;
    }
    .dropbtn {
    background-color: #48211b;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}
    .dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
<title>WELCOME</title>
<link rel="stylesheet"  href="<?php echo base_url('resources/style.css');?>">
<link rel="stylesheet"  href="<?php echo base_url('resources/bootstrap/css/bootstrap.css');?>">
<script src="<?php echo base_url('resources/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('resources/jquery/jquery-3.2.1.min.js');?>"></script>
</head>
<header>
<nav class = "nav navbar-default-top2 main_nav">
<?php include 'site-head.php'?>
    <div class="container-fluid">

       

<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style = "color: black; font-size: 40px;"><?php echo $course?></h4>
            </div>

            <div class="modal-body">
                <?php
                foreach($stud as $studd){
                    echo"
                        <table>
                            <tbody>
                                <tr>
                                    <td class = 'info'>Full Name&nbsp&nbsp&nbsp&nbsp</td>
                                    <td class = 'db_info'>".$studd->firstName." ".$studd->lastName."</td>
                                </tr>
                                <tr>
                                    <td class = 'info'>Student ID&nbsp&nbsp&nbsp&nbsp</td>
                                    <td class = 'db_info'>".$studd->studId."</td>
                                </tr>
                                 <tr>
                                    <td class = 'info'>Year Level&nbsp&nbsp&nbsp&nbsp</td>
                                    <td class = 'db_info'>".$studd->year."</td>
                                </tr>
                                 <tr>
                                    <td class = 'info'>Age&nbsp&nbsp&nbsp&nbsp</td>
                                    <td class = 'db_info'>".$studd->age."</td>
                                </tr>
                                <tr>
                                    <td class = 'info'>ID&nbsp&nbsp&nbsp&nbsp</td>
                                    <td class = 'db_info'>".$studd->studId."</td>
                                </tr>
                            </tbody>
                        </table>
                    ";
                  }
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
                    <form action="homepage.php" method="post">
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
                        <tr style = 'border:medium'>
                            <td class = 'allClasses'>
                                <b>Course Name&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Course Code&nbsp&nbsp&nbsp&nbsp</b>
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

        foreach($info as $val){
            echo"
                <tr id = '".$val->subjectID."'>
                    <td>
                        &nbsp&nbsp".$val->subjectName."&nbsp<hr>
                    </td>
                    <td>
                        &nbsp&nbsp".$val->subjectCode."&nbsp<hr>
                    </td>
                    <td>
                        &nbsp&nbsp&nbsp&nbsp&nbsp".$val->units."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <hr>

                    </td>
                    <td>

                        <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' data-target='#contentModal".$val2->subjectID."'>View Schedule</button>
                        <hr>

                    </td>
                </tr>


            ";
        }
        echo"
            </tbody>
            </table>
        ";

    ?>
<?php

echo"
<div class='modal fade' id='contentModal".$val2->subjectID."' role='dialog'>
        <div class='modal-dialog'>

      <!-- Modal content-->
      <div class='modal-content'>

            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title' style = 'color: black; font-size: 40px;'>SCHEDULE</h4>
            </div>

            <div class='modal-body'>
                 <table>
                    <thead>
                        <tr style = 'border:medium'>
                            <td class = 'allClasses'>
                                <b>Room Number&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Proctor&nbsp&nbsp&nbsp&nbsp</b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Time</b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b></b>
                                <br>
                                <hr>
                            </td>
                            <td class = 'allClasses'>
                                <b>Day</b>
                                <br>
                                <hr>
                            </td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr style = 'font-size:13px;'>
                            <td>
                                ".$roomid."
                            </td>
                            <td>
                                ".$val2->fName."&nbsp".$val->lName."
                            </td>
                            <td>
                                ".$val2->time_start."
                            </td>
                            <td>
                                ".$val2->time_end."
                            </td>
                            <td>
                                &nbsp&nbsp&nbsp&nbsp
                                ".$val2->day."
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            </td>
                            <td id = '".$val2->subjectID."'>
                                <button type='submit' class='btn btn-info enroll_btn' name = 'enroll' id = '".$val2->subSchedID.">Enroll</button>
                            </td>
                        </tr>


                    </tbody>
                    </table>

            </div>

            <div class='modal-footer'>

            </div>

      </div>

        </div>
  </div>
  ";

?>
</body>
</html>


<script>
$(document).ready(function(){
    var id = <?php echo $ID; ?>;

    $(".enroll_btn").on("click", function(){
        var subjectSched_id = this.id;
        var subject = $(this).closest('td').attr('id');


        $.ajax({
				url: "saveEnrollment.php",
				method: "POST",
				data :{
					id: id,
					data: subjectSched_id,
                    subject: subject
				},
				success: function(data){
                    alert("You are now enrolled in this class.");
					location.reload();
				},
                /*error: function(){
                    alert("Can't enroll due to not passing the pre-req of this class!!");
					location.reload();
                }*/

			});

    });

});

</script>
