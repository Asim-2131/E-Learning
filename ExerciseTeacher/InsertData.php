<?php 
include '../DatabaseConnection.php';
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
	<title>Add-Exercise</title>
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
	<h1 style = "padding-left : 30px"> Add New Question</h1>
  <hr>
	<br>
	<br>
  <a href="ExerciseT.php"><i class="fa fa-arrow-circle-left" style="font-size:30px">Back</i></a>

<div class="col-md-4 offset-md-4">
		<form action = "InsertData.php" method = "POST" enctype="multipart/form-data" style = "padding-left:30px">
      <div class="form-group">
                          <label for="Chapter">Chapter:</label>

                           
                            <select class="form-control" name="Chapter">
                              <?php 
                               $sql = "SELECT * FROM `lessions`";
                               
                               $cur = mysqli_query($connect,$sql);
                               foreach ($cur as $res) {
                                 
                                echo "<option value=" .$res['LessionId']. ">" .$res['Chapter']. "</option>";
                               }
                              ?>
                            </select>
                         
                      </div> 
                        <div class="form-group">
                          <label for="Lesson">Lesson:</label>

                           
                            <select class="form-control" name="Lesson">
                              <?php 
                               $sql = "SELECT * FROM `lessions`";
                               
                               $cur = mysqli_query($connect,$sql);
                               foreach ($cur as $res) {
                                 
                                echo "<option value=" .$res['LessionId']. ">" .$res['Title']. "</option>";
                               }
                              ?>
                            </select>
                         
                      </div> 
                       <div class="form-group">
                          <label for="Question">Question:</label>

                            <textarea  class="form-control input-sm" id="Question" name="Question" placeholder=
                                "Question Name" type="text"></textarea>
                            
                          </div>
                        
                      <div class="form-group">
                          <label for="ChoiceA">A:</label>

                            
                             <input class="form-control input-sm" id="ChoiceA" name="ChoiceA" placeholder=
                                "" type="text" value="">
                          
                      </div>

                      <div class="form-group">
                          <label for="ChoiceB">B:</label>

                            
                             <input class="form-control input-sm" id="ChoiceB" name="ChoiceB" placeholder=
                                "" type="text" value="" required>
                          </div>
                        
                      <div class="form-group">
                          <label for="ChoiceC">C:</label>

                            
                             <input class="form-control input-sm" id="ChoiceC" name="ChoiceC" placeholder=
                                "" type="text" value="" required>
                          </div>
                      <div class="form-group">
                          <label for="ChoiceD">D:</label>

                              <input class="form-control input-sm" id="ChoiceD" name="ChoiceD" placeholder=
                                "" type="text" value="" required>
                          </div>
                      <div class="form-group">
                          <label for="Answer">Answer-Option:</label>

                            
                             <!--input class="form-control input-sm" id="Answer" name="Answer" placeholder=
                                "Answer" type="text" value="" required-->
                                <select class="form-control" name="Answer" required>
                              
                                <option value="A">A</option>";
                                <option value="B">B</option>";
                                <option value="C">C</option>";
                                <option value="D">D</option>";

                               }
                              
                            </select>
                          </div>
                        
                      <div class="form-group">
                        
                          <label for="idno"></label>

                           <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                           </div>
		</form>
		</div>
</body>
</html>
<?php
if(isset($_POST['save'])){
 
			$Lesson = $_POST['Lesson']; 
			$Question = $_POST['Question']; 
			$Answer = $_POST['Answer'];
			$ChoiceA = $_POST['ChoiceA'];
			$ChoiceB = $_POST['ChoiceB']; 
			$ChoiceC = $_POST['ChoiceC']; 
			$ChoiceD = $_POST['ChoiceD']; 

      $date=date_create(date(),timezone_open("Asia/Calcutta"));
      $Date = date_format($date,"Y-m-d H:i:sP");

			$sql = "insert into exercise values('','$Lesson','$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Date')";
			if(mysqli_query($connect,$sql)){
				echo "
			<script>
			window.location = 'ExerciseT.php';
			</script>";
		}
		else{
			echo "error";
		}
		 
		}
?>