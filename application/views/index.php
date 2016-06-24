<!-- Developed by "Mohd Danish" & "Mohammad Luqman" 13/06/2016 -->
<!doctype html>
<html ng-app="ifsc-bank">
<head>
	<title>BANK IFSC</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="<?=JS?>/angular-route.min.js"></script>
	<script src="<?=JS?>/jquery.min.js"></script>
	<script src="<?=JS?>/script.js"></script>
	<script src="<?=JS?>/angular-css.js"></script>
	<script src="<?=JS?>/directives/directives.js"></script>
	<script src="https://npmcdn.com/api-check@7.5.5/dist/api-check.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-formly/8.2.1/formly.js"></script>
	<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
	<script src="<?=JS?>/formly-bootstrap.js"></script>
	<script src="<?=JS?>/ngclipboard.js"></script>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Prompt' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates' rel='stylesheet' type='text/css'>
	<link href='<?=CSS?>/ifscss.css' rel='stylesheet' type='text/css'>
</head>

<body>
<div ng-controller="mainCtrl">
	<ifsc-header></ifsc-header>
	<ng-view></ng-view>
</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
