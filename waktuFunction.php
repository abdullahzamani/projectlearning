<!--
    Programmer : AbdullahZamani
    Company    : Freelancer
    System     : OMS SYSTEM
    File       : waktuFunction.php
    Version    : 1.0 - 20 March 2016
-->

<?php # Script 3.11 - register.php
 //Start session
 session_start();
 if (isset($_POST['wkt_keluar'])) { // Handle the form.
  require_once ('database/mysql_connect.php'); //connect to db.

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
 $nm = clean($_POST['pgw_nm']);
 $nric = clean($_POST['pgw_nric']);
 $unitid = clean($_POST['pgw_unit']);
 $ursndesc = clean($_POST['ursn_desc']);
 $rptdesc = clean($_POST['rpt_desc']);
 $pgwwkt = clean($_POST['pgw_wkt']);
 $sessid = $_SESSION['SESS_USERID'];
    //Make the query.
    $query = "INSERT INTO OMSLAPORAN (PGW_NM, PGW_NRIC, UNIT_ID,
                                 URSN_DESC, RPT_DESC,
                                 STA_ID, PGW_WKT, CRT_TMS,
                                 UPD_TMS, CRT_UID,
                                 UPD_UID)
              VALUES ('$nm', '$nric', '$unitid',
                      '$ursndesc', '$rptdesc',
                      'N','$pgwwkt', NOW(),
                      NOW(), '$sessid',
                      '$sessid')";
    $result = @mysql_query ($query); //Run the query.
    // Initializing Session
    if ($result) { //If it ran OK.
      echo "<script>";
      echo " alert('Register successfull !');
      window.location.href='adminHomepage.php';
      </script>";
    }
 }

if (isset($_POST['wkt_masuk'])) { // Handle the form.

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
 $nm = clean($_POST['NM']);
 $nric = clean($_POST['pgw_nric']);
 $unitid = clean($_POST['pgw_unit']);
 $ursndesc = clean($_POST['ursn_desc']);
 $rptdesc = clean($_POST['rpt_desc']);
 $pgwwkt = clean($_POST['pgw_wkt']);
 $sessid = $_SESSION['SESS_USERID'];

    //Make the query.
    $query = "INSERT INTO OMSLAPORAN (PGW_NM, PGW_NRIC, UNIT_ID,
                                 URSN_DESC, RPT_DESC,
                                 STA_ID, PGW_WKT, CRT_TMS,
                                 UPD_TMS, CRT_UID,
                                 UPD_UID)
              VALUES ('$nm', '$nric', '$unitid',
                      '$ursndesc', '$rptdesc',
                      'Y','$pgwwkt', NOW(),
                      NOW(), '$sessid',
                      '$sessid')";
    $result = @mysql_query ($query); //Run the query.
    // Initializing Session
    if ($result) { //If it ran OK.
      echo "<script>";
      echo " alert('Register successfull !');
      window.location.href='adminHomepage.php';
      </script>";
    }
}
  mysql_close();


?>
