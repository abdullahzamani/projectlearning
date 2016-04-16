<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato|Lato');
body {
    background-image: url("images/bgimage.png");
    background: url(images/bgimage.png) no-repeat center center fixed;
    background-size: cover; /* for IE9+, Safari 4.1+, Chrome 3.0+, Firefox 3.6+ */
    -webkit-background-size: cover; /* for Safari 3.0 - 4.0 , Chrome 1.0 - 3.0 */
    -moz-background-size: cover; /* optional for Firefox 3.6 */
    -o-background-size: cover; /* for Opera 9.5 */
    margin: 0; /* to remove the default white margin of body */
    padding: 0; /* to remove the default white margin of body */
  font-family: Lato;
  font-size: 15px;
}
  .col-md-offset-3 {
    margin-left: 28%;
  }

  .form-control {
  display: block;
  width: 18%;
  height: 20px;
  padding: 3px 6px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555555;
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #cccccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.btn {
  display: inline-block;
  margin-bottom: 0;
  font-weight: normal;
  text-align: center;
  vertical-align: middle;
  touch-action: manipulation;
  cursor: pointer;
  background-image: none;
  border: 1px solid transparent;
  white-space: nowrap;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  border-radius: 4px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
input, label {
    float:left;
    margin:5px;
}
.control-label {
    margin-bottom: 0;
    vertical-align: middle;
  }
</style>
</head>
<body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="col-md-offset-3">
<form class="form-horizontal" action="Login.php" method="post" role="form">
<label class="control-label">User ID</label>
<input type="text" class="form-control" name="userid" placeholder="User ID" value="<?php if (isset ($_POST ['userid'])) echo $_POST ['userid']; ?>">
<label class="control-label">Password</label>
<input type="password" class="form-control" placeholder="Password" name="password" value="<?php if (isset ($_POST ['password'])) echo $_POST ['password']; ?>">

<input type="submit" class="btn" name="submit" value="Log in" />
</form>
</div>
</body>
</html>
