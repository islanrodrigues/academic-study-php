<?php
    require_once '../dao/ConexaoDAO.php';     
    require_once '../dao/FornecedoresDAO.php';
        
    $fornDAO = new FornecedoresDAO();
    
    if (isset($_GET['id'])) {
        
        if (isset($_GET['delete']) && $_GET['delete'] == 1) {
            $acao = 1;
        } else {
            $acao = null;
        }
        
        if ($acao != NULL) {
            
            $fornDAO->deletarFornecedor($_GET['id']);
            
           echo "<script>alert('Fornecedor excluído com sucesso!')</script>";
           echo "<script>location.href='listarFornecedoresView.php'</script>";
        }
        
         $fornecedor = $fornDAO->visualizarFornecedor($_GET['id']);
         
        
    } else {
        $fornecedor = NULL;
    }
    
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Detalhes do Fornecedor</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        
    </head>
    
    <script type="text/javascript">
        
        function deleteItem(url) {
            if (confirm("Tem certeza que deseja excluir este Fornecedor?")) {
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
                    
                    if ($fornecedor == NULL) {
                        
                ?>
                
                <h2><center>FORNECEDOR NÃO ENCONTRADO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                
                <?php
                    
                    } else {
                        
                ?>
                
                <div class="table-responsive col-7">
                    <table class="table table-striped">                        
                        <tbody>
                            <tr>
                                <th>Código: <?= $fornecedor->getSupplierID() ?></th>
                            </tr>
                            
                            <tr>
                                <th>Nome da Companhia: <?= $fornecedor->getCompanyName() ?></th>
                            </tr>
                            
                           <tr>
                               <th>Nome do Contato: <?= $fornecedor->getContactName() ?></th>
                            </tr> 
                            
                            <tr>
                                <th>Título do Contato: <?= $fornecedor->getContactTitle() ?></th>
                            </tr>
                            
                            <tr>
                                <th>Endereço: <?= $fornecedor->getAddress() ?></th>
                            </tr>
                            <tr>
                                <th>Cidade: <?= $fornecedor->getCity() ?></th>
                            </tr>
                            <tr>
                                <th>Região: <?= $fornecedor->getRegion() ?></th>
                            </tr>
                            <tr>
                                <th>Caixa Postal: <?= $fornecedor->getPostalCode() ?></th>
                            </tr>
                            <tr>
                                <th>País: <?= $fornecedor->getCountry() ?></th>
                            </tr>
                            <tr>
                                <th>Telefone: <?= $fornecedor->getPhone() ?></th>
                            </tr>
                            <tr>
                                <th><center>
                                    <a href="formFornecedorView.php?id=<?= $_GET['id'] ?>&dados=1" class="btn btn-primary">Editar Fornecedor <i class="fas fa-pencil-alt" style="margin-left: 5px"></i></a>
                                    <a href="javascript:deleteItem('detalhesFornecedorView.php?id=<?= $_GET['id'] ?>&delete=1')" class="btn btn-danger">Excluir Fornecedor<i class="fas fa-trash-alt" style="margin-left: 5px"></i></a>
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
        

