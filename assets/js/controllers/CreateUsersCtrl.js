(function(){
	'use strict';
	angular.module('DemoApp')
	.controller('CreateUsersCtrl', ['$rootScope','$scope', '$location', '$routeParams', '$window', '$http','toaster',  function ($rootScope,$scope, $location, $routeParams, $window, $http,toaster) {
		
		$scope.title = 'Quick Shortcuts';

		/*$('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd'
		});*/


		$scope.userModel = {
			firstName:null, 
			lastName:null,
			gender:null,
			dob:null,
			email:null,
			password:null,
			address:null,
			phone:null,
			status:'Active'

		}

		$( ".datepicker" ).change(function() {
			$scope.userModel.dob = $("#datetimepicker").val();
		});
		
		$scope.submitData = function()
		{
			$http({
				url:"users/save",
				method: "post", 
				data:$.param($scope.userModel),
				headers:{
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (response){
				$location.path('/users');
				console.log(response)

			},function (error){
				console.log(error);
			});

		}

	}]);
})();