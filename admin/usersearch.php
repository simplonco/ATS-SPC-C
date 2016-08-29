<?php
session_start();

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

include '../config.inc.php';
if ($request !== 'POST') {
   include 'header_get.php';
   include 'topmain.php';
}
echo "<title>$title - Recherche l'utilisateur</title>\n";
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

if ($request !== 'POST') {

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
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/magnifier.png' />&nbsp;&nbsp;&nbsp;Search for User
                </th>\n";
    echo "              </tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                      size='25' maxlength='50' name='post_username'
                      onFocus=\"javascript:form.display_name.disabled=true;form.email_addy.disabled=true;
                      form.display_name.style.background='#eeeeee';form.email_addy.style.background='#eeeeee';\" ></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                      size='25' maxlength='50' name='display_name'
                      onFocus=\"javascript:form.post_username.disabled=true;form.email_addy.disabled=true;
                      form.post_username.style.background='#eeeeee';form.email_addy.style.background='#eeeeee';\"></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                      size='25' maxlength='75' name='email_addy'
                      onFocus=\"javascript:form.post_username.disabled=true;form.display_name.disabled=true;
                      form.post_username.style.background='#eeeeee';form.display_name.style.background='#eeeeee';\"></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
    echo "                      </select></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='group_name'>\n";
    echo "                      </select></td></tr>\n";

    echo "              <tr><td class=table_rows align=right colspan=3 style='color:#27408b;font-family:Tahoma;'><a class=footer_links
                      href=\"usersearch.php\" style='text-decoration:underline;'>reset form</a>&nbsp;</td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/search_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
                      echo "</div>\n";
                      echo "</div>\n";




                      echo "</body>\n";
    exit;
}

elseif ($request == 'POST') {

include 'header_post.php';
//include 'topmain.php';

@$post_username = stripslashes($_POST['post_username']);
@$display_name = stripslashes($_POST['display_name']);
@$email_addy = $_POST['email_addy'];
@$office_name = $_POST['office_name'];
@$group_name = $_POST['group_name'];

//$post_username = addslashes($post_username);
//$display_name = addslashes($display_name);
//$office_name = addslashes($office_name);
//$group_name = addslashes($group_name);

// begin post validation //

if ((!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) || (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $display_name)) ||
    (!preg_match('/' . "^([[:alnum:]]|_|.|-|@)+$" . '/i', $email_addy))) {



echo "    <td align=left class=right_main scope=col>\n";
echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
echo "        <tr class=right_main_text>\n";
echo "          <td valign=top>\n";
if (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) {
    if ($post_username == "") {
    } else {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when searching for a Username.</td></tr>\n";
        echo "            </table>\n";
        $evil_input = "1";
    }
}
if (!preg_match('/^([[:alnum:]]|\s|\-|\'|\,)+$/i', $display_name)) {
    if ($display_name == "") {
    } else {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when searching for a Display Name.</td></tr>\n";
        echo "            </table>\n";
        $evil_input = "1";
    }
}
if (!preg_match('/^([[:alnum:]]|_|.|-|@)+$/', $email_addy)) {
    if ($email_addy == "") {
    } else {
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr>\n";
        echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;Alphanumeric characters, underscores, periods, and hyphens are allowed when searching for an Email Address.</td></tr>\n";
        echo "            </table>\n";
        $evil_input = "1";
    }
}
if (($post_username == "") && ($display_name == "") && ($email_addy == "")) {
include 'topmain.php';
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

    echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr>\n";
    echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red nowrap>
                    &nbsp;A Username, Display Name, or Email Address is required.</td></tr>\n";
    echo "            </table>\n";
    echo "</section>";



    //echo "<div class='control-sidebar-bg'></div>\n";

    //echo "</div>\n";




    $evil_input = "1";

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

if (isset($evil_input)) {

    echo "            <br />\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/magnifier.png' />&nbsp;&nbsp;&nbsp;Search for User
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' style='color:red;' size='25' maxlength='50'
                      name='post_username' value='$post_username'
                      onFocus=\"javascript:form.display_name.disabled=true;form.email_addy.disabled=true;
                      form.display_name.style.background='#eeeeee';form.email_addy.style.background='#eeeeee';\"></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' style='color:red;' size='25' maxlength='50'
                      name='display_name' value='$display_name'
                      onFocus=\"javascript:form.post_username.disabled=true;form.email_addy.disabled=true;
                      form.post_username.style.background='#eeeeee';form.email_addy.style.background='#eeeeee';\"></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text style='color:red;' size='25' maxlength='75'
                      name='email_addy' value='$email_addy'
                      onFocus=\"javascript:form.post_username.disabled=true;form.display_name.disabled=true;
                      form.post_username.style.background='#eeeeee';form.display_name.style.background='#eeeeee';\"></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
    echo "                      </select></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <select name='group_name' onfocus='group_names();'>
                        <option selected>$group_name</option>\n";
    echo "                      </select></td></tr>\n";
    echo "              <tr><td class=table_rows align=right colspan=3 style='color:#27408b;font-family:Tahoma;'><a class=footer_links
                      href=\"usersearch.php\" style='text-decoration:underline;'>reset form</a></td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/search_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
    exit;

} else {

$post_username = addslashes($post_username);
$display_name = addslashes($display_name);
$office_name = addslashes($office_name);
$group_name = addslashes($group_name);

if (!empty($post_username)) {
    $tmp_var = $post_username;
    $tmp_var2 = "Username";

    if ((!empty($office_name)) && (!empty($group_name))) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where empfullname LIKE '%" . $post_username . "%' and office = '" . $office_name . "' and groups = '" . $group_name . "'
            order by empfullname";
        $result4 = mysql_query($query4);
    } elseif (!empty($office_name)) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where empfullname LIKE '%" . $post_username . "%' and office = '" . $office_name . "'
            order by empfullname";
        $result4 = mysql_query($query4);
    } elseif (empty($office_name)) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where empfullname LIKE '%" . $post_username . "%'
            order by empfullname";
        $result4 = mysql_query($query4);
    }
} elseif (!empty($display_name)) {
    $tmp_var = $display_name;
    $tmp_var2 = "Display Name";

    if ((!empty($office_name)) && (!empty($group_name))) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where displayname LIKE '%" . $display_name . "%' and office = '" . $office_name . "' and groups = '" . $group_name . "'
            order by empfullname";
        $result4 = mysql_query($query4);
    } elseif (!empty($office_name)) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where displayname LIKE '%" . $display_name . "%' and office = '" . $office_name . "'
            order by empfullname";
        $result4 = mysql_query($query4);
    } elseif (empty($office_name)) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where displayname LIKE '%" . $display_name . "%'
            order by empfullname";
        $result4 = mysql_query($query4);
    }
} elseif (!empty($email_addy)) {
    $tmp_var = $email_addy;
    $tmp_var2 = "Email Address";

    if ((!empty($office_name)) && (!empty($group_name))) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where email LIKE '%" . $email_addy . "%' and office = '" . $office_name . "' and groups = '" . $group_name . "'
            order by empfullname";
        $result4 = mysql_query($query4);
    } elseif (!empty($office_name)) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where email LIKE '%" . $email_addy . "%' and office = '" . $office_name . "'
            order by empfullname";
        $result4 = mysql_query($query4);
    } elseif (empty($office_name)) {
        $query4 = "select empfullname, displayname, email, groups, office, admin, reports, time_admin, disabled from " . $db_prefix . "employees
            where email LIKE '%" . $email_addy . "%'
            order by empfullname";
        $result4 = mysql_query($query4);
    }
}

$tmp_var = stripslashes($tmp_var);
$tmp_var2 = stripslashes($tmp_var2);
$row_count = "0";

while ($row = mysql_fetch_array($result4)) {

@$user_count_rows = mysql_num_rows($user_count);
@$admin_count_rows = mysql_num_rows($admin_count);
@$reports_count_rows = mysql_num_rows($reports_count);

$row_count++;

if ($row_count == "1") {
  include 'topmain.php';
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
    echo "            <table width=90% align=center height=40 border=0 cellpadding=0 cellspacing=0>\n";
    echo "              <tr><th class=table_heading_no_color nowrap width=100% halign=left>User Search Summary</th></tr>\n";
    echo "              <tr><td height=40 class=table_rows nowrap halign=left>Search Results for \"$tmp_var\" in $tmp_var2</td></tr>\n";
    echo "            </table>\n";
    echo "            <table class=table_border width=90% align=center border=0 cellpadding=0 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=table_heading nowrap width=3% align=left>&nbsp;</th>\n";
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
    echo "</div>\n";
    echo "</div>\n";




    echo "</body>\n";
}

$row_color = ($row_count % 2) ? $color2 : $color1;
$empfullname = stripslashes("" . $row['empfullname'] . "");
$displayname = stripslashes("" . $row['displayname'] . "");

echo "              <tr class=table_border bgcolor='$row_color'><td class=table_rows width=3%>&nbsp;$row_count</td>\n";
echo "                <td class=table_rows width=13%>&nbsp;<a class=footer_links title=\"Edit User: $empfullname\"
                    href=\"useredit.php?username=$empfullname&officename=" . $row["office"] . "\">$empfullname</a></td>\n";
echo "                <td class=table_rows width=18%>$displayname</td>\n";
//echo "                <td class=table_rows width=23%>".$row["email"]."</td>\n";
echo "<td class=table_rows width=10%>".$row['office']."</td>\n";
echo "<td class=table_rows width=10%>".$row['groups']."</td>\n";

if ("".$row["disabled"]."" == 1) {
echo "<td class=table_rows width=3% align=center><img src='../images/icons/cross.png'/></td>\n";
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


echo "
<td class=table_rows width=3% align=center>
    <a title=\"Edit User: $empfullname\" href=\"useredit.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/application_edit.png'/></td>\n";
echo "
<td class=table_rows width=3% align=center>
    <a title=\"Change Password: $empfullname\"
    href=\"chngpasswd.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/lock_edit.png'/></td>\n";
echo "
<td class=table_rows width=3% align=center>
    <a title=\"Delete User: $empfullname\" href=\"userdelete.php?username=$empfullname&officename=".$row["office"]."\">
    <img border=0 src='../images/icons/delete.png'/></td>\n";
echo "              </tr>\n";
}
mysql_free_result($result4);

if ($row_count == "0") {

$post_username = stripslashes($post_username);

echo "            <br/>\n";
echo "
<table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "
    <tr>\n";
        echo "
        <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png'/></td>
        <td class=table_rows_red nowrap>
            &nbsp;A user was not found matching your criteria. Please try again.
        </td>
    </tr>
    \n";
    echo "
</table>\n";
echo "            <br/>\n";
echo "
<form name='form' action='$self' method='post'>\n";
    echo "
    <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "
        <tr>\n";
            echo "
            <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/magnifier.png'/>&nbsp;&nbsp;&nbsp;Search
                for User
            </th>
        </tr>
        \n";
        echo "
        <tr>
            <td height=15></td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                                                                                              style='color:red;'
                                                                                              size='25' maxlength='50'
                                                                                              name='post_username'
                                                                                              value=\"$post_username\"
                                                                                              onFocus=\"javascript:form.display_name.disabled=true;form.email_addy.disabled=true;
                                                                                              form.display_name.style.background='#eeeeee';form.email_addy.style.background='#eeeeee';\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text'
                                                                                              style='color:red;'
                                                                                              size='25' maxlength='50'
                                                                                              name='display_name'
                                                                                              value=\"$display_name\"
                                                                                              onFocus=\"javascript:form.post_username.disabled=true;form.email_addy.disabled=true;
                                                                                              form.post_username.style.background='#eeeeee';form.email_addy.style.background='#eeeeee';\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td>
            <td colspan=2 width=80%
                style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text style='
                                                                                              color:red;' size='25'
                maxlength='75'
                name='email_addy' value=\"$email_addy\"
                onFocus=\"javascript:form.post_username.disabled=true;form.display_name.disabled=true;
                form.post_username.style.background='#eeeeee';form.display_name.style.background='#eeeeee';\">
            </td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td>
            <td colspan=2 width=80%
                style='padding-left:20px;'>
                <select name='office_name' onchange='group_names();'>\n";
                    echo " </select></td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td>
            <td colspan=2 width=80%
                style='padding-left:20px;'>
                <select name='group_name' onfocus='group_names();'>
                    <option selected>$group_name</option>
                    \n";
                    echo " </select></td>
        </tr>
        \n";
        echo "
        <tr>
            <td class=table_rows align=right colspan=3 style='color:#27408b;font-family:Tahoma;'><a class=footer_links
                                                                                                    href=\"usersearch.php\"
                                                                                                    style='text-decoration:underline;'>reset
                    form</a></td>
        </tr>
        \n";
        echo "
    </table>
    \n";
    echo "
    <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "
        <tr>
            <td height=40>&nbsp;</td>
        </tr>
        \n";
        echo "
        <tr>
            <td width=30><input type='image' name='submit' value='Create User' align='middle'
                                src='../images/buttons/search_button.png'></td>
            <td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png'
                                             border='0'></td>
        </tr>
    </table>
</form></td></tr>\n";include '../footer.php'; exit;
} else {

echo "            </table></td></tr>\n";
include '../footer.php'; exit;
}}}}
?>
