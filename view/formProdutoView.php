<?php

    require_once '../dao/ProdutosDAO.php';
    require_once '../model/Produtos.php';
    require_once '../dao/FornecedoresDAO.php';
    require_once '../dao/CategoriasDAO.php';
    
    $prodDAO = new ProdutosDAO();
    
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
        
        $objProd = new Produtos();
      
        //CADASTRAR PRODUTO
        if ($acao == 1) {
            $produtos = $prodDAO->listarProdutos(0, null);
            $lastProd = $produtos[count($produtos) - 1];
            $prodID = $lastProd->getProductID();
            $prodID++;
            
            $nomeProd = $_GET['nome_prod'];
            $quantProd = $_GET['quant_prod'];
            $precoProd = $_GET['preco_prod'];
            $catProd = $_GET['cat_prod'];
            $fornProd = $_GET['forn_prod'];
            
            $objProd->setProductID($prodID);
            $objProd->setProductName($nomeProd);
            $objProd->setQuantityPerUnit($quantProd);
            $objProd->setUnitPrice($precoProd);
            $objProd->setCategoryID($catProd);
            $objProd->setSupplierID($fornProd);
            
            $prodDAO->cadastrarProduto($objProd);
            
            echo "<script>alert('Produto ~$nomeProd~ cadastrado com sucesso!')</script>";
            echo "<script>location.href='listarProdutosView.php'</script>";            
        
        //ATUALIZAR PRODUTO
        } else if ($acao == 2) {
            $id = $_GET['id'];
            $nomeProd = $_GET['nome_prod'];
            $quantProd = $_GET['quant_prod'];
            $precoProd = $_GET['preco_prod'];
            $catProd = $_GET['cat_prod'];
            $fornProd = $_GET['forn_prod'];
            
            $objProd->setProductID($id);
            $objProd->setProductName($nomeProd);
            $objProd->setQuantityPerUnit($quantProd);
            $objProd->setUnitPrice($precoProd);
            $objProd->setCategoryID($catProd);
            $objProd->setSupplierID($fornProd);
            
            $prodDAO->alterarProduto($id, $objProd);
            
            echo "<script>alert('Produto ~$nomeProd~ alterado com sucesso!')</script>";
            echo "<script>location.href='listarProdutosView.php'</script>"; 
        }
        
    } else {
        
        if (!isset($_GET['dados'])) {
           $dados = null; 
           
        } else {
            $dados = $_GET['dados'];
        }
        
        
        $catDAO = new CategoriasDAO();
        $fornDAO = new FornecedoresDAO();
                
        $itensCat = $catDAO->listarCategorias(0, null);
        $itensForn = $fornDAO->listarFornecedores(0, null);
             
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Formulário do Produto</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        
    </head>

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
                            <a class="nav-link" href="#">Funcionários</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <hr>
            
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                     <h2>Formulário de Produto</h2>
                </div>               
            </div>
            
            <hr>
            
            <?php 
                
                // FORMULÁRIO VAZIO
                if ($dados == 0 || $dados == null) {
            
            ?>
            
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nome_prod">Nome</label>
                        <input id="nome_prod" name="nome_prod" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="quant_prod">Formato</label>
                        <input id="quant_prod" name="quant_prod" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="preco_prod">Preço Unitário</label>
                        <input id="preco_prod" name="preco_prod" type="text" class="form-control">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class=" form-group col-md-6">
                        <label for="cat_prod">Categoria</label>
                        <select class="form-control" id="cat_prod" name="cat_prod">

                            <?php for($i = 0; $i < count($itensCat); $i++) { ?>                        
                            <option value="<?= $itensCat[$i]->getCategoryID() ?>"><?= $itensCat[$i]->getCategoryName() ?></option>
                            <?php } ?>              

                        </select>                   
                    </div>
                    
                    <div class=" form-group col-md-6">
                        <label for="forn_prod">Fornecedor</label>
                        <select class="form-control" id="forn_prod" name="forn_prod">

                            <?php for($i = 0; $i < count($itensForn); $i++) { ?>                        
                            <option value="<?= $itensForn[$i]->getSupplierID() ?>"><?= $itensForn[$i]->getCompanyName() ?></option>
                            <?php } ?>              

                        </select>                   
                    </div>
                </div>
                
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="1">
                        <button class="btn btn-success" type="submit">
                            Cadastrar Produto
                            <i class="fas fa-save" style="margin-left: 5px"></i></button>
                        
                    </div>
                </div>
            </form>
            
            <?php 
                
                // FORMULÁRIO PREENCHIDO
                } else if ($dados == 1) {
                    if (isset($_GET['id'])) {
                       $idProd = $_GET['id'];
                        $objProd = $prodDAO->visualizarProduto($idProd); 
                    
                    } else {
                        $objProd = NULL;
                    }
                    
                    
                    if ($objProd == NULL) {
            
            ?>
            
            <h2><center>PRODUTO NÃO ENCONTRADO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
             
            <?php } else { ?>
            
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nome_prod">Nome</label>
                        <input id="nome_prod" name="nome_prod" type="text" class="form-control" value="<?= $objProd->getProductName() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="quant_prod">Formato</label>
                        <input id="quant_prod" name="quant_prod" type="text" class="form-control" value="<?= $objProd->getQuantityPerUnit() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="preco_prod">Preço Unitário</label>
                        <input id="preco_prod" name="preco_prod" type="text" class="form-control" value="<?= $objProd->getUnitPrice() ?>">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class=" form-group col-md-6">
                        <label for="cat_prod">Categoria</label>
                        <select class="form-control" id="cat_prod" name="cat_prod">
                            
                            <?php 
                                $codCat = $objProd->getCategoryID();
                                $objCat = $catDAO->visualizarProduto($codCat);
                            ?>
                            <option value="<?= $objCat->getCategoryID() ?>"><?= $objCat->getCategoryName() ?></option>

                            <?php for($i = 0; $i < count($itensCat); $i++) { ?>                        
                            <option value="<?= $itensCat[$i]->getCategoryID() ?>"><?= $itensCat[$i]->getCategoryName() ?></option>
                            <?php } ?>              

                        </select>                   
                    </div>
                    
                    <div class=" form-group col-md-6">
                        <label for="forn_prod">Fornecedor</label>
                        <select class="form-control" id="forn_prod" name="forn_prod">
                            
                            <?php 
                                $codForn = $objProd->getSupplierID();
                                $objForn = $fornDAO->visualizarFornecedor($codForn);
                            ?>
                            <option value="<?= $objForn->getSupplierID() ?>"><?= $objForn->getCompanyName() ?></option>
                            
                            <?php for($i = 0; $i < count($itensForn); $i++) { ?>                        
                            <option value="<?= $itensForn[$i]->getSupplierID() ?>"><?= $itensForn[$i]->getCompanyName() ?></option>
                            <?php } ?>              

                        </select>                   
                    </div>
                </div>
                
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="2">
                        <input type="hidden" name="id" value="<?= $idProd ?>">
                        <button class="btn btn-info" type="submit">
                            Alterar Produto
                            <i class="fas fa-pencil-alt" style="margin-left: 5px"></i></button>
                        
                    </div>
                </div>
            </form>
            
            <?php 
                    }
                }
            
            ?>
            
        </div>
        
    </body>
    
</html>

<?php 

    } 
?>

