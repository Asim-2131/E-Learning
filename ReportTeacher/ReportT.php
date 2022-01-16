<?php

session_start();
if (!isset($_SESSION['EmailId'])) {
    session_destroy();
    unset($_SESSION['EmailId']);
    header('location: TLogIn.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['EmailId']);
    header("location: TLogIn.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Grade Report</title>
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
	  	hr{
	  		margin-right : 50px;
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

#manageuser {
    top: 340px;
    background-color: #267d26;
}

#about {
    top: 420px;
    background-color:#ffff26;
}
#logout {
    top: 500px;
    background-color: #6e6e6e;
}
.container
{
  left: 100px;
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
	<?php include('../nav.php'); ?>

	<section id="navigation">
  <div id="mySidenav" class="sidenav">
    <a href="../../ProjectELearning/LessionTeacher/LessionT.php" id="lesson" target = "frame2">Lesson <i class="fas fa-book-open pull-right"></i></a> 
    <a href="../../ProjectELearning/ExerciseTeacher/ExerciseT.php" id="exercise" target = "frame2">Exercises <i class="fa fa-pencil pull-right"></i></a>
    <a href="../../ProjectELearning/ManageUser/ManageU.php" id="manageuser" target = "frame2">ManageStudent <i class="fa fa-user pull-right"></i></a>
    <a href="../../ProjectELearning/ReportTeacher/ReportT.php" id="about">Report <i class="fa fa-info-circle pull-right"></i></a>  
     <a href="../TeacherMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right"></i></a> 
  </div>
</section>
<div class="container"> 
	<br><br>
<?php


	include "../DatabaseConnection.php";
	$sql = "select DISTINCT Chapter from lessions";
	$result = mysqli_query($connect,$sql);

	?>
	<ul style="list-style-type:none;">
	<?php

	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			?>


			<li><h2><?PHP echo $row['Chapter'];?></h2></li>
			<br>
			<ul style = "list-style-type : none;">

			<?php

				$sql1 = "select Title from lessions where Chapter = '".$row['Chapter']."'";
				$result1 = mysqli_query($connect,$sql1);
				if(mysqli_num_rows($result1)){
					while($row1 = mysqli_fetch_assoc($result1)){
						$linka = "TeacherSideReport.php?Chapter=".$row['Chapter']."&Title=".$row1['Title'];
						?>
						<li><h5><a href = "<?php echo $linka;?>"><?PHP echo $row1['Title'];?></a></h5></li>
						
						<?php
					}
				}

			?>	

			</ul> 
			<hr>

			<?php
		}
	}
	?>
	</ul>
	<?php

?>
</div>
</body>
</html>