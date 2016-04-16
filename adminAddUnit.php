<!--
    Programmer : AbdullahZamani
    Company    : UniKL MIIT
    System     : NR; Online Application Management System
    File       : Admin Add Categories
    Version    : 1.0.0   - 21 November 2015
-->

<!DOCTYPE html>
<?php include ('./includes/header.php'); ?>
   <div class="section">
    <div class="row">
     <div class="span12">
      <h4 class="title text-center">
       <span><span class="line">Tambah<strong> Bahagian/Unit</strong></span></span>
      </h4>

      <?php
        if(isset($_POST['submit'])){
          require_once ('database/config.php');

          $unitid = $_POST['unitid'];
          $unitdesc = $_POST['unitdesc'];
          $sessid = $_SESSION['SESS_USERID'];

          $query = "INSERT INTO OMSUNIT (UNIT_ID,UNIT_DESC,CRT_TMS,UPD_TMS,CRT_UID,UPD_UID) VALUES ('$unitid','$unitdesc',NOW(),NOW(),'$sessid','$sessid')";
          $result = @mysql_query ($query);
          if ($result) { //If it ran OK.
            echo "<script>";
            echo " alert('Add Category successfull !');
                   window.location.href='adminUnit.php';
                 </script>";
          }
        } else {
      ?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3">
            <form class="form-horizontal" action="adminAddUnit.php" method="post" role="form">
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputEmail3" class="control-label">Bahagian/Unit ID</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="unitid" placeholder="Unit ID" value="<?php if (isset ($_POST ['unitid'])) echo $_POST ['unitid']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">Huraian Bahagian/Unit</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Unit Description" name="unitdesc" value="<?php if (isset ($_POST ['unitdesc'])) echo $_POST ['unitdesc']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary" name="submit" value="Add">
                  <a href="adminUnit.php">
                    <button type="button" class="btn btn-danger">Cancel</button>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

      <?php } ?>
     </div>
    </div>
   </div>
<?php include ('./includes/footer.php'); ?>
  </div>
  </body>
</html>
