
<?php 
	
	require_once '../dao/ConexaoDAO.php';
	require_once '../dao/ProdutosDAO.php';

	$prodDAO = new ProdutosDAO();
	$produtos = $prodDAO->listarProdutos(0, null);

	?>

<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	</head>

	<body>

		<div class = "container-fluid" id="div-main">
			<div class="row">
				<div class="col-md-1">Código</div>
				<div class="col-md-3">Nome</div>
				<div class="col-md-3">Categoria</div>
				<div class="col-md-3">Fornecedor</div>
				<div class="col-md-2">Preço</div>
			</div>

			<?php foreach ($produtos as $produto) { ?>
			
			<div class="row">
				<div class="col-md-1"> <?php echo $produto->getProductID();?> </div>
				<div class="col-md-3"> <?php echo $produto->getProductName();?> </div>
				<div class="col-md-3"> <?php echo $produto->getCategoria();?> </div>
				<div class="col-md-3"> <?php echo $produto->getFornecedor();?> </div>
				<div class="col-md-2"> <?php echo $produto->getUnitPrice();?> </div>
			</div>	

		<?php } ?>
			
		</div>
	</body>

</html>

