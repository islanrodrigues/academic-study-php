<?php
    require_once '../dao/ConexaoDAO.php';     
    require_once '../dao/FuncionariosDAO.php';
        
    $funcDAO = new FuncionariosDAO();
    
    if (isset($_GET['id'])) {
        
        if (isset($_GET['delete']) && $_GET['delete'] == 1) {
            $acao = 1;
        } else {
            $acao = null;
        }
        
        if ($acao != NULL) {
            
            $funcDAO->deletarFuncionario($_GET['id']);
            
           echo "<script>alert('Funcionário excluído com sucesso!')</script>";
           echo "<script>location.href='listarFuncionariosView.php'</script>";
        }
        
         $funcionario = $funcDAO->visualizarFuncionario($_GET['id']);
         
        
    } else {
        $funcionario = NULL;
    }
    
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Detalhes do Funcionário</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.mask.js"></script>
        
    </head>
    
    <script type="text/javascript">
        
        $(document).ready(function() {            
            $('.dateMask').mask("00/00/0000");
        });
       
        function deleteItem(url) {
            if (confirm("Tem certeza que deseja excluir este Funcionário?")) {
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
                            <a class="nav-link" href="listarProdutosView.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listarFornecedoresView.php">Fornecedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listarCategoriasView.php">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listarFuncionariosView.php">Funcionários</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <hr>
            
            <div class="row">
                
                <?php 
                    
                    if ($funcionario == NULL) {
                        
                ?>
                
                <center><h2>FUNCIONÁRIO NÃO ENCONTRADO!<i class="far fa-frown" style="margin-left: 10px"></i></h2></center>
                
                <?php
                    
                    } else {
                        
                ?>
                
                <div class="table-responsive col-7">
                    <table class="table table-striped">                        
                        <tbody>
                            <tr>
                                <th><span style="color: red">Código:</span> <?= $funcionario->getEmployeeID() ?></th>
                            </tr>
                            
                            <tr>
                                <th><span style="color: red">Nome do Funcionário:</span> <?= $funcionario->getFirstName() ?> <?= $funcionario->getLastName() ?></th>
                            </tr>
                             <tr>
                                 <th><span style="color: red">Título do Funcionário:</span> <?= $funcionario->getTitle() ?></th>
                            </tr>
                            <tr>
                                <th><span style="color: red">Data de Aniversário:</span> <span class="dateMask"><?= date('d/m/Y', strtotime($funcionario->getBirthDate())) ?> </span></th>
                            </tr>
                            <tr>
                                <th><span style="color: red">Endereço:</span> <?= $funcionario->getAddress() ?></th>
                            </tr>
                             <tr>
                                 <th><span style="color: red">Cidade:</span> <?= $funcionario->getCity() ?></th>
                            </tr>
                             <tr>
                                 <th><span style="color: red">País:</span> <?= $funcionario->getCountry() ?></th>
                            </tr>
                             <tr>
                                 <th><span style="color: red">Salário:</span> <?= $funcionario->getSalary() ?></th>
                            </tr>
                            <tr>
                                <th><center>
                                    <a href="formFuncionarioView.php?id=<?= $_GET['id'] ?>&dados=1" class="btn btn-primary">Editar Funcionário <i class="fas fa-pencil-alt" style="margin-left: 5px"></i></a>
                                    <a href="javascript:deleteItem('detalhesFuncionarioView.php?id=<?= $_GET['id'] ?>&delete=1')" class="btn btn-danger">Excluir Funcionário<i class="fas fa-trash-alt" style="margin-left: 5px"></i></a>
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
        

