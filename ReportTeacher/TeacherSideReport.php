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
	<title>Student's Grade Report</title>
	<link rel="stylesheet" href="MainCss.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
	  	
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
<body >
	<?php include('../nav.php'); ?>

	<section id="navigation">
  <div id="mySidenav" class="sidenav">
    <a href="../../ProjectELearning/LessionTeacher/LessionT.php" id="lesson" target = "frame2">Lesson <i class="fas fa-book-open pull-right"></i></a> 
    <a href="../../ProjectELearning/ExerciseTeacher/ExerciseT.php" id="exercise" target = "frame2">Exercises <i class="fa fa-pencil pull-right"></i></a>
    <a href="../../ProjectELearning/ManageUser/ManageU.php" id="manageuser" target = "frame2">ManageStudent <i class="fa fa-user pull-right"></i></a>
    <a href="../../ProjectELearning/ReportTeacher/ReportT.php" id="about">Report <i class="fa fa-info-circle pull-right"></i></a>  
     <a href="#" id="logout">Logout <i class="fa fa-sign-out pull-right"></i></a> 
  </div>
</section>
<div class="container">
	<h1 style = "padding-left : 30px"> Student's Report card</h1>
	<hr>
	<br><br>
	<a href="ReportT.php"><i class="fa fa-arrow-circle-left" style="font-size:30px">Back</i></a>
<?php
	
	include "../DatabaseConnection.php";

	$Chapter = $_GET['Chapter'];
	$Title = $_GET['Title'];
	$sql = "select StudentId,Score from report where Chapter = '$Chapter' AND Title = '$Title'";
	$result = mysqli_query($connect,$sql);
	?>
	<table text-align="center" class="table table-bordered table-striped center">
		    <thead>
		      <tr>
		        <th>Roll No</th>
		        <th>Name</th>
		        <th>EmailAddress</th>
		        <th>Marks</th>
		      </tr>
		    </thead>
		    <tbody id="myTable">
	<?php
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$val = $row['StudentId'];
			$sql1 = "select * from studentdata where StudentId = '$val'";
			$result1 = mysqli_query($connect,$sql1);
			echo "<tr>";
			if(mysqli_num_rows($result1)){
				while($row1 = mysqli_fetch_assoc($result1)){
					?>
					<td><?PHP echo $row1['RollNo'];?></td>
					<td><?PHP echo $row1['Name'];?></td>
					<td><?PHP echo $row1['EmailId'];?></td>

					<?php
				}
			}
			?>
			
				<td><?php echo $row['Score'];?></td>
			</tr>
			<?php

		}
	}
?>
</table>
</div>
</body>
</html>