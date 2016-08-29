<?php
session_start();

include '../config.inc.php';
include 'header.php';
include 'topmain.php';
echo "<title>$title - Supprimer l'utilisateur</title>\n";
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

if ($request == 'GET') {

    if (!isset($_GET['username'])) {

        echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
        echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Accenture System Error!</td></tr>\n";
        echo "  <tr class=right_main_text>\n";
        echo "    <td align=center valign=top scope=row>\n";
        echo "      <table width=300 border=0 cellpadding=5 cellspacing=0>\n";
        echo "        <tr class=right_main_text><td align=center>How did you get here?</td></tr>\n";
        echo "        <tr class=right_main_text><td align=center>Go back to the <a class=admin_headings href='useradmin.php'>User Summary</a> page to delete users.
            </td></tr>\n";
        echo "      </table><br /></td></tr></table>\n";
        exit;
    }

    $get_user = stripslashes($_GET['username']);
    @$get_office = $_GET['officename'];

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

    $get_user = addslashes($get_user);

    $row_count = 0;

    $query = "select * from " . $db_prefix . "employees where empfullname = '" . $get_user . "' order by empfullname";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {

        $username = stripslashes("" . $row['empfullname'] . "");
        $displayname = stripslashes("" . $row['displayname'] . "");
        $user_email = "" . $row['email'] . "";
        $office = "" . $row['office'] . "";
        $groups = "" . $row['groups'] . "";
        $admin = "" . $row['admin'] . "";
        $reports = "" . $row['reports'] . "";
        $time_admin = "" . $row['time_admin'] . "";
    }
    mysql_free_result($result);
    $get_user = stripslashes($get_user);

    // make sure you cannot delete the last admin user in the system!! //

    if (!empty($admin)) {
        $admin_count = mysql_query("select empfullname from " . $db_prefix . "employees where admin = '1'");
        @$admin_count_rows = mysql_num_rows($admin_count);
        if (@$admin_count_rows == "1") {
            $evil = "1";
        }
    }
    if (isset($evil)) {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Cannot delete this user. This user is the last Sys Admin User in the system. Go back and give another user Sys Admin
                    privileges before attempting to delete this user again.</td></tr>\n";
        echo "            </table>\n";
    }
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_delete.png' />&nbsp;&nbsp;&nbsp;Delete
                    User</th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='post_username' value=\"$username\">$username</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='display_name' value=\"$displayname\">$displayname</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='email_addy' value=\"$user_email\">$user_email</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='office_name' value=\"$office\">$office</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='group_name' value=\"$groups\">$groups</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin:</td>\n";
    if ($admin == "1") {
        $admin_yes_no = "Yes";
    } else {
        $admin_yes_no = "No";
    }
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='hidden' name='admin_perms'
                      value='$admin'>$admin_yes_no</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Employee Access:</td>\n";
    if ($time_admin == "1") {
        $time_admin_yes_no = "Yes";
    } else {
        $time_admin_yes_no = "No";
    }
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='hidden' name='time_admin_perms'
                      value='$time_admin'>$time_admin_yes_no</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports:</td>\n";
    if ($reports == "1") {
        $reports_yes_no = "Yes";
    } else {
        $reports_yes_no = "No";
    }
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='hidden' name='reports_perms'
                      value='$reports'>$reports_yes_no</td></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "            </table>\n";
    if (isset($evil)) {
        echo "            <table style='display:none;' align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    } else {
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    }

    if (isset($evil)) {
        echo "            <table style='display:none;' align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    } else {
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    }
    echo "              <tr><td width=30><input type='image' name='submit' value='Delete User'
                    src='../images/buttons/next_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                    border='0'></td></tr></table></form></td></tr>\n";
    //include '../footer.php';
    exit;
} elseif ($request == 'POST') {

    $post_username = stripslashes($_POST['post_username']);
    $display_name = stripslashes($_POST['display_name']);
    $email_addy = $_POST['email_addy'];
    $office_name = $_POST['office_name'];
    $group_name = $_POST['group_name'];
    $admin_perms = $_POST['admin_perms'];
    $reports_perms = $_POST['reports_perms'];
    $time_admin_perms = $_POST['time_admin_perms'];
    @$delete_data = $_POST['delete_all_user_data'];

    $post_username = addslashes($post_username);
    $display_name = addslashes($display_name);

    // begin post validation //

    if (!empty($post_username)) {
        $query = "select * from " . $db_prefix . "employees where empfullname = '" . $post_username . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_username = "" . $row['empfullname'] . "";
        }
        if (!isset($tmp_username)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }

    if (!empty($display_name)) {
        $query = "select * from " . $db_prefix . "employees where empfullname = '" . $post_username . "' and displayname = '" . $display_name . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_display_name = "" . $row['displayname'] . "";
        }
        if (!isset($tmp_display_name)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }

    if (!empty($email_addy)) {
        $query = "select * from " . $db_prefix . "employees where empfullname = '" . $post_username . "' and email = '" . $email_addy . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_email_addy = "" . $row['email'] . "";
        }
        if (!isset($tmp_email_addy)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }

    if (!empty($office_name)) {
        $query = "select * from " . $db_prefix . "employees where empfullname = '" . $post_username . "' and office = '" . $office_name . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_office_name = "" . $row['office'] . "";
        }
        if (!isset($tmp_office_name)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }

    if (!empty($group_name)) {
        $query = "select * from " . $db_prefix . "employees where empfullname = '" . $post_username . "' and groups = '" . $group_name . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $tmp_group_name = "" . $row['groups'] . "";
        }
        if (!isset($tmp_group_name)) {
            echo "Something is fishy here.\n";
            exit;
        }
    }

    if (($admin_perms != '0') && ($admin_perms != '1')) {
        echo "Something is fishy here.\n";
        exit;
    }
    if (($reports_perms != '0') && ($reports_perms != '1')) {
        echo "Something is fishy here.\n";
        exit;
    }
    if (($time_admin_perms != '0') && ($time_admin_perms != '1')) {
        echo "Something is fishy here.\n";
        exit;
    }
    if ((isset($delete_data)) && ($delete_data != '1')) {
        echo "Something is fishy here.\n";
        exit;
    }

    // end post validation //

    $query2 = "delete from " . $db_prefix . "employees where empfullname = ('" . $post_username . "')";
    $result2 = mysql_query($query2);

    if ($delete_data == "1") {
        $query3 = "delete from " . $db_prefix . "info where fullname = ('" . $post_username . "')";
        $result3 = mysql_query($query3);
    }

    $post_username = stripslashes($post_username);
    $display_name = stripslashes($display_name);
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
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr>\n";
    echo "                <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>&nbsp;User
                    deleted successfully.</td></tr>\n";
    echo "            </table>\n";
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_delete.png' />&nbsp;&nbsp;&nbsp;Delete
                    User</th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='post_username' value=\"$post_username\">$post_username</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='display_name' value=\"$display_name\">$display_name</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='email_addy' value=\"$email_addy\">$email_addy</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='office_name' value=\"$office_name\">$office_name</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td align=left class=table_rows
                      width=80% style='padding-left:20px;'><input type='hidden' name='group_name' value=\"$group_name\">$group_name</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin:</td>\n";
    if ($admin_perms == "1") {
        $admin_yes_no = "Yes";
    } else {
        $admin_yes_no = "No";
    }
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='hidden' name='admin_perms'
                      value='$admin_perms'>$admin_yes_no</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports:</td>\n";
    if ($time_admin_perms == "1") {
        $time_admin_yes_no = "Yes";
    } else {
        $time_admin_yes_no = "No";
    }
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='hidden' name='time_admin_perms'
                      value='$time_admin_perms'>$time_admin_yes_no</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports:</td>\n";
    if ($reports_perms == "1") {
        $reports_yes_no = "Yes";
    } else {
        $reports_yes_no = "No";
    }
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='hidden' name='reports_perms'
                      value='$reports_perms'>$reports_yes_no</td></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
    echo "              <tr><td><a href='useradmin.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
    include '../footer.php';
    exit;
}
?>
