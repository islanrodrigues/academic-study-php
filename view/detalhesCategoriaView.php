<?php
    require_once '../dao/ConexaoDAO.php';     
    require_once '../dao/CategoriasDAO.php';
        
    $catDAO = new CategoriasDAO();
    
    if (isset($_GET['id'])) {
        
        if (isset($_GET['delete']) && $_GET['delete'] == 1) {
            $acao = 1;
        } else {
            $acao = null;
        }
        
        if ($acao != NULL) {
            
            $catDAO->deletarCategoria($_GET['id']);
            
           echo "<script>alert('Categoria excluída com sucesso!')</script>";
           echo "<script>location.href='listarCategoriasView.php'</script>";
        }
        
         $categoria = $catDAO->visualizarProduto($_GET['id']);
         
        
    } else {
        $categoria = NULL;
    }
    
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Detalhes da Categoria</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        
    </head>
    
    <script type="text/javascript">
        
        function deleteItem(url) {
            if (confirm("Tem certeza que deseja excluir esta Categoria?")) {
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
                            <a class="nav-link" href="#">Funcionários</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <hr>
            
            <div class="row">
                
                <?php 
                    
                    if ($categoria == NULL) {
                        
                ?>
                
                <h2><center>CATEGORIA NÃO ENCONTRADA!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                
                <?php
                    
                    } else {
                        
                ?>
                
                <div class="table-responsive col-7">
                    <table class="table table-striped">                        
                        <tbody>
                            <tr>
                                <th>Código: <?= $categoria->getCategoryID() ?></th>
                            </tr>
                            
                            <tr>
                                <th>Nome da Categoria: <?= $categoria->getCategoryName() ?></th>
                            </tr>  
                             <tr>
                                 <th>Descrição: <?= $categoria->getDescription() ?></th>
                            </tr>  
                            <tr>
                                <th><center>
                                    <a href="formCategoriaView.php?id=<?= $_GET['id'] ?>&dados=1" class="btn btn-primary">Editar Categoria <i class="fas fa-pencil-alt" style="margin-left: 5px"></i></a>
                                    <a href="javascript:deleteItem('detalhesCategoriaView.php?id=<?= $_GET['id'] ?>&delete=1')" class="btn btn-danger">Excluir Categoria<i class="fas fa-trash-alt" style="margin-left: 5px"></i></a>
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
        

