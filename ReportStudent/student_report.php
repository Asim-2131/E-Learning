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
	<title>Your Grade Report</title>
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
	<h1 style = "padding-left:30px;">Your Progress Report</h1>
	<hr>
<br><br>
<table class="table table-bordered table-striped ">
		    <thead>
		      <tr>
		        <th>Chapter</th>
		        <th>Title</th>
		        <th>AvgScore</th>
		      </tr>
		    </thead>
		    <tbody>


<?php


	include "../DatabaseConnection.php";
	$sql = "select DISTINCT Chapter from report where StudentId = $studentid";
	$result = mysqli_query($connect,$sql);
	$index = 0;
	$cnt = 0;
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$cnt1= 0;
			?>
			<tr>
				<td><?php echo $row['Chapter'];?></td>
				<td>
					<table class = "table table-bordered table-striped">
						
							<?php

								$val = $row['Chapter'];
								$sql1 = "select Title,Score from report where Chapter = '$val' and StudentId = $studentid";
								$result1 = mysqli_query($connect,$sql1);
								if(mysqli_num_rows($result1)){
									while($row2 = mysqli_fetch_assoc($result1)){
										$cnt1 = $cnt1 + (int)$row2['Score'];
										?>
										<tr>
										<td><?php echo $row2['Title'];?></td>
										<td><?php echo $row2['Score'];?></td>
										</tr>
										<?php

									}
								}

							?>
						
					</table>
				</td>
				<td><?php $val = ($cnt1/20) * 100; echo $val; echo "%"; $cnt += $val?></td>
			</tr>

			<?php
			$index++;
		}
	}


?>
	</div>
</table>
<?php 
  if ($index == 0) {
    echo "<h3 style='color: red'>You have not participated in a single quiz in the past.</h3>";
  }
  else{
?>
<h2 text-align="center"> Your Total Average Score is : <?php echo round($cnt/$index,2); echo "%";?></h2>
<?php 
  }
?>
</body>
</html>