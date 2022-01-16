<?php
  session_start();
  header('SLogIn.php');
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Login Form</title>
	<link rel="stylesheet" href="MainCss.css">
	<link id="favicon" rel="icon"
          href="abc.png"
          type="image/png" 
          sizes="16x16">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .error {color: #FF0000;}
      body{
    width: 100%;
      height: calc(100%);
      position: fixed;
      top:0;
      left: 0;
  }
  main#main{
    width:100%;
    height: calc(100%) !important;
    display: flex;
  }
    </style>
</head>
<body style="background-color: #f0f0e8; ">
	<?php
  $rollnoErr = $passwordErr  = $xx = "";
  $rollno = $password = "";
  $errors = array(); 

        include "DatabaseConnection.php";
  

  if (isset($_POST['login'])) 
  {
    $rollno = mysqli_real_escape_string($connect, $_POST['rollno']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    
    
    if (empty($rollno)) 
    {
        $rollnoErr = "Email is required";
        array_push($errors, $rollnoErr);
    } 
    else 
    {
        $rollno = test_input($_POST["rollno"]);
    }
    
    if (empty($password)) 
    {
        $passwordErr = "Password is required";
        array_push($errors, $passwordErr);
    } 
    else 
    {
        $password = test_input($_POST["password"]);
    }

    $user_check_query = "SELECT * FROM studentdata WHERE RollNo='$rollno' LIMIT 1";
    $result = mysqli_query($connect, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if (!$user) 
    { 
      	$rollnoErr = "Roll Number Id Not exists";
        array_push($errors, $rollnoErr);
    }

    if (count($errors) == 0) 
    {
      $password = $password;
      $query = "SELECT * FROM studentdata WHERE RollNo='$rollno' AND PassWord='$password'";
      $results = mysqli_query($connect, $query);
      if (mysqli_num_rows($results) == 1) 
      {
        $_SESSION['RollNo'] = $rollno;

        header('location: StudentMainPage.php');
      }
      else {
        $xx = "Wrong username/password combination";
        array_push($errors, $xx);
      }
    }
    
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
	

<main id="main" > 
  <div class="container">
      <div class="col-md-8 offset-md-2 d-flex justify-content-center">
      <div id="login-center" class="row justify-content-center align-self-center w-100">
      <div class="d-flex justify-content-center align-items-center w-100">
          <span  class="m-4 p-2">
          <!--h1 class="text-gradient-primary text-center" style="font-size: 4rem; color: red;"><b><i class="fas fa-pen-alt text-gradient-primary"></i></b></h1-->
          <img src="formAll.png" height="100" />
          
          <h2 class="text-gradient-primary" style="color: black;"><b>Student's Login Form</b></h2>
          </span>
        </div>
        <div class="card col-sm-7">
          <div class="card-body">
          <form id="login-form" method="post" action="SLogIn.php">
            <div class="form-group">
                <input type="text" class="form-control" id="inputName4" value="<?php echo $rollno;?>" name="rollno" placeholder="Student's Roll Number">
                <span class="error"><?php echo $rollnoErr;?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="inputPwd4" name="password" placeholder="Password">
                <span class="error"><?php echo $passwordErr;?></span>
                <span class="error"><?php echo $xx;?></span>

            </div>
            <center><button type="submit" class="btn btn-block btn-wave btn-primary bg-gradient-primary" name="login">Log-In</button></center>
            <hr>
            <center><a href="SSignUp.php" class="btn btn-block btn-wave btn-success bg-gradient-success">Create New Account</a></center>

            <hr><hr>
              <h6 style="color: black;">For Teachers:</h6>
              <center><a href="TLogIn.php" class="btn btn-block btn-wave btn-secondary bg-gradient-secondary">Log-In</a></center>
          </form>
          </div>
        </div>
      </div>
      </div>
  </div>
</main>


</body>
</html>
