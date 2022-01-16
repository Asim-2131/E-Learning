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
	<title>Review Your Marks</title>
	<link rel="stylesheet" href="MainCss.css">

	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		.flex-rectangle{
		    width: 100%;
		    background: #ca0164;
		}
		.flex-rectangle:before{
		    content: "";
		    display: block;
		    padding-top: 25%;
		}
		fieldset{
			border-color: black;
 			border-style: solid;
 			background-color: #cdf7f7;
		}
		.vertical-center {
		  margin: 0;
		  position: absolute;
		  top: 50%;
		  -ms-transform: translateY(-50%);
		  transform: translateY(-50%);
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
    <a href="../../ProjectELearning/LessionStudent/LessionS.php" id="lesson" target = "frame2">Lesson <i class="fas fa-book-open pull-right"></i></a> 
    <a href="../../ProjectELearning/ExerciseStudent/ExerciseS.php" id="exercise" target = "frame2">Exercises <i class="fas fa-pen pull-right"></i></a>
    
    <a href="../../ProjectELearning/ReportStudent/student_report.php" id="report">Report<i class="fa fa-info-circle pull-right"></i></a>  
     <a href="../StudentMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right "></i></a> 
  </div>
</section>  
<div class="container">
	<br>
  <a href="ExerciseS.php"><i class="fa fa-arrow-circle-left" style="font-size:30px">Back</i></a>
	
<?php

	include "../DatabaseConnection.php";

	if(isset($_GET['Chapter'])){
		$_SESSION['Chapter'] = $_GET['Chapter'];
	}
	if(isset($_GET['Title'])){
		$_SESSION['Title'] = $_GET['Title'];
	}

	if (isset($_SESSION['RollNo'])){ 

	    $rollno = $_SESSION['RollNo'];

	    $sql = "select * from studentdata where RollNo='$rollno'";
	    $result = mysqli_query($connect,$sql);
	    if(mysqli_num_rows($result)){
	      while($row = mysqli_fetch_assoc($result)){
	      $name = $row['Name'];
	      $pic = $row['spic'];
      $studentid = $row['StudentId'];
	      
	    }
	    }
    }
    

	$Chapter = $_SESSION['Chapter'];
	$Title = $_SESSION['Title'];
	$LI = "";
	$sql = "select LessionId from lessions where Chapter = '$Chapter' AND Title = '$Title'";
	$result = mysqli_query($connect,$sql);
	$index = 0;
	$exid = array();
	$Original_answers = array();
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			$LessionId = $row['LessionId'];
			$LI = $LessionId;
			$sql1 = "select * from exercise where LessionId = '$LessionId'";
			$result1 = mysqli_query($connect,$sql1);
			?>
			<form action = "Quiz.php" method = "POST">
			<?php
			if(mysqli_num_rows($result1)){
				while($row1 = mysqli_fetch_assoc($result1)){
					array_push($exid,$row1['ExerciseId']);
					$ExerciseId = $row1['ExerciseId'];
					array_push($Original_answers,$row1['Answer']);
					$sql2 = "select * from review where LessionId = $LI AND ExerciseId = $ExerciseId AND StudentId = $studentid";
					$result2 = mysqli_query($connect,$sql2);
					if(mysqli_num_rows($result2)){
						while($row2 = mysqli_fetch_assoc($result2)){

							?>
							<fieldset>
								<legend> <b style = "font-size:20px;"><?PHP echo $index+1;?></b></legend>
								Q:   <?PHP echo $row1['Questions'];?>
								<br>
								<br>
								<input type="radio" name="que<?php echo $index;?>" value="A" disabled="disabled" 
								<?php
									if($row2['StudentTicked'] =='A') {
										?>
										checked
										<?php
									}
								?>
								>
							    <label for="male">A. <?php echo $row1['OptionA'];?></label>
							    <?php
							    	if($row2['OriginalAnswer'] == 'A'){
							    		?>
							    		<span class="glyphicon glyphicon-ok" style = "color:blue"></span>
							    		<?php
							    	}
							    ?><br>
							    <input type="radio" name="que<?php echo $index;?>" value="B" disabled="disabled"
							    <?php
									if($row2['StudentTicked'] =='B') {
										?>
										checked
										<?php
									}
								?>>
							    <label for="female">B. <?php echo $row1['OptionB'];?></label>
							    <?php
							    	if($row2['OriginalAnswer'] == 'B'){
							    		?>
							    		<span class="glyphicon glyphicon-ok" style = "color:blue"></span>
							    		<?php
							    	}
							    ?><br>
							    <input type="radio" name="que<?php echo $index;?>" value="C" disabled="disabled"
							    <?php
									if($row2['StudentTicked'] =='C') {
										?>
										checked
										<?php
									}
								?>>
							    <label for="other">C. <?php echo $row1['OptionC'];?></label>
							    <?php
							    	if($row2['OriginalAnswer'] == 'C'){
							    		?>
							    		<span class="glyphicon glyphicon-ok" style = "color:blue"></span>
							    		<?php
							    	}
							    ?><br>
							    <input type="radio" name="que<?php echo $index;?>" value="D" disabled="disabled"
							    <?php
									if($row2['StudentTicked'] =='D') {
										?>
										checked
										<?php
									}
								?>>
							    <label for="other">D. <?php echo $row1['OptionD'];?></label>
							    <?php
							    	if($row2['OriginalAnswer'] == 'D'){
							    		?>
							    		<span class="glyphicon glyphicon-ok" style = "color:blue"></span>
							    		<?php
							    	}
							    ?><br>
							</fieldset><br>
							<?php
							$index++;
						}
					}
				}

			}
			?>
				
			</form>
			<?php
		}
	}


?>
</div>
</body>
</html>