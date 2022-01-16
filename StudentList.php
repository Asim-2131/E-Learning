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


  include "DatabaseConnection.php";

  if (isset($_SESSION['RollNo'])){ 

      $rollno = $_SESSION['RollNo'];

      $sql = "select * from studentdata where RollNo='$rollno'";
      $result = mysqli_query($connect,$sql);
      if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_assoc($result)){
          $Name = $row['Name'];
          $spic = $row['spic'];
          $studentid = $row['StudentId'];
      $RollNo = $row['RollNo'];
      $MobileNo = $row['MobileNo'];
      $Address = $row['Address'];
      $EmailId = $row['EmailId'];
      $passworddd = $row['PassWord'];
          
      }
      }
    }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Student List</title>
  <link rel="stylesheet" type="text/css" href="MainCss.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
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

main
{
  width: 100%;
  height: 85vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: white;
}
#name
{ 
  display: flex;
  color: white;
  text-align: center;
  text-shadow: 1px 1px 2px #270949;
  letter-spacing: 3px;
  font-size: 35px;
  font-weight: 200;
}

main section h3
{
  font-size: 35px;
  font-weight: 200;
  letter-spacing: 3px;
  text-shadow: 1px 1px 2px #270949;
}
main section h1
{
  margin: 30px 0 20px 0;
  font-size: 55px;
  font-weight: 700;
  text-shadow: 2px 1px 5px #270949;
  text-transform: uppercase;
}

main section p
{
  font-size: 25px;
  word-spacing: 2px;
  margin-bottom: 25px;
  text-shadow: 1px 1px 1px #270949;
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

section .btnone
{
  background: white;
  color: black;
  text-decoration: none;
}
.btnone:hover
{
  background:#270949;
  color: white;
}
section .btntwo
{
  background:#270949;
  color: white;
  text-decoration: none;
}
.btntwo:hover
{
  background: white;
  color: black;
}

.change_content:after
{
  content: '';
  animation: changetext 10s infinite linear;
  color:#270949;
}

@keyframes changetext
{
  0%{content: "C";}
  25%{content: "C++";}
  50%{content: "Python";}
  75%{content: "java";}
  100%{content: "FrontEnd";} 
}

.foot
{
  background-color: #EAE0F1;
  color: #270949;
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
    background-color: #270949 !important;
}
.bg-blue {
    background-color: #270949 !important;
}
.bg-aqua {
    background-color: #270949 !important;
}
.bg-green {
    background-color: #270949 !important;
}
.bg-red {
    background-color: #270949 !important;
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
    top: 75%;
    left: 50%;
    margin-left: -45px;
}
.widget-user .widget-user-image>img {
    width: 20%;
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
    border-top: 1px solid #270949;
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




    </style>
</head>

<body>
  <?php  if (isset($_SESSION['RollNo'])) : 

    include 'DatabaseConnection.php';

    $rollno = $_SESSION['RollNo'];

    $sql = "select * from studentdata where RollNo='$rollno'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
      $name = $row['Name'];
      $pic = $row['spic'];
    }
    }
    ?>
  <nav class="navbar navbar-expand-lg hi">
        <a class="navbar-brand" href="StudentMainPage.php">
            <!--i class="fas fa-book-reader"  style='font-size:50px; text-decoration: none; color: black' ></i-->
            <img src="abc.png" width="50" height="50" />

        </a>
        <h3>Online Learning System</h3>

        <button class="navbar-toggler but1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link first" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <a data-toggle="modal" data-target="#exampleModalCenter"><img class="image-fluid image-thumbnail rounded-circle" src="<?php echo $pic;?>" width="50px" height="50px"></a>
            <script>
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
          <h5 class="widget-user-desc"><?php echo $RollNo;?></h5>
        </div>
        <div class="widget-user-image">
          <img style="width: 25%" class="image-fluid image-thumbnail rounded-circle" src="<?php echo $spic;?>" alt="User Avatar" width="50px" height="50px">
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
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
          <form action = "StudentList.php" method = "POST" enctype="multipart/form-data" style = "padding-left:30px">

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
                    <img src="<?php echo $spic;?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                  </div>
                  <div class="form-group">
                    <label class="control-label">MobileNo</label>
                    <input type="text" class="form-control form-control-sm" id = "MobileNo" name="mmm" required value = "<?php echo $MobileNo;?>">
                  </div>
                </div>
            </div>  
            
        </div>
          <div class="modal-footer">
        
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name = "SaveChanges">Save Changes</button></form>       
            </div>
        </div>
    </div>     
</div>



        </div>

        </nav>
        
        
    

        <main>
            <section>
                <h3>Hi <?php echo $name; ?>,</h3>
                <h1>Do Come and To Learn
                    <span class="change_content"> </span> languages..
                </h1>
                <p>A Learning Curve is essential to Growth...</p>
                <a href="#" class="btnone">Learn more</a>       
                <a href="#" class="btntwo">Sign-in here</a><br><br>
            </section>
        </main>
    <?php endif ?>

  <section id="navigation">
  <div id="mySidenav" class="sidenav">
    <a href="../ProjectELearning/LessionStudent/LessionS.php" id="lesson" target = "frame2">Lesson <i class="fas fa-book-open pull-right"></i></a> 
    <a href="../ProjectELearning/ExerciseStudent/ExerciseS.php" id="exercise" target = "frame2">Exercises <i class="fas fa-pen pull-right"></i></a>
    <a href="../ProjectELearning/ReportStudent/student_report.php" id="report">Report<i class="fa fa-info-circle pull-right"></i></a>  
     <a href="StudentMainPage.php?logout='1'" id="logout">Logout <i class="fa fa-sign-out pull-right "></i></a> 
  </div>
</section>  
<footer>
        <p class="p-3 text-center foot">@18BCE{256,261},19BCE530<br>
            <a href="#"><img src="OutDatabase/facebook.png" width="20" height="20"></a>
            &nbsp;&nbsp;
            <a href="#"><img src="OutDatabase/twitter.png" width="20" height="20"></a>
            &nbsp;&nbsp;
            <a href="#"><img src="OutDatabase/linkedin.png" width="20" height="20"></a>
        </p>
    </footer>   
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
      $pas = "";
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
        $StoredPath = $spic;
      }
      $Mobb = $_POST['mmm'];


      $sql = "update studentdata set Name = '$nn',MobileNo ='$Mobb',Address = '$addd',PassWord = '$passs',spic = '$StoredPath' where StudentId = $studentid";
      
      if(mysqli_query($connect,$sql)){
          echo '<script>alert("Updated Successfully")</script>';
      }
      else{
          echo '<script>alert("Error in Update ")</script>';
        
      }
      
    }


  }

?>