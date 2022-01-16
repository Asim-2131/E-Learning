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
	<title>Lesson</title>
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
<body>
	
	<?php include('../nav.php'); ?>

	<section id="navigation">
  <div id="mySidenav" class="sidenav">
    <a href="../../ProjectELearning/LessionTeacher/LessionT.php" id="lesson" target = "frame2">Lesson <i class="fas fa-book-open pull-right"></i></a> 
    <a href="../../ProjectELearning/ExerciseTeacher/ExerciseT.php" id="exercise" target = "frame2">Exercises <i class="fa fa-pencil pull-right"></i></a>
    <a href="../../ProjectELearning/ManageUser/ManageU.php" id="manageuser" target = "frame2">ManageStudent <i class="fa fa-user pull-right"></i></a>
    <a href="../../ProjectELearning/ReportTeacher/ReportT.php" id="about">Report<i class="fa fa-info-circle pull-right"></i></a>  
     <a href="../TeacherMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right"></i></a> 
  </div>
</section> 
<div class="container">
	<br><br><br><br>
	<h1 style = "padding-left:30px;"> List Of Lessons</h1>
	<hr>
	<br>
	<br>
	<div class = "row" style = "padding-left:40px">
		<div class = "col-sm-4">
			<form action = "LessionT.php" method = "POST">
			<button type = "submit" class= "btn btn-success" name = "addfile"><span class="fas fa-plus-circle"></span></button>

			</form> 
		</div>
		<div class = "col-sm-8">
			<input class="form-control" id="myInput" type="text" placeholder="Search..">
		</div>
	</div>
	<script>
	$(document).ready(function(){
	  $("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#myTable tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
	});
	</script>
	<br>
	<br>
</div>
</body>
</html>
<?php

	include '../DatabaseConnection.php';

	if(isset($_POST['addfile'])){

		echo "
		<script>
		window.location = 'InsertData.php';
		</script>";

	}
	
	
	else{

		?>
		<div class="container">

		<table text-align="center" class="table table-bordered table-striped center">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Chapter</th>
		        <th>Title</th>
		        <th>Catagory</th>
		        <th> Operations </th>
		      </tr>
		    </thead>
		    <tbody id="myTable">

		<?php
		$sql = "select * from lessions";
		$index = 1;
		$data = array();
		$result = mysqli_query($connect,$sql);
		$data = array();
		$location = array();
		if(mysqli_num_rows($result)){

			while($row = mysqli_fetch_assoc($result)){
				array_push($data,$row['LessionId']);
				array_push($location,$row['Location']);
				
				?>

				<tr align="center">
					<td><?php echo $index;?></td>
					<td><?php echo $row['Chapter']?></td>
					<td><?php echo $row['Title']?></td>
					<td><?php echo $row['Catagory']?></td>
					<td><form action = "LessionT.php" method = "POST">
							
								<button class = "btn btn-success" name = "viewbtn" value = <?php echo $index;?>>View  
									<span class="fa fa-external-link"></span>
								</button>
							</a>&nbsp&nbsp&nbsp&nbsp&nbsp
							<button type = "submit" class= "btn btn-info" name = "editbtn" value = <?php echo $index;?>>Edit   
								<span class="fa fa-pencil-square-o"></span>
							</button>&nbsp&nbsp&nbsp&nbsp&nbsp<button type = "submit" class= "btn btn-danger" name = "deletebtn" value = <?php echo $index;?>>Delete    <span class="fas fa-trash"></span>
							</button>
						</form>
					</td>
					
				</tr>				

				<?php
				$index++;

			}

		}
		echo "</table></div>";
		

	}
?>


<?php


	if(isset($_POST['editbtn'])){

		$idx = (int)$_POST['editbtn'];
		$LID = (int)$data[$idx - 1];
		$_SESSION['lessionIdSelectedToEdit'] = $LID;
		echo "
		<script>
		window.location = 'EditFile.php';
		</script>";

	}
	else if(isset($_POST['deletebtn'])){
		$idx = (int)$_POST['deletebtn'];
		if($idx <= sizeof($data)){
			$LID = (int)$data[$idx - 1];
			$sql = "delete from lessions where LessionId = $LID";
			$result  = mysqli_query($connect,$sql);
			echo "
			<script>
			window.location = 'LessionT.php';
			</script>";
		}
	}
	else if(isset($_POST['viewbtn'])){
		$idx = (int)$_POST['viewbtn'];
		$lct = $location[$idx-1];
		$locationn = explode('/',$lct);
		$sz = sizeof($locationn);
		$ss = "../".$locationn[$sz-2]."/".$locationn[$sz-1];
		echo "
		<script>
		window.open('$ss');
		</script>";
	}
?>