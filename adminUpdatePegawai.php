<!--
    Programmer : AbdullahZamani
    Company    : UniKL MIIT
    System     : NR; Online Application Management System
    File       : Admin Update Category
    Version    : 1.0.0 - 21 November 2015
-->

<?php
    $pgwid = $_GET["pgwid"];
?>

<!DOCTYPE html>
<?php include ('./includes/header.php'); ?>
   <div class="section">
   <div class="container">
    <div class="row">
     <div class="col-md-offset-3 col-md-6 text-center">
      <h4 class="title"><span class="text"><strong>Kemaskini </strong>Unit</span></h4>
       <hr>
      <form action="adminUpdatePegawai.php?pgwid=<?php echo  $pgwid ?>" method="post" class="form-inline">
       <?php
         $query = "SELECT * FROM OMSPEGAWAI WHERE PGW_ID='$pgwid'";
         $result = mysql_query ($query);
         while($row = mysql_fetch_array($result))
         {
           $pgwid = $row['PGW_ID'];
       ?>
       <table class="table borderless">
        <tr>
         <td class="span3"></td>
         <td class="text-left"><font color="white"><small>* </small></font><b>Pegawai ID</b></td>
         <td class="text-left"><?php echo '' .$row['PGW_ID']. ''; ?></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>Nama Pegawai</b></td>
         <td class="text-left"><input type="text" name="pgwnm" class="form-control" style="width: 95%;" value="<?php echo '' .$row['PGW_NM']. ''; ?>"></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>No. Kad Pengenalan</b></td>
         <td class="text-left"><input type="text" name="pgwnric" class="form-control" style="width: 95%;" value="<?php echo '' .$row['PGW_NRIC']. ''; ?>"></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>Jawatan</b></td>
         <td class="text-left"><input type="text" name="pgwjwtn" class="form-control" style="width: 95%;" value="<?php echo '' .$row['PGW_JWTN']. ''; ?>"></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>Bahagian/Unit</b></td>
         <td class="text-left"><input type="text" name="pgwunit" class="form-control" style="width: 95%;" value="<?php echo '' .$row['UNIT']. ''; ?>"></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>No. Tel.</b></td>
         <td class="text-left"><input type="text" name="pgwhp" class="form-control" style="width: 95%;" value="<?php echo '' .$row['PGW_HP']. ''; ?>"></td>
        </tr>
        <tr>
         <td></td>
         <td class="text-left"><font color="#FF0000"><small>* </small></font><b>Emel</b></td>
         <td class="text-left"><input type="text" name="pgwemel" class="form-control" style="width: 95%;" value="<?php echo '' .$row['PGW_EMEL']. ''; ?>"></td>
        </tr>
       </table>
       <?php } ?>
       <hr>
       <div class="actions" align="center">
         <input class="btn btn-primary" type="submit" value="  Save  ">
         <input type="hidden" name="submitted" value="TRUE" />
         <a href="adminSenaraiPegawai.php"><input class="btn btn-danger" type="button" value="Cancel"></a>
        </div>
      </form>

      <?php
        if (isset($_POST['submitted'])) {
          $pgwnm = $_POST['pgwnm'];
          $pgwnric = $_POST['pgwnric'];
          $pgwjwtn = $_POST['pgwjwtn'];
          $pgwunit = $_POST['pgwunit'];
          $pgwhp = $_POST['pgwhp'];
          $pgwemel = $_POST['pgwemel'];
          $query = "UPDATE OMSPEGAWAI SET PGW_NM='$pgwnm',PGW_NRIC='$pgwnric',PGW_JWTN='$pgwjwtn',UNIT='$pgwunit',PGW_HP='$pgwhp',PGW_EMEL='$pgwemel' WHERE PGW_ID='$pgwid'";
          $result = mysql_query($query);
          if ($result){
            echo "<script>";
            echo " alert('Berjaya Kemaskini Pegawai!');
                   window.location.href='adminSenaraiPegawai.php';
                 </script>";
          } else {
            echo "<script>alert('Gagal Kemaskini Pegawai! $pgwid $result');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL="adminUpdatePegawai.php"">';
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
