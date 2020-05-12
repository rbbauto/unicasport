var app	=	angular.module('appShop',[]);

var Debug;

app.controller('carrito', ['$scope','$http', function($scope,$http){

	Debug= $scope;

	$scope.storage= function(){
		return JSON.parse(localStorage.getItem("Items")) != null ? JSON.parse(localStorage.getItem("Items")) : "";
	};

	$scope.getTotal=function(){
		return JSON.parse(localStorage.getItem("Total")) != null ? JSON.parse(localStorage.getItem("Total")) : 0;
	};

	$scope.pedido=[];

	$scope.multiplica=1;

	$scope.carrito=[];

	$scope.total=JSON.parse(localStorage.getItem("Total"));

	$scope.items= $scope.storage().length;

	

	$scope.carrito=$scope.storage();

	$scope.getCantItems = function(selector) {
	    var sum = 0; 
	    $(selector).each(function() {
	        sum += Number($(this).val());
	    });
	    return sum;
	};

	$scope.getCantItemsCart=function(){
		var total=0;
		for(i=0; i < $scope.carrito.length;i++){
			total = total + $scope.carrito[i].cantidad;
		}
		return total;
	}

	


	$scope.delItem=function(index){
		var tempTotal=$scope.getTotal();
		var result= tempTotal - parseFloat($scope.carrito[index].precio);
		localStorage.setItem("Total",JSON.stringify(result));
		$scope.carrito.splice(index, 1);
		$scope.total=$scope.getTotal();
		localStorage.setItem("Items",JSON.stringify($scope.carrito));
		$scope.items= $scope.storage().length;
		$scope.getCantItems('input[type=number]');
		$scope.getCantItems('[name=subtotal]');

	};

	$scope.vaciarCarro = function(){
		localStorage.clear();
		$scope.carrito=[];
		$scope.items = $scope.storage().length;
		
	};

	$scope.refreshCant=function(){
		this.producto.subtotal=this.producto.precio*this.multiplica;
		this.producto.cantidad=this.multiplica;
		localStorage.setItem("Items",JSON.stringify($scope.carrito));

	};

	$scope.enviarPedido=function(){
		
		$.post( "core/controller/addToCart.controller.php", JSON.stringify($scope.carrito) , function( data ) {
  			//$( ".result" ).html( data );
		}).done(function() {
    		window.location.replace("pedido.php")	
		}).fail(function() {
    		alert( "Hubo un erroe grave, por favor contacte al administrador!" );
 		});
	};

	$(".se-pre-con").hide();

	setTimeout(function(){
		$('.carrito_total').on('DOMSubtreeModified',function(){
			localStorage.setItem("Total",JSON.stringify(Number($(this).html().replace(",",""))));
		});
	},1000);
	

}]); // _/controller

var sumaFloat= function(valor1,valor2){
	var val1=isNaN(valor1) ? parseFloat(valor1) : valor1 ;
	var val2=isNaN(valor2) ? parseFloat(valor2) : valor2 ;
	return val1 + val2;
};

$("#show_password").on("click",function(){
   var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
});



