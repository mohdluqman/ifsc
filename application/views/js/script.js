ifsc_app = angular.module('ifsc-bank',['ngRoute','formly','angularCSS','formlyBootstrap','ngclipboard']);

ifsc_app.config(['$routeProvider',function($routeProvider){
	$routeProvider.
	when('/',{
		title: 'Home',
		templateUrl: 'pages/ifschome.html'
	})
	.when('/about',{
		title: 'About IFSC-Bank',
		templateUrl: 'pages/about.html'
	})
}])

ifsc_app.controller('mainCtrl',function($scope){
	$scope.tags_name = ['Bank IFSC code','MICR Code','Bank Branch','Bank Address','Branch Code','SBI Branch Code','SBI IFSC Code','Branch Contact info']
})