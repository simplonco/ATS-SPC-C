<?php
session_start();

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

include '../config.inc.php';
if ($request !== 'POST') {
    include 'header_get.php';
    include 'topmain.php';
}
echo "<title>$title - Create User</title>\n";
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
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_add.png' />&nbsp;&nbsp;&nbsp;Create User
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_username'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='display_name'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'><input type='password' size='25' maxlength='25' name='password'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Confirm Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <input type='password' size='25' maxlength='25' name='confirm_password'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='75' name='email_addy'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
    echo "                      </select>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='group_name'>\n";
    echo "                      </select>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin User?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Employee Access User?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='time_admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='time_admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports User?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='reports_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='reports_perms' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Account Disabled?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='disabled' value='1'>&nbsp;Yes
                    <input type='radio' name='disabled' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
                      echo "</div>\n";
                      echo "</div>\n";



                      echo "</body>\n";

} elseif ($request == 'POST') {

    include 'header_post.php';
    include 'topmain.php';

    $post_username = stripslashes($_POST['post_username']);
    $display_name = stripslashes($_POST['display_name']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email_addy = $_POST['email_addy'];
    $office_name = $_POST['office_name'];
    @$group_name = $_POST['group_name'];
    $admin_perms = $_POST['admin_perms'];
    $reports_perms = $_POST['reports_perms'];
    $time_admin_perms = $_POST['time_admin_perms'];
    $post_disabled = $_POST['disabled'];

    $post_username = addslashes($post_username);
    $display_name = addslashes($display_name);

    $query5 = "select empfullname from " . $db_prefix . "employees where empfullname = '" . $post_username . "' order by empfullname";
    $result5 = mysql_query($query5);

    while ($row = mysql_fetch_array($result5)) {
        $tmp_username = "" . $row['empfullname'] . "";
    }
    mysql_free_result($result5);

    $post_username = stripslashes($post_username);
    $display_name = stripslashes($display_name);

    $string = strstr($post_username, "\"");
    $string2 = strstr($display_name, "\"");

    if ((@$tmp_username == $post_username) || ($password !== $confirm_password) ||
        (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) || (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $display_name)) || (empty($post_username)) ||
        (empty($display_name)) || (empty($email_addy)) || (empty($office_name)) || (empty($group_name)) ||
        (!preg_match('/' . "^([[:alnum:]]|~|\!|@|#|\$|%|\^|&|\*|\(|\)|-|\+|`|_|\=|[{]|[}]|\[|\]|\||\:|\<|\>|\.|,|\?)+$" . '/i', $password)) ||
        (!preg_match('/' . "^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$" . '/i', $email_addy)) || (($admin_perms != '1') && (!empty($admin_perms))) ||
        (($reports_perms != '1') && (!empty($reports_perms))) || (($time_admin_perms != '1') && (!empty($time_admin_perms))) ||
        (($post_disabled != '1') && (!empty($post_disabled))) || (!empty($string)) || (!empty($string2))
    ) {

        if (@tmp_username == $post_username) {
            $tmp_username = stripslashes($tmp_username);
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

        // begin post validation //

        if (empty($post_username)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Username is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($display_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Display Name is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Double Quotes are not allowed when creating an Username.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string2)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Double Quotes are not allowed when creating an Display Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($email_addy)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    An Email Address is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($office_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    An Office is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($group_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Group is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (@$tmp_username == $post_username) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    User already exists. Create another username.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when creating a Username.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $display_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when creating a Display Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]|~|\!|@|#|\$|%|\^|&|\*|\(|\)|-|\+|`|_|\=|[{]|[}]|\[|\]|\||\:|\<|\>|\.|,|\?)+$" . '/i', $password)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Single and double quotes, backward and forward slashes, semicolons, and spaces are not allowed when creating a
                    Password.</td></tr>\n";
            echo "            </table>\n";
        } elseif ($password != $confirm_password) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Passwords do not match.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$" . '/i', $email_addy)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, underscores, periods, and hyphens are allowed when creating an Email Address.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($admin_perms != '1') && (!empty($admin_perms))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for Sys Admin Perms.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($reports_perms != '1') && (!empty($reports_perms))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for Reports Perms.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($time_admin_perms != '1') && (!empty($time_admin_perms))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for Employee Access Perms.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($post_disabled != '1') && (!empty($post_disabled))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for User Account Disabled.</td></tr>\n";
            echo "            </table>\n";
        }

        if (!empty($office_name)) {
            $query = "select * from " . $db_prefix . "offices where officename = '" . $office_name . "'";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
                $tmp_officename = "" . $row['officename'] . "";
            }
            mysql_free_result($result);
            if (!isset($tmp_officename)) {
                echo "Office is not defined.\n";
                exit;
            }
        }

        if (!empty($group_name)) {
            $query = "select * from " . $db_prefix . "groups where groupname = '" . $group_name . "'";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)) {
                $tmp_groupname = "" . $row['groupname'] . "";
            }
            mysql_free_result($result);
            if (!isset($tmp_officename)) {
                echo "Group is not defined.\n";
                exit;
            }
        }

        // end post validation //

        if (!empty($string)) {
            $post_username = stripslashes($post_username);
        }
        if (!empty($string2)) {
            $display_name = stripslashes($display_name);
        }

        $password = crypt($password, 'xy');
        $confirm_password = crypt($confirm_password, 'xy');

        echo "            <br />\n";
        echo "            <form name='form' action='$self' method='post'>\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_add.png' />&nbsp;&nbsp;&nbsp;Create User
                </th></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows  height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:11px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_username' value=\"$post_username\">&nbsp;*</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:11px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='display_name' value=\"$display_name\">&nbsp;*</td></tr>\n";

        if (!empty($string)) {
            $post_username = addslashes($post_username);
        }
        if (!empty($string2)) {
            $displayname = addslashes($display_name);
        }

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'><input type='password' size='25' maxlength='25' name='password'></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Confirm Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <input type='password' size='25' maxlength='25' name='confirm_password'></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:11px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='75' name='email_addy' value=\"$email_addy\">&nbsp;*</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
        echo "                      </select>&nbsp;*</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='group_name' onfocus='group_names();'>
                        <option selected>$group_name</option>\n";
        echo "                      </select>&nbsp;*</td></tr>\n";

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin User?</td>\n";
        if ($admin_perms == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='admin_perms' value='1'
                    checked>&nbsp;Yes<input type='radio' name='admin_perms' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
        }

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Employee Access User?</td>\n";
        if ($time_admin_perms == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='time_admin_perms' value='1'
                    checked>&nbsp;Yes<input type='radio' name='time_admin_perms' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='time_admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='time_admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
        }
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports User?</td>\n";
        if ($reports_perms == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='reports_perms' value='1'
                    checked>&nbsp;Yes<input type='radio' name='reports_perms' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='reports_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='reports_perms' value='0' checked>&nbsp;No</td></tr>\n";
        }
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Account Disabled?</td>\n";
        if ($post_disabled == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='disabled' value='1'
                    checked>&nbsp;Yes<input type='radio' name='disabled' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='disabled' value='1'>&nbsp;Yes
                    <input type='radio' name='disabled' value='0' checked>&nbsp;No</td></tr>\n";
        }
        echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=40>&nbsp;</td></tr>\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
                      echo "</div>\n";
                      echo "</div>\n";

                      echo "</body>\n";
        exit;
    }

    $post_username = addslashes($post_username);
    $display_name = addslashes($display_name);

    $password = crypt($password, 'xy');
    $confirm_password = crypt($confirm_password, 'xy');

    $query3 = "insert into " . $db_prefix . "employees (empfullname, displayname, employee_passwd, email, groups, office, admin, reports, time_admin, disabled)
           values ('" . $post_username . "', '" . $display_name . "', '" . $password . "', '" . $email_addy . "', '" . $group_name . "', '" . $office_name . "', '" . $admin_perms . "',
           '" . $reports_perms . "', '" . $time_admin_perms . "', '" . $post_disabled . "')";
    $result3 = mysql_query($query3);
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
    echo "                <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                    &nbsp;User created successfully.</td></tr>\n";
    echo "            </table>\n";
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_add.png' />&nbsp;&nbsp;&nbsp;Create User
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";

    $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
	  where empfullname = '" . $post_username . "'
          order by empfullname";
    $result4 = mysql_query($query4);

    while ($row = mysql_fetch_array($result4)) {

        $username = stripslashes("" . $row['empfullname'] . "");
        $displayname = stripslashes("" . $row['displayname'] . "");
        $user_email = "" . $row['email'] . "";
        $office = "" . $row['office'] . "";
        $groups = "" . $row['groups'] . "";
        $admin = "" . $row['admin'] . "";
        $reports = "" . $row['reports'] . "";
        $time_admin = "" . $row['time_admin'] . "";
        $disabled = "" . $row['disabled'] . "";
    }
    mysql_free_result($result4);

    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$username</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$displayname</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Password:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>***hidden***</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$user_email</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$office</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$groups</td></tr>\n";

    if ($admin == "1") {
        $admin = "Yes";
    } else {
        $admin = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin User?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$admin</td></tr>\n";
    if ($time_admin == "1") {
        $time_admin = "Yes";
    } else {
        $time_admin = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Employee Access User?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$time_admin</td></tr>\n";
    if ($reports == "1") {
        $reports = "Yes";
    } else {
        $reports = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports User?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$reports</td></tr>\n";
    if ($disabled == "1") {
        $disabled = "Yes";
    } else {
        $disabled = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Account Disabled?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$disabled</td></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
    echo "              <tr><td><a href='usercreate.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
    echo "</div>\n";
    echo "</div>\n";




    echo "</body>\n";

    exit;
}
?>
