ifsc_app = angular.module('ifsc-bank',['ngRoute','angularCSS','ngclipboard']);

ifsc_app.controller('homeCtrl',function($scope,$http,$rootScope){


	$http.get('/s/get_all_banks').then(function(responce){
		$scope.banksname = responce
	})
	/*$http.get('/s/get_all_states').then(function(data){
		$scope.state_names = data
	})
	$http.get('/s/get_all_districts').then(function(data){
		$scope.districts = data
	})*/
	$scope.send_bank_name_id = function(){
		var bankid = $scope.bank_name.id;
		$rootScope.bankName = bankid; 
		$scope.state_name = ''; 
		$scope.district_name = ''; 
		$scope.branch_name = ''; 
		console.log(bankid)
		console.log($rootScope.bankName)
		$http({
		    method: 'POST',
		    url: '/s/get_state_from_bank',
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
		    data: {bank_id:bankid}
		}).then(function(responce){
		$scope.states = responce
		console.log(responce)
		})	
	}

	$scope.send_bank_and_state_id = function(){ 
		$rootScope.state_name = $scope.state_name.state;
		$scope.district_name = ''; 
		$scope.branch_name = ''; 
		$http({
		    method: 'POST',
		    url: '/s/get_district_from_bank',
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
		    data: {bank_id:$rootScope.bankName,state:$scope.state_name.state}
		}).then(function(responce){
		$scope.districts = responce
		console.log(responce)
		})	
	}

	$scope.send_bank_state_and_branch_id = function(){ 
		$scope.branch_name = ''; 
		$http({
		    method: 'POST',
		    url: '/s/get_branch_from_bank',
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
		    data: {bank_id:$rootScope.bankName,state:$rootScope.state_name,district:$scope.district_name.district}
		}).then(function(responce){
		$scope.branch = responce
		console.log(responce)
		})	
	}

	$scope.send_bank_branch_id = function(){ 
		$http({
		    method: 'POST',
		    url: '/s/getDetailFromId',
		    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
		        var str = [];
		        for(var p in obj)
		        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
		        return str.join("&");
		    },
		    data: {bank_id:$rootScope.bankName,id:$scope.branch_name.id}
		}).then(function(responce){
		$scope.bank_info = responce
		console.log(responce)
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