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
       <span><span class="line">Tambah<strong> Pegawai</strong></span></span>
      </h4>

      <?php
        if(isset($_POST['submit'])){
          require_once ('database/config.php');

          $pgwid = $_POST['pgwid'];
          $pgwnm = $_POST['pgwnm'];
          $nric = $_POST['nric'];
          $pgwjwtn = $_POST['pgwjwtn'];
          $pgwunit = $_POST['pgwunit'];
          $pgwhp = $_POST['pgwhp'];
          $pgwhp = $_POST['pgwemel'];
          $sessid = $_SESSION['SESS_USERID'];

          $query = "INSERT INTO OMSPEGAWAI (PGW_ID,PGW_NM,PGW_NRIC,PGW_JWTN,UNIT,PGW_HP,PGW_EMEL,CRT_TMS,UPD_TMS,CRT_UID,UPD_UID) VALUES ('$pgwid','$pgwnm','$nric','$pgwjwtn','$pgwunit','$pgwhp','$pgwhp',NOW(),NOW(),'$sessid','$sessid')";
          $result = @mysql_query ($query);
          if ($result) { //If it ran OK.
            echo "<script>";
            echo " alert('Berjaya Tambah Pegawai!');
                   window.location.href='adminSenaraiPegawai.php';
                 </script>";
          }
        } else {
      ?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3">
            <form class="form-horizontal" action="adminAddPegawai.php" method="post" role="form">
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputEmail3" class="control-label">Pegawai ID</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="pgwid" placeholder="Pegawai ID" value="<?php if (isset ($_POST ['pgwid'])) echo $_POST ['pgwid']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">Nama</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Nama Pegawai" name="pgwnm" value="<?php if (isset ($_POST ['pgwnm'])) echo $_POST ['pgwnm']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">No. Kad Pengenalan</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="No. Kad Pengenalan Pegawai" name="nric" value="<?php if (isset ($_POST ['nric'])) echo $_POST ['nric']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">Jawatan</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Jawatan Pegawai" name="pgwjwtn" value="<?php if (isset ($_POST ['pgwjwtn'])) echo $_POST ['pgwjwtn']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">Bahagian/Unit</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Pegawai Bahagian/Unit" name="pgwunit" value="<?php if (isset ($_POST ['pgwunit'])) echo $_POST ['pgwunit']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">No. Tel.</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="No. Tel. Pegawai" name="pgwhp" value="<?php if (isset ($_POST ['pgwhp'])) echo $_POST ['pgwhp']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <font color="#FF0000"><small>* </small></font><label for="inputPassword3" class="control-label">Emel</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Emel Pegawai" name="pgwemel" value="<?php if (isset ($_POST ['pgwemel'])) echo $_POST ['pgwemel']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary" name="submit" value="Add">
                  <a href="adminSenaraiPegawai.php">
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
