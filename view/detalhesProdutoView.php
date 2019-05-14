<?php
    require_once '../dao/ConexaoDAO.php';
    require_once '../dao/ProdutosDAO.php';
    require_once '../dao/CategoriasDAO.php';
    require_once '../dao/FornecedoresDAO.php';
    

    $prodDAO = new ProdutosDAO();
    $catDAO = new CategoriasDAO();
    $fornDAO = new FornecedoresDAO();
    
    if (isset($_GET['id'])) {
        
        if (isset($_GET['delete']) && $_GET['delete'] == 1) {
            $acao = 1;
        } else {
            $acao = null;
        }
        
        if ($acao != NULL) {
            
            $prodDAO->deletarProduto($_GET['id']);
            
           echo "<script>alert('Produto excluído com sucesso!')</script>";
           echo "<script>location.href='listarProdutosView.php'</script>";
        }
        
         $produto = $prodDAO->visualizarProduto($_GET['id']);
         
        
    } else {
        $produto = NULL;
    }
    
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Detalhes do Produto</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        
    </head>
    
    <script type="text/javascript">
        
        function deleteItem(url) {
            if (confirm("Tem certeza que deseja excluir esse Produto?")) {
                document.location = url;
            }
        }
    
    </script>

    <body>

	<div class = "container-fluid" id="div-main">
            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"> CIÊNCIA DA COMPUTAÇÃO - 7 CIC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navForn" aria-controls="navForn" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navForn">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fornecedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Funcionários</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <hr>
            
            <div class="row">
                
                <?php 
                    
                    if ($produto == NULL) {
                        
                ?>
                
                <h2><center>PRODUTO NÃO ENCONTRADO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                
                <?php
                    
                    } else {
                        
                ?>
                
                <div class="table-responsive col-7">
                    <table class="table table-striped">
                        <?php

                            $idCat = $produto->getCategoryID();
                            $objCat = $catDAO->visualizarProduto($idCat);
                            $nomeCat = $objCat->getCategoryName();

                            $idForn = $produto->getSupplierID();
                            $objForn = $fornDAO->visualizarFornecedor($idForn);
                            $nomeForn = $objForn->getCompanyName();

                        ?>

                        <tbody>
                            <tr>
                                <th>Código: <?= $produto->getProductID() ?></th>
                            </tr>
                            
                            <tr>
                                <th>Nome: <?= $produto->getProductName() ?></th>
                            </tr>
                            
                           <tr>
                                <th>Fornecedor: <?= $nomeForn ?></th>
                            </tr> 
                            
                            <tr>
                                <th>Categoria: <?= $nomeCat ?></th>
                            </tr>
                            
                            <tr>
                                <th>Formato: <?= $produto->getQuantityPerUnit() ?></th>
                            </tr>
                            <tr>
                                <th>Preço Unit.: <?= $produto->getUnitPrice() ?></th>
                            </tr>
                            <tr>
                                <th><center>
                                    <a href="formProdutoView.php?id=<?= $_GET['id'] ?>&dados=1" class="btn btn-primary">Editar Produto <i class="fas fa-pencil-alt" style="margin-left: 5px"></i></a>
                                    <a href="javascript:deleteItem('detalhesProdutoView.php?id=<?= $_GET['id'] ?>&delete=1')" class="btn btn-danger">Excluir Produto<i class="fas fa-trash-alt" style="margin-left: 5px"></i></a>
                                </center></th>
                            </tr>
                        </tbody>
                    </table>
                
                <?php
                        
                    }          
                
                ?>
                
                
                </div>
                
            </div>
        
        </div>
        
    </body>
    
</html>
        

