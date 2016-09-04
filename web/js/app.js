angular.module('appMain', ['ngRoute','ngResource'])

.config(function($routeProvider){
  $routeProvider
  .when('/', {
    controller: 'mainController',
    templateUrl: 'templates/home.html'
  })//TERMINAR DE DEFINIR RUTA
  .when('/articulos/:anio',{
    controller: 'articulosController',
    templateUrl: 'templates/detalleArticulos.html'
  })
  .when('/busqueda', {
  	controller: 'busquedaController',
  	templateUrl: 'templates/busqueda.html'
  })
});

