ifsc_app = angular.module('ifsc-bank',['ngRoute','angularCSS','ngclipboard']);

ifsc_app.controller('homeCtrl',function($scope,$http){


	$http.get('/s/get_all_banks').then(function(data){
		$scope.banksname = data
	})
	/*$http.get('/s/get_all_states').then(function(data){
		$scope.state_names = data
	})
	$http.get('/s/get_all_districts').then(function(data){
		$scope.districts = data
	})*/
	$scope.send_bank_name_id = function(){
			var bankid = $scope.bank_name.id;
			console.log(bankid)
		// $http.post("http://bankslibrary.com/s/get_state_from_bank",{bank_id:bankid},headers: {'Content-Type':'application/x-www-form-urlencoded'}).then(function(data){
		// $scope.states = data
		// console.log(data)
		// })	


		$http({
		    method: 'POST',
		    url: 'http://bankslibrary.com/s/get_state_from_bank',
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
		    data: {bank_id:bankid}
		}).then(function(data){
		$scope.states = data
		console.log(data)
		})	
	}


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