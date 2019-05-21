<!DOCTYPE html>
<html lang="en">
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
<body>
    
<nav class = "nav navbar-default-top2 main_nav">
        
    <div class="container-fluid">
        
        <div class="col-md-5" style = "margin-top:25px;">
            <img src = "<?php echo base_url('resources/logo.jpeg')?>" style = "height: 75px;">          
        </div>  
            
        <div class = "col-md-offset-10">
            <div class = "col-md-1">
                <button type = "button" class = "btn btn-info" data-toggle = "modal" data-target = "#myModal" style = "margin-top: 66px; margin-left:43px;">Profile</button>
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

<nav class="navbar navbar-default" style = 'background-color: #48211b;'>
  <div class="container-fluid">
    <ul class="nav navbar-nav home_nav">
        <li><a href="homepage">Home</a></li>
        <li><a href="<?php echo base_url('welcome/enrollment')?>">Student Enrollment</a></li>
        <li><a href="<?php echo base_url('welcome/all_classes')?>">All Classes</a></li>
        <li>
            <div class="dropdown">
              <button class="dropbtn">Student Features</button>
              <div class="dropdown-content">
                    <a href="<?php echo base_url('welcome/studyLoad')?>">Study Load</a>
                    <a href="<?php echo base_url('welcome/viewGrades')?>">View Grades</a>
              </div>
            </div>
        </li>
    </ul>
  </div>
</nav>
</body>