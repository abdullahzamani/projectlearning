<!--
    Programmer : AbdullahZamani
    Company    : UniKL MIIT
    System     : NR; Online Application Management System
    File       : Admin Update Category
    Version    : 1.0.0 - 21 November 2015
-->

<?php
    $statusid = $_GET["statusid"];
?>

<!DOCTYPE html>
<?php include ('./includes/header.php'); ?>
   <div class="section">
   <div class="container">
    <div class="row">
     <div class="col-md-offset-3 col-md-6 text-center">
      <h4 class="title"><span class="text"><strong>Kemaskini </strong>Status Keberadaan</span></h4>
       <hr>
      <form action="adminUpdateStatusKeberadaan.php?statusid=<?php echo  $statusid ?>" method="post" class="form-inline">
       <?php
         $query = "SELECT * FROM OMSURUSAN WHERE URSN_ID='$statusid'";
         $result = mysql_query ($query);
         while($row = mysql_fetch_array($result))
         {
           $statusid = $row['URSN_ID'];
       ?>
       <table class="table borderless">
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>Huraian Status Keberadaan</b></td>
         <td class="text-left"><input type="text" name="ursndesc" class="form-control" style="width: 90%;" value="<?php echo '' .$row['URSN_DESC']. ''; ?>"></td>
        </tr>
       </table>
       <?php } ?>
       <hr>
       <div class="actions" align="center">
         <input class="btn btn-primary" type="submit" value="  Save  ">
         <input type="hidden" name="submitted" value="TRUE" />
         <a href="adminStatusKeberadaan.php"><input class="btn btn-danger" type="button" value="Cancel"></a>
        </div>
      </form>

      <?php
        if (isset($_POST['submitted'])) {
          $ursndesc = $_POST['ursndesc'];
          $query = "UPDATE OMSURUSAN SET URSN_DESC='$ursndesc' WHERE URSN_ID='$statusid'";
          $result = mysql_query($query);
          if ($result){
            echo "<script>";
            echo " alert('Berjaya Kemaskini Status Keberadaan!');
                   window.location.href='adminStatusKeberadaan.php';
                 </script>";
          } else {
            echo "<script>alert('Gagal Kemaskini Status Keberadaan! $statusid $ursndesc $result');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL="adminUpdateStatusKeberadaan.php"">';
          }
        }
      ?>
     </div>
    </div>
    </div>
   </div>
<?php include ('./includes/footer.php'); ?>
  </div>
  <script src="themes/js/common.js"></script>
  </body>
</html>
