<?php

session_start();

  if (!isset($_SESSION['RollNo'])) {
    session_destroy();
    unset($_SESSION['RollNO']);
    header('location: SLogIn.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['RollNo']);
    header("location: SLogIn.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Complete Submission</title>
	<link rel="stylesheet" href="MainCss.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		fieldset{
			border-color: black;
 			border-style: solid;
 			background-color: #cdf7f7;

		}

	  	th{
	  		text-align:center;
	  	}
	  	tr{
	  		text-align:center;
	  	}
#mySidenav a {
    position: absolute;
    left: -130px;
    transition: 0.3s;
    padding: 20px;
    width: 210px;
    text-decoration: none;
    font-size: 15px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}
#lesson {
    top: 180px;
    background-color: #26267d;
}

#exercise {
    top:260px;
    background-color: #d42626;
}

#report {
    top: 340px;
    background-color:#ffff26;
}
#logout {
    top: 420px;
    background-color: #6e6e6e;
}


	  	.hi
{
  background-color: #EAE0F1;
}

.navbar .but1
{
  background-color: white;
  border-color: #270949;
  border-width: 3px;
  border-radius: 19px;
}

.navbar .but1:hover
{
  background-color: #270949;
  border-color: white;
}

.navbar .navbar-nav li a
{
  width: 25%;
  text-decoration: none;
  color: white;
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.navbar .navbar-nav li .first
{
  width: 25%;
  text-decoration: none;
  color: #270949; 
  font-weight: bold;
  text-shadow: 1px 1px 2px black;
}

.navbar .form-inline input
{
  border-color: #270949;
  text-shadow: #270949;
}

.navbar .form-inline .but
{
  border-color: #270949;
  color: #270949;
}

.navbar .form-inline .but:hover
{ 
  background:#270949;
  color: white;
}
section a
{
  padding: 12px 30px;
  border-radius: 4px;
  outline: none;
  text-transform: uppercase;
  font-size: 13px;
  font-weight: 500;
  text-decoration: none;
  letter-spacing: 1px;
  transition: all 0.5s ease;
}
	</style>
</head>
<body>
	<?php include('../navS.php'); ?>

	<section id="navigation">
  <div id="mySidenav" class="sidenav">
    <a href="../../ProjectELearning/LessionStudent/LessionS.php" id="lesson" target = "frame2">Lesson <i class="fas fa-book-open pull-right"></i></a> 
    <a href="../../ProjectELearning/ExerciseStudent/ExerciseS.php" id="exercise" target = "frame2">Exercises <i class="fas fa-pen pull-right"></i></a>
    
    <a href="../../ProjectELearning/ReportStudent/student_report.php" id="report">Report<i class="fa fa-info-circle pull-right"></i></a>  
     <a href="../StudentMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right "></i></a> 
  </div>
</section>  
<div class="container">
<h1> Successfully Completed Test </h1>
<hr>
  <a href="ExerciseS.php"><i class="fa fa-arrow-circle-left" style="font-size:30px">Back</i></a>

<fieldset>
<u><b><h4 style=  "font-size:20px;">Your Score is : <?php echo $_GET['Marks'];?>/ <?php echo $_GET['Total'];?></h4></b></u>
</fieldset>
<br>
<br>
<div class="col-md-12 text-center">
    <a href = "ReviewMarks.php"><button class="btn btn-primary" >Review</button></a>
</div>
</div>
</body>
</html>