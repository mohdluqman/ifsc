app = angular.module('bankLibrary',['ngRoute','angularCSS']);

app.controller('MainController',function($scope,$http,$rootScope,$location){
	$http.get('/s/get_all_banks').then(function(responce){
		$scope.banksname = responce
	})
})

app.controller('HomeController',function($scope,$http,$rootScope,$location,$routeParams){	
	$scope.send_bank_name_id = function(value1,value2){
		$scope.bank_id = value1
		$scope.bank_name = value2
		// var bankid = $scope.bankObj.id;
		// var BankName = $scope.bankObj.bank_name;
		// $rootScope.BankId = bankid; 
		$location.path('/' + $scope.bank_id + '/' + $scope.bank_name)
	}
})

app.controller('BankListController',function($scope,$http,$rootScope,$location,$routeParams){
	console.log($routeParams.bankname)
	console.log($routeParams.bank_id)
	$scope.bank_name = $routeParams.bankname;
	$scope.bank_id = $routeParams.bank_id;
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
		    data: {bank_id:$routeParams.bank_id}
		}).then(function(responce){
		$rootScope.states = responce
		})

	$scope.send_bank_and_state_id = function(id_value,bank_value,state_value){
		var bank_id = id_value
		var bank_name = bank_value
		var state_name = state_value
		$location.path('/' + bank_id + '/' + bank_name + '/' + state_name)	
	}
		
})

app.controller('StateListController',function($scope,$http,$rootScope,$location,$routeParams){
	$scope.bankid_on_district = $routeParams.bank_id;
	$scope.bankname_on_district = $routeParams.bankname;
	$scope.state_on_district = $routeParams.state;
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
		    data: {bank_id:$scope.bankid_on_district,state:$scope.state_on_district}
		}).then(function(responce){
		$scope.districts = responce
		console.log(responce)
		})
	$scope.send_bank_state_and_branch_id = function(value1,value2,value3,value4){
		var bankid = value1;
		var bankname = value2;
		var state = value3;
		var district = value4;
		$location.path('/'+bankid+'/'+bankname+'/'+state+'/'+district)
	}
})

app.controller('DistrictListController',function($scope,$http,$rootScope,$location,$routeParams){
	$scope.bankid_on_district_page = $routeParams.bank_id;
	$scope.bankname_on_district_page = $routeParams.bankname;
	$scope.state_on_district_page = $routeParams.state;
	$scope.district_on_district_page = $routeParams.district
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
		    data: {bank_id:$scope.bankid_on_district_page,state:$scope.state_on_district_page,district:$scope.district_on_district_page}
		}).then(function(responce){
		$scope.branch = responce
		})

	$scope.send_bank_branch_id = function(value1,value2,value3,value4,value5,value6){
		console.log($scope.branch_name)
		var bankid = value1;
		var bankname = value2;
		var state = value3;
		var district = value4
		var branch_name = value5
		var branch_id = value6
		$location.path('/'+bankid+'/'+bankname+'/'+state+'/'+district+'/'+branch_name+'/'+branch_id)
	}
})

app.controller('BranchInfoController',function($scope,$http,$rootScope,$location,$routeParams){
	$scope.bankid_on_branch_page = $routeParams.bank_id
	$scope.bankname_on_branch_page = $routeParams.bankname
	$scope.state_on_branch_page = $routeParams.state
	$scope.district_on_branch_page = $routeParams.district
	$scope.branch_name_on_branch_page = $routeParams.branch_name
	$scope.branch_id_on_branch_page = $routeParams.branch_id
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
		    data: {bank_id:$scope.bankid_on_branch_page,id:$scope.branch_id_on_branch_page}
		}).then(function(responce){
		$scope.bank_info = responce.data
		$scope.showTable = true
		})		
})