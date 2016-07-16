ifsc_app.config(['$routeProvider',function($routeProvider){
	$routeProvider.
	when('/',{
		title: 'Home',
		templateUrl: 'assets/pages/home.html',
		controller: 'homeCtrl'
	})
	.when('/:bank_id/:bankname',{
		title: 'Bank List',
		templateUrl: 'assets/pages/bank_list.html',
		controller: 'bankListCtrl'
	})
	.when('/:bank_id/:bankname/:state',{
		title: 'Bank List',
		templateUrl: 'assets/pages/state_list.html',
		controller: 'stateListCtrl'
	})	
	.when('/:bank_id/:bankname/:state/:district',{
		title: 'Bank List',
		templateUrl: 'assets/pages/district_list.html',
		controller: 'districtListCtrl'
	})
	.when('/:bank_id/:bankname/:state/:district/:branch_name/:branch_id',{
		title: 'Bank List',
		templateUrl: 'assets/pages/branch_info.html',
		controller: 'branchInfoCtrl'
	})
	.when('/about',{
		title: 'About IFSC-Bank',
		templateUrl: 'assets/pages/about.html'
	})
}])