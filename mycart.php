
<?php

require 'Product.php';
require 'Cart.php';

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

var_dump($productsInCart);

if (isset($_GET['remove'])) {
  $id = strip_tags($_GET['remove']);
  $cart->remove($id);
  header('Location: mycart.php');
}

if (isset($_GET['update'])) {
  $id = strip_tags($_GET['update']);
  $qty = strip_tags($_GET['qty']);
  $cart->updateQty($id, $qty);
  header('Location: mycart.php');
}

?>

<!------------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
       <link rel="stylesheet" href="styleGeral.css">
          <!-- bliboteca de icons -->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/>  
</head>
<style>
.pagina{
    
    padding: 100px 9% 30px;
      font-size: 1em;
      justify-content: center;
      margin-bottom: 1em;
}
.conteudo {
    display: flex;
}

section{
    flex: 1;
  
}

aside{
    background-color: blue;
    min-width: 250px;
}

table{
    width: 100%;
       border-collapse: collapse;

}

thead{
    text-align:left ;
 text-transform: uppercase;
}

tr{
    border-bottom: 3px solid #ccc;
    padding-bottom: 10px;
    
    color: #666;
}
td{
    padding: 30px 0;
}

.produto{
    display: flex;
    align-items: center;
}

.produto img{
    border-radius: 6px;
}

.info{
    margin-left: 20px;
    padding: 50px;
  

}

.name{
    font-size: 20px;
}

.categoria{
    color: #666;
    
}
.remover{
    border: 0;
    width: 30px;
    height: 30px;
    border-radius: 100%;
    display: flex;
    align-items: center;
    font-size: 20px;
    background-color: #fff;
}
.qty{
    display: inline-flex;
    padding: 0px 0px;
    justify-content: space-around;
    min-width: 0;
    border-radius: 20px;
    overflow: hidden;
 
}

button{
    padding: 0 10px;;
   
}

.box{
    margin-bottom :15px; 
    border: 1px solid #ccc;
background:#ddd;
}

.final{
    display: block;
    background-color: yellowgreen;
    width: 100%;

}
header{
    padding: 15px 10px;
    font-size: 20px;
      border-bottom: 1px solid #ccc;
}

footer{
    padding: 20px;
    background-color: #666;
}
.box .info{
    justify-content: space-between;
      display: flex;
}

</style>
<body>
   <header>
            <!-- cabeçado-->
         <!-- topo/cabeçalho-->
    <nav>
        <a href="index.html" class="logo"> Ecommerce.</a>

        <a href="compras.html" class="card-icon">
            <!-- link do icon-->
            <i class="ri-shopping-bag-line"></i> 
            <span class="cart-item-count"></span>

        </a>
           <a href="faleConosco.html" class="card-icon">
            <!-- link do icon-->
          <i class="ri-discuss-line"></i>
            <span class="cart-item-count"></span>

        </a>
    </nav>

      </header>
<!-------------------------------------------------------------------------------------------------------------->
    <div class="pagina">
        <h1>Carrinho</h1>
    <!-------------------------------------------------------------------------------------------------------------->
    <div class ="conteudo">
        <section>
            
            <!---------------------------------------------------------------------------------------------->
            <table>
                <thead>
                    <tr>
                        <th>produto</th>
                        <th>preço</th>
                        <th>quantidade</th>
                        <th>total</th>
                        <th>-</th>
                    </tr>
                </thead>
                <!---------------------------------------------------------------->
                <tbody>
                <tr> 
                    <td>
                        <div class="produto">
                         
                            <div class="info">
                                   <?php if (count($productsInCart) <= 0) : ?>
                             Nenhum produto no carrinho
                       <?php endif; ?>


                                <div class="name"> 
        <?php echo $product->getName(); ?> </div>
          <form action="">
          <input type="hidden" name="update" value="<?php echo $product->getId(); ?>">
          <input type="text" name="qty" value="<?php echo $product->getQuantity() ?>">
        </form>
                                <div class="categoria"> <?php echo number_format($product->getPrice(), 2, ',', '.') ?> </div>
                            </div>
                        </div>
                    </td><!-- produto-->
                    <td>R$120</td><!-- preco-->
                <!-- quanridade-->
                    <td>
                     

                        <div class="qty">
                              <a href="?remove=<?php echo $product->getId(); ?>">remove</a>
                            <span> 2</span> <!-- variavel da quantidade-->
                            <button>+</button>
                        </div>
                    </td>
                    <td>R$200</td><!-- total-->
                    <td> <button><i class="ri-close-circle-line"></i></button></td>
                </tr>
       

                </tbody>
            </table>
        </section>
        <!-------------------------------------------------------------------------------------------------------------->    
        <aside>

            <div class="box">
                <header>Resumo Compra</header>
                
                <div class="info">
                    <div>
                      <p><?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></p>
                    
                         
                    </div> 
                     
                </div>
              
                <footer>
                    <span>total <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?></span>
                    <span></span>
                </footer>
            </div>
             <button class="final">Finalizar Compra</button>
        </aside>

    </div>



</div>
</body>
</html>