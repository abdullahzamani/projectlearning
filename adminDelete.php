<!--
    Programmer : AbdullahZamani
    Company    : UniKL MIIT
    System     : NR; Online Application Management System
    File       : Admin Delete Supplier
    Version    : 1.0.0 - 21 November 2015
-->

<?php
include('database/config.php');

if(isset($_GET['unitid']))
{
  $unitid = $_GET['unitid'];
  $query1 = mysql_query("DELETE FROM OMSUNIT WHERE UNIT_ID='$unitid'");
  if($query1) {
    header('location:adminUnit.php');
  }
} else if(isset($_GET['statusid']))
{
  $statusid = $_GET['statusid'];
  $queryursn = mysql_query("DELETE FROM OMSURUSAN WHERE URSN_ID='$statusid'");
  if($queryursn) {
    header('location:adminStatusKeberadaan.php');
  }
}
?>
