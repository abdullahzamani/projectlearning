<?php
require("includes/header.php");
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-success">OFFICER MOVEMENT MANAGEMENT SYSTEM</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form role="form" action="waktuFunction.php" method="post">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nama Pengguna</label>
                        <?php
                        $myQuery = "select PGW_NM as NM, PGW_NM, PGW_NRIC as IC, PGW_NRIC, UNIT from omspegawai order by PGW_ID";
                        $rs = mysql_query($myQuery) or die ("Dude you've got this wrong: " . mysql_error());
                        ?>
                        <select class="form-control" name="pgw_nm" id="pgw_nm">
                            <?php
                            echo "<option>Select Staff</option>";
                            while ($row = mysql_fetch_array($rs))
                            {
                                echo "<option data-nric=" . $row['PGW_NRIC'] . " data-unit=" . $row['UNIT'] . " value='" . $row['NM'] . "'>" . $row['NM'] . "</option>";
                            }
                            ?>
                        </select>
                        <span class="fa form-control-feedback fa-edit"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No. Kad Pengenalan</label>
                        <input class="form-control" placeholder="No. Kad Pengenalan" type="text" name="pgw_nric" id="pgw_nric" value="<?php if (isset ($_POST ['pgw_nric'])) echo $_POST ['pgw_nric']; ?>">
                        <p class="help-block text-right">No. Kad Pengenalan (contoh: 751208085857)</p>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="control-label">Bahagian/Unit</label>
                        <input class="form-control" placeholder="Bahagian/Unit" type="text" name="pgw_unit" id="pgw_unit" value="<?php if (isset ($_POST ['pgw_unit'])) echo $_POST ['pgw_unit']; ?>">
                        <span class="fa form-control-feedback fa-edit"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="control-label">Status Keberadaan dan Pergerakan Pegawai</label>
                        <?php
                        $myQuery = "select URSN_ID, URSN_DESC from omsurusan order by URSN_ID";
                        $rs = mysql_query($myQuery) or die ("Dude you've got this wrong: " . mysql_error());
                        ?>
                        <select class="form-control" name="ursn_desc" id="ursn_desc">
                            <?php
                            echo "<option>Select Status</option>";
                            while ($row = mysql_fetch_array($rs))
                            {
                                echo "<option value='" . $row['URSN_DESC'] . "'> " . $row['URSN_DESC'] . "</option>";
                            }
                            ?>
                        </select>
                        <span class="fa form-control-feedback fa-edit"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Catatan</label>
                        <textarea class="form-control" rows="5" id="comment" style="resize:none;" name="rpt_desc" id="rpt_desc" value="<?php if (isset ($_POST ['rpt_desc'])) echo $_POST ['rpt_desc']; ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Waktu Keluar</label>
                        </div>
                        <div class="col-sm-6">
                            <!--<input type="text" class="form-control" placeholder="Waktu Keluar" name="pgw_wkt_keluar" id = "pgw_wkt_keluar" value="<?php if (isset ($_POST ['pgw_wkt_keluar'])) echo $_POST ['pgw_wkt_keluar']; ?>">-->
                            <input type="text" class="form-control" name="pgw_wkt_keluar" id="pgw_wkt_keluar" />



                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-calendar fa-fw fa-lg text-muted"></i>
                            <!--<button class="btn btn-danger" style="width:110px; height:35px" type="submit">Keluar</button>&nbsp;</div>
<input type="hidden" name="wkt_keluar" id="wkt_keluar" /> -->
                            <input type="submit" name="wkt_keluar" class="btn btn-danger" id="wkt_keluar" value="Keluar" alt="Keluar" tabindex="5" />
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label class="control-label">Waktu Masuk</label>
                        </div>
                        <div class="col-sm-6">
                            <!--<input type="text" class="form-control" placeholder="Waktu Masuk" name="pgw_wkt_masuk" id = "pgw_wkt_masuk" value="<?php if (isset ($_POST ['pgw_wkt_masuk'])) echo $_POST ['pgw_wkt_masuk']; ?>">-->
                            <input type="text" class="form-control" name="pgw_wkt_masuk" id="pgw_wkt_masuk" />
                        </div>
                        <div class="col-sm-4">
                            <i class="fa fa-calendar fa-fw fa-lg text-muted"></i>
                            <!--<button class="btn btn-success" style="width:110px; height:35px" type="submit">Masuk</button>&nbsp;</div>
<input type="hidden" name="wkt_masuk" id="wkt_masuk"/> -->
                            <input type="submit" name="wkt_masuk" class="btn btn-success" id="wkt_masuk" value="Masuk" alt="Masuk" tabindex="6" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-right">
                <br>
                <a href="adminReportDaily.php">
                    <button class="active btn" style="width:250px; height:50px">LAPORAN HARIAN</button>
                </a>
                <br>
                <br>
                <a href="adminReportWeekly.html">
                    <button class="active btn" style="width:250px; height:50px">LAPORAN BULANAN</button>
                </a>
                <br>
                <br>
                <a href="adminReportWeekly.html">
                    <button class="active btn" style="width:250px; height:50px">LAPORAN TAHUNAN</button>
                </a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php
    require("includes/footer.php");
    ?>
    <script type="text/javascript">
        $('#pgw_wkt_keluar').timepicker();
        $('#pgw_wkt_masuk').timepicker();

        $(document).ready(function() {
            $('#pgw_nm').on('change', function() {
                $('#pgw_nric').val($(this[this.selectedIndex]).attr('data-nric'));
                $('#pgw_unit').val($(this[this.selectedIndex]).attr('data-unit'));
            });
        });

    </script>
