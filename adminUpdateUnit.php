<!--
    Programmer : AbdullahZamani
    Company    : UniKL MIIT
    System     : NR; Online Application Management System
    File       : Admin Update Category
    Version    : 1.0.0 - 21 November 2015
-->

<?php
    $unitid = $_GET["unitid"];
?>

<!DOCTYPE html>
<?php include ('./includes/header.php'); ?>
   <div class="section">
   <div class="container">
    <div class="row">
     <div class="col-md-offset-3 col-md-6 text-center">
      <h4 class="title"><span class="text"><strong>Update </strong>Category</span></h4>
       <hr>
      <form action="adminUpdateUnit.php?unitid=<?php echo  $unitid ?>" method="post" class="form-inline">
       <?php
         $query = "SELECT * FROM OMSUNIT WHERE UNIT_ID='$unitid'";
         $result = mysql_query ($query);
         while($row = mysql_fetch_array($result))
         {
           $unitid = $row['UNIT_ID'];
       ?>
       <table class="table borderless">
        <tr>
         <td class="span3"></td>
         <td class="text-left"><font color="white"><small>* </small></font><b>Unit ID</b></td>
         <td class="text-left"><?php echo '' .$row['UNIT_ID']. ''; ?></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>Unit Description</b></td>
         <td class="text-left"><input type="text" name="unitdesc" class="form-control" style="width: 90%;" value="<?php echo '' .$row['UNIT_DESC']. ''; ?>"></td>
        </tr>
       </table>
       <?php } ?>
       <hr>
       <div class="actions" align="center">
         <input class="btn btn-primary" type="submit" value="  Save  ">
         <input type="hidden" name="submitted" value="TRUE" />
         <a href="adminUnit.php"><input class="btn btn-danger" type="button" value="Cancel"></a>
        </div>
      </form>

      <?php
        if (isset($_POST['submitted'])) {
          $unitdesc = $_POST['unitdesc'];
          $query = "UPDATE OMSUNIT SET UNIT_DESC='$unitdesc' WHERE UNIT_ID='$unitid'";
          $result = mysql_query($query);
          if ($result){
            echo "<script>alert('Update unit is successful!');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL="adminUpdateUnit.php"">';
          } else {
            echo "<script>alert('Fail to update unit!$category $unitid $result');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL="adminUpdateUnit.php"">';
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
