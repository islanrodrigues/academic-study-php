<?php
require_once '../dao/ConexaoDAO.php';
require_once '../dao/FornecedoresDAO.php';

	$fornDAO = new FornecedoresDAO();
	$fornecedores = $fornDAO->listarFornecedores();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<title>Tela de Fonecedores</title>
</head>
<body>

	<div class="container-fluid" id="div-main">
		<div class="row">
			<div class="table-responsive md-col-12">
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<td>Código</td>
							<td>Nome da Companhia</td>
							<td>Nome de Contato</td>
							<td>Título do Contato</td>
							<td>Endereço</td>
							<td>Cidade</td>
							<td>País</td>
							<td>Telefone</td>
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
							<td><?php echo $fornecedor->getAddress(); ?></td>
							<td><?php echo $fornecedor->getCity(); ?></td>
							<td><?php echo $fornecedor->getCountry(); ?></td>
							<td><?php echo $fornecedor->getPhone(); ?></td>
						</tr>
							 
						<?php }  ?>
						
					</tbody>
				</table>				
			</div>			
		</div>		
	</div>
</body>
</html>
