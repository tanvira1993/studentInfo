(function(){
	'use strict';
	angular.module('DemoApp')
	.controller('CreateUsersCtrl', ['$rootScope','$scope', '$location', '$routeParams', '$window', '$http','FileUploader','toaster',  function ($rootScope,$scope, $location, $routeParams, $window, $http,FileUploader,toaster) {
		
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
			file:null,
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

		var uploader = $scope.uploader= new FileUploader({
			url:"users/uploadFile",
			method: "post", 
			alias : 'image',
			removeAfterUpload : true
		})


		// CALLBACKS
		// uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
		// 	// console.info('onWhenAddingFileFailed', item, filter, options);
		// };
		// uploader.onAfterAddingFile = function(fileItem) {
		// 	// console.info('onAfterAddingFile', fileItem);
		// };
		uploader.onAfterAddingAll = function(addedFileItems) {
			$scope.uploader.uploadAll();//for file upload
			// console.info('onAfterAddingAll', addedFileItems);
		};
		// uploader.onBeforeUploadItem = function(item) {
			
		// 	// console.info('onBeforeUploadItem', item);
		// };
		// uploader.onProgressItem = function(fileItem, progress) {
		// 	console.info('onProgressItem', fileItem, progress);
		// };
		// uploader.onProgressAll = function(progress) {
		// 	// console.info('onProgressAll', progress);
		// };
		uploader.onSuccessItem = function(fileItem, response, status, headers) {
			console.log(response);
			$scope.userModel.file = response.data.file_name;
			// console.info('onSuccessItem', fileItem, response, status, headers);
		};
		// uploader.onErrorItem = function(fileItem, response, status, headers) {
		// 	console.info('onErrorItem', fileItem, response, status, headers);
		// };
		// uploader.onCancelItem = function(fileItem, response, status, headers) {
		// 	console.info('onCancelItem', fileItem, response, status, headers);
		// };
		// uploader.onCompleteItem = function(fileItem, response, status, headers) {
		// 	console.info('onCompleteItem', fileItem, response, status, headers);
		// };
		// uploader.onCompleteAll = function() {
		// 	//all upload file uploaded then redirect
		// 	console.info('onCompleteAll');
		// };

		console.info('uploader', uploader);
		/***File upload code end***/


	}]);
})();