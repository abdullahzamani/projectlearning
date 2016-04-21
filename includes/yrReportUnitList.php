<!--
    Programmer : AbdullahZamani
    Company    : Freelance
    System     : OMS System
    File       : Unit List
    Version    : 1.0 - 27 March 2016
-->

<?php
$catsql = "SELECT UNIT_ID, UNIT_DESC FROM OMSUNIT";
$catres = mysql_query($catsql);

while($catrow = mysql_fetch_assoc($catres)){

    echo '<a href="adminReportYearly.php?pgw_unit=' . $catrow['UNIT_ID'] . '" class="hide-from-printer"><button class="btn btn-primary hide-from-printer">' . $catrow['UNIT_ID'] . '</button></a>';
    echo '&nbsp;';
}

?>
