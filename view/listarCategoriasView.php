<?php

require_once '../dao/ConexaoDAO.php';
require_once '../dao/CategoriasDAO.php';

$categoriaDAO = new CategoriasDAO();
$categorias = $categoriaDAO->listarCategorias();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<title>Tela de Categorias</title>
</head>
<body>

	<div class="container-fluid" id="div-main">
		<div class="row">
			<div class="table-responsive col-md-12">
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<td>Código</td>
							<td>Nome</td>
							<td>Descrição</td>
							<td>Imagem</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categorias as $categoria) { ?>

						<tr>
							<td><?php echo $categoria->getCategoryID(); ?></td>
							<td><?php echo $categoria->getCategoryName(); ?></td>
							<td><?php echo $categoria->getDescription(); ?></td>
							<td><?php echo '<img style="width:120px" src="data:image/jpeg;base64,' . base64_encode($categoria->getPicture()) . '" />' ?></td>
						</tr>
						<?php } ?>

					</tbody>
				</table>				
			</div>
		</div>
	</div>
</body>
</html>
