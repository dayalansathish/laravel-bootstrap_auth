angular.module('app').directive('fileInput', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function() {
                scope.$apply(function() {
                    scope.user.image = element[0].files[0];
                    console.log( scope.user.image);
                });
            });
        }
    };
});
