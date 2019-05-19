<?php

require_once '../dao/ConexaoDAO.php';
require_once '../dao/FuncionariosDAO.php';

$funcDAO = new FuncionariosDAO();

    if(isset($_GET['nome'])) {
        $funcionarios = $funcDAO->listarFuncionarios(1, $_GET['nome']);
    
    } else {
        $funcionarios = $funcDAO->listarFuncionarios(0, null);
    }   

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.mask.js"></script>
	<title>Tela de Funcionários</title>
</head>
<body>

	<div class="container-fluid" id="div-main">
            
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
                        <a class="nav-link" href="#">Funcionários</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <hr>
        
        <a class="btn btn-success" href="formFuncionarioView.php"><i class="fas fa-id-badge" style="margin-right: 10px"></i>Cadastrar Funcionário</a>
        
        <hr>
		<div class="row">
                    <div class="form quick-post">
                    <div class="form-horizontal">
                        <div class="form-group md-col-12" style="margin: 10px">           
                            <input style="margin-bottom: 5px" type="text" id="inputSearch" name="HTML_busca" class="form-control" placeholder="Buscar Categorias...">                                 
                            <button id="buttonSearch" class="btn btn-outline-info">Buscar<i class="fas fa-search" style="margin-left: 5px"></i></button>                               
                        </div>
                    </div>
                </div>
                    
			<div class="table-responsive col-md-12">
                            
                            <?php if (count($funcionarios) == 0) { ?>
                    
                                <h2><center>NENHUM RESULTADO OBTIDO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                    
                            <?php } else { ?>
                                
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<td>Código</td>
							<td>Nome</td>
							<td>Título</td>
                                                        <td>Data de Nascimento</td>
                                                        <td>Salário</td>
                                                        <td>Ações</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($funcionarios as $funcionario) { ?>
                                            
                                                    

						<tr>
							<td><?php echo $funcionario->getEmployeeID(); ?></td>
							<td><?php echo $funcionario->getFirstName()?> <?= $funcionario->getLastName(); ?></td>
							<td><?php echo $funcionario->getTitle(); ?></td>
                                                        <td><?php echo date('d/m/Y', strtotime($funcionario->getBirthDate())); ?></td>
                                                        <td><?php echo $funcionario->getSalary(); ?></td>
                                                        <td style="width: 200px">
                                                            <center>
                                                                <a href="detalhesFuncionarioView.php?id=<?= $funcionario->getEmployeeID() ?>" class="btn btn-info" style="background-color: yellowgreen; border-color: yellowgreen">
                                                                    Detalhes <i class="fas fa-eye" style="margin-left: 5px"></i>
                                                                </a>
                                                            </center>
                                                        </td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
                                
                            <?php } ?>
			</div>
		</div>
	</div>
</body>

    <script type="text/javascript">  
        
        function atualizaTable() {
            var busca = $('#inputSearch').val();     
            
            if(busca) {
                 window.location.assign('?nome=' + busca);
            } else  {
                window.location.assign('listarFuncionariosView.php');
            }
                
        }
        
        $(document).ready(function() {
            $('#buttonSearch').click(atualizaTable);
            
            $('.dateMask').mask("0000/00/00");
        });
       
    </script>
    
</html>
