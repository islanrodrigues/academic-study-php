
<?php 
	
    require_once '..\dao/ConexaoDAO.php';
    require_once '..\dao/ProdutosDAO.php';

    $prodDAO = new ProdutosDAO();
    
    if(isset($_GET['nome'])) {
        $produtos = $prodDAO->listarProdutos(1, $_GET['nome']);
    
    } else {
        $produtos = $prodDAO->listarProdutos(0, null);
    }   

?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Tela de Produtos</title>
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
        
        <a class="btn btn-success" href="formProdutoView.php"><i class="fas fa-boxes" style="margin-right: 10px"></i>Cadastrar Produto</a>
        
        <hr>           
        
            <div class="row">
                
                <div class="form quick-post">
                    <div class="form-horizontal">
                        <div class="form-group md-col-12" style="margin: 10px">           
                            <input style="margin-bottom: 5px" type="text" id="inputSearch" name="HTML_busca" class="form-control" placeholder="Buscar Produtos...">                                 
                            <button id="buttonSearch" class="btn btn-outline-info">Buscar<i class="fas fa-search" style="margin-left: 5px"></i></button>                               
                        </div>
                    </div>
                </div>
                
                
                <div class="table-responsive md-col-12">
                    
                    <?php if (count($produtos) == 0) { ?>
                    
                    <h2><center>NENHUM RESULTADO OBTIDO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
                    
                    <?php } else { ?>
                    
                    <table id="datatable" class="table table-striped table-dark">
			<thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Fornecedor</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
			</thead>
                        
			<tbody>
                            <?php foreach ($produtos as $produto) { ?>
                                
                            <tr>
				<td> <?php echo $produto->getProductID();?> </td>
				<td> <?php echo $produto->getProductName();?> </td>
				<td> <?php echo $produto->getCategoria();?> </td>
				<td> <?php echo $produto->getFornecedor();?> </td>
				<td> <?php echo $produto->getUnitPrice();?> </td>
                                <td style="width: 200px">
                                <center>
                                    <a href="detalhesProdutoView.php?id=<?= $produto->getProductID() ?>" class="btn btn-info" style="background-color: yellowgreen; border-color: yellowgreen">
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
                window.location.assign('listarProdutosView.php');
            }
                
        }
        
        $(document).ready(function() {
            $('#buttonSearch').click(atualizaTable);
        });
       
    </script>

</html>

