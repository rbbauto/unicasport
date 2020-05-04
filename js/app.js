var app	=	angular.module('app',[]);

app.controller('productos', ['$scope','$http', function($scope,$http){

	$scope.productos = [];

	$scope.producto = {};

	//list
	$scope.listProducts = function(){

		$http.get('administracion/ajax.php?list',{})
		.then(function success(e){
			$scope.productos = e.data.productos;
		}, function error(e){

			console.log("Se ha producido un error al recuperar la información");
		});
	};


	
	
	$(".se-pre-con").hide()

	$scope.listProducts();

	
}])