<?php

require_once 'model/Produtos.php';
require_once 'dao/ProdutosDAO.php';

$objProd = new ProdutosDAO();
$itens = $objProd->listarProdutos();

for ($i = 0; $i < count($itens); $i++) {
    echo $itens[$i]->getProductName() . "<br>";
}

 ?>
