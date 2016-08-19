<?php
session_start();

include '../config.inc.php';
include 'header.php';
include 'topmain.php';
echo "<title>$title - Create Group</title>\n";
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
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/group_add.png' />&nbsp;&nbsp;&nbsp;Create Group
                </th>\n";
    echo "              </tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group Name:</td><td colspan=2 align=left width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_groupname'>&nbsp;*</td></tr>\n";

    // query to populate dropdown with parent offices //

    $query = "select * from " . $db_prefix . "offices order by officename asc";
    $result = mysql_query($query);

    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Parent Office:</td><td colspan=2 align=left width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='select_office_name'>\n";
    echo "                        <option value ='1'>Choose One</option>\n";

    while ($row = mysql_fetch_array($result)) {
        echo "                        <option>" . $row['officename'] . "</option>\n";
    }
    echo "                      </select>&nbsp;*</td></tr>\n";
    mysql_free_result($result);

    echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create Group' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='groupadmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
    exit;
} elseif ($request == 'POST') {

    $select_office_name = $_POST['select_office_name'];
    $post_groupname = $_POST['post_groupname'];
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

    $post_groupname = stripslashes($post_groupname);
    $select_office_name = stripslashes($select_office_name);
    $post_groupname = addslashes($post_groupname);
    $select_office_name = addslashes($select_office_name);

    // begin post validation //

    if (!empty($select_office_name)) {
        $query = "select * from " . $db_prefix . "offices where officename = '" . $select_office_name . "'";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
            $getoffice = "" . $row['officename'] . "";
            $officeid = "" . $row['officeid'] . "";
        }
        mysql_free_result($result);
    }
    if ((!isset($getoffice)) && ($select_office_name != '1')) {
        echo "Office is not defined for this user. Go back and associate this user with an office.\n";
        exit;
    }

    // check for duplicate groupnames with matching officeids //

    $query = "select * from " . $db_prefix . "groups where groupname = '" . $post_groupname . "' and officeid = '" . @$officeid . "'";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {
        $tmp_groupname = "" . $row['groupname'] . "";
    }

    $string = strstr($post_groupname, "\'");
    $string2 = strstr($post_groupname, "\"");

    if ((!empty($string)) || (empty($post_groupname)) || (!preg_match('/' . "^([[:alnum:]]| |-|_|\.)+$" . '/i', $post_groupname)) || ($select_office_name == '1') || (@$tmp_groupname == $post_groupname) || (!empty($string2))) {

        if (!empty($string)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Apostrophes are not allowed when creating a Group Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string2)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Double Quotes are not allowed when creating a Group Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($post_groupname)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Group Name is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]| |-|_|\.)+$" . '/i', $post_groupname)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Only alphanumeric characters, hyphens, underscores, spaces, and periods are allowed when creating a Group Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif ($select_office_name == '1') {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Parent Office must be chosen.</td></tr>\n";
            echo "            </table>\n";
        } elseif (@$tmp_groupname == $post_groupname) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Group already exists. Create another group.</td></tr>\n";
            echo "            </table>\n";
        }
        echo "            <br />\n";

        // end post validation //

        if (!empty($string)) {
            $post_groupname = stripslashes($post_groupname);
        }
        if (!empty($string2)) {
            $post_groupname = stripslashes($post_groupname);
        }

        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "            <form name='form' action='$self' method='post'>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/group_add.png' />&nbsp;&nbsp;&nbsp;Create Group
                </th>\n";
        echo "              </tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group Name:</td><td colspan=2 align=left width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_groupname' value=\"$post_groupname\">&nbsp;*</td></tr>\n";

        if (!empty($string)) {
            $post_groupname = addslashes($post_groupname);
        }
        if (!empty($string2)) {
            $post_groupname = addslashes($post_groupname);
        }

        // query to populate dropdown with parent offices //

        $query = "select * from " . $db_prefix . "offices order by officename asc";
        $result = mysql_query($query);

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Parent Office:</td><td colspan=2 align=left width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='select_office_name'>\n";
        echo "                        <option value ='1'>Choose One</option>\n";

        while ($row = mysql_fetch_array($result)) {
            if ("" . $row['officename'] . "" == $select_office_name) {
                echo "                        <option selected>" . $row['officename'] . "</option>\n";
            } else {
                echo "                        <option>" . $row['officename'] . "</option>\n";
            }
        }
        echo "                      </select>&nbsp;*</td></tr>\n";
        mysql_free_result($result);

        echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=40>&nbsp;</td></tr>\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Create Group' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='groupadmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
        include '../footer.php';
        exit;

    } else {

        $query = "insert into " . $db_prefix . "groups (groupname, officeid) values ('" . $post_groupname . "', '" . $officeid . "')";
        $result = mysql_query($query);

        echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                  &nbsp;Group created successfully.</td></tr>\n";
        echo "            </table>\n";
        echo "            <br />\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/group_add.png' />&nbsp;&nbsp;&nbsp;Create Group
                </th>\n";
        echo "              </tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows width=20% height=25 style='padding-left:32px;' nowrap>Group Name:</td><td class=table_rows width=80%
                      style='padding-left:20px;' colspan=2>$post_groupname</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Parent Office:</td><td class=table_rows width=80%
                      style='padding-left:20px;' colspan=2>$select_office_name</td></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
        echo "              <tr><td><a href='groupcreate.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
        include '../footer.php';
        exit;
    }
}
?>
