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
	<title>Exercise</title>
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

	<h1 style = "padding-left:30px;"> List Of Exercises</h1>
	<hr>
	<br>
	<br>
	<div class = "row" style = "padding-left:40px">
		<div class = "col-sm-4">
			<form action = "ExerciseT.php" method = "POST">
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
		        <th>No.</th>
				<th>Lesson</th>
				<th>Question</th>
				<th>A</th>
				<th>B</th>
				<th>C</th>
				<th>D</th>
				<th>Answer-Option</th>
				<th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="myTable">

		<?php
		$sql = "SELECT * FROM `lessions` l, `exercise` e WHERE l.`LessionID`=e.`LessionID`";
		$index = 1;
		$result = mysqli_query($connect,$sql);
		$data = array();
		if(mysqli_num_rows($result)){

			while($row = mysqli_fetch_assoc($result)){
				array_push($data,$row['ExerciseId']);
				?>

				<tr align="center">
					<td><?php echo $index;?></td>
					<td><?php echo $row['Title']?></td>
					<td><?php echo $row['Questions']?></td>
					<td><?php echo $row['OptionA']?></td>
					<td><?php echo $row['OptionB']?></td>
					<td><?php echo $row['OptionC']?></td>
					<td><?php echo $row['OptionD']?></td>
					<td><?php echo $row['Answer']?></td>

					<td><form action = "ExerciseT.php" method = "POST">
							
							<button type = "submit" class= "btn btn-info" name = "editbtn" value = <?php echo $index;?>>Edit   
								<span class="fa fa-pencil-square-o"></span>
							</button>&nbsp&nbsp&nbsp&nbsp&nbsp<button type = "type" class= "btn btn-danger" name = "deletebtn" value = <?php echo $index;?>>Delete    <span class="fas fa-trash"></span>
							</button>
						</form>
					</td>
					
				</tr>				

				<?php
				$index++;

			}

		}


	}
/*
	else{

@$limit=$_GET['limit'];
if(strlen($limit) > 0 and !is_numeric($limit)){
echo "Data Error";
exit;
}

switch($limit)
{
case 2:
$select2="selected";
$select10="";
$select5="";
break;

case 5:
$select5="selected";
$select10="";
$select2="";
break;

default:
$select10="selected";
$select5="";
$select2="";
break;

}

@$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}
echo "<div class='container'>";

$page_name="ExerciseT.php";
echo "<div class='form-group'>Select Number of records per page: <form method='GET' action='".$page_name."''>
<select name=limit>
<option value=10 $select10>10 Records</option>
<option value=5 $select5>5 Records</option>
<option value=2 $select2>2 Records</option>
</select></div><button type='submit' value='GO'>GO</button>";

$eu = ($start - 0); 

if(!$limit > 0 ){ 
$limit = 10;  
}                             
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 

?>
<table text-align="center" class="table table-bordered table-striped center">
		    <thead>
		      <tr>
		        <th>No.</th>
				<th>Lesson</th>
				<th>Question</th>
				<th>A</th>
				<th>B</th>
				<th>C</th>
				<th>D</th>
				<th>Answer</th>
				<th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="myTable">
		    	<?php



$query="SELECT * FROM `lessions` l, `exercise` e WHERE l.`LessionID`=e.`LessionID` limit $eu, $limit ";
$index = 1;
$result1 = mysqli_query($connect,$query);
$data = array();

while($row = mysqli_fetch_assoc($result1)) {
array_push($data,$row['ExerciseId']);

?>
<tr align="center">
					<td><?php echo $index;?></td>
					<td><?php echo $row['Title']?></td>
					<td><?php echo $row['Questions']?></td>
					<td><?php echo $row['OptionA']?></td>
					<td><?php echo $row['OptionB']?></td>
					<td><?php echo $row['OptionC']?></td>
					<td><?php echo $row['OptionD']?></td>
					<td><?php echo $row['Answer']?></td>

					<td><form action = "ExerciseT.php" method = "POST">
							
							<button type = "submit" class= "btn btn-info" name = "editbtn" value = <?php echo $index;?>>Edit<span class="glyphicon glyphicon-edit"></span>
							</button>&nbsp&nbsp&nbsp&nbsp&nbsp
							<button type = "type" class= "btn btn-danger" name = "deletebtn" value = <?php echo $index;?>>Delete<span class="glyphicon glyphicon-trash"></span>
							</button>
						</form>
					</td>
					
				</tr>	
				<?php
				$index++;
}
$x=$index;
echo "</table>";
$z =$x-1;
echo "Total ".$z." Row in the page.";
echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";

if($back >=0) { 
print "<a href='$page_name?start=$back&limit=$limit'><font face='Verdana' size='2'>PREV<<</font></a>"; 
} 


echo "</td><td align=center width='30%'>";
$i=0;
$l=1;

for($i=0;$i < $x;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i&limit=$limit'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='4' color=red>$l</font>";}  
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";

if($this1 < $x) { 
print "<a href='$page_name?start=$next&limit=$limit'><font face='Verdana' size='2'>NEXT>></font></a>";} 
echo "</td></tr></table></div>";


}
*/
?>
</table></div>

<?php


	if(isset($_POST['editbtn'])){

		$idx = (int)$_POST['editbtn'];
		$LID = (int)$data[$idx - 1];
		$_SESSION['exerciseIdSelectedToEdit'] = $LID;
		echo "
		<script>
		window.location = 'EditFile.php';
		</script>";

	}
	else if(isset($_POST['deletebtn'])){
		$idx = (int)$_POST['deletebtn'];
		if($idx <= sizeof($data)){
			$LID = (int)$data[$idx - 1];
			$sql = "delete from exercise where ExerciseId = $LID";
			$result  = mysqli_query($connect,$sql);
			echo "
			<script>
			window.location = 'ExerciseT.php';
			</script>";
		}
	}
?>