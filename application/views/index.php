<!-- Developed by "Mohd Danish" & "Mohammad Luqman" 13/06/2016 -->
<!DOCTYPE html>
<html ng-app="bankLibrary" lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bankslibrary.com | Banks IFSC Code MICR Code Branch Code</title>
	<!-- <base href="/" /> -->
    <link rel="icon" href="<?=img_url()?>bankslibrary.ico" sizes="16x16">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script> -->
	<!-- Angular Material requires Angular.js Libraries
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-aria.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-messages.min.js"></script>

	Angular Material Library
	<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.js"></script> -->

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">
	<link href="<?=css_url()?>bootstrap.min.css" rel="stylesheet">
	<link href="<?=css_url()?>select.css" rel="stylesheet">
	<!-- <link href="<?=css_url()?>font-awesome.min.css" rel="stylesheet"> -->
	<style>
.select2 > .select2-choice.ui-select-match {
            /* Because of the inclusion of Bootstrap */
            height: 29px;
        }

        .selectize-control > .selectize-dropdown {
            top: 36px;
        }
        /* Some additional styling to demonstrate that append-to-body helps achieve the proper z-index layering. */
        .select-box {
          background: #fff;
          position: relative;
          z-index: 1;
        }
        .alert-info.positioned {
          margin-top: 1em;
          position: relative;
          z-index: 10000; /* The select2 dropdown has a z-index of 9999 */
        }
	</style>
	<link href="<?=css_url()?>ifscss.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css">    
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css">
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
		<h3>Multiple Ways to get Bank Detail</h3>
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
	<script src="<?=js_url()?>angular.min.js"></script>
	<script src="<?=js_url()?>angular-route.min.js"></script>
	<script src="<?=js_url()?>script.js"></script>
	<script src="<?=js_url()?>ifsc-route.js"></script>
	<script src="<?=js_url()?>angular-css.js"></script>
	<script src="<?=js_url()?>select.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-sanitize.js"></script>
</html>
