
<?PHP
/*
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
*/

  include "DatabaseConnection.php";

  //if (isset($_SESSION['RollNo'])){ 

      $TeacherId = $_GET['TeacherId'];

      $sql = "select * from teacherdata where TeacherId='$TeacherId'";
      $result = mysqli_query($connect,$sql);
      if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
          $Name = $row['Name'];
          $tpic = $row['tpic'];
          $teacherid = $row['TeacherId'];
      $MobileNo = $row['MobileNo'];
      $Address = $row['Address'];
      $EmailId = $row['EmailId'];
      $passworddd = $row['PassWord'];
          
      }
      }
   // }

?>


<!DOCTYPE html>
<html>
<head>
  <title>Teacher's Profile</title>
	<link rel="stylesheet" href="MainCss.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{
    margin-top:20px;
    background:#eee;
}
.box-widget {
    border: none;
    position: relative;
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.widget-user .widget-user-header {
    padding: 20px;
    height: 120px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
.bg-yellow {
    background-color: #f39c12 !important;
}
.bg-blue {
    background-color: #0073b7 !important;
}
.bg-aqua {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-red {
    background-color: #dd4b39 !important;
}
.widget-user .widget-user-username {
    margin-top: 0;
    margin-bottom: 5px;
    font-size: 25px;
    font-weight: 300;
    text-shadow: 0 1px 1px rgba(0,0,0,0.2);
    color:#fff;
}
.widget-user .widget-user-desc {
    margin-top: 0;
    color:#fff;
}

.widget-user .widget-user-image {
    position: absolute;
    top: 65px;
    left: 50%;
    margin-left: -45px;
}
.widget-user .widget-user-image>img {
    width: 90px;
    height: auto;
    border: 3px solid #fff;
}
.widget-user .box-footer {
    padding-top: 30px;
}
.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}
.box .border-right {
    border-right: 1px solid #f4f4f4;
}
.description-block {
    display: block;
    margin: 10px 0;
    text-align: center;
}
.description-block>.description-header {
    margin: 0;
    padding: 0;
    font-weight: 600;
    font-size: 16px;
}
.description-block>.description-text {
    text-transform: uppercase;
}
    </style></head>
<body>
	<button id="click" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
  View
</button>
<script>
  $(document).ready(function(){
 $('#click').click(function(){
    });
  // set time out 5 sec
     setTimeout(function(){
        $('#click').trigger('click');
    }, 1);
});

	jQuery(document).ready(function() {
	    $('body').on('click', '#saves', function(event){
		      event.preventDefault();
		      $('#exampleModal').modal('hide');
		      $('#Newmodel').modal('show');
	    });
	});
</script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="box box-widget widget-user">
        <div class="widget-user-header bg-aqua">
          <h3 class="widget-user-username"><?php echo $Name;?></h3>
          <h5 class="widget-user-desc"><?php echo $EmailId;?></h5>
        </div>
        <div class="widget-user-image">
          <img style="width: 25%" class="img-circle" src="<?php echo $tpic;?>" alt="User Avatar"  width="50px" height="50px">
        </div>
      </div>
      <br><br><br>

      <div class="modal-body">
	        <div class="card-footer">
		        <div class="container-fluid">
		        	<dl>
		        		<dt>Address</dt>
		        		<dd><?php echo $Address;?></dd>
		        	</dl>
		        	<dl>
		        		<dt>Email</dt>
		        		<dd><?php echo $EmailId?></dd>
		        	</dl>
					<dl>
		        		<dt>Contact</dt>
		        		<dd><?php echo $MobileNo?></dd>
		        	</dl>
		        </div>
		    </div>
	  </div>
      <div class="modal-footer">
        <a href = "AdminTeacherData.php"><button type="button" class="btn btn-primary" >Close</button></a>
        <button type="button" class="btn btn-primary" id = "saves" data-dismiss = "modal">Edit Profile</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Newmodel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle" style="font-size:20px">Edit Profile</h5>
	      	</div>
      		<div class="modal-body">
	        <form  method = "POST" enctype="multipart/form-data" style = "padding-left:30px">

					<input type="hidden" name="id" value="<?php/* echo $_SESSION['login_id'] */?>">
					
						<div class="row">
								<div class="col-md-6 border-right">
									<b class="text-muted">Personal Information</b>
									<div class="form-group">
										<label for="" class = "control-label">Name :-</label>
										<input type = "text" name = "name" class = "form-control form-control-sm" required value = "<?php echo $Name;?>">
									</div>
									<div class="form-group">
										<label for="" class = "control-label">Address :-</label>
										<textarea name="address" id="" cols="30" rows="4" class="form-control" required><?php echo $Address;?></textarea>
									</div>
									<b class="text-muted">Credentials</b>
									<div class="form-group">
										<label class="control-label">Email</label>
										<input type="email" class="form-control form-control-sm" name="email" required value="<?php echo $EmailId;?>" disabled>
										
									</div>
									<b class="text-muted">Change Password</b>
									<div class="form-group">
										<label class="control-label">New Password</label>
										<input type="password" class="form-control form-control-sm" id = "password" name="pass" >
										
									</div>
									<div class="form-group">
										<label class="control-label">Confirm Password</label>
										<input type="password" class="form-control form-control-sm" id = "confirm_password" name="cpass" onkeyup = 'check();' >
									</div>
									<span id='message'></span>

								</div>
								<div class = "col-md-6">
									<div class = "form-group">
										<label for="fn"> File </label>
										<input type = "file" name = "file1">
									</div>
									<div class="form-group d-flex justify-content-center">
										<img src="<?php echo $tpic;?>" alt="" id="cimg" class="img-fluid img-thumbnail">
									</div>
									<div class="form-group">
										<label class="control-label">MobileNo</label>
										<input type="text" class="form-control form-control-sm" id = "MobileNo" name="mmm" required value = "<?php echo $MobileNo;?>">
									</div>
								</div>
						</div>	
						
	  		</div>
      		<div class="modal-footer">
        
                	<a href = "AdminTeacherData.php"><button type="button" class="btn btn-primary" >Close</button></a>
		        	<button type="submit" class="btn btn-primary" name = "SaveChanges">Save Changes</button></form>	      
            </div>
        </div>
    </div>     
</div>
</body>
</html>
<script>
	var check = function() {
	  if (document.getElementById('password').value ==
	    document.getElementById('confirm_password').value) {
	    document.getElementById('message').style.color = 'green';
	    document.getElementById('message').innerHTML = 'matching';
	  } else {
	    document.getElementById('message').style.color = 'red';
	    document.getElementById('message').innerHTML = 'not matching';
	  }
	}
</script>
<?php

  if(isset($_POST['SaveChanges'])){


    if($_POST['pass'] != $_POST['cpass']){
      echo '<script>alert("Please Enter Equal Password")</script>';
    }
    else{

      $nn = $_POST['name'];
      $addd = $_POST['address'];
      $email = $EmailId;
      if(isset($_POST['pass']) && isset($_POST['cpass']) && !empty($_POST['pass']) && !empty($_POST['cpass'])){
      $passs = $_POST['pass'];}
      else{
        $passs = $passworddd;
      }
      $filename = "";
      $OriginalPath = "";
      $StoredPath = "";
      if(!empty($_FILES['file1']['name'])){
        $fileName = $_FILES['file1']['name'];
        $OriginalPath = $_FILES['file1']['tmp_name'];

        $StoredPath = "OutDatabase/".$fileName;
        if(!copy($OriginalPath,$StoredPath)){
        }
        else{
        }
      }
      else{
        $StoredPath = $tpic;
      }
      $Mobb = $_POST['mmm'];


      $sql = "update teacherdata set Name = '$nn',MobileNo ='$Mobb',Address = '$addd',PassWord = '$passs',tpic = '$StoredPath' where TeacherId = $teacherid";
      
      if(mysqli_query($connect,$sql)){
        echo "
      <script>
      window.location = 'AdminTeacherData.php';
      </script>";
      }
      else{
          echo '<script>alert("Error in Update ")</script>';
        
      }
      
    }


  }

?>