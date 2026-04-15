<?php
   

require 'Cart.php';
require 'Product.php';

session_start();

$products = [
  1 => ['id' => 1, 'name' => 'lan zhan', 'price' => 1000, 'quantity' => 1],
  2 => ['id' => 2, 'name' => 'wei chan', 'price' => 100, 'quantity' => 1],
  3 => ['id' => 3, 'name' => 'deus', 'price' => 10, 'quantity' => 1],
  4 => ['id' => 4, 'name' => 'monitor', 'price' => 5000, 'quantity' => 1],
];


if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $productInfo = $products[$id];
  $product = new Product;
  $product->setId($productInfo['id']);
  $product->setName($productInfo['name']);
  $product->setPrice($productInfo['price']);
  $product->setQuantity($productInfo['quantity']);

  $cart = new Cart;
  $cart->add($product);
}

var_dump($_SESSION['cart'] ?? []);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compas</title>
   
    <link rel="stylesheet" href="styleGeral.css">
    <!-- bliboteca de icons-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/> 

</head>
<style>
    .img-box{
         margin-bottom: 16px;
    }
</style>

<body>

   <header>
            <!-- cabeçado-->
         <!-- topo/cabeçalho-->
    <nav>
        <a href="index.html" class="logo"> Ecommerce.</a>

     
        </a>
           <a href="faleConosco.html" class="card-icon">
            <!-- link do icon-->
          <i class="ri-discuss-line"></i>
            <span class="cart-item-count"></span>

        </a>
   <a href="carrinho.html" class="card-icon">
            <!-- link do icon-->
          <i class="ri-shopping-cart-line"></i>
            <span class="cart-item-count"></span>

        </a>
      
    </nav>

      </header>


    <!-- produtos-->
    <section class="product-collection">
         <h1>Latest collection</h1>
                 <ul>
            <!-- Produtos-->     
             <div class="a"> 
            <div class="img-box">
                <img src="https://i.pinimg.com/736x/b3/2f/70/b32f70e95c4087eaabda9e403313b82e.jpg" alt="teste">
                <p>&nbsp;</p>
            </div>
           
            <span class="price"> <li>geladeira <a href="?id=1">add</a></li> </a></span>
    
    

            </div>  
    
                <div class="a"> 
            <div class="img-box">
                <img src="https://i.pinimg.com/736x/8a/ea/63/8aea63d817b54dd42a4274612de6ab38.jpg" alt="teste">
                <p>&nbsp;</p>
            </div>
           
            <span class="price"> <li>lan zhan <a href="?id=2">add</a></li> </a></span>
    
    

            </div>  

                <div class="a"> 
            <div class="img-box">
                <img src="https://i.pinimg.com/736x/b3/2f/70/b32f70e95c4087eaabda9e403313b82e.jpg" alt="teste">
                <p>&nbsp;</p>
            </div>
           
            <span class="price"> <li>wei chan <a href="?id=3">add</a></li> </a></span>
    
    

            </div>  

                <div class="a"> 
            <div class="img-box">
                <img src="https://i.pinimg.com/736x/b7/e4/6c/b7e46c1ad76d3ebeb952404ce493229a.jpg" alt="teste">
                <p>&nbsp;</p>
            </div>
           
            <span class="price"> <li>deus  <a href="?id=4">add</a></li> </a></span>
    
    

            </div>  

                <div class="a"> 
            <div class="img-box">
                <img src="https://i.pinimg.com/736x/4b/3b/6e/4b3b6e6349c95633e6851dfc952eedb3.jpg" alt="teste">
                <p>&nbsp;</p>
            </div>
           
            <span class="price"> <li> plebeu <a href="?id=5">add</a></li> </a></span>
    
    

            </div>  
      </ul>          

      
    </section>
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>