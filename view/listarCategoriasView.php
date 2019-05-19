<?php

require_once '../dao/ConexaoDAO.php';
require_once '../dao/CategoriasDAO.php';

$categoriaDAO = new CategoriasDAO();

    if(isset($_GET['nome'])) {
        $categorias = $categoriaDAO->listarCategorias(1, $_GET['nome']);
    
    } else {
        $categorias = $categoriaDAO->listarCategorias(0, null);
    }   

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<title>Tela de Categorias</title>
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
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarFuncionariosView.php">Funcionários</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <hr>
        
        <a class="btn btn-success" href="formCategoriaView.php"><i class="fas fa-network-wired" style="margin-right: 10px"></i>Cadastrar Categoria</a>
        
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
                            
                            <?php if (count($categorias) == 0) { ?>
                    
                                <h2><center>NENHUM RESULTADO OBTIDO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                    
                            <?php } else { ?>
                                
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<td>Código</td>
							<td>Nome</td>
							<td>Descrição</td>
                                                        <td>Ações</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categorias as $categoria) { ?>

						<tr>
							<td><?php echo $categoria->getCategoryID(); ?></td>
							<td><?php echo $categoria->getCategoryName(); ?></td>
							<td><?php echo $categoria->getDescription(); ?></td>
                                                        <td style="width: 200px">
                                                            <center>
                                                                <a href="detalhesCategoriaView.php?id=<?= $categoria->getCategoryID() ?>" class="btn btn-info" style="background-color: yellowgreen; border-color: yellowgreen">
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
                window.location.assign('listarCategoriasView.php');
            }
                
        }
        
        $(document).ready(function() {
            $('#buttonSearch').click(atualizaTable);
        });
       
    </script>
    
</html>
