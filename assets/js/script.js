ifsc_app = angular.module('ifsc-bank',['ngRoute','angularCSS','ngclipboard']);

ifsc_app.controller('homeCtrl',function($scope,$http){
	$http.get('/s/get_all_banks').then(function(data){
		$scope.banksname = data
	})
	$http.get('/s/get_all_states').then(function(data){
		$scope.state_names = data
	})
	$http.get('/s/get_all_districts').then(function(data){
		$scope.districts = data
	})
	// $http.get('/s/get_all_branchs').then(function(data){
	// 	$scope.branchs = data
	// })
})

ifsc_app.config(['$routeProvider',function($routeProvider){
	$routeProvider.
	when('/',{
		title: 'Home',
		templateUrl: 'assets/pages/ifschome.html',
		controller: 'homeCtrl'
	})
	.when('/about',{
		title: 'About IFSC-Bank',
		templateUrl: 'assets/pages/about.html'
	})
}])

ifsc_app.controller('mainCtrl',function($scope){
	$scope.tags_name = ['Bank IFSC code','MICR Code','Bank Branch','Bank Address','Branch Code','SBI Branch Code','SBI IFSC Code','Branch Contact info'];
	// $scope.get_all_cities = function($scope){
	// }
})