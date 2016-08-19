<?php

session_start();

include '../config.inc.php';
include 'header.php';
include 'topmain.php';
echo "<title>$title - Group Summary</title>\n";
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

if (!isset($_SESSION['valid_user'])) {

    echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
    echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Accenture System Administration</td></tr>\n";
    echo "  <tr class=right_main_text>\n";
    echo "    <td align=center valign=top scope=row>\n";
    echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
    echo "        <tr class=right_main_text><td align=center>You are not presently logged in, or do not have permission to view this page.</td></tr>\n";
    echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='../login.php'><u>here</u></a> to login.</td></tr>\n";
    echo "      </table><br /></td></tr></table>\n";
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

echo "    <td align=left class=right_main scope=col>\n";
echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
echo "        <tr class=right_main_text>\n";
echo "          <td valign=top>\n";
echo "            <table width=60% align=center height=40 border=0 cellpadding=0 cellspacing=0>\n";
echo "              <tr><th class=table_heading_no_color nowrap width=100% valign=top halign=left>Group Summary</th></tr>\n";
echo "            </table>\n";
echo "            <table class=table_border width=60% align=center border=0 cellpadding=0 cellspacing=0>\n";
echo "              <tr><th class=table_heading nowrap width=7% align=left>&nbsp;</th>\n";
echo "                <th class=table_heading nowrap width=25% align=left>Group Name</th>\n";
echo "                <th class=table_heading width=58% align=left>Parent Office</th>\n";
echo "                <th class=table_heading nowrap width=4% align=center>Users</th>\n";
echo "                <th class=table_heading nowrap width=3% align=center>Edit</th>\n";
echo "                <th class=table_heading nowrap width=3% align=center>Delete</th></tr>\n";

$row_count = 0;

$query = "select * from " . $db_prefix . "groups, " . $db_prefix . "offices where " . $db_prefix . "groups.officeid = " . $db_prefix . "offices.officeid
          order by " . $db_prefix . "offices.officename, " . $db_prefix . "groups.groupname";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result)) {

    $query2 = "select groups from " . $db_prefix . "employees where groups = '" . $row['groupname'] . "' and office = '" . $row['officename'] . "'";
    $result2 = mysql_query($query2);
    @$user_cnt = mysql_num_rows($result2);

    $parent_office = "" . $row['officename'] . "";

    $row_count++;
    $row_color = ($row_count % 2) ? $color2 : $color1;

    echo "              <tr class=table_border bgcolor='$row_color'><td nowrap class=table_rows width=7%>&nbsp;$row_count</td>\n";
    echo "                <td class=table_rows nowrap width=25%>&nbsp;<a class=footer_links title='Edit Group: " . $row["groupname"] . "'
                    href=\"groupedit.php?groupname=" . $row["groupname"] . "&officename=$parent_office\">" . $row["groupname"] . "</a></td>\n";
    echo "                <td class=table_rows width=58% align=left>&nbsp;$parent_office</td>\n";
    echo "                <td class=table_rows nowrap width=4% align=center>$user_cnt</td>\n";

    if ((strpos($user_agent, "MSIE 6")) || (strpos($user_agent, "MSIE 5")) || (strpos($user_agent, "MSIE 4")) || (strpos($user_agent, "MSIE 3"))) {

        echo "                <td class=table_rows width=3% align=center><a style='color:#27408b;text-decoration:underline;'
                    title=\"Edit Group: " . $row["groupname"] . "\" href=\"groupedit.php?groupname=" . $row["groupname"] . "&officename=$parent_office\" >
                    Edit</a></td>\n";
        echo "                <td class=table_rows width=3% align=center><a style='color:#27408b;text-decoration:underline;'
                    title=\"Delete Group: " . $row["groupname"] . "\" href=\"groupdelete.php?groupname=" . $row["groupname"] . "&officename=$parent_office\" >
                    Delete</a></td></tr>\n";
    } else {
        echo "                <td class=table_rows width=3% align=center><a href=\"groupedit.php?groupname=" . $row["groupname"] . "&officename=$parent_office\"
                    title=\"Edit Group: " . $row["groupname"] . "\">
                    <img border=0 src='../images/icons/application_edit.png' /></a></td>\n";
        echo "                <td class=table_rows width=3% align=center><a href=\"groupdelete.php?groupname=" . $row["groupname"] . "&officename=$parent_office\"
                    title=\"Delete Group: " . $row["groupname"] . "\">
                    <img border=0 src='../images/icons/delete.png' /></a></td></tr>\n";
    }
}
echo "          </table></td></tr>\n";
include '../footer.php';
exit;
?>
