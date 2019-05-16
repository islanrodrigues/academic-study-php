<?php

    require_once '../dao/CategoriasDAO.php';
    require_once '../model/Categorias.php';
    
    $catDAO = new CategoriasDAO();
    
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
        
        $objCat = new Categorias();
      
        //CADASTRAR CATEGORIA
        if ($acao == 1) {
            $categorias = $catDAO->listarCategorias(0, null);
            $lastCat = $categorias[count($categorias) - 1];
            $catID = $lastCat->getCategoryID();
            $catID++;
            
            $nome = $_GET['nome_cat'];
            $desc = $_GET['desc_cat'];            
            
            $objCat->setCategoryID($catID);
            $objCat->setCategoryName($nome);
            $objCat->setDescription($desc);
            
            $catDAO->cadastrarCategoria($objCat);
            
            echo "<script>alert('Categoria $nome cadastrada com sucesso!')</script>";
            echo "<script>location.href='listarCategoriasView.php'</script>";            
        
        //ATUALIZAR CATEGORIA
        } else if ($acao == 2) {
            $id = $_GET['id'];
            $nome = $_GET['nome_cat'];
            $desc = $_GET['desc_cat'];            
            
            $objCat->setCategoryName($nome);
            $objCat->setDescription($desc);
            
            $catDAO->alterarCategoria($id, $objCat);
            
            echo "<script>alert('Fornecedor $nome alterado com sucesso!')</script>";
            echo "<script>location.href='listarCategoriasView.php'</script>"; 
        }
        
    } else {
        
        if (!isset($_GET['dados'])) {
           $dados = null; 
           
        } else {
            $dados = $_GET['dados'];
        }       
        
             
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Formulário de Categoria</title>
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
                <div class="col-md-12" style="text-align: center">
                     <h2>Formulário de Categoria</h2>
                </div>               
            </div>
            
            <hr>
            
            <?php 
                
                // FORMULÁRIO VAZIO
                if ($dados == 0 || $dados == null) {
            
            ?>
            
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome_cat">Nome da Categoria</label>
                        <input id="nome_cat" name="nome_cat" type="text" class="form-control" maxlength="15">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="desc_cat">Descrição</label>
                        <input id="desc_cat" name="desc_cat" type="text" class="form-control">
                    </div>
                </div>                       
                                
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="1">
                        <button class="btn btn-success" type="submit">
                            Cadastrar Categoria
                            <i class="fas fa-save" style="margin-left: 5px"></i></button>                        
                    </div>
                </div>
            </form>
            
            <?php 
                
                // FORMULÁRIO PREENCHIDO
                } else if ($dados == 1) {
                    if (isset($_GET['id'])) {
                       $idCat = $_GET['id'];
                        $objCat = $catDAO->visualizarProduto($idCat); 
                    
                    } else {
                        $objCat = NULL;
                    }
                    
                    
                    if ($objCat == NULL) {
            
            ?>
            
            <h2><center>CATEGORIA NÃO ENCONTRADA!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
             
            <?php } else { ?>
            
            <form method="GET" action="">
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome_cat">Nome da Categoria</label>
                        <input id="nome_cat" name="nome_cat" type="text" class="form-control" maxlength="15" value="<?= $objCat->getCategoryName() ?>">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="desc_cat">Descrição</label>
                        <input id="desc_cat" name="desc_cat" type="text" class="form-control" value="<?=  $objCat->getDescription() ?>">
                    </div>
                </div>       
    
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="2">
                        <input type="hidden" name="id" value="<?= $idCat ?>">
                        <button class="btn btn-info" type="submit">
                            Alterar Categoria
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

