var DemoApp = angular.module('DemoApp', [
	'ngRoute',
	'ngCookies',
	'oc.lazyLoad',
	'toaster',
	'ui.bootstrap'
	]);


DemoApp.config(['$routeProvider','$locationProvider', function ($routeProvider,$locationProvider) {
	'use strict';
	const BASEURL = 'http://localhost/studentInfo/';
	$routeProvider

	.when('/',  {
		templateUrl: BASEURL+'dashboard/index',
		controller: 'DashboardCtrl',
		routeName: 'dashboard',
		resolve: {
			loadAsset: ['$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load([
					'assets/js/controllers/DashboardCtrl.js',
					]);
			}]
		}
	})
	.when('/users',  {
		templateUrl: BASEURL+'users/index',
		controller: 'UsersCtrl',
		routeName: 'users',
		resolve: {
			loadAsset: ['$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load([
					'assets/js/controllers/UsersCtrl.js',
					]);
			}]
		}
	})

	
	.when('/create_user',  {
		templateUrl: BASEURL+'users/create',
		controller: 'CreateUsersCtrl',
		routeName: 'creatUser',
		resolve: {
			loadAsset: ['$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load([
					'bower_components/angular-file-upload/dist/angular-file-upload.js',
					'assets/js/controllers/CreateUsersCtrl.js'
					]);
			}]
		}
	})
	.when('/updateUserInfo/:id',  {
		templateUrl: BASEURL+'users/update',
		controller: 'EditUsersCtrl',
		resolve: {
			loadAsset: ['$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load([
					'assets/js/controllers/EditUsersCtrl.js',
					]);
			}]
		}
	})


	.when('/admin_panel',  {
		templateUrl: BASEURL+'users/admin',
		controller: 'adminUsersCtrl',
		resolve: {
			loadAsset: ['$ocLazyLoad', function($ocLazyLoad) {
				return $ocLazyLoad.load([
					'assets/js/controllers/adminUsersCtrl.js',
					]);
			}]
		}
	})


	.otherwise({ redirectTo: '/error/404' });
}]);


DemoApp.run(['$rootScope','$location','$http','UserService','toaster', function($rootScope,$location,$http,UserService,toaster) {
	'use strict';



	$rootScope.$on("$routeChangeStart", function(event, next, current) { 
	});


	$rootScope.$on("$routeChangeSuccess", function(event, current, previous) { 
    //console.log(previous);
    // console.log('route..... success');
    
    
    // if (current.$$route.routeName === 'login') {
      //  $rootScope.showNavbar = false;
      //  $rootScope.showLogOutButton = false;
      // }else{
        //  $rootScope.showNavbar = true;
        //  $rootScope.showLogOutButton = true;
        // }

    });
	$rootScope.$on("$routeChangeError", function(event, next, current) { 

	});



}])

DemoApp.service('UserService', ['$rootScope', '$http', function ($rootScope, $http) {
	'use strict';
	return {
        _useraccount: null, // userservice properties that save user data for later use
        init: function() { // this method will check if already logged in at the first load
        	var that = this;

        },
      setUserData: function(data) { // this method will set user data to _user property and $rootScope.user which will use in many places

      },
      destroy: function() { // this method will be used to destroy angular fronend site user data when user logged out
      }
  }
}]);




