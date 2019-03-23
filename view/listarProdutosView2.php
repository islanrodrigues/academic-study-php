
<?php 
	
	require_once '..\dao/ConexaoDAO.php';
	require_once '..\dao/ProdutosDAO.php';

	$prodDAO = new ProdutosDAO();
	$produtos = $prodDAO->listarProdutos();

	?>

<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	</head>

	<body>

		<div class = "container-fluid" id="div-main">
			<div class="row">
				<div class="table-responsive col-md-12">
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<td>Código</td>
								<td>Nome</td>
								<td>Categoria</td>
								<td>Fornecedor</td>
								<td>Preço</td>
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
							</tr>

						<?php } ?>
						
						</tbody>

					</table>

				</div>
			
			</div>
			
		</div>
	</body>

</html>

