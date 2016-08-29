<?php
session_start();

include '../config.inc.php';
include 'header.php';
include 'topmain.php';
echo "<title>$title - Changer le mots de passe</title>\n";
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
        echo "        <tr class=right_main_text><td align=center>Go back to the <a class=admin_headings href='useradmin.php'>User Summary</a>
            page to change passwords.</td></tr>\n";
        echo "      </table><br /></td></tr></table>\n";
        exit;
    }

    $get_user = $_GET['username'];
    @$get_office = $_GET['officename'];

    if (get_magic_quotes_gpc()) {
        $get_user = stripslashes($get_user);
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
    echo "            <br />\n";

    $get_user = addslashes($get_user);

    $query = "select empfullname from " . $db_prefix . "employees where empfullname = '" . $get_user . "'";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $username = stripslashes("" . $row['empfullname'] . "");
    }
    mysql_free_result($result);
    if (!isset($username)) {
        echo "username is not defined for this user.\n";
        exit;
    }

    if (!empty($get_office)) {
        $query = "select * from " . $db_prefix . "offices where officename = '" . $get_office . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $getoffice = "" . $row['officename'] . "";
        }
        mysql_free_result($result);
    }
    if (!isset($getoffice)) {
        echo "Office is not defined for this user. Go back and associate this user with an office.\n";
        exit;
    }

    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "              <tr><th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/lock_edit.png' />&nbsp;&nbsp;&nbsp;Change
                      Password</th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td style='padding-left:20px;'
                      align=left class=table_rows width=80%><input type='hidden' name='post_username' value=\"$username\">$username</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>New Password</td><td colspan=2
                      style='padding-left:20px;'><input type='password' size='25' maxlength='25' name='new_password'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Confirm Password:</td><td colspan=2
                      style='padding-left:20px;'><input type='password' size='25' maxlength='25'name='confirm_password'>
                      </td></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "            </table>\n";
    echo "            <input type='hidden' name='get_office' value='$get_office'>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Change Password'
                  src='../images/buttons/next_button.png'></td>
                  <td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png' border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
    exit;
} elseif ($request == 'POST') {

    $post_username = stripslashes($_POST['post_username']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $get_office = $_POST['get_office'];

    // begin post validation //

    if (!empty($get_office)) {
        $query = "select * from " . $db_prefix . "offices where officename = '" . $get_office . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $getoffice = "" . $row['officename'] . "";
        }
        mysql_free_result($result);
    }
    if (!isset($getoffice)) {
        echo "Office is not defined for this user. Go back and associate this user with an office.\n";
        exit;
    }

    // end post validation //
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

    $post_username = addslashes($post_username);

    // begin post validation //

    if (!empty($post_username)) {
        $query = "select * from " . $db_prefix . "employees where empfullname = '" . $post_username . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $username = "" . $row['empfullname'] . "";
        }
        mysql_free_result($result);
        if (!isset($username)) {
            echo "username is not defined for this user.\n";
            exit;
        }
    }

    $post_username = stripslashes($post_username);

    if (preg_match("/^[\s\\/;'\"-]*$/i", $new_password)) {
        $evil_password = '1';
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                        Single and double quotes, backward and forward slashes, semicolons, and spaces are not allowed when creating a Password.</td></tr>\n";
        echo "            </table>\n";
    } elseif ($new_password !== $confirm_password) {
        $evil_password = '1';
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                        Passwords do not match.</td></tr>\n";
        echo "            </table>\n";
    }

    // end post validation //

    if (isset($evil_password)) {

        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "            <form name='form' action='$self' method='post'>\n";
        echo "              <tr><th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/lock_edit.png' />&nbsp;&nbsp;&nbsp;Change
                    Password</th></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows width=20% height=25 style='padding-left:32px;' nowrap>Username:</td><td align=left class=table_rows width=80%
                      style='padding-left:20px;'><input type='hidden' name='post_username' value=\"$post_username\">$post_username</td></tr>\n";
        echo "              <tr><td class=table_rows width=20% height=25 style='padding-left:32px;' nowrap>New Password:</td><td colspan=2
                      style='padding-left:20px;' width=80%><input type='password' size='25' maxlength='25' name='new_password'></td></tr>\n";
        echo "              <tr><td class=table_rows width=20% height=25 style='padding-left:32px;' nowrap>Confirm Password:</td><td colspan=2
                      style='padding-left:20px;' width=80%><input type='password' size='25' maxlength='25'name='confirm_password'>
                      </td></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=40>&nbsp;</td></tr>\n";
        echo "              <input type='hidden' name='get_office' value=\"$get_office\">\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Change Password'
                      src='../images/buttons/next_button.png'></td><td><a href='useradmin.php'>
                      <img src='../images/buttons/cancel_button.png' border='0'></td></tr></table></form></td></tr>\n";
        include '../footer.php';
        exit;

    } else {

        $new_password = crypt($new_password, 'xy');
        $confirm_password = crypt($confirm_password, 'xy');

        $post_username = addslashes($post_username);

        $query = "update " . $db_prefix . "employees set employee_passwd = ('" . $new_password . "') where empfullname = ('" . $post_username . "')";
        $result = mysql_query($query);

        $post_username = stripslashes($post_username);

        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td>
                <td class=table_rows_green>&nbsp;Password changed successfully.</td></tr>\n";
        echo "            </table>\n";
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "              <tr><th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/lock_edit.png' />&nbsp;&nbsp;&nbsp;Change
                      Password</th></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows width=20% height=25 style='padding-left:32px;' nowrap>Username:</td><td align=left class=table_rows width=80%
                      style='padding-left:20px;'><input type='hidden' name='post_username' value=\"$post_username\">$post_username</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>New Password</td><td align=left class=table_rows
                      colspan=2 style='padding-left:20px;' width=80%>***hidden***</td></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=40>&nbsp;</td></tr>\n";
        echo "              <tr><td><a href='useradmin.php'><img src='../images/buttons/done_button.png' border='0'></td></tr>
            </table></td></tr>\n";
        include '../footer.php';
        exit;
    }
}
?>
