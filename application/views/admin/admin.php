<?php
foreach($teacher as $val){
  $email = $val->email;
  $fname = $val->fName;
  $lname = $val->lName;
  $course = $val->courseType;
  $age = $val->age;
  $ID = $val->teachersID;
}
    // session_start();
    // require("connect.php");
    // $user = $_SESSION['email'];

    // $query = "SELECT * FROM teacher WHERE email = '$user'";
    // $ret = mysqli_query($db, $query);
    // while($row = mysqli_fetch_assoc($ret)){
    //     $fname = $row['fName'];
    //     $lname = $row['lName'];
    //     $course = $row['courseType'];
    //     $age = $row['age'];
    //     $ID = $row['teachersID'];

    // }

    // if(isset($_POST['passBtn'])){
    //     $old_pass = md5(mysqli_real_escape_string($db, $_POST['oldpass']));
    //     $new_pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
    //     $confirm_pass = md5(mysqli_real_escape_string($db, $_POST['pass_confirm']));

    //     $catcher = "SELECT password FROM teacher WHERE email = '$user'";
    //     $oldpass = mysqli_query($db, $catcher);
    //     $row = mysqli_fetch_assoc($oldpass);
    //     $oldpassword_database = $row['password'];

    //     if($old_pass = $oldpassword_database){

    //         if($new_pass!=$confirm_pass){
    //             $message = "Invalid!!";
				// echo "<script type='text/javascript'>alert('$message');</script>";
    //         }else{
    //             $query = "UPDATE teacher SET password = '$new_pass' WHERE email = '$user'";
    //             mysqli_query($db, $query);
    //             $message = "Password has been changed!";
				// echo "<script type='text/javascript'>alert('$message');</script>";

				// header("refresh: 0; URL = admin.php");
    //         }
    //     }
    // }

    // if(isset($_POST['announcements']))
    // {
    //     $announcement = $_POST['announceText'];
    //     $date = $_POST['date'];
    //     $department = $_POST['department'];

    //     $sql = "INSERT INTO announcements (announcement_id, teacher_id, date, topic, department) VALUES(null,
    //     (SELECT teachersID FROM teacher WHERE email = '$user'),
    //     '$date',
    //     '$announcement',
    //     '$department')";

    //     mysqli_query($db, $sql);
    //     header("location: admin.php");
    // }


?>
<html>
<head>
<style>
    #datePosted{
        width: 15%;
    }

    #department{
        width: 23%;
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
                                    <td class = 'db_info'>{$email}</td>
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
                    <form action="<?php echo base_url('welcome/admin'); ?>" method="post">
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
    <div class = "container" id = "announcement_container" style = "background-color: #a43828; border-radius: 35px; margin-top: 50px;">

            <div class = "announcement_title_box">
                <h4 class = "announcement_title" style = "color: white;">Announcements&nbsp;<span class = "glyphicon glyphicon-eye-open announcement_title"></span></h4>
               <hr style = "border: solid #48211b 4px;">
            </div>

            <?php
            // $announce = "SELECT * FROM announcements AS A
            // JOIN teacher AS T ON A.teacher_id = T.teachersID
            // ORDER BY announcement_id DESC";

            // $aQuery = mysqli_query($db, $announce);

            // while($aRow = mysqli_fetch_assoc($aQuery)){

            //   echo "<div class = 'announcments'>
            //         <h5 style = 'color: white;'>
            //         <strong>
            //             TEACHERS NAME:
            //         </strong>
            //                 {$aRow['fName']} {$aRow['lName']}
            //         </h5>
            //         <h5 style = 'color: white;'>
            //             Office Name/Department:
            //                 {$aRow['department']}
            //         </h5>
            //         <h5 style = 'color: white;'>
            //             Date:
            //                 {$aRow['date']}
            //         </h5>
            //         <br>
            //         <h5 style = 'color: white;''>
            //             <b>Announcement: </b>

            //         </h5>
            //         <p style = 'color: white;'>
            //             {$aRow['topic']}
            //         </p>
            //         <hr style = 'border: solid #48211b 3px;'>
            //     </div>

            //     ";
            // }
        ?>
        <div class = "announcement_title_box">
                <h4 class = "announcement_title" style = "color: white;">Post Announcements Here&nbsp;<span class = "glyphicon glyphicon-eye-open announcement_title"></span></h4>
               <hr style = "border: solid #48211b 4px;">
        </div>
        <form method="POST" action="<?php echo base_url('welcome/admin');?>">
            <div class = "announcments">
                <h5 style = "color: white;">TEACHER'S NAME:
                <?php
                    echo "{$fname} {$lname}";
                ?>

                </h5>

                <h5 style = "color: white;">Office Name/Department: <br><input type = 'text' name = 'department' placeholder = "Department/Office" style = "border-radius: 5px; color: black;" id="department"/></h5>

                <h5 style = "color: white;">Date: <input type = 'date' name = 'date' placeholder = "dd/mm/yyyy" style = "border-radius: 5px;" class="form-control" id="datePosted"/></h5>

                <h5 style = "color: white;">Topic: </h5>
                <textarea id = "myTextArea" rows = "7" cols = "100" placeholder="Your text here..." name="announceText"></textarea>
                <br>
                <a href="#"><button type="submit" class="btn btn-success" name="announcements" onclick="myFunction1();">Submit</button></a>
            </div>
            <br><br>
            <hr style = "border: solid #48211b 5px;">

        </form>
    </div>
</body>
</html>

<script src ="js/jquery.min.js"></script>
<script>
    function myFunction1() {
        alert("Thank you!");
    }

    $(document).ready(function() {

    });
</script>
