<?php
    session_start();
//     require("connect.php");
//     $user = $_SESSION['email'];
//
//     $query = "SELECT * FROM students WHERE email = '$user'";
//     $ret = mysqli_query($db, $query);
//     while($row = mysqli_fetch_assoc($ret)){
//         $fname = $row['firstName'];
//         $lname = $row['lastName'];
//         $course = $row['course'];
//         $year = $row['year'];
//         $age = $row['age'];
//         $ID = $row['studId'];
//
//     }
//
//     if(isset($_POST['passBtn'])){
//         $old_pass = md5(mysqli_real_escape_string($db, $_POST['oldpass']));
//         $new_pass = md5(mysqli_real_escape_string($db, $_POST['pass']));
//         $confirm_pass = md5(mysqli_real_escape_string($db, $_POST['pass_confirm']));
//
//         $catcher = "SELECT password FROM students WHERE studId = '$ID'";
//         $oldpass = mysqli_query($db, $catcher);
//         $row = mysqli_fetch_assoc($oldpass);
//         $oldpassword_database = $row['password'];
//
//         if($old_pass == $oldpassword_database){
//
//             if($new_pass != $confirm_pass){
//                 $message = "Invalid!!";
// 				echo "<script type='text/javascript'>alert('$message');</script>";
//             }else{
//                 $query = "UPDATE students SET password = '$new_pass' WHERE studId = '$ID'";
//                 mysqli_query($db, $query);
//                 $message = "Password has been changed!";
// 				echo "<script type='text/javascript'>alert('$message');</script>";
//
// 				header("refresh: 0; URL = homepage.php");
//             }
//         }
//     }
//
//
// ?>
 <html>
 <head>
 <style>
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

             <div lass="modal-body">
                 <?php
//                     echo"
//                         <table>
//                             <tbody>
//                                 <tr>
//                                     <td class = 'info'>Full Name&nbsp&nbsp&nbsp&nbsp</td>
//                                     <td class = 'db_info'>{$fname} {$lname}</td>
//                                 </tr>
//                                 <tr>
//                                     <td class = 'info'>Student ID&nbsp&nbsp&nbsp&nbsp</td>
//                                     <td class = 'db_info'>{$user}</td>
//                                 </tr>
//                                  <tr>
//                                     <td class = 'info'>Year Level&nbsp&nbsp&nbsp&nbsp</td>
//                                     <td class = 'db_info'>{$year}</td>
//                                 </tr>
//                                  <tr>
//                                     <td class = 'info'>Age&nbsp&nbsp&nbsp&nbsp</td>
//                                     <td class = 'db_info'>{$age}</td>
//                                 </tr>
//                                 <tr>
//                                     <td class = 'info'>ID&nbsp&nbsp&nbsp&nbsp</td>
//                                     <td class = 'db_info'>{$ID}</td>
//                                 </tr>
//                             </tbody>
//                         </table>
//                     ";
//                 ?>
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



     </div>


 </nav>



 </header>
 <body>
     <div class = "container" id = "announcement_container" style = "background-color: #a43828; border-radius: 35px; margin-top: 50px;">
         <div class = "announcement_title_box">
                 <h4 class = "announcement_title" style = "color: white;">Academic Announcements&nbsp;<span class = "glyphicon glyphicon-eye-open announcement_title"></span></h4>
                <hr style = "border: solid #48211b 4px;">
         </div>
         <?php
//             $announce = "SELECT * FROM announcements AS A
//             JOIN teacher AS T ON A.teacher_id = T.teachersID";
//
//             $aQuery = mysqli_query($db, $announce);
//
//             while($aRow = mysqli_fetch_assoc($aQuery)){
//
//               echo "<div class = 'announcments'>
//                     <h5 style = 'color: white;'>
//                     <strong>
//                         TEACHERS NAME:
//                     </strong>
//                             {$aRow['fName']} {$aRow['lName']}
//                     </h5>
//                     <h5 style = 'color: white;'>
//                         Office Name/Department:
//                             {$aRow['department']}
//                     </h5>
//                     <h5 style = 'color: white;'>
//                         Date:
//                             {$aRow['date']}
//                     </h5>
//                     <hr style = 'border: solid #48211b 1px;'>
//                     <h5 style = 'color: white;''>
//                         <b>Announcement: </b>
//
//                     </h5>
//                     <p style = 'color: white;'>
//                         {$aRow['topic']}
//                     </p>
//                     <hr style = 'border: solid #48211b 3px;'>
//                 </div>
//
//                 ";
//             }
        ?>
        <br>
    </div>
</body>
</html>
