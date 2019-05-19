<?php

    require_once '../dao/FornecedoresDAO.php';
    require_once '../model/Produtos.php';
    
    $fornDAO = new FornecedoresDAO();
    
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
        
        $objForn = new Fornecedores();
      
        //CADASTRAR FORNECEDOR
        if ($acao == 1) {
            $fornecedores = $fornDAO->listarFornecedores(0, null);
            $lastForn = $fornecedores[count($fornecedores) - 1];
            $fornID = $lastForn->getSupplierID();
            $fornID++;
            
            $nomeComp = $_GET['company_forn'];
            $nomeCont = $_GET['contato_forn'];
            $titutoCont = $_GET['titulo_forn'];
            $endereco = $_GET['endereco_forn'];
            $cidade = $_GET['cidade_forn'];
            $regiao = $_GET['regiao_forn'];
            $postal = $_GET['postal_forn'];
            $pais = $_GET['pais_forn'];
            $telefone = $_GET['tel_forn'];
            
            $objForn->setSupplierID($fornID);
            $objForn->setCompanyName($nomeComp);
            $objForn->setContactName($nomeCont);
            $objForn->setContactTitle($titutoCont);
            $objForn->setAddress($endereco);
            $objForn->setCity($cidade);
            $objForn->setRegion($regiao);
            $objForn->setPostalCode($postal);
            $objForn->setCountry($pais);
            $objForn->setPhone($telefone);
            
            $fornDAO->cadastrarFornecedor($objForn);
            
            echo "<script>alert('Fornecedor ~$nomeComp~ cadastrado com sucesso!')</script>";
            echo "<script>location.href='listarFornecedoresView.php'</script>";            
        
        //ATUALIZAR FORNECEDOR
        } else if ($acao == 2) {
            $id = $_GET['id'];
            $nomeComp = $_GET['company_forn'];
            $nomeCont = $_GET['contato_forn'];
            $titutoCont = $_GET['titulo_forn'];
            $endereco = $_GET['endereco_forn'];
            $cidade = $_GET['cidade_forn'];
            $regiao = $_GET['regiao_forn'];
            $postal = $_GET['postal_forn'];
            $pais = $_GET['pais_forn'];
            $telefone = $_GET['tel_forn'];
            
            $objForn->setSupplierID($id);
            $objForn->setCompanyName($nomeComp);
            $objForn->setContactName($nomeCont);
            $objForn->setContactTitle($titutoCont);
            $objForn->setAddress($endereco);
            $objForn->setCity($cidade);
            $objForn->setRegion($regiao);
            $objForn->setPostalCode($postal);
            $objForn->setCountry($pais);
            $objForn->setPhone($telefone);
            
            $fornDAO->alterarFornecedor($id, $objForn);
            
            echo "<script>alert('Fornecedor ~$nomeComp~ alterado com sucesso!')</script>";
            echo "<script>location.href='listarFornecedoresView.php'</script>"; 
        }
        
    } else {
        
        if (!isset($_GET['dados'])) {
           $dados = null; 
           
        } else {
            $dados = $_GET['dados'];
        }       
        
             
?>

<html>

    <head>
	<meta charset="utf-8">
        <title>Formulário do Fornecedor</title>
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
            
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                     <h2>Formulário de Fornecedor</h2>
                </div>               
            </div>
            
            <hr>
            
            <?php 
                
                // FORMULÁRIO VAZIO
                if ($dados == 0 || $dados == null) {
            
            ?>
            
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="company_forn">Nome da Companhia</label>
                        <input id="company_forn" name="company_forn" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="contato_forn">Nome do Contato</label>
                        <input id="contato_forn" name="contato_forn" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="titulo_forn">Título do Contato</label>
                        <input id="titulo_forn" name="titulo_forn" type="text" class="form-control">
                    </div>
                </div> 
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="endereco_forn">Endereço</label>
                        <input id="endereco_forn" name="endereco_forn" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="cidade_forn">Cidade</label>
                        <input id="cidade_forn" name="cidade_forn" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="regiao_forn">Região</label>
                        <input id="regiao_forn" name="regiao_forn" type="text" class="form-control">
                    </div>
                </div>         
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="postal_forn">Caixa Postal</label>
                        <input id="postal_forn" name="postal_forn" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="estado_forn">País</label>
                        <input id="estado_forn" name="pais_forn" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="tel_forn">Telefone</label>
                        <input id="tel_forn" name="tel_forn" type="text" class="form-control">
                    </div>
                </div>                 
                                
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="1">
                        <button class="btn btn-success" type="submit">
                            Cadastrar Fornecedor
                            <i class="fas fa-save" style="margin-left: 5px"></i></button>
                        
                    </div>
                </div>
            </form>
            
            <?php 
                
                // FORMULÁRIO PREENCHIDO
                } else if ($dados == 1) {
                    if (isset($_GET['id'])) {
                       $idForn = $_GET['id'];
                        $objForn = $fornDAO->visualizarFornecedor($idForn); 
                    
                    } else {
                        $objForn = NULL;
                    }
                    
                    
                    if ($objForn == NULL) {
            
            ?>
            
            <h2><center>FORNECEDOR NÃO ENCONTRADO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
             
            <?php } else { ?>
            
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="company_forn">Nome da Companhia</label>
                        <input id="company_forn" name="company_forn" type="text" class="form-control" value="<?= $objForn->getCompanyName() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="contato_forn">Nome do Contato</label>
                        <input id="contato_forn" name="contato_forn" type="text" class="form-control" value="<?= $objForn->getContactName() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="titulo_forn">Título do Contato</label>
                        <input id="titulo_forn" name="titulo_forn" type="text" class="form-control" value="<?= $objForn->getContactTitle() ?>">
                    </div>
                </div> 
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="endereco_forn">Endereço</label>
                        <input id="endereco_forn" name="endereco_forn" type="text" class="form-control" value="<?= $objForn->getAddress() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="cidade_forn">Cidade</label>
                        <input id="cidade_forn" name="cidade_forn" type="text" class="form-control" value="<?= $objForn->getCity() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="regiao_forn">Região</label>
                        <input id="regiao_forn" name="regiao_forn" type="text" class="form-control" value="<?= $objForn->getRegion() ?>">
                    </div>
                </div>         
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="postal_forn">Caixa Postal</label>
                        <input id="postal_forn" name="postal_forn" type="text" class="form-control" value="<?= $objForn->getPostalCode() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="estado_forn">País</label>
                        <input id="estado_forn" name="pais_forn" type="text" class="form-control" value="<?= $objForn->getCountry() ?>">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="tel_forn">Telefone</label>
                        <input id="tel_forn" name="tel_forn" type="text" class="form-control" value="<?= $objForn->getPhone() ?>">
                    </div>
                </div>                       
    
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="2">
                        <input type="hidden" name="id" value="<?= $idForn ?>">
                        <button class="btn btn-info" type="submit">
                            Alterar Fornecedor
                            <i class="fas fa-pencil-alt" style="margin-left: 5px"></i></button>
                        
                    </div>
                </div>
            </form>
            
            <?php 
                    }
                }
            
            ?>
            
        </div>
        
    </body>
    
</html>

<?php 

    } 
?>

