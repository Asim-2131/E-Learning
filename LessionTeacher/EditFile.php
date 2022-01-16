<?PHP

session_start();
include '../DatabaseConnection.php';

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

<?php

	$Chapter = "";
	$Title = "";
	$Catagory = "";
	$LessionId = (int)$_SESSION['lessionIdSelectedToEdit'];
	$sql = "select * from lessions where LessionId = $LessionId";
	$result = mysqli_query($connect,$sql);
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$Chapter = $row['Chapter'];
			$Title = $row['Title'];
			$Catagory = $row['Catagory'];
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit-Lesson</title>
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
    <a href="../../ProjectELearning/ExerciseTeacher/ExerciseT.php" id="exercise" target = "frame2">Exercises <i class="fas fa-pen pull-right"></i></a>
    <a href="../../ProjectELearning/ManageUser/ManageU.php" id="manageuser" target = "frame2">ManageStudent <i class="fa fa-user pull-right"></i></a>
    <a href="../../ProjectELearning/ReportTeacher/ReportT.php" id="about">Report<i class="fa fa-info-circle pull-right"></i></a>  
     <a href="../TeacherMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right"></i></a> 
  </div>
</section> 
<div class="container">
<h1 style = "padding-left:30px"> Edit File</h1>
<hr>
<br>
<br>
	<a href="LessionT.php"><i class="fa fa-arrow-circle-left" style="font-size:30px">Back</i></a>

<div class="col-md-4 offset-md-4">
		<form action = "EditFile.php" method = "POST" enctype="multipart/form-data">
			<div class = "form-group">
				<label for="fn"> Chapter </label>
				<input class="form-control"placeholder="Enter Chepter" name = 'chapter' value = <?php echo $Chapter;?> required>
			</div>
			<div class = "form-group">
				<label for="fn"> Title </label>
				<input class="form-control"placeholder="Enter Title" name = 'title' value = <?php echo $Title;?> required>
			</div>
			<div class = "form-group">
				<label for="fn"> Catagory </label><br>
				<input list="browsers" name="browser" required>
				<datalist id="browsers">
				   <option value="PDF">
				   <option value="Video">
				</datalist>
			</div>
			<div class = "form-group">
				<label for="fn"> File </label>
				<input type = "file" name = "file1"  accept = ".pdf,.mp4" required>
			</div>
			<div class="center">
				<button type = "submit" class = "btn btn-info" name ="ModFile">Edit</button>

			</div>
		</form>
		</div>
	</div>
</body>
</html>
<?php

	if(isset($_POST['ModFile'])){

		$fileName = $_FILES['file1']['name'];
		$OriginalPath = $_FILES['file1']['tmp_name'];

		$StoredPath = "../OutDatabase/".$fileName;
		if(!copy($OriginalPath,$StoredPath)){}

		$chapter = $_POST['chapter'];
		$title = $_POST['title'];
		$catagory = $_POST['browser'];
		$path = $StoredPath;

		$sql = "delete from lessions where LessionId = $LessionId";
		$result = mysqli_query($connect,$sql);
		$sql = "insert into lessions values('','$chapter','$title','$catagory','$path')";
		
		if(mysqli_query($connect,$sql)){
			echo "
		<script>
		window.location = 'LessionT.php';
		</script>";
		}
		else{
			echo "error";
		}

	}


?>