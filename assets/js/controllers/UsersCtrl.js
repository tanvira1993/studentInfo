/**
* UserCtrl Module
*
* Description
*/
(function(){
	'use strict';
	angular.module('DemoApp', [])
	.controller('UsersCtrl', ['$rootScope','$scope','$http','$location', function ($rootScope,$scope,$http,$location) {

		$scope.title = 'View Users';

		$scope.allUsers=[];

		$scope.getUserInfo = function(){
			
			$http({
				url:"users/getAllUsers",
				method: "get"
			}).then (function(response){
				
				$scope.allUsers=response.data.userData;
				console.log($scope.allUsers);
			}),(function(response){
				//show_toastr("error",response.heading,response.error_message);
			});
		}

		$scope.deleteUser = function(id)
		{
			$http({
				url:"users/delete/"+id,
				method: "get"
			}).then (function(response){
				$scope.getUserInfo();
				alert ("User Deleted");	
			}),(function(response){
				//show_toastr("error",response.heading,response.error_message);
			});


		}

		$scope.getUserInfo();


		
	}]);
})();
