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
	<br><br><br><br>
	<h1 style = "padding-left:30px;"> List Of Lessons</h1>
	<hr>
	<br>
	<br>
		<div class = "col-sm-12">
			<input class="form-control" id="myInput" type="text" placeholder="Search By Chapter, Title or Catagory">
		</div>
		<br>
		<br>
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
					<td><form action = "LessionS.php" method = "POST">
							
								<button class = "btn btn-success" name = "viewbtn" value = <?php echo $index;?>>View  
									<span class="fa fa-external-link"></span>
								</button>
								<button class = "btn btn-info" name = "downloadbtn" value = <?php echo $index;?>>Download  
									<span class="fas fa-download"></span>
								</button>

						</form>
					</td>
					
				</tr>				

				<?php
				$index++;

			}

		}



	
?>
</table>
</div>

<?php

	if(isset($_POST['viewbtn'])){
		$idx = (int)$_POST['viewbtn'];
		$lct = $location[$idx-1];
		echo "
		<script>
		window.open('$lct');
		</script>";
	}

	elseif(isset($_POST['downloadbtn'])){
		$idx = (int)$_POST['downloadbtn'];
		$lct = $location[$idx-1];

		$url = $lct;
		$file_name = basename($url);
		if(file_put_contents( $file_name,file_get_contents($url))) {
		    echo "
		<script>
		window.alert('Successfully Downloaded');
		</script>";
		}
		else {
		    echo "File downloading failed.";
		}
	}
?>