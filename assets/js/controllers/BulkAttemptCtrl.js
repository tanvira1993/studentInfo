(function() {
	'use strict';
	angular.module('VARCHIVE')
	.controller('BulkAttemptCtrl', ['$scope', '$location', '$routeParams', '$filter', '$window', '$http','toaster', function($scope, $location, $routeParams, $filter, $window, $http, toaster) {
		$scope.title = 'Voucher Bulk Attempt';
		//$scope.attempts = {};
		$scope.getBulkAttempt =  function () {
			$http({
				method: 'GET',
				url: 'voucherBulkUpload/getBulkAttempt'
			}).then(function (success){
				$scope.attempts = success.data;
			},function (error){
				console.log(error);
			});
		};

		$scope.getBulkAttempt();
	}])

})();
