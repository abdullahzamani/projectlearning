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
 require_once ('database/mysql_connect.php'); //connect to db.

 //Function to sanitize values received from the form. Prevents SQL injection
 function clean($str) {
  $str = @trim($str);
  if(get_magic_quotes_gpc()) {
   $str = stripslashes($str);
  }
  return mysql_real_escape_string($str);
 }

 if (isset($_POST['wkt_keluar'])) { // Handle the form.

 //Sanitize the POST values
 $nm = clean($_POST['pgw_nm']);
 $nric = clean($_POST['pgw_nric']);
 $unitid = clean($_POST['pgw_unit']);
 $ursndesc = clean($_POST['ursn_desc']);
 $rptdesc = clean($_POST['rpt_desc']);
 $pgwwktkeluar = clean($_POST['pgw_wkt_keluar']);
 $sessid = $_SESSION['SESS_USERID'];
    //Make the query.
    $query = "INSERT INTO OMSLAPORAN (PGW_NM, PGW_NRIC, UNIT_ID,
                                 URSN_DESC, RPT_DESC,
                                 STA_ID, PGW_WKT_KELUAR, CRT_TMS,
                                 UPD_TMS, CRT_UID,
                                 UPD_UID)
              VALUES ('$nm', '$nric', '$unitid',
                      '$ursndesc', '$rptdesc',
                      'N','$pgwwktkeluar', NOW(),
                      NOW(), '$sessid',
                      '$sessid')";
    $result = @mysql_query ($query); //Run the query.
    // Initializing Session
    if ($result) { //If it ran OK.
      echo "<script>";
      echo " alert('Data: Pegawai daftar keluar!');
      window.location.href='adminHomepage.php';
      </script>";
    }
 } elseif (isset($_POST['wkt_masuk'])) { // Handle the form.

 //Sanitize the POST values
 $nm = clean($_POST['pgw_nm']);
 $nric = clean($_POST['pgw_nric']);
 $unitid = clean($_POST['pgw_unit']);
 $ursndesc = clean($_POST['ursn_desc']);
 $rptdesc = clean($_POST['rpt_desc']);
 $pgwwktmasuk = clean($_POST['pgw_wkt_masuk']);
 $sessid = $_SESSION['SESS_USERID'];

     $query = "SELECT * FROM OMSLAPORAN WHERE PGW_NRIC='$nric' and PGW_NM='$nm'";
     $result = mysql_query($query);

   if (mysql_num_rows($result) > 0) {
    //Make the query.
       $query = "UPDATE OMSLAPORAN SET PGW_WKT_MASUK='$pgwwktmasuk', STA_ID='Y', UPD_TMS=NOW(), UPD_UID='$sessid', URSN_DESC='', RPT_DESC='' WHERE PGW_NRIC='$nric' and PGW_NM='$nm'";

    $result = @mysql_query ($query); //Run the query.
    // Initializing Session
    if ($result) { //If it ran OK.
      echo "<script>";
      echo " alert('Data: Pegawai daftar masuk!');
      window.location.href='adminHomepage.php';
      </script>";
    }
   } else {
      echo "<script>";
      echo " alert('Pegawai tidak daftar keluar!');
      window.location.href='adminHomepage.php';
      </script>";
   }
}
  mysql_close();


?>
