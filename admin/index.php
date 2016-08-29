<?php
session_start();

include '../config.inc.php';
include 'topmain.php';
include 'header_get.php';


echo "<title>$title - Administrateur</title>\n";
echo '<head>';
echo '<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">';
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
echo '<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">';
echo '<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">';
echo '<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">';
echo '<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">';
echo '<link rel="stylesheet" href="../plugins/morris/morris.css">';
echo '<link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">';
echo '<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">';
echo '<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">';
echo '<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">';
echo "<script type='text/javascript' src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>";
echo "<script type='text/javascript' src='https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>";
echo "<script type='text/javascript' src='../bootstrap/js/bootstrap.min.js'></script>";
echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>";
echo "<script type='text/javascript' src='../plugins/morris/morris.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/sparkline/jquery.sparkline.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>";
echo "<script type='text/javascript' src='../plugins/knob/jquery.knob.js'></script>";
echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/daterangepicker/daterangepicker.js'></script>";
echo "<script type='text/javascript' src='../plugins/datepicker/bootstrap-datepicker.js'></script>";
echo "<script type='text/javascript' src='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>";
echo "<script type='text/javascript' src='../plugins/fastclick/fastclick.min.js'></script>";
echo "<script type='text/javascript' src='../dist/js/app.min.js'></script>";
echo "<script type='text/javascript' src='../dist/js/pages/dashboard.js'></script>";
echo "<script type='text/javascript' src='../dist/js/demo.js'></script>";

echo '</head>';

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];
$row_count = '0';
$row_color = ($row_count % 2) ? $color2 : $color1;
$logged_in_user = $_SESSION['valid_user'];
if (!isset($_SESSION['valid_user'])) {


    exit;
}
echo "<body class='hold-transition skin-blue sidebar-mini'>\n";

echo "<header class='main-header'>\n";
echo "</header>\n";
echo "<aside class='main-sidebar'>\n";
echo "<section class='sidebar'>\n";
echo "<div class='user-panel'>\n";
echo "<div class='pull-left image'>\n";
echo "<img src='../dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>\n";
echo "</div>\n";
echo "<div class='pull-left info'>\n";
echo "<p>$logged_in_user</p>\n";
echo "<a href='#''><i class='fa fa-circle text-success'></i> Connecté</a>\n";
echo "</div>\n";
echo "</div>\n";
echo "<ul class='sidebar-menu'>\n";
echo "<li class='header'>Menu télétravail</li>\n";
echo "<li class='active treeview'>\n";
echo "<a href=''#'>\n";
echo "<i class='fa fa-dashboard'></i> <span>Dashboard</span> <i class='fa fa-angle-left pull-right'></i>\n";
echo "</a>\n";
echo "</li>\n";
echo "<li class='treeview'>\n";
echo "<a href='#'>\n";
echo "<i class='fa fa-users'></i>\n";
echo "<span>Users</span>\n";
echo "<i class='fa fa-angle-left pull-right'></i>\n";
echo "</a>\n";
echo "<ul class='treeview-menu'>\n";
echo "<li><a href='useradmin.php'><i class='fa fa-circle-o'></i>Résumer utilisateur</a></li>\n";
echo "<li><a href='usercreate.php'><i class='fa fa-circle-o'></i>Créer nouveau utilisateur</a></li>\n";
echo "<li><a href='usersearch.php'><i class='fa fa-circle-o'></i>Recherche utilisateur</a></li>\n";
echo "</ul>\n";
echo "</li>\n";

echo "<li class='treeview'>\n";
echo "<a href='#'>\n";
echo "<i class='fa fa-location-arrow'></i>\n";
echo "<span>Offices</span>\n";
echo "<i class='fa fa-angle-left pull-right'></i>\n";
echo "</a>\n";
echo "<ul class='treeview-menu'>\n";
echo "<li><a href='officeadmin.php'><i class='fa fa-circle-o'></i>Résumer Bureau</a></li>\n";
echo "<li><a href='officecreate.php'><i class='fa fa-circle-o'></i>Créer nouveau Bureau</a></li>\n";
echo "</ul>\n";
echo "</li>\n";

echo "<li class='treeview'>\n";
echo "<a href='#'>\n";
echo "<i class='fa fa-group'></i>\n";
echo "<span>Groups</span>\n";
echo "<i class='fa fa-angle-left pull-right'></i>\n";
echo "</a>\n";
echo "<ul class='treeview-menu'>\n";
echo "<li><a href='groupadmin.php'><i class='fa fa-circle-o'></i>Résumer Groupe</a></li>\n";
echo "<li><a href='groupcreate.php'><i class='fa fa-circle-o'></i>Créer un nouveau Groupe</a></li>\n";
echo "</ul>\n";
echo "</li>\n";




echo "</ul>\n";
echo "</section>\n";
echo "</aside>\n";

echo "<div class='wrapper'>\n";
echo "<section class='content'>";

echo "</section>";



echo "<div class='control-sidebar-bg'></div>\n";

echo "</div>\n";



echo "</div>\n";
echo "</body>\n";

?>
