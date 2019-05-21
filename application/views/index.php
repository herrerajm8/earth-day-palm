<?php
session_start();
/*Registraion*/
/*require("connect.php");

    if(isset($_POST['regBtn'])){

        $fName = mysqli_real_escape_string($db, $_POST['studentfName']);
        $lName = mysqli_real_escape_string($db, $_POST['studentlName']);
        $email = mysqli_real_escape_string($db, $_POST['studentEmail']);
        $password = mysqli_real_escape_string($db, $_POST['pass']);
        $password_confirm = mysqli_real_escape_string($db, $_POST['pass_confirm']);
        $course = $_POST['course'];
        $gender = $_POST['gender'];
        $age = mysqli_real_escape_string($db, $_POST['age']);

       if($password == $password_confirm){

           foreach($gender as $g){
               foreach($course as $c){
                   if($course && $gender){
                        $password = md5($password);
                        $query = "INSERT INTO students(studId, firstName, lastName, age, year, password, email, course, studentGender) VALUES (null,'$fName','$lName','$age', 1,'$password', '$email', '$c', '$g')";
                        mysqli_query($db, $query);
                        $message = "Registration Successful!";
                        echo"<script type = 'text/javascript'>alert('$message');</script>";
                        header("refresh: 0.00; URL = index.php");
                    }

               }
           }
       }else{

            $message = "The password must match";
           echo"<script type = 'text/javascript'>alert('$message');</script>";
           header("refresh: 0; URL = index.php");


        }

    }

    if(isset($_POST['regBtnTeach'])){

        $fName = mysqli_real_escape_string($db, $_POST['studentfName']);
        $lName = mysqli_real_escape_string($db, $_POST['studentlName']);
        $email = mysqli_real_escape_string($db, $_POST['studentEmail']);
        $password = mysqli_real_escape_string($db, $_POST['pass']);
        $password_confirm = mysqli_real_escape_string($db, $_POST['pass_confirm']);
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $age = mysqli_real_escape_string($db, $_POST['age']);

       if($password == $password_confirm){

           foreach($gender as $g){
               foreach($course as $c){
                   if($gender && $course){
                        $password = md5($password);
                        $query = "INSERT INTO teacher(teachersID, fName, lName, age, gender, email, password, course)
                        VALUES (null,'$fName','$lName','$age','$g','$email', '$password', '$c')";
                        mysqli_query($db, $query);
                        $message = "Registration Successful!";
                        echo"<script type = 'text/javascript'>alert('$message');</script>";
                        header("refresh: 0; URL = index.php");
                    }

                }
           }
       }else{

            $message = "The password must match";
            echo"<script type = 'text/javascript'>alert('$message');</script>";
            header("refresh: 0; URL = index.php");


        }

    }
        */


/*Student Log In
    if(isset($_POST['loginBtn'])){
        $email = mysqli_real_escape_string($db, $_POST['loginemail']);
        $password = mysqli_real_escape_string($db, $_POST['passLogin']);
        $password = md5($password);

        $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
        $ret = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($ret);

        if(mysqli_num_rows($ret) == 1 ){
            $_SESSION['email'] = $email;
            $message = "Welcome";

            echo "<script type='text/javascript'>alert('$message');</script>";

            header("refresh: 0;url=welcome/homepage");
            echo base_url('welcome/homepage');
        }else{
            $message = "Invalid login attempt! Username or password is incorrect!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }*/

/*Teacher Log In*/
    if(isset($_POST['loginTeacher'])){
        $email2 = mysqli_real_escape_string($db, $_POST['teacher']);
        $password2 = mysqli_real_escape_string($db, $_POST['teachLogin']);
        $password2 = md5($password2);

        $sql2 = "SELECT email, password FROM teacher
                WHERE email = '$email2'
                AND password = '$password2'";

        $ret5 = mysqli_query($db, $sql2);
        $row5 = mysqli_fetch_assoc($ret5);

        if(mysqli_num_rows($ret5) == 1){
            $_SESSION['email'] = $email2;
            $message = "Welcome";

            echo "<script type='text/javascript'>alert('$message');</script>";

            header("refresh: 0;url=admin.php");
        }else{
            $message = "Invalid login attempt! Username or password is incorrect!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }


?>
<html>
<head>
<style>
</style>
<title>WELCOME</title>
<link rel = "stylesheet" href = "resources/bootstrap/css/bootstrap.css">
<link rel = "stylesheet" href = "resources/style.css">
<script src = "resources/jquery/jquery-3.2.1.min.js"></script>
<script src = "resources/bootstrap/js/bootstrap.min.js"></script>
</head>
    <header>
    <nav class = "nav navbar-default-top2" style="background-color:#48211b">

            <div class="container-fluid">
                <div class="col-md-5" style = "margin-top: 25px; margin-bottom: 35px;">
                    <img src = "resources/logo.jpeg" style = "height: 100px; width: 500px;">
                </div>
            </div>


    </nav>
</header>
<body>
    <div class = 'container-fluid'>
        <div class = 'container'>
            <div class = "row">


                <div class = 'col-md-5' id = 'loginBox'>
                    <form action = "<?php echo base_url('welcome/student_login_validate');?>" method="POST">
                        <div class = "row" style = "margin-bottom: 10px;">
                            <h3 style = "color: white; font-size: 28px;">
                                Student Login :
                                <div class style = "padding-right: 30px;">
                                    <hr>
                                </div>
                            </h3>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'loginemail' placeholder = "ID Number/Email" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'password' name = 'passLogin' placeholder = "Password" style = "border-radius: 10px;" required="required"/ >
                        </div>
                        <div class = "row">
                            <button type="submit" class="btn btn-success" name = "loginBtn">Login</button>
                            &nbsp;
                           <!--  <a href = 'forgotPass.php'>
                                <button type="button" class="btn btn-success" name = "forgotPass">Forgot Password</button>
                            </a> -->
                        </div>
                    </form>
                </div>


                <div class = 'col-md-5 col-md-offset-1' id = 'loginBox'>
                    <form action = "<?php echo base_url('welcome/admin');?>" method="POST">

                        <div class = "row" style = "margin-bottom: 10px;">
                            <h3 style = "color: white; font-size: 28px;">
                                Teacher Login :
                                <div class style = "padding-right: 30px;">
                                    <hr>
                                </div>
                            </h3>
                        </div>

                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'teacher' placeholder = "ID Number/Email" style = "border-radius: 10px;" required="required"/>
                        </div>

                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'password' name = 'teachLogin' placeholder = "Password" style = "border-radius: 10px;" required="required"/>
                        </div>

                        <div class = "row">
                            <button type="submit" class="btn btn-success" name = "loginTeacher">Login</button>
                        </div>

                    </form>
                </div>
                <!-- Register Form -->
                <div class = 'col-md-5' id = 'registerBox'>

                        <div class = "row" style = "margin-bottom: 10px;">
                            <h3 style = "color: white; font-size: 28px;">
                                Student Registration :
                                <div class style = "padding-right: 30px;">
                                    <hr>
                                </div>
                            </h3>
                        </div>

                <form action = "<?php echo base_url('welcome/register')?>" method="POST">
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'studentfName' placeholder = "First Name" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'studentlName' placeholder = "Last Name" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'studentEmail' placeholder = "Email Address" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'password' name = 'pass' placeholder = "Password" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'password' name = 'pass_confirm' placeholder = "Confirm Password" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = "text" name = "age" placeholder="Age" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <select name = "course" required="required">
                                <option value = "Acting">Acting</option>
                                <option value  = "Cinema">Cinema</option>
                                <option value  = "Animation">Animation</option>
                            </select>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <select name = "gender" required="required">
                                <option value  = "MALE">MALE</option>
                                <option value = "FEMALE">FEMALE</option>
                            </select>
                        </div>
                        <div class = "row">
                            <button type="submit" class="btn btn-success" name = "regBtn">Register</button>
                        </div>
                </form>
                </div>

                <div class = 'col-md-5 col-md-offset-1' id = 'registerBox'>
                        <div class = "row" style = "margin-bottom: 10px;">
                            <h3 style = "color: white; font-size: 28px;">
                                Teacher Registration :
                                <div class style = "padding-right: 30px;">
                                    <hr>
                                </div>
                            </h3>
                        </div>
                <form action = "welcome/teacher_register" method="POST">
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'studentfName' placeholder = "First Name" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'studentlName' placeholder = "Last Name" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'text' name = 'studentEmail' placeholder = "Email Address" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'password' name = 'pass' placeholder = "Password" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = 'password' name = 'pass_confirm' placeholder = "Confirm Password" style = "border-radius: 10px;" required="required"/>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <input type = "text" name = "age" placeholder="Age" style = "border-radius: 10px;" required="required"/>
                        </div>
                       <div class = "row" style = "margin-bottom: 15px;">
                            <select name = "course" required="required">
                                <option value = "Acting">Acting</option>
                                <option value  = "Cinema">Cinema</option>
                                <option value  = "Animation">Animation</option>
                            </select>
                        </div>
                        <div class = "row" style = "margin-bottom: 15px;">
                            <select name = "gender" required="required">
                                <option value = "MALE">MALE</option>
                                <option value  = "FEMALE">FEMALE</option>
                            </select>
                        </div>
                        <div class = "row">
                            <button type="submit" class="btn btn-success" name = "regBtnTeach">Register</button>
                        </div>
                </form>
                </div>

            </div>

        </div>

    </div>

</body>
</html>
