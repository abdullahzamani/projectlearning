<!--
    Programmer : AbdullahZamani
    Company    : Freelancer
    System     : OMS SYSTEM
    File       : pentadbirLogin.html
    Version    : 1.0 - 19 March 2016
-->

<html>    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head><body>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 contenteditable="true">OFFICER MOVEMENT MANAGEMENT SYSTEM
              <small class="text-success">&nbsp;
                <br>
                <br>OMMS</small>
            </h1>
          </div>
          <div class="col-md-4">
            <img src="images\jpbd.png" class="img-responsive" width="150px">
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>
                <span style="color: rgb(119, 119, 119); font-size: 23.4px; line-height: 1;">LOGIN</span>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3">
            <form class="form-horizontal" action="Login.php" method="post" role="form">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">User ID</label>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="userid" placeholder="User ID" value="<?php if (isset ($_POST ['userid'])) echo $_POST ['userid']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">Password</label>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if (isset ($_POST ['password'])) echo $_POST ['password']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Log in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


</body></html>
