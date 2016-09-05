var app = angular.module('plunker', ['ezfb', 'ngRoute'])

.constant('SOCIAL_PLUGINS', [
  'like', 'share-button', 'send', 'post',
  'comments', 'page', 'follow'
])

.config(function (ezfbProvider, $routeProvider, SOCIAL_PLUGINS) {
  ezfbProvider.setInitParams({
    appId: '761790700589965',
    version: 'v2.6'
  });
  
  $routeProvider.otherwise({redirectTo: '/video'});
  
  angular.forEach(SOCIAL_PLUGINS, function (dirTag) {
    var routeName = dirTag;
    
    $routeProvider
    .when('/' + routeName, {
      templateUrl: routeName + '.html'
    });
  });
})

.controller('MainCtrl', function ($scope, $route, SOCIAL_PLUGINS, $location) {
  $scope.SOCIAL_PLUGINS = SOCIAL_PLUGINS;
  
  $scope.pluginOn = true;
  $scope.rendering = false;
  
  $scope.goto = function (dirTag) {
    $location.path('/' + dirTag);
  };
  
  $scope.isActive = function (dirTag) {
    return ($location.path() === '/' + dirTag);
  };
  
  $scope.rendered = function () {
    $scope.rendering = false;
  };
  
  $scope.$watch('pluginOn', function (newVal, oldVal) { 
    if (newVal !== oldVal) {
      $scope.rendering = true;
    }
  });
  
  $scope.$on('$routeChangeSuccess', function () {
    $scope.rendering = true;
  });
});
