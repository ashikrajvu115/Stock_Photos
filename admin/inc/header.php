
<?php
     include '../lib/Session.php';
     Session::checksession();
?>

<?php include '../config/config.php'; ?>
<?php include '../helperse/Formate.php'; ?>
<?php include '../lib/Database.php'; ?>


<?php
    $bd = new Database();
    $fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> User Panel</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="screen" />

    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    
    

    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Online Bloodbank Management System</h1>
					<p>www.onlinebloodbank.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>

                        <?php
                            if (isset($_GET['action']) && $_GET['action']== 'logout') {
                                 Session::destroy();
                            }
                        ?>

                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li> Hello  <span style="color: yellowgreen; font-weight: bold; font-size: 15px; "> <i> <u> <?php echo Session::get('username'); ?></span>  </i></u></li>

                            <li><a href="?action=logout"> Logout </a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                
                <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
				
				

<?php
    if (Session::get('userRole')== '1') {?>
        <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
            <?php
                $query="SELECT * from tbl_contact where status='0'";
                 $notification=$bd->select($query);
                 if ($notification) {
                    $count=mysqli_num_rows($notification);
                    echo "(".$count.")";
                 }else{
                    echo "(0)";
                 }
            ?>

                </span></a></li>
        <li class="ic-grid-tables"><a href="pendingpost.php"><span>Pending Post
            <?php
                $query="SELECT * from tbl_post where status='0'";
                 $notification=$bd->select($query);
                 if ($notification) {
                    $count=mysqli_num_rows($notification);
                    echo "(".$count.")";
                 }else{
                    echo "(0)";
                 }
            ?>

                </span></a></li>
      

    <?php } ?>
    <li class="ic-charts"><a href="listuser.php"><span>User List </span></a></li>
                
        
            </ul>
        </div>
        <div class="clear">
        </div>
