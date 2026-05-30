<?php
$valid_user = 'admin';
$valid_pass = '837939';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $valid_user) || ($_SERVER['PHP_AUTH_PW'] != $valid_pass)) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Unauthorized access';
    exit;
}
?>
