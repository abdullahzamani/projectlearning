<?php
 session_start();
 require_once('database/mysql_connect.php');
$sesusername = $_SESSION['SESS_USERNAME'];
$sespgwid = $_SESSION['SESS_USERID'];
?>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

<!--    timepicker-->
        <link type="text/css" href="timepicker/css/bootstrap.min.css" />
        <link type="text/css" href="timepicker/css/bootstrap-timepicker.min.css" />
        <script type="text/javascript" src="timepicker/js/jquery.min.js"></script>
        <script type="text/javascript" src="timepicker/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="timepicker/js/bootstrap-timepicker.min.js"></script>

    </head>

    <body>
        <div class="navbar navbar-default navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img height="20" alt="Brand" src="images/jpbd.png" class="center-block"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="Logout.php">Log out</a>
                        </li>
                    </ul>
                    <p class="navbar-left navbar-text">Signed in as
                        <a href="#" class="navbar-link">
                            <?php echo"$sesusername"?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
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
                  $myQuery = "select PGW_NM as NM, PGW_NM, PGW_NRIC as IC, PGW_NRIC, UNIT from omspegawai where PGW_ID='$sespgwid'";
                  $rs = mysql_query($myQuery) or die ("Dude you've got this wrong: " . mysql_error());
                  ?>
                                        <?php
                        while ($row = mysql_fetch_array($rs))
                        {
                            echo "<input class='form-control' type='text' name='pgw_nm' id='pgw_nm' value='". $row['NM'] ."'>";

                      ?>
                                    <span class="fa form-control-feedback fa-edit"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">No. Kad Pengenalan</label>
                                <input class="form-control" placeholder="No. Kad Pengenalan" type="text" name="pgw_nric" id="pgw_nric" value="<?php echo $row['IC']  ?>">
                                <p class="help-block text-right">No. Kad Pengenalan (contoh: 751208085857)</p>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label">Bahagian/Unit</label>
                                <input class="form-control" placeholder="Bahagian/Unit" type="text" name="pgw_unit" id="pgw_unit" value="<?php echo $row['UNIT'] ?>">
                                <?php
                                }
                                ?>
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
                </div>
            </div>
            <br>
            <br>
            <div class="navbar navbar-default navbar-fixed-bottom navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"><span><small><small><small>Copyright 2016 @ AZ</small></small></small></span></a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

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
