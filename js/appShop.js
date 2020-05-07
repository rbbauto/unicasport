var app	=	angular.module('appShop',[]);

var Debug;

app.controller('carrito', ['$scope','$http', function($scope,$http){

	Debug= $scope;

	$scope.storage= function(){
		return JSON.parse(localStorage.getItem("Items")) != null ? JSON.parse(localStorage.getItem("Items")) : "";
	};

	$scope.getTotal=function(){
		return JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : "";
	};

	$scope.multiplica=1;

	$scope.carrito=[];

	$scope.total=JSON.parse(localStorage.getItem("Total"));

	$scope.items= $scope.storage().length;

	

	$scope.carrito=$scope.storage();

	$scope.delItem=function(index){
		var tempTotal=$scope.getTotal();
		var result= tempTotal - parseFloat($scope.carrito[index].precio);
		localStorage.setItem("Total",JSON.stringify(result));
		$scope.carrito.splice(index, 1);
		$scope.total=$scope.getTotal();
		localStorage.setItem("Items",JSON.stringify($scope.carrito));
		$scope.items= $scope.storage().length;
	};

	$scope.vaciarCarro = function(){
		localStorage.clear();
		$scope.carrito=[];
		$scope.items = $scope.storage().length;
		$scope.total=JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : "";
	};

	$(".se-pre-con").hide();	

}]); // _/controller

