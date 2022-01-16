<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Signup Form</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .error {color: #FF0000;}
       body{
    width: 100%;
      height: calc(100%);
      position: relative;
      top:0;
      left: 0;
    
      /*background: #007bff;*/
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
  $nameErr = $rollnoErr  = $mobileErr = $emailErr = $addressErr = $password1Err = $password2Err = "";
  $name = $rollno = $mobile = $email = $address = $sub2 = $password1 = $password2 = "";
  $errors = array(); 

        include "DatabaseConnection.php";
  

  if (isset($_POST['signup'])) 
  {

  	$name = mysqli_real_escape_string($connect, $_POST['name']);
    $rollno = mysqli_real_escape_string($connect, $_POST['rollno']);
    $mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password1 = mysqli_real_escape_string($connect, $_POST['password1']);
    $password2 = mysqli_real_escape_string($connect, $_POST['password2']);

    if (empty($name)) 
    {
        $nameErr = "Name is required";
        array_push($errors, $nameErr);
    } 
    else 
    {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
        {
          $nameErr = "Only letters and white space allowed";
          array_push($errors, $nameErr);
        }
    }

    if (empty($rollno)) 
    {
        $rollnoErr = "Roll Number is required";
        array_push($errors, $rollnoErr);
    } 
    else 
    {
        $rollno = test_input($_POST["rollno"]);
        if (!preg_match('/^[0-9]{2}[a-zA-Z]{3}[0-9]{3}$/',$rollno)) 
        {
          $rollnoErr = "Roll Number is must be in format of 18BCE256.";
          array_push($errors, $rollnoErr);
        }
    }
 
    if (empty($mobile)) 
    {
        $mobileErr = "Phone number is required";
        array_push($errors, $mobileErr);
    } 
    else 
    {
      $mobile = test_input($_POST["mobile"]);
      if (!preg_match('/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/', $mobile)) 
      {
        $mobileErr = "Format of Mobile Number is wrong";
        array_push($errors, $mobileErr);
      }
    }

    if (empty($email)) 
    {
        $emailErr = "Email is required";
        array_push($errors, $emailErr);
    } 
    else 
    {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
          $emailErr = "Invalid email format";
          array_push($errors, $emailErr);
        }
    }

    if (empty($address)) 
    {
        $addressErr = "Name is required";
        array_push($errors, $addressErr);
    } 
    else 
    {
        $address = test_input($_POST["address"]);
    }

    if (empty($password1)) 
    {
        $password1Err = "Password is required";
        array_push($errors, $password1Err);
    } 
    else 
    {
        $password1 = test_input($_POST["password1"]);
    }

    if (empty($password2)) 
    {
        $password2Err = "Please Confirm your Password";
        array_push($errors, $password2Err);
    } 
    else 
    {
        $password2 = test_input($_POST["password2"]);
        if ($password1 != $password2) 
	    {
	    	$password2Err = "The two passwords do not match" ;
	      	array_push($errors, $password2Err);
	    }
    }

    $user_check_query = "SELECT * FROM studentdata WHERE EmailId='$email' OR RollNo='$rollno' LIMIT 1";
    $result = mysqli_query($connect, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) 
    { 
        if ($user['EmailId'] === $email) 
        {
            $emailErr = "Email Id already exists";
            array_push($errors, $emailErr);
        }
        if ($user['RollNo'] === $rollno) 
        {
            $rollnoErr = "Roll Number already exists";
            array_push($errors, $rollnoErr);
        }
    }


    $fileName = $_FILES['pic']['name'];
    $OriginalPath = $_FILES['pic']['tmp_name'];
    $StoredPath = "OutDatabase/".$fileName;
    if(!copy($OriginalPath,$StoredPath)){
      echo "error";
    }
    else{
      $path = $StoredPath;
    }

    if (count($errors) == 0) 
    {
    	$password = $password1;
    	$query = "INSERT INTO studentdata VALUES('','$rollno','$name','$mobile','$address','$email','$password','$path')";
    	mysqli_query($connect, $query);
    	$_SESSION['Name'] = $name;
    	//$_SESSION['success'] = "You are now logged in,..";
    	header('location: SLogIn.php');
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

<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center w-100">
          <span  class="m-4 p-2">
          <!--h1 class="text-gradient-primary text-center" style="font-size: 4rem; color: red;"><b><i class="fas fa-pen-alt text-gradient-primary"></i></b></h1-->
          <img src="formAll.png" height="100" />
          
          <h2 class="text-gradient-primary" style="color: black;"><b>Student's SignUp Form</b></h2><h6 style="color: black;">All fields are mendetory</h6>
          </span>
        </div>
    <form method="post" action="SSignUp.php"  enctype="multipart/form-data" >
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
<div class="form-group col-md-6">
        <input type="text" class="form-control" id="inputName4" value="<?php echo $name;?>" name="name" placeholder="Student's Name">
        <span class="error"><?php echo $nameErr;?></span>
    </div>
<div class="form-group col-md-6">
<input type="text" class="form-control" id="inputName4" value="<?php echo $rollno;?>" name="rollno" placeholder="Student's Roll Number">
        <span class="error"><?php echo $rollnoErr;?></span>
</div>
</div>
                    <div class="row">
<div class="form-group col-md-12">
        <input type="email" class="form-control" id="inputEmail4" value="<?php echo $email;?>" name="email" placeholder="Student's Email ID">
        <span class="error"><?php echo $emailErr;?></span>
    </div>
</div>
                    <div class="row">
<div class="form-group col-md-12">
        <input type="password" class="form-control" id="inputPwd4" name="password1" placeholder="Password">
        <span class="error"><?php echo $password1Err;?></span>
    </div>
</div>
                    <div class="row">
<div class="form-group col-md-12">
        <input type="password" class="form-control" id="inputPwd4" name="password2" placeholder="Confirm Password">
        <span class="error"><?php echo $password2Err;?></span>
    </div>
                    </div>
</div>

                    <div class="col-md-6">
<div class="form-group">
        <input type="number" class="form-control" id="inputNumber4" value="<?php echo $mobile;?>" name="mobile" placeholder="Mobile Number" maxlength="10">
        <span class="error"><?php echo $mobileErr;?></span>
    </div>

    <div class="form-group">
        <textarea class="form-control" cols="30" rows="3" name="address" id="inputAddress4" value="<?php echo $address;?>" placeholder="Enter Address"></textarea>
        <span class="error"><?php echo $addressErr;?></span>
    </div>

<div class="form-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="pic" accept="image/*"  onchange="displayImgProfile(this,$(this))" required>
        <label class="custom-file-label" for="customFile">Choose a file...</label>
    </div>
    </div>
<div class="form-group d-flex justify-content-center rounded-circle">
                            <img src="" alt="" id="profile" class="img-fluid img-thumbnail rounded-circle" style="max-width: calc(50%)">
                        </div>

</div>


</div>
</div>

        <center><button type="submit" class="btn btn-block btn-primary col-sm-5 align-self-center" name="signup"><b>Sign-Up</b></button></center>
        <hr>
        <center><a href="SLogIn.php" class="btn btn-block btn-wave btn-success col-sm-5 bg-gradient-success">Log-In</a></center>
        <hr><hr>
        <h6 style="color: black;">For Teachers:</h6>
      <center><a href="TSignUp.php" class="btn btn-block btn-wave btn-secondary col-sm-5 bg-gradient-secondary">Sign-Up</a></center>


</form>
</div>
</main>





</body>
</html>

<script type="text/javascript">
    function displayImgProfile(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

