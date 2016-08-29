<html>
<?php

include '../functions.php';

// grab the connecting ip address for the audit log. if more than 1 ip address is returned, accept the first ip and discard the rest. //

$connecting_ip = get_ipaddress();
if (empty($connecting_ip)) {
    return false;
}

// determine if connecting ip address is allowed to connect to Accenture System  //

if ($restrict_ips == "oui") {
    for ($x = 0; $x < count($allowed_networks); $x++) {
        $is_allowed = ip_range($allowed_networks[$x], $connecting_ip);
        if (!empty($is_allowed)) {
            $allowed = true;
        }
    }
    if (!isset($allowed)) {
        echo "Vous n'êtes pas autorisé à afficher cette page.";
        exit;
    }
}

// check for correct db version //

@ $db = mysql_pconnect($db_hostname, $db_username, $db_password);
if (!$db) {
    echo "Erreur: Impossible de se connecter à la base de données. Veuillez réessayer plus tard.";
    exit;
}
mysql_select_db($db_name);

$table = "dbversion";
$result = mysql_query("SHOW TABLES LIKE '" . $db_prefix . $table . "'");
@$rows = mysql_num_rows($result);
if ($rows == "1") {
    $dbexists = "1";
} else {
    $dbexists = "0";
}

$db_version_result = mysql_query("select * from " . $db_prefix . "dbversion");
while (@$row = mysql_fetch_array($db_version_result)) {
    @$my_dbversion = "" . $row["dbversion"] . "";
}

// include css and timezone offset//

if (($use_client_tz == "oui") && ($use_server_tz == "oui")) {
    echo 'Please reconfigure your config.inc.php file, you cannot have both $use_client_tz AND $use_server_tz set to \'yes\'';
    exit;
}

echo "<head>\n";
if ($use_client_tz == "oui") {
    if (!isset($_COOKIE['tzoffset'])) {
        include '../tzoffset.php';
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>\n";
    }
}
