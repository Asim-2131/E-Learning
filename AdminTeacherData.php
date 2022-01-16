<?php 
  session_start(); 

  if (!isset($_SESSION['EmailId'])) {
    session_destroy();
    unset($_SESSION['EmailId']);
    header('location: ALogIn.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['EmailId']);
    header("location: ALogIn.php");
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Teacher Data</title>
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
	  	tr{
	  		text-align : center;
	  	}
	  	th{
	  		text-align: center;
	  	}
	  	a{
	  		text-decoration : none;
	  		color : white;
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
    top: 420px;
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

	<section id="navigation">
  <div id="mySidenav" class="sidenav">
    
    <a href="AdminStudentData.php" id="exercise" target = "frame2">Students <i class="fa fa-pencil pull-right"></i></a>
    <a href="AdminTeacherData.php" id="manageuser" target = "frame2">Teachers <i class="fa fa-user pull-right"></i></a>
    
     <a href="AdminMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right"></i></a> 
  </div>
</section> 
<div class="container">
	<h1 style = "padding-left:30px;">List Of Teachers</h1>
	<br>
	<br>
  <a style="color: blue" href="AdminList.php"><i class="fa fa-arrow-circle-left" style="font-size:30px">Back</i></a>

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
	<table text-align="center" class="table table-bordered table-striped center">
		    <thead>
		      <tr>
		        <th>Index</th>
		        <th>Email-Id</th>
		        <th>Name</th>
		        <th>Options</th>
		      </tr>
		    </thead>
		    <tbody id="myTable">
	
	<?php


		include "DatabaseConnection.php";
		$sql = "select * from teacherdata";
		$result = mysqli_query($connect,$sql);
		$data = array();
		$index = 0;
		if(mysqli_num_rows($result)){
			while($row = mysqli_fetch_assoc($result)){
				array_push($data,$row['TeacherId']);
				$index++;
				$path = "ProfileT.php?TeacherId=".$row['TeacherId'];
				?>
				<tr>
					<td><?php echo $index;?></td>
					<td><?php echo $row['EmailId'];?></td>
					<td><?php echo $row['Name'];?></td>
					<td>
						
						<form action = "AdminTeacherData.php" method = "POST">
								
							<a href = "<?php echo $path;?>"><button type = "button" class = "btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">View  
									<span class="fa fa-external-link"></span></button></a>
								

							<script>
								jQuery(document).ready(function() {
								    $('body').on('click', '#saves', function(event){
									      event.preventDefault();
									      $('#exampleModal').modal('hide');
									      $('#Newmodel').modal('show');
								    });
								});
							</script>


							&nbsp&nbsp&nbsp&nbsp&nbsp<button type = "submit" class= "btn btn-danger" name = "deletebtn" value = <?php echo $index;?>>Delete    <span class="fas fa-trash"></span>
						</form>

					</td>
				</tr>
				<?php
			}
		}
	?>
		</tbody>
	</table>
</body>
</html>
<?php

	

	if(isset($_POST['deletebtn'])){
		$idx = (int)$_POST['deletebtn'];
		if($idx <= sizeof($data)){
			$LID = (int)$data[$idx - 1];
			$sql = "delete from teacherdata where TeacherId = $LID";
			$result  = mysqli_query($connect,$sql);
			echo "
			<script>
			window.location = 'AdminTeacherData.php';
			</script>";
		}
	}


?>
