<!--
Programmer : AbdullahZamani
Company    : Freelancer
System     : OMS SYSTEM
File       : Login.php
Version    : 1.0 - 19 March 2016
-->

<?php
//Start session
session_start();

//Include database connection details
require_once('database/mysql_connect.php');

//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}

//Sanitize the POST values
$userid = clean($_POST['userid']);
$password = clean($_POST['password']);

//Input Validations
if($userid == '') {
    $errmsg_arr[] = '<font color="#FF0000">User ID is required</font>';
    $errflag = true;
}
if($password == '') {
    $errmsg_arr[] = '<font color="#FF0000">Password is required</font>';
    $errflag = true;
}

//If there are input validations, redirect back to the login form
if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
}

//if ($userid == 'admin' && $password == 'admin') {
//$query="SELECT * FROM omspegawai WHERE PGW_ID='$userid' AND PGW_PASS='$password'";
//$result=mysql_query($query);
//
////Check whether the query was successful or not
//if($result) {
//if(mysql_num_rows($result) > 0) {
////Login Successful
//$adminlogin = mysql_fetch_assoc($result);
//session_start("SESS_LOGGEDIN");
//session_start("SESS_USERNAME");
//session_start("SESS_USERID");
//$_SESSION['SESS_LOGGEDIN'] = 1;
//$_SESSION['SESS_USERNAME'] = $adminlogin['PGW_NM'];
//$_SESSION['SESS_USERID'] = $adminlogin['PGW_ID'];
//
//header("location: adminHomepage.php");
//exit();
//}
//
//else {
////Login failed
//$errmsg_arr[] = '<font color="#FF0000">User ID and Password not found</font>';
//$errflag = true;
//if($errflag) {
//$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
//session_write_close();
//header("location: index.php");
//exit();
//}
//}
//}else {
//die("Query failed");
//}
//}

//Create query
$shapass = sha1($password);
$query="SELECT * FROM omspegawai WHERE PGW_ID='$userid' AND PGW_PASS='$password' AND PGW_TYP='1'";
$result=mysql_query($query);

//Check whether the query was successful or not
if($result) {
    if(mysql_num_rows($result) > 0) {

        $loginrow = mysql_fetch_assoc($result);
        session_start("SESS_LOGGEDIN");
        session_start("SESS_USERNAME");
        session_start("SESS_USERID");
        $_SESSION['SESS_LOGGEDIN'] = 1;
        $_SESSION['SESS_USERNAME'] = $loginrow['PGW_NM'];
        $_SESSION['SESS_USERID'] = $loginrow['PGW_ID'];

        header("location: adminHomepage.php");
    } else {
        echo "<script>";
        echo "alert('Wrong User ID and Password !');
                   window.location.href='index.php';
                 </script>";

    }
}else {
    die("Query failed");
}
?>
