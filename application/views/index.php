<!-- Developed by "Mohd Danish" & "Mohammad Luqman" 13/06/2016 -->
<!DOCTYPE html>
<html ng-app="ifsc-bank" lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bankslibrary.com | Banks IFSC MICR Branch Code</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	<script src="<?=js_url()?>angular-route.min.js"></script>
	<script src="<?=js_url()?>jquery.min.js"></script>
	<script src="<?=js_url()?>script.js"></script>
	<script src="<?=js_url()?>angular-css.js"></script>
	<script src="<?=js_url()?>directives/directives.js"></script>
	<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
	<script src="<?=js_url()?>ngclipboard.js"></script>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Prompt' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates' rel='stylesheet' type='text/css'>
	<link href='<?=css_url()?>ifscss.css' rel='stylesheet' type='text/css'>
</head>

<body>
<div ng-controller="mainCtrl">
	<ifsc-header></ifsc-header>
	<ng-view></ng-view>
</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
