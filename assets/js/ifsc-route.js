ifsc_app.config(['$routeProvider',function($routeProvider){
	$routeProvider.
	when('/:bank_name?/:state_name?/:district_name?/:branch_name?',{
		title: 'Home',
		templateUrl: 'assets/pages/ifschome.html',
		controller: 'bankNameCtrl'
	})
	.when('/about/:hbhbd?/:hbshb?',{
		title: 'About IFSC-Bank',
		templateUrl: 'assets/pages/about.html'
	})
}])