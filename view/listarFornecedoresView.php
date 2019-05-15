<?php
require_once '../dao/ConexaoDAO.php';
require_once '../dao/FornecedoresDAO.php';

	$fornDAO = new FornecedoresDAO();
        
        if(isset($_GET['nome'])) {
            $fornecedores = $fornDAO->listarFornecedores(1, $_GET['nome']);
    
        } else {
            $fornecedores = $fornDAO->listarFornecedores(0, null);
        }   

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <title>Tela de Fornecedores</title>
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
        
        <a class="btn btn-success" href="formFornecedorView.php"><i class="fas fa-people-carry" style="margin-right: 10px"></i>Cadastrar Fornecedor</a>
        
        <hr>           
        
            <div class="row">
                
                <div class="form quick-post">
                    <div class="form-horizontal">
                        <div class="form-group md-col-12" style="margin: 10px">           
                            <input style="margin-bottom: 5px" type="text" id="inputSearch" name="HTML_busca" class="form-control" placeholder="Buscar Fornecedores...">                                 
                            <button id="buttonSearch" class="btn btn-outline-info">Buscar<i class="fas fa-search" style="margin-left: 5px"></i></button>                               
                        </div>
                    </div>
                </div>
       
            <div class="table-responsive md-col-12">
                
                <?php if (count($fornecedores) == 0) { ?>
                    
                    <h2><center>NENHUM RESULTADO OBTIDO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                    
                <?php } else { ?>
                
		<table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Companhia</th>
                            <th>Nome de Contato</th>
                            <th>Título do Contato</th>
                            <th>Cidade</th>
                            <th>País</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    
                    <tbody>
			<?php
                            foreach ($fornecedores as $fornecedor) { ?>
				<tr>
                                    <td><?php echo $fornecedor->getSupplierID(); ?></td>
                                    <td><?php echo $fornecedor->getCompanyName(); ?></td>
                                    <td><?php echo $fornecedor->getContactName(); ?></td>
                                    <td><?php echo $fornecedor->getContactTitle(); ?></td>
                                    <td><?php echo $fornecedor->getCity(); ?></td>
                                    <td><?php echo $fornecedor->getCountry(); ?></td>
                                    <td style="width: 200px">
                                        <center>
                                            <a href="detalhesFornecedorView.php?id=<?= $fornecedor->getSupplierID() ?>" class="btn btn-info" style="background-color: yellowgreen; border-color: yellowgreen">
                                               Detalhes <i class="fas fa-eye" style="margin-left: 5px"></i>
                                            </a>
                                        </center>
                                    </td>
				</tr>
							 
			<?php }  ?>
						
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
                window.location.assign('listarFornecedoresView.php');
            }
                
        }
        
        $(document).ready(function() {
            $('#buttonSearch').click(atualizaTable);
        });
       
    </script>
    
</html>
