<?php  if (isset($_SESSION['EmailId'])) : 

    include '../DatabaseConnection.php';

    $email = $_SESSION['EmailId'];

    $sql = "select * from teacherdata where EmailId='$email'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
      $name = $row['Name'];
      $pic = $row['tpic'];
    }
    }
    $pic1 = "../".$pic;
    ?>
  <nav class="navbar navbar-expand-lg hi">
        <a class="navbar-brand" href="../TeacherMainPage.php">
            <img src="../abc.png" width="50" height="50" />

        </a>

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
            <img class="image-fluid image-thumbnail rounded-circle" src="<?php echo $pic1;?>" width="50px" height="50px">
        
        </div>

        </nav>

    <?php endif ?>