/*GLobal Directives*/

// Handle global LINK click
DemoApp.directive('a', function() {
  'use strict';
  /*jshint unused: false, undef:false */
  return {
    restrict: 'E',
    link: function(scope, elem, attrs) {
      // console.log(scope);
      if (attrs.ngClick || attrs.href === '' || attrs.href === '#') {
        elem.on('click', function(e) {
          e.preventDefault(); // prevent link click for above criteria
        });
      }
    }
  };
});

DemoApp.directive('numericOnly', function(){
  'use strict';
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, modelCtrl) {

      modelCtrl.$parsers.push(function (inputValue) {
        var transformedInput = inputValue ? inputValue.replace(/[^\d]/g,'') : null;

        if (transformedInput!==inputValue) {
          modelCtrl.$setViewValue(transformedInput);
          modelCtrl.$render();
        }

        return transformedInput;
      });
    }
  };
});

DemoApp.directive('validDigitsDecimalPoint', function() {
  'use strict';
  return {
    require: '?ngModel',
    link: function(scope, element, attrs, ngModelCtrl) {
      if(!ngModelCtrl) {
        return; 
      }

      ngModelCtrl.$parsers.push(function(val) {
        if (angular.isUndefined(val)) {
          var val = '';
        }
        var clean = val.replace(/[^0-9\.]/g, '');
        var decimalCheck = clean.split('.');

        if(!angular.isUndefined(decimalCheck[1])) {
          decimalCheck[1] = decimalCheck[1].slice(0,2);
          clean =decimalCheck[0] + '.' + decimalCheck[1];
        }

        if (val !== clean) {
          ngModelCtrl.$setViewValue(clean);
          ngModelCtrl.$render();
        }
        return clean;
      });

      element.bind('keypress', function(event) {
        if(event.keyCode === 32) {
          event.preventDefault();
        }
      });
    }
  };
});


DemoApp.directive('bindHtmlCompile', ['$compile', function ($compile) {
  'use strict';
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      scope.$watch(function () {
        return scope.$eval(attrs.bindHtmlCompile);
      }, function (value) {
        element.html(value);
        $compile(element.contents())(scope);
      });
    }
  };
}]);

DemoApp.directive('onlyDate', function(dateFilter) {
  'use strict';
  return {
    restrict: 'EAC',
    require: '?ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(viewValue) {
        return dateFilter(viewValue,'dd-MM-yyyy');
      });
    }
  };
});

DemoApp.filter('numFormat', [function() {
  return function(input) {
    if (!!input) {
      var s = input.split('.');
      input = s[0];
      input = input.toString();
      var lastThree = input.substring(input.length-3);
      var otherNumbers = input.substring(0,input.length-3);
      if(otherNumbers != '')
        lastThree = ',' + lastThree;
      var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree +'.'+ (s[1] || '00');
      return res;
    }else{
      return 0;
    };
  };
}]);


