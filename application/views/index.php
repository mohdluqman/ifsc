<!-- Developed by "Mohd Danish" & "Mohammad Luqman" 13/06/2016 -->
<!DOCTYPE html>
<html ng-app="bankLibrary" lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bankslibrary.com | Banks IFSC Code MICR Code Branch Code</title>
	<base href="/" />
    <link rel="icon" href="<?=img_url()?>bankslibrary.ico" sizes="16x16">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  	<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css"> -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Reem+Kufi" rel="stylesheet">
	<link href="<?=css_url()?>bootstrap.css" rel="stylesheet">
	<link href="<?=css_url()?>select.css" rel="stylesheet">
	<!-- <link href="<?=css_url()?>font-awesome.min.css" rel="stylesheet"> -->
	<link href="<?=css_url()?>ifscss.css" rel="stylesheet">
    <link href="<?=css_url()?>selectize.default.css" rel="stylesheet">
    <!-- Place this tag in your head or just before your close body tag. -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
	      <ul class="nav navbar-nav navbar-right">
        	<li><a href="#">Search by Bank Name</a></li>
        	<li><a href="#">Search by IFSC code</a></li>
        	<li><a href="#">Search by MICR code</a></li>
        </ul>
	    </div><!-- /.navbar-collapse -->
		</nav>
		
		<div class="container">
		<div class="row">
		<div class="col-md-9">		
			<ng-view></ng-view>
		<br/>
		<hr style="border-width:2px"/>
		<div class="text-center" style="margin-top:-18px"><span class="or_class">Key Points</span></div>
		<h4><u>What is IFS Code?</u></h4>
		<p>The Indian Financial System Code (IFS Code or IFSC) is an alphanumeric code that facilitates electronic funds transfer in India. A code uniquely identifies each bank branch participating in the two main Payment and settlement systems in India: the Real Time Gross Settlement (RTGS) and the National Electronic Fund Transfer (NEFT) systems.</p>
		<h6><a href="https://en.wikipedia.org/wiki/Indian_Financial_System_Code" target="_blank"><i class="fa fa-external-link-square"></i> more details</a></h6>
		<h4><u>What is MICR Code?</u></h4>
		<p>Magnetic Ink Character Recognition Code (MICR Code) is a character-recognition technology used mainly by the banking industry to ease the processing and clearance of cheques and other documents. The MICR encoding, called the MICR line, is at the bottom of cheques and other vouchers and typically includes the document-type indicator, bank code, bank account number, cheque number, cheque amount, and a control indicator.</p>
		<h6><a href="https://en.wikipedia.org/wiki/Magnetic_ink_character_recognition" target="_blank"><i class="fa fa-external-link-square"></i> more details</a></h6>
		</div>
		<div class="col-md-3">
		<h3>Change Your Language</h3>
		<div id="google_translate_element"></div>
		<!-- <h2>IFSC Code</h2>
		<h2>MICR Code</h2> -->
		<!-- Place this tag where you want the widget to render. -->
		<br/>
		<div class="g-person" data-href="//plus.google.com/u/0/115562211208923895849" data-rel="author"></div>
		<div class="fb-page" data-href="https://www.facebook.com/bankslibrary/" data-width="300" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.5.7/angular-sanitize.js"></script>
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
	<script src="<?=js_url()?>ngclipboard.min.js"></script>
	<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,gu,hi,kn,ml,mr,ne,pa,sd,ta,te,ur', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	}
	</script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>
