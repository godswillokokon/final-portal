<?php
require 'core.inc.php';
require '../init.php';
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


if(loggedin() ) {
      //  echo "You are Logged In";
} else {
   header('Location: login.php');
}

?>



 <?php
include '../init.php';
$regnum = getuserfield('regnum');
$sql = "SELECT * FROM first_semester_results WHERE regnum = '$regnum'";
$y1st = $link->query($sql);
$sql2 = "SELECT * FROM second_semester_results WHERE regnum = '$regnum'";
$y2nd = $link->query($sql2);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>D.M.S</title>

    <!-- Bootstrap core CSS -->

    <link href="../CSS/bootstrap.min2.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../CSS/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../CSS/custom1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/maps/jquery-jvectormap-2.0.1.css" />
    <link href="../CSS/icheck/flat/green.css" rel="stylesheet" />
    <link href="../CSS/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="../js/jquery.min.js"></script>
    <script src="../js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-laptop"></i> <span>D.M.S</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
        <div class="profile_pic">
                
 <?php
$url = getuserfield('url');
echo '<div class="profile_pic">';

//echo '<div class="img-circle profile_img">';
echo "<img src='upload/$url' alt='...' class='img-circle profile_img'/></div>    ";
//$imageURL = 'upload/'.$pics['url'];
?>                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <?php 
                            $name = getuserfield('name');
                            echo "<h2>$name</h2>   ";
                            ?>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="year3.php"><i class="fa fa-home"></i> Home </a>
                                    <ul class="nav child_menu" style="display: none">
                                           <li><a href="year3.php">Profile</a>
                                        </li>

                                    </ul>
                                </li>

                                </li>
                               <li><a><i class="fa fa-book"></i> Courses <span class="fa fa-chevron-down"></span></a>
                                 <ul class="nav child_menu" style="display:none">


                                      <a><i class="fa fa-table"></i>Register Courses<span class="fa fa-chevron-down"></span></a>

                                        <li><a href="y3_1stsemester.php">1st Semester</a></li>
                                          <li><a href="y3_2ndsemester.php">2nd Semester</a></li>
                                        </li>

                                       <li><a href="year 3 courses.php"><i class="fa fa-table"></i>View Registerd Courses</span></a></li>

                                       <li><a href="study_table.php"><i class="fa fa-calendar-o"></i> Study Timetable <!-- <span class="fa fa-chevron-down"></span>--></a>

                                       <li><a href="exam_table.php"><i class="fa fa-calendar"></i> Examination Timetable <!-- <span class="fa fa-chevron-down"></span>--></a>

                                 </ul>

                               </li>


                                <li><a><i class="fa fa-book"></i> Results <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li class="current-page"><a href="year3result.php">View Results</a>
                                        </li>


                                    </ul>
                                </li>







                                <li><a href="election.php"><i class="fa fa-bars"></i> Election </a></li>

                                <li><a href="contact_admin.php"><i class="fa fa-envelope-o"></i> Contact Admin</a></li>

                            </ul>
                        </div>
                        <div class="menu_section">

                        </div>

                    </div>                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div> 

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                                                <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php echo getuserfield('name');?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="year3.php">  Profile</a>
                                    </li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                                </ul>
                            </li>

                        </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Year One
                </h3>
                                <small>1st Semester</small>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">

                                   <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <!--<th>
                                                    <input type="checkbox" id="check-all" class="flat">
                                                </th>-->
                                                <th class="column-title">Course Code</th>
                                                <th class="column-title">CA Test</th>
                                                <th class="column-title">Exam</th>
                                                <th class="column-title">Total</th>
                                                <th class="column-title">Grade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="even pointer">
                                            <?php
                                            while($userInfo = mysqli_fetch_assoc($y1st)):
                                            ?>
                                            <tr>        
                                              <td><?php echo $userInfo['course_code'] ;?></td>
                                              <td><?php echo $userInfo['ca_test'] ;?></td>
                                              <td><?php echo $userInfo['exam'] ;?></td>
                                              <td><?php echo $userInfo['total'] ;?></td>
                                              <td><?php echo $userInfo['grade'] ;?></td>
                                            </tr>
                                          <?php endwhile ;?>

                                            </tr>
                                            </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Year One
                </h3>
                <small>2nd Semester</small>
                        </div>

                        <!--<div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    
                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">

                                   <!-- <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <!--<th>
                                                    <input type="checkbox" id="check-all" class="flat">
                                                </th>-->
                                                <th class="column-title">Course Code</th>
                                                <th class="column-title">CA Test</th>
                                                <th class="column-title">Exam</th>
                                                <th class="column-title">Total</th>
                                                <th class="column-title">Grade</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="even pointer">
                                            <?php
                                            while($userInfo2 = mysqli_fetch_assoc($y2nd)):
                                            ?>
                                            <tr>        
                                              <td><?php echo $userInfo2['course_code'] ;?></td>
                                              <td><?php echo $userInfo2['ca_test'] ;?></td>
                                              <td><?php echo $userInfo2['exam'] ;?></td>
                                              <td><?php echo $userInfo2['total'] ;?></td>
                                              <td><?php echo $userInfo2['grade'] ;?></td>
                                            </tr>
                                          <?php endwhile ;?>

                                            </tr>
                                            </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="../js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="../js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="../js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="../js/icheck/icheck.min.js"></script>

    <script src="../js/custom.js"></script>
  </body>
</html>
