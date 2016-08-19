<?php

session_start();

include '../config.inc.php';
include 'header.php';
include 'topmain.php';

echo "<title>$title - User Summary</title>\n";
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
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$logged_in_user = $_SESSION['valid_user'];
if (!isset($_SESSION['valid_user'])) {

echo "<header class='main-header'>\n";

    echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
    echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Accenture System Administration</td></tr>\n";
    echo "  <tr class=right_main_text>\n";
    echo "    <td align=center valign=top scope=row>\n";
    echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
    echo "        <tr class=right_main_text><td align=center>You are not presently logged in, or do not have permission to view this page.</td></tr>\n";
    echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='../login.php'><u>here</u></a> to login.</td></tr>\n";
    echo "      </table><br /></td></tr></table>\n";
    echo "</header>\n";
    exit;
}

echo "<body class='hold-transition skin-blue sidebar-mini'>\n";
echo "<div class='wrapper'>\n";


echo "<aside class='main-sidebar'>";
echo "<section class='sidebar'>\n";
//echo "<img src='../dist/img/Accenture-Logo.jpg' alt='System Image' height='100' width='200'>\n";

echo "<div class='user-panel'>\n";
echo "<div class='pull-left image'>\n";
echo "<img src='../dist/img/user2-160x160.jpg' class='img-circle' alt='User Image'>\n";
echo "</div>\n";
echo "<div class='pull-left info'>\n";
echo "<p>$logged_in_user</p>\n";
echo "<a href='#''><i class='fa fa-circle text-success'></i> Online</a>\n";
echo "</div>\n";
echo "</div>\n";
echo "<ul class='sidebar-menu'>\n";
echo "<li class='header'>MAIN NAVIGATION</li>\n";
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
echo "<li><a href='useradmin.php'><i class='fa fa-circle-o'></i>User Summary</a></li>\n";
echo "<li><a href='usercreate.php'><i class='fa fa-circle-o'></i>Create New User</a></li>\n";
echo "<li><a href='usersearch.php'><i class='fa fa-circle-o'></i>User Search</a></li>\n";
echo "</ul>\n";
echo "</li>\n";

echo "<li class='treeview'>\n";
echo "<a href='#'>\n";
echo "<i class='fa fa-location-arrow'></i>\n";
echo "<span>Offices</span>\n";
echo "<i class='fa fa-angle-left pull-right'></i>\n";
echo "</a>\n";
echo "<ul class='treeview-menu'>\n";
echo "<li><a href='officeadmin.php'><i class='fa fa-circle-o'></i>Office Summary</a></li>\n";
echo "<li><a href='officecreate.php'><i class='fa fa-circle-o'></i>Create New Office</a></li>\n";
echo "</ul>\n";
echo "</li>\n";

echo "<li class='treeview'>\n";
echo "<a href='#'>\n";
echo "<i class='fa fa-group'></i>\n";
echo "<span>Groups</span>\n";
echo "<i class='fa fa-angle-left pull-right'></i>\n";
echo "</a>\n";
echo "<ul class='treeview-menu'>\n";
echo "<li><a href='groupadmin.php'><i class='fa fa-circle-o'></i>Groups Summary</a></li>\n";
echo "<li><a href='groupcreate.php'><i class='fa fa-circle-o'></i>Create New Group</a></li>\n";
echo "</ul>\n";
echo "</li>\n";




echo "</ul>\n";
echo "</section>\n";
echo "</aside>\n";

echo "<div class='content-wrapper'>\n";


$user_count = mysql_query("select empfullname from " . $db_prefix . "employees
                           order by empfullname");
@$user_count_rows = mysql_num_rows($user_count);

$admin_count = mysql_query("select empfullname from " . $db_prefix . "employees where admin = '1'");
@$admin_count_rows = mysql_num_rows($admin_count);

$time_admin_count = mysql_query("select empfullname from " . $db_prefix . "employees where time_admin = '1'");
@$time_admin_count_rows = mysql_num_rows($time_admin_count);

$reports_count = mysql_query("select empfullname from " . $db_prefix . "employees where reports = '1'");
@$reports_count_rows = mysql_num_rows($reports_count);
echo "<div>\n";
echo "    <td align=center class=right_main scope=col>\n";
echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
echo "        <tr class=right_main_text>\n";
echo "          <td valign=top>\n";
echo "            <table class='table table-bordered' width=90% align=center height=40 border=0 cellpadding=0 cellspacing=0>\n";
echo "              <tr><th class=table_heading_no_color nowrap width=100% halign=center>User Summary</th></tr>\n";
echo "              <tr><td height=40 class=table_rows nowrap halign=center><img src='../images/icons/user_green.png' />&nbsp;&nbsp;Total
                      Users: $user_count_rows&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../images/icons/user_orange.png' />&nbsp;&nbsp;
                      Administartors: $admin_count_rows&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../images/icons/user_red.png' />&nbsp;&nbsp;
                      Employees: $time_admin_count_rows&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='../images/icons/user_suit.png' />&nbsp;
                      &nbsp;Reports Users: $reports_count_rows</td></tr>\n";
echo "            </table>\n";
echo "            <table class='table table-bordered' width=90% align=center border=0 cellpadding=0 cellspacing=0>\n";
echo "              <tr>\n";
echo "                <th width=3% align=left>&nbsp;</th>\n";
echo "                <th class=table_heading nowrap width=13% align=left>Username</th>\n";
echo "                <th class=table_heading nowrap width=18% align=left>Display Name</th>\n";
//echo "                <th class=table_heading nowrap width=23% align=left>Email Address</th>\n";
echo "                <th class=table_heading nowrap width=10% align=left>Office</th>\n";
echo "                <th class=table_heading nowrap width=10% align=left>Group</th>\n";
echo "                <th class=table_heading width=3% align=center>Disabled</th>\n";
echo "                <th class=table_heading width=3% align=center>Sys Admin</th>\n";
echo "                <th class=table_heading width=3% align=center>Employee Access</th>\n";
echo "                <th class=table_heading nowrap width=3% align=center>Reports</th>\n";
echo "                <th class=table_heading nowrap width=3% align=center>Edit</th>\n";
echo "                <th class=table_heading width=3% align=center>Chg Pwd</th>\n";
echo "                <th class=table_heading nowrap width=3% align=center>Delete</th>\n";
echo "              </tr>\n";

$row_count = 0;

$query = "select empfullname, displayname,  email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
          order by empfullname";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result)) {

$empfullname = stripslashes("" . $row['empfullname'] . "");
$displayname = stripslashes("" . $row['displayname'] . "");

$row_count++;
$row_color = ($row_count % 2) ? $color2 : $color1;

echo "              <tr class=table_border bgcolor='$row_color'><td nowrap class=table_rows width=3%>&nbsp;$row_count</td>\n";
echo "                <td class=table_rows nowrap width=13%>&nbsp;<a title=\"Edit User: $empfullname\" class=footer_links
                    href=\"useredit.php?username=$empfullname&officename=" . $row["office"] . "\">$empfullname</a></td>\n";
echo "                <td class=table_rows nowrap width=18%>&nbsp;$displayname</td>\n";
//echo "                <td class=table_rows nowrap width=23%>&nbsp;".$row["email"]."</td>\n";
echo "
<td class=table_rows nowrap width=10%>&nbsp;".$row['office']."</td>\n";
echo "
<td class=table_rows nowrap width=10%>&nbsp;".$row['groups']."</td>\n";

if ("".$row["disabled"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/cross.png'/></td>\n";
} else {
$disabled = "";
echo "
<td class=table_rows width=3% align=center>".$disabled."</td>\n";
}
if ("".$row["admin"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/accept.png'/></td>\n";
} else {
$admin = "";
echo "
<td class=table_rows width=3% align=center>".$admin."</td>\n";
}
if ("".$row["time_admin"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/accept.png'/></td>\n";
} else {
$time_admin = "";
echo "
<td class=table_rows width=3% align=center>".$time_admin."</td>\n";
}
if ("".$row["reports"]."" == 1) {
echo "
<td class=table_rows width=3% align=center><img src='../images/icons/accept.png'/></td>\n";
} else {
$reports = "";
echo "
<td class=table_rows width=3% align=center>".$reports."</td>\n";
}

if ((strpos($user_agent, "MSIE 6")) || (strpos($user_agent, "MSIE 5")) || (strpos($user_agent, "MSIE 4")) || (strpos($user_agent, "MSIE 3"))) {

echo "
<td class=table_rows width=3% align=center><a style='color:#27408b;text-decoration:underline;'
                                              title=\"Edit User: $empfullname\"
    href=\"useredit.php?username=$empfullname&officename=".$row["office"]."\">Edit</a></td>\n";
echo "
<td class=table_rows width=3% align=center><a style='color:#27408b;text-decoration:underline;'
                                              title=\"Change Password: $empfullname\"
    href=\"chngpasswd.php?username=$empfullname&officename=".$row["office"]."\">Chg Pwd</a></td>\n";
echo "
<td class=table_rows width=3% align=center><a style='color:#27408b;text-decoration:underline;'
                                              title=\"Delete User: $empfullname\"
    href=\"userdelete.php?username=$empfullname&officename=".$row["office"]."\">Delete</a></td></tr>\n";

} else {

echo "
<td class=table_rows width=3% align=center><a title=\"Edit User: $empfullname\"
    href=\"useredit.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/application_edit.png'/></a></td>\n";
echo "
<td class=table_rows width=3% align=center><a title=\"Change Password: $empfullname\"
    href=\"chngpasswd.php?username=$empfullname&officename=".$row["office"]."\"><img border=0
                                                                                     src='../images/icons/lock_edit.png'/></a>
</td>\n";
echo "
<td class=table_rows width=3% align=center><a title=\"Delete User: $empfullname\"
    href=\"userdelete.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/delete.png'/></a></td></tr>\n";
}
}
echo "          </table></td></tr>\n";

echo "</div>\n";
echo "</div>\n";




echo "</body>\n";
exit;
?>
