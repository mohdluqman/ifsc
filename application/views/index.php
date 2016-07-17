<!-- Developed by "Mohd Danish" & "Mohammad Luqman" 13/06/2016 -->
<!DOCTYPE html>
<html ng-app="bankLibrary" lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bankslibrary.com | Banks IFSC Code MICR Code Branch Code</title>
    <link rel="icon" href="<?=img_url()?>bankslibrary.ico" sizes="16x16">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script> -->
	<script src="<?=js_url()?>angular.min.js"></script>
	<script src="<?=js_url()?>angular-route.min.js"></script>
	<script src="<?=js_url()?>script.js"></script>
	<script src="<?=js_url()?>ifsc-route.js"></script>
	<script src="<?=js_url()?>angular-css.js"></script>

	<!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" rel="stylesheet"/> -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">
	<link href="<?=css_url()?>bootstrap.min.css" rel="stylesheet">
	<link href="<?=css_url()?>font-awesome.min.css" rel="stylesheet">
	<link href="<?=css_url()?>ifscss.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid" ng-controller="MainController">
	<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-default">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#/">Banks<span class="subTitle">Library</span></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="#/">Home</a></li>
	        <li><a href="#/about">About</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
		</nav>
		<div class="container">
		<div class="row">
		<div class="col-md-9">
		
			<ng-view></ng-view>
		</div>
		<div class="col-md-3">
		<h3>Right Box of Bankslibrary.com</h3>
		</div>
		</div>
		</div>
	</div>
	</div>
</div>
</body>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
	<script src="<?=js_url()?>jquery.min.js"></script>
	<script src="<?=js_url()?>bootstrap.min.js"></script>
</html>
