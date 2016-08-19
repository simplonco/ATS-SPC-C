	<!--
		It is the page displayed as the login page.
	-->
	
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SDLC Labs | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="views/plugins/iCheck/square/blue.css">
    <link rel="icon" href="views/dist/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="well login-box">
      <div class="login-logo">
        <a target="_blank" href="http://www.sdlclabs.com"><img src="views/dist/img/sdlc.png"/></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <br/>
        <form action="#" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="user">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="pwd">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <center><a href="#">forgot password ?</a></center>
    
	<?php
		echo "<center>";
		if(isset($_GET['msg']) && isset($_GET['color']))
		echo "<br/><font color='".$_GET['color']."'><b>".$_GET['msg']." !!!</b></font>";
		echo "</center>";
	?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="views/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="views/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="views/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
