app.config(['$routeProvider','$locationProvider',function($routeProvider,$locationProvider){
	$locationProvider.html5Mode(true);
	$routeProvider.
	when('/',{
		title: 'Home',
		templateUrl: 'assets/pages/home.html',
		controller: 'HomeController'
	})
	.when('/:bank_id/:bankname',{
		title: 'Bank List',
		templateUrl: 'assets/pages/bank_list.html',
		controller: 'BankListController'
	})
	.when('/:bank_id/:bankname/:state',{
		title: 'Bank List',
		templateUrl: 'assets/pages/state_list.html',
		controller: 'StateListController'
	})	
	.when('/:bank_id/:bankname/:state/:district',{
		title: 'Bank List',
		templateUrl: 'assets/pages/district_list.html',
		controller: 'DistrictListController'
	})
	.when('/:bank_id/:bankname/:state/:district/:branch_name/:branch_id',{
		title: 'Bank List',
		templateUrl: 'assets/pages/branch_info.html',
		controller: 'BranchInfoController'
	})
	.when('/about',{
		title: 'About IFSC-Bank',
		templateUrl: 'assets/pages/about.html'
	})
}])