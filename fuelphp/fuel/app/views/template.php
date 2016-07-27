<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<?php echo Asset::css('small-business.css'); ?>
	<style>
		body { margin: 0px; }
	</style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        <img src="/assets/img/logo01.png" alt="">
      </a>
    </div>
    <div class="container">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/">TopPage</a></li>
          <li><a href="#">Request</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="col-md-12">
      <h1><?php echo $content; ?></h1>
    </div>
  </div>
</body>
</html>
