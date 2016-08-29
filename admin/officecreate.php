<?php
session_start();

include '../config.inc.php';
include 'header.php';
include 'topmain.php';
echo "<title>$title -Créer Bureau</title>\n";
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
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/brick_add.png' />&nbsp;&nbsp;&nbsp;Create Office
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_officename'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Create Groups Within This Office?</td>\n";
    echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='create_groups' value='1'
                      onFocus=\"javascript:form.how_many.disabled=false;form.how_many.style.background='#ffffff';\">Yes
                      <input checked type='radio' name='create_groups' value='0'
                      onFocus=\"javascript:form.how_many.disabled=true;form.how_many.style.background='#eeeeee';\">No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>How Many?</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <input disabled type='text' size='2' maxlength='1' name='how_many' style='background:#eeeeee;'></td></tr>\n";
    echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create Office' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='officeadmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
                      echo "</div>\n";
                      echo "</div>\n";




                      echo "</body>\n";
    exit;
} elseif ($request == 'POST') {

    $post_officename = $_POST['post_officename'];
    $create_groups = $_POST['create_groups'];
    @$how_many = $_POST['how_many'];
    @$input_group_name = $_POST['input_group_name'];

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

    if (get_magic_quotes_gpc()) {
        $post_officename = stripslashes($post_officename);
    }
    $post_officename = addslashes($post_officename);

    // begin post validation //

    // check for duplicate officenames //

    $query = "select * from " . $db_prefix . "offices where officename = '" . $post_officename . "'";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {
        $tmp_officename = "" . $row['officename'] . "";
    }

    // error checking: check for duplicate names, disallow certain characters for some fields, etc... //

    $string = strstr($post_officename, "\'");
    $string2 = strstr($post_officename, "\"");

    if ((@$tmp_officename == $post_officename) || (empty($post_officename)) || (!preg_match('/' . "^([[:alnum:]]| |-|_|\.)+$" . '/i', $post_officename)) ||
        ((!preg_match('/' . "^([0-9])$" . '/i', $how_many)) && (isset($how_many))) || (@$how_many == '0') || (($create_groups != '1') && (!empty($create_groups))) ||
        (!empty($string)) || (!empty($string2))
    ) {

        if (empty($post_officename)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    An Office Name is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Apostrohpes are not allowed when creating an Office Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string2)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Double Quotes are not allowed when creating an Office Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (@$tmp_officename == $post_officename) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Office already exists. Create another office.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]| |-|_|\.)+$" . '/i', $post_officename)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, hyphens, underscores, spaces, and periods are allowed when creating an Office Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($create_groups == '1') && (empty($how_many))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Please input the number of groups you wish to create within this new office.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($create_groups == '1') && ($how_many == '0')) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    You have chosen to create groups within this new office. Please input a number other than '0' for 'How Many?'.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([0-9])$" . '/i', $how_many)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Only numeric characters are allowed for an office count.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($create_groups != '1') && (!empty($create_groups))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" to the <i>Create Groups Within This Office</i> question.</td></tr>\n";
            echo "            </table>\n";
        }
        echo "            <br />\n";

        if (!empty($string)) {
            $post_officename = stripslashes($post_officename);
        }
        if (!empty($string2)) {
            $post_officename = stripslashes($post_officename);
        }

        echo "            <form name='form' action='$self' method='post'>\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/brick_add.png' />&nbsp;&nbsp;&nbsp;Create Office
                </th>\n";
        echo "              </tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_officename' value=\"$post_officename\">&nbsp;*</td></tr>\n";

        if (!empty($string)) {
            $post_officename = addslashes($post_officename);
        }
        if (!empty($string2)) {
            $post_officename = addslashes($post_officename);
        }

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Create Groups Within This Office?</td>\n";
        if ($create_groups == '1') {

            echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='create_groups' value='1' checked
                      onFocus=\"javascript:form.how_many.disabled=false;form.how_many.style.background='#ffffff';\">Yes
                      <input type='radio' name='create_groups' value='0'
                      onFocus=\"javascript:form.how_many.disabled=true;form.how_many.style.background='#eeeeee';\">No</td></tr>\n";
        } else {

            echo "                  <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='create_groups' value='1'
                      onFocus=\"javascript:form.how_many.disabled=false;form.how_many.style.background='#ffffff';\">Yes
                      <input checked type='radio' name='create_groups' value='0'
                      onFocus=\"javascript:form.how_many.disabled=true;form.how_many.style.background='#eeeeee';\">No</td></tr>\n";
        }

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>How Many?</td><td colspan=2 width=80%
                      style='padding-left:20px;'>\n";

        if ($create_groups == '1') {
            echo "                      <input type='text' size='2' maxlength='1' name='how_many' value='$how_many'></td></tr>\n";
        } else {
            echo "                      <input disabled type='text' size='2' maxlength='1' name='how_many' style='background:#eeeeee;' value='$how_many'></td></tr>\n";
        }

        echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=40>&nbsp;</td></tr>\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Create Office' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='officeadmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
                      echo "</div>\n";
                      echo "</div>\n";




                      echo "</body>\n";
        exit;
    }

    // end post validation //

    if (isset($input_group_name)) {

        for ($x = 0; $x < $how_many; $x++) {

            $z = $x + 1;

            // begin post validation //

            if (empty($input_group_name[$z])) {
                $empty_groupname = '1';
            }
            if (!preg_match('/' . "^([[:alnum:]]| |-|_|\.)+$" . '/i', $input_group_name[$z])) {
                $evil_groupname = '1';
            }

        }

        @$groupname_array_cnt = count($input_group_name);
        @$unique_groupname_array = array_unique($input_group_name);
        @$unique_groupname_array_cnt = count($unique_groupname_array);

        if ((@$empty_groupname != '1') && (@$evil_groupname != '1') && (@$groupname_array_cnt == @$unique_groupname_array_cnt)) {

            $query = "insert into " . $db_prefix . "offices (officename) values ('" . $post_officename . "')";
            $result = mysql_query($query);

            $query2 = "select * from " . $db_prefix . "offices where officename = '" . $post_officename . "'";
            $result2 = mysql_query($query2);

            while ($row = mysql_fetch_array($result2)) {
                $tmp_officeid = "" . $row['officeid'] . "";
            }
            mysql_free_result($result2);

            for ($x = 0; $x < $how_many; $x++) {
                $y = $x + 1;
                $query3 = "insert into " . $db_prefix . "groups (groupname, officeid) values ('" . $input_group_name[$y] . "', '" . $tmp_officeid . "')";
                $result3 = mysql_query($query3);
            }

            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "              <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                  &nbsp;Office created successfully.</td></tr>\n";
            echo "            </table>\n";
            echo "            <br />\n";
        }

        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "            <form name='form' action='$self' method='post'>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/brick_add.png' />&nbsp;&nbsp;&nbsp;Create Office
                </th>\n";
        echo "              </tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office Name:</td><td class=table_rows colspan=2
                      width=80% style='padding-left:20px;'>
                      <input type='hidden' name='post_officename' value='$post_officename'>$post_officename</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Create Groups Within This Office?</td><td
                      class=table_rows colspan=2 width=80% style='padding-left:20px;'>
                      <input type='hidden' name='create_groups' value='$create_groups'>$create_groups</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>How Many?</td><td class=table_rows colspan=2
                      width=80% style='padding-left:20px;'>
                      <input type='hidden' name='how_many' value='$how_many'>$how_many</td></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "            </table>\n";
        echo "            <br /><br />\n";

        if (@$empty_groupname == '1') {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Group Name is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (@$evil_groupname == '1') {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, hyphens, underscores, spaces, and periods are allowed when creating a Group Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (@$groupname_array_cnt != @$unique_groupname_array_cnt) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Duplicate Group Name exists.</td></tr>\n";
            echo "            </table>\n";
        }

        if ((@$empty_groupname != '1') && (@$evil_groupname != '1') && (@$groupname_array_cnt == @$unique_groupname_array_cnt)) {

            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            if ($how_many == '1') {
                echo "              <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                  &nbsp;$how_many group was created within the <b>$post_officename</b> office successfully.</td></tr>\n";
            } elseif ($how_many > '1') {
                echo "              <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                  &nbsp;$how_many groups were created within the <b>$post_officename</b> office successfully.</td></tr>\n";
            }
            echo "            </table>\n";
        }

        echo "            <table align=center valign=top width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=15></td></tr>\n";

        for ($x = 0; $x < $how_many; $x++) {
            $y = $x + 1;

            if ((@$empty_groupname == '1') || (@$evil_groupname == '1') || (@$groupname_array_cnt != @$unique_groupname_array_cnt)) {
                echo "              <tr><td class=table_rows colspan=2>$y.&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type='text' size='25' maxlength='50' name='input_group_name[$y]' value=\"$input_group_name[$y]\"></td></tr>\n";
            } else {
                echo "              <tr><td class=table_rows colspan=2>$y.&nbsp;&nbsp;&nbsp;&nbsp;$input_group_name[$y]</td></tr>\n";
            }
        } // end for loop

        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";

        if ((@$empty_groupname == '1') || (@$evil_groupname == '1') || (@$groupname_array_cnt != @$unique_groupname_array_cnt)) {
            echo "              <tr><td height=20>&nbsp;</td></tr>\n";
            echo "              <tr><td width=30><input type='image' name='submit' value='Create Office' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='officeadmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
            include '../footer.php';
            exit;

        } else {

            echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
            echo "              <tr><td><a href='officecreate.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
            include '../footer.php';
            exit;
        }

    } else {

        if (!isset($how_many)) {

            $query = "insert into " . $db_prefix . "offices (officename) values ('" . $post_officename . "')";
            $result = mysql_query($query);

            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                &nbsp;Office created successfully.</td></tr>\n";
            echo "            </table>\n";
            echo "            <br />\n";
        }

        echo "            <form name='form' action='$self' method='post'>\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/brick_add.png' />&nbsp;&nbsp;&nbsp;Create Office
                </th></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office Name:</td><td class=table_rows colspan=2
                      width=80% style='padding-left:20px;'>
                      <input type='hidden' name='post_officename' value='$post_officename'>$post_officename</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Create Groups Within This Office?</td><td
                      class=table_rows colspan=2 width=80% style='padding-left:20px;'>\n";

        if ($create_groups == "1") {
            $tmp_create_groups = "Yes";
        } else {
            $tmp_create_groups = "No";
        }
        echo "                      <input type='hidden' name='create_groups' value='$create_groups'>$tmp_create_groups</td></tr>\n";

        if (!isset($how_many)) {

            echo "              <tr><td height=15></td></tr>\n";
            echo "            </table>\n";
            echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
            echo "              <tr><td><a href='officecreate.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
            include '../footer.php';
            exit;
        }

        if (isset($how_many)) {

            echo "              <tr><td class=table_rows height=20 width=20% style='padding-left:32px;' nowrap>How Many?</td><td class=table_rows colspan=2
                      width=80% style='padding-left:20px;'>
                      <input type='hidden' name='how_many' value='$how_many'>$how_many</td></tr>\n";
            echo "              <tr><td height=15></td></tr>\n";
            echo "            </table>\n";
            echo "            <table align=center valign=top width=60% border=0 cellpadding=0 cellspacing=3>\n";

            if ($how_many == '1') {

                echo "              <tr><td height=40 class=table_rows colspan=2>You have chosen to create <b>$how_many</b> group within the
                      <b>$post_officename</b> office. Please input the group name below.</td></tr>\n";
            } elseif ($how_many > '1') {

                echo "              <tr><td height=40 class=table_rows colspan=2>You have chosen to create <b>$how_many</b> groups within the
                      <b>$post_officename</b> office. Please input the group names below.</td></tr>\n";
            }

            for ($x = 0; $x < $how_many; $x++) {
                $y = $x + 1;
                echo "              <tr><td class=table_rows colspan=2>$y.&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type='text' size='25' maxlength='50' name='input_group_name[$y]'></td></tr>\n";
            }
        }
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Create Office' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='officeadmin.php'><img src='../images/buttons/cancel_button.png'
                      border='0'></td></tr></table></form></td></tr>\n";
        include '../footer.php';
        exit;
    }
}
?>
