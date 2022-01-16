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
   <title>Student Main Page</title>
   <link id="favicon" rel="icon"
          href="abc.png"
          type="image/png" 
          sizes="16x16">
</head>
	
<frameset>
      <frame src ="StudentList.php" name = "frame2"></frame>
</frameset>
</html>