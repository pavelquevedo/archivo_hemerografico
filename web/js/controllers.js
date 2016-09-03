angular.module('appMain')

.controller("mainController",function($scope,$http){
  $scope.anios = [];
  
  $http.get('http://localhost/arch_hemerografico/api/anio/')
        .success(function(response){
           if(response.length > 0){
               $scope.anios = response;
           }
       }).error(function(err){
           alert(err);
       });
     
})

.controller('articulosController', ['$scope','$routeParams','$location','$http', function($scope,$routeParams,$location,$http){
	$scope.articulos = [];
	$scope.anio = '';
	$http.get('http://localhost/arch_hemerografico/api/articulo/view/'+$routeParams.anio)
		.success(function(response){
			if(response.length > 0){
				$scope.articulos = response;
				$scope.anio = $routeParams.anio;
			}
	})
	.error(function(err){
		alert(err);
	})
}])