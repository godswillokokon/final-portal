<?php
require 'core.inc.php';
require '../init.php';
?>

<?php
function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

 if(isset($_POST['regnum']) && isset($_POST['password'])) {
  $regnum = $_POST['regnum'];
  $password = $_POST['password'];

  if(!empty($regnum) && !empty($password)){

  //$password_hash = md5('$password');
 
  $select = "SELECT `s_id` FROM `student` WHERE `password`= '$password' && `regnum` = '$regnum'";

    if ($result = mysqli_query($link, $select)) {

      $query_num_rows = mysqli_num_rows($result);
      if($query_num_rows == 0) {
        echo "Invalid User";

      } else if ($query_num_rows== 1) {
        $user_id = mysqli_result($result, 0, 's_id');
        $_SESSION['user_id']= $user_id;
        $level = getuserfield('level');
        if ($level == '100') {
        header('Location: year1.php');
        } else if ($level == '200') {
        header('Location: year2.php');
        } else if ($level == '300') {
        header('Location: year3.php');
        } else if ($level == '400') {
        header('Location: year4.php');
        }
      }
    } 

  } else {
    echo 'Some fields are empty';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">

    <link href="../CSS/bootstrap.min2.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../CSS/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom Fonts -->
    <link href="../CSS/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../CSS/simple-line-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../CSS/stylish-portfolio.min.css" rel="stylesheet">
    <!--<link href="bootstrap.min.css" rel="stylesheet">-->


<style type="text/css">

body{
  /*background-image: url(../Img/1.jpg);*/
  background: #2A3F54;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    color: #f5f5f5;
  }
  .text-warning {
    color: #f5f5f5;
}
</style>



</head>
<body>
  <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger">Welcome</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.html">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="register.php">Register</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="login.php">Login</a>
        </li>
      </ul>
    </nav>

<!-- if you want to create login page and register page together in one page ...you have to only chnage his name...that's it...                 -->
<div class="container">
  <div class="row">
    <div class="col-sm-4"> </div>
<div class="col-md-4">
  
<h1 class="text-center text-warning">Register Here</h1>
<br/>

<div class="col-sm-12">


<br/>


  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
<form action="../insert.php" method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name Here">
  </div>

  <div class="form-group">
    <label for="regnum">Reg Number</label>
    <input type="text" class="form-control" name="regnum" id="regnum" placeholder="Enter Reg Number Here">
  </div>

    <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Here">
  </div>
  
    <div class="form-group">
    <label for="level">Level</label>
    <select class="form-control" name="level" id="level">
      <option>---</option>
      <option>100</option>
      <option>200</option>
      <option>300</option>
      <option>400</option>
      <option>500</option>
    </select>
    </div>

    <div class="form-group">
    <label for="department">Department</label>
    <select class="form-control" name="department" id="department">
      <option>---</option>
      <option>Computer Science</option>
      <option>Mechanical Engineering</option>
      <option>Mass Communication</option>
      <option>Architecture</option>
      <option>Physics</option>
    </select>
    </div>


    <div class="form-group">
    <label for="Gender">Gender</label>
    <select class="form-control" name="gender" id="gender">
      <option>---</option>
      <option>Male</option>
      <option>Female</option>
    </select>
    </div>

  <!--<div class="form-group">
    <label for="male">Gender</label><br>
   <label>Male<input type="radio" name="optradio" class="form-control"></label>
   <label>Female<input type="radio" name="optradio" class="form-control"></label>
  </div>  -->


  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>

    <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" name="passwordconfirm" class="form-control" id="passwordconfirm">
  </div>


  <button type="submit" name="submit" class="btn btn-default btn-lg" >Submit</button>

</form>

<br/>
<!--<a href="#" class="pull-right btn btn-block btn-danger" > Already Register ?   </a>-->



    </div>


          <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#popUpWindow">Already Registered ?   LOGIN</button>

        <div class="modal fade" id="popUpWindow">
          <div class="modal-dialog">

            <div class="modal-content">
              <!--Header-->
               <div class="modal-header">
                <h3 class="modal-title"> LogIn</h3>
                <button type="button" class="close" data-dismiss="modal">&times</button>
              </div>


              <!--body (form) -->
              <div class="modal-body">
                <form role="form" action="<?php echo $current_file; ?>" method="POST">
                      <div class="form-group">
                          <input type="text" class="form-control" name="regnum" id="regnum" placeholder="Enter Reg Number Here">
                      </div>

                      <div class="form-group">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password Here">
                      </div>
              </div>

              <!--footer  -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                <a href="#">Forgot password?</a></button>
              </div>
            </div>
          </div>
        </div>
        </form>
<!-- ===========Login Modal===============-->   </div>
  </div>
</div>
</div>

<!-- This design is created by manoj chauhan  -->

    <!-- Bootstrap core JavaScript -->
    <script src="../Js/jquery.min.js"></script>
    <script src="../Js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../Js/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../Js/stylish-portfolio.min.js"></script>

</body>
</html>
