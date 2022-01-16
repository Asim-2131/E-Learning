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
   <title>Admin Main Page</title>
   <link id="favicon" rel="icon"
          href="abc.png"
          type="image/png" 
          sizes="16x16">
</head>
	
<frameset>
      <frame src ="AdminList.php" name = "frame2"></frame>
</frameset>
</html>