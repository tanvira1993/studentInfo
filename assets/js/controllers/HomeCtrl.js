angular.module('VARCHIVE')
.controller('HomeCtrl', ['$rootScope','$scope','Toaster', function ($rootScope,$scope,Toaster) {
	$scope.title = 'This is home view';
}]);