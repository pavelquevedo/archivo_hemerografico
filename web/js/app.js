var appMainModule = angular.module('appMain', ['ngRoute']);

appMainModule.config(function($routeProvider){
  $routeProvider
  .when('/', {
    controller: 'mainController',
    templateUrl: 'templates/home.html'
  })
});

appMainModule.controller("mainController",function($scope,$http){
  $scope.anios = [];
  
  $http.get('http://localhost/arch_hemerografico/api/anio/')
        .success(function(response){
           if(response.length > 0){
               $scope.anios = response;
           }
       }).error(function(err){
           alert(err);
       });
     
});

