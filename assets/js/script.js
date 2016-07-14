ifsc_app = angular.module('ifsc-bank',['ngRoute','angularCSS']);

ifsc_app.controller('mainCtrl',function($scope,$http,$rootScope,$location){
	$scope.tags_name = ['Bank IFSC code','MICR Code','Bank Branch','Bank Address','Branch Code','SBI Branch Code','SBI IFSC Code','Branch Contact info'];
	
	$scope.showTable = false

	$http.get('/s/get_all_banks').then(function(responce){
		$scope.banksname = responce
	})

	// $scope.send_bank_name_id = function(){
	// 	$scope.showTable = false;
	// 	var bankid = $scope.bankObj.id;
	// 	var BankName = $scope.bankObj.bank_name;
	// 	$rootScope.BankId = bankid; 
	// 	$scope.state_name = ''; 
	// 	$scope.district_name = ''; 
	// 	$scope.branch_name = ''; 
	// 	$scope.states = ''; 
	// 	$scope.districts = ''; 
	// 	$scope.branch = ''; 
	// 	$scope.bank_info = ''; 
	// 	$http({
	// 	    method: 'POST',
	// 	    url: '/s/get_state_from_bank',
	// 	    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	// 	    transformRequest: function(obj) {
	// 	        var str = [];
	// 	        for(var p in obj)
	// 	        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	// 	        return str.join("&");
	// 	    },
	// 	    data: {bank_id:bankid}
	// 	}).then(function(responce){
	// 	$scope.states = responce
	// 	})	
	// }

	// $scope.send_bank_and_state_id = function(){ 
	// 	$rootScope.state_name = $scope.state_name.state;
	// 	$scope.district_name = ''; 
	// 	$scope.branch_name = ''; 
	// 	$http({
	// 	    method: 'POST',
	// 	    url: '/s/get_district_from_bank',
	// 	    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	// 	    transformRequest: function(obj) {
	// 	        var str = [];
	// 	        for(var p in obj)
	// 	        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	// 	        return str.join("&");
	// 	    },
	// 	    data: {bank_id:$rootScope.BankId,state:$scope.state_name.state}
	// 	}).then(function(responce){
	// 	$scope.districts = responce
	// 	})	
	// }

	// $scope.send_bank_state_and_branch_id = function(){ 
	// 	$scope.branch_name = ''; 
	// 	$http({
	// 	    method: 'POST',
	// 	    url: '/s/get_branch_from_bank',
	// 	    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	// 	    transformRequest: function(obj) {
	// 	        var str = [];
	// 	        for(var p in obj)
	// 	        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	// 	        return str.join("&");
	// 	    },
	// 	    data: {bank_id:$rootScope.BankId,state:$rootScope.state_name,district:$scope.district_name.district}
	// 	}).then(function(responce){
	// 	$scope.branch = responce
	// 	})	
	// }

	// $scope.send_bank_branch_id = function(){ 
	// 	$http({
	// 	    method: 'POST',
	// 	    url: '/s/getDetailFromId',
	// 	    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	// 	    transformRequest: function(obj) {
	// 	        var str = [];
	// 	        for(var p in obj)
	// 	        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	// 	        return str.join("&");
	// 	    },
	// 	    data: {bank_id:$rootScope.BankId,id:$scope.branch_name.id}
	// 	}).then(function(responce){
	// 	$scope.bank_info = responce
	// 	$scope.showTable = true
	// 	})	
	// }
})
ifsc_app.controller('bankNameCtrl',function($scope,$http,$rootScope,$location,$routeParams){
	$scope.send_bank_name_id = function(){
		$scope.showTable = false;
		var bankid = $scope.bankObj.id;
		var BankName = $scope.bankObj.bank_name;
		$rootScope.BankId = bankid; 
		$scope.state_name = ''; 
		$scope.district_name = ''; 
		$scope.branch_name = ''; 
		$scope.states = ''; 
		$scope.districts = ''; 
		$scope.branch = ''; 
		$scope.bank_info = ''; 
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
		    data: {bank_id:$rootScope.BankId,state:$scope.state_name.state}
		}).then(function(responce){
		$scope.districts = responce
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
		    data: {bank_id:$rootScope.BankId,state:$rootScope.state_name,district:$scope.district_name.district}
		}).then(function(responce){
		$scope.branch = responce
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
		    data: {bank_id:$rootScope.BankId,id:$scope.branch_name.id}
		}).then(function(responce){
		$scope.bank_info = responce
		$scope.showTable = true
		})	
	}
})
