<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('../../../database/database_functions.php');

if (isset($_GET['id'])) 
{

    $event_id = $_GET['id'];
    $this_event = one_event($event_id);
}

 ?>
<head>
    <meta charset="utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>UOW Booking Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">

    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>

</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================= -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text-->
                        <img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                   <!--  <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li> -->
                    <li>
                        <a class="profile-pic" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo " ADMIN ".$_SESSION['message']['user']['username']; ?></b></a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="../../../index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Home</a>
                    </li>
                    <li>
                        <a href="/dashboard/ample-admin-lite/html/admin_dashboard.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="../../../events/events.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Events</a>
                    </li>
                    <li>
                        <a href="/dashboard/ample-admin-lite/html/create_event.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Create New Event</a>
                    </li>                


                </ul>
                <div class="center p-20">
                     <a href="/dashboard/ample-admin-lite/html/log_out.php"  class="btn btn-danger btn-block waves-effect waves-light">Log out</a>
                 </div>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="/dashboard/ample-admin-lite/html/log_out.php"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Log out</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        
                            <form method="post" action=<?php echo "\""; ?><?php if (isset($_GET['id']))
                                                                                     { echo "/dashboard/ample-admin-lite/html/edit_event_ex.php?id=".$_GET['id']."\""; }
                                                                                else{
                                                                                    echo "/dashboard/ample-admin-lite/html/create_event_ex.php\""; } ?> >
                                <p>Event name:<input type="text" name="event_name" <?php if (isset($_GET['id'])){ echo "value=\"".$this_event['event_name']."\""; } ?> ></p>
                                <br>
                                <textarea name="txt" id="editor1" rows="10" cols="80" >
                                    <?php if (isset($_GET['id'])) {echo $this_event['txt'];} ?>
                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                                <br>
                                <p>Address:<input type="text" name="address" <?php if (isset($_GET['id'])) { echo "value=\"".$this_event['address']."\""; } ?> ></p>
                                <br>
                                <p>Event date:<input type="date" name="event_date" <?php if (isset($_GET['id'])) { echo "value=\"".$this_event['event_date']."\"";} ?> ></p>
                                <br>
                                <p>Capacity:<input type="text" name="capacity" <?php if (isset($_GET['id'])) { echo "value=\"".$this_event['capacity']."\"";} ?> ></p>
                                <br>
                                <p>Price:<input type="text" name="price" <?php if (isset($_GET['id'])) { echo "value=\"".$this_event['price']."\"";} ?> ></p>
                                <br>
                                <p>Promo Code:<input type="text" name="promo_code" <?php if (isset($_GET['id'])) { echo "value=\"".$this_event['promo_code']."\""; } ?> ></p>
                                <br>                               
                                <p>Image:<input type="file" name="fileToUpload" id="fileToUpload"></p>
                                <br>
                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
               <!--  enctype="multipart/form-data" -->
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                <div class="row">

                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> &copy; 2018 All Rights Reserved. <p><small>Designed by <a href="#" target="_blank">Silk Road Group</a> </small> </p> </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="../plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>



