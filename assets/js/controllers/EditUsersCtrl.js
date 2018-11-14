(function(){
	'use strict';
	angular.module('DemoApp')
	.controller('EditUsersCtrl', ['$rootScope','$scope', '$location', '$routeParams', '$window', '$http','toaster', function ($rootScope,$scope, $location, $routeParams, $window, $http,toaster) {
		
		$scope.title = 'Quick Shortcuts';
		$scope.userId = $routeParams.id;
		
		//Get user information by ID
		$scope.getUserInfById = function()
		{
			$http({
				url:"users/getUserInfo/"+$scope.userId,
				method: "get"
			}).then(function (response){
				$scope.userModel = response.data.data;
			},function (error){
				console.log(error);
			});

		}

		$scope.submitUpdateData = function()
		{
			$http({
				url:"users/updateDone",
				method: "post", 
				data:$.param($scope.userModel),
				headers:{
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (response){
				console.log(response)
			},function (error){
				console.log(error);
			});

		}


		$scope.getUserInfById();

	}]);
})();