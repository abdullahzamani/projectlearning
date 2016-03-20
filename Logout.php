<!--
    Programmer : AbdullahZamani
    Company    : Freelancer
    System     : OMS SYSTEM
    File       : Logout.php
    Version    : 1.0 - 19 March 2016
-->

<?php
session_start();

require("database/mysql_connect.php");
unset($_SESSION['SESS_LOGGEDIN']);
unset($_SESSION['SESS_USERNAME']);
unset($_SESSION['SESS_USERID']);
session_destroy();
header("Location: index.php");

?>
