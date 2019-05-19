<?php

    require_once '../dao/FuncionariosDAO.php';
    require_once '../model/Funcionarios.php';
    
    $funcDAO = new FuncionariosDAO();
    
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
        
        $objFunc = new Funcionarios();
      
        //CADASTRAR FUNCIONÁRIO
        if ($acao == 1) {
            $funcionarios = $funcDAO->listarFuncionarios(0, null);
            $lastFunc = $funcionarios[count($funcionarios) - 1];
            $funcID = $lastFunc->getEmployeeID();
            $funcID++;
            
            $primeiroNome = $_GET['primeiroNome_func'];
            $ultimoNome = $_GET['ultimoNome_func']; 
            $titulo = $_GET['titulo_func'];
            $aniversario = $_GET['aniversario_func'];
            $endereco = $_GET['endereco_func'];
            $cidade = $_GET['cidade_func'];
            $pais = $_GET['pais_func'];
            $salario = $_GET['salario_func'];
            
            
            $objFunc->setEmployeeID($funcID);
            $objFunc->setFirstName($primeiroNome);
            $objFunc->setLastName($ultimoNome);
            $objFunc->setTitle($titulo);
            $objFunc->setBirthDate($aniversario);
            $objFunc->setAddress($endereco);
            $objFunc->setCity($cidade);
            $objFunc->setCountry($pais);
            $objFunc->setSalaray($salario);
              
            
            $funcDAO->cadastrarFuncionario($objFunc);
            
            echo "<script>alert('Funcionário ~$primeiroNome $ultimoNome~ cadastrado com sucesso!')</script>";
            echo "<script>location.href='listarFuncionariosView.php'</script>";            
        
        //ATUALIZAR FUNCIONÁRIO
        } else if ($acao == 2) {
            $id = $_GET['id'];
            $primeiroNome = $_GET['primeiroNome_func'];
            $ultimoNome = $_GET['ultimoNome_func']; 
            $titulo = $_GET['titulo_func'];
            $aniversario = $_GET['aniversario_func'];
            $endereco = $_GET['endereco_func'];
            $cidade = $_GET['cidade_func'];
            $pais = $_GET['pais_func'];
            $salario = $_GET['salario_func'];
            
            $objFunc->setFirstName($primeiroNome);
            $objFunc->setLastName($ultimoNome);
            $objFunc->setTitle($titulo);
            $objFunc->setBirthDate($aniversario);
            $objFunc->setAddress($endereco);
            $objFunc->setCity($cidade);
            $objFunc->setCountry($pais);
            $objFunc->setSalaray($salario);
            
            $funcDAO->alterarFuncionario($id, $objFunc);
            
            echo "<script>alert('Funcionário ~$primeiroNome $ultimoNome~ alterado com sucesso!')</script>";
            echo "<script>location.href='listarFuncionariosView.php'</script>"; 
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
        <title>Formulário de Funcionário</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/all.css">
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.mask.js"></script>
        
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
                     <h2>Formulário de Funcionário</h2>
                </div>               
            </div>
            
            <hr>
            
            <?php 
                
                // FORMULÁRIO VAZIO
                if ($dados == 0 || $dados == null) {
            
            ?>
            
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="primeiroNome_func">Primeiro Nome</label>
                        <input id="primeiroNome_func" name="primeiroNome_func" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="ultimoNome_func">Último Nome</label>
                        <input id="ultimoNome_func" name="ultimoNome_func" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="ultimoNome_func">Título</label>
                        <input id="ultimoNome_func" name="titulo_func" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="aniversario_func">Data de Aniversário</label>
                        <input id="aniversario_func" name="aniversario_func" type="text" maxlength="8" class="form-control dateMask">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="endereco_func">Endereço</label>
                        <input id="endereco_func" name="endereco_func" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="cidade_func">Cidade</label>
                        <input id="cidade_func" name="cidade_func" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="pais_func">País</label>
                        <input id="pais_func" name="pais_func" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="salario_func">Salário</label>
                        <input id="salario_func" name="salario_func" type="number" maxlength="10" class="form-control">
                    </div>
                </div>                       
                                
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="1">
                        <button class="btn btn-success" type="submit">
                            Cadastrar Funcionário
                            <i class="fas fa-save" style="margin-left: 5px"></i></button>                        
                    </div>
                </div>
            </form>
            
            <?php 
                
                // FORMULÁRIO PREENCHIDO
                } else if ($dados == 1) {
                    if (isset($_GET['id'])) {
                       $idFunc = $_GET['id'];
                        $objFunc = $funcDAO->visualizarFuncionario($idFunc); 
                    
                    } else {
                        $objFunc = NULL;
                    }
                    
                    
                    if ($objFunc == NULL) {
            
            ?>
            
            <h2><center>FUNCIONÁRIO NÃO ENCONTRADO!<i class="far fa-frown" style="margin-left: 10px"></i></center></h2>
             
            <?php } else { ?>
            
            <form method="GET" action="">
                
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="primeiroNome_func">Primeiro Nome</label>
                        <input id="primeiroNome_func" name="primeiroNome_func" type="text" class="form-control" value="<?= $objFunc->getFirstName()?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="ultimoNome_func">Último Nome</label>
                        <input id="ultimoNome_func" name="ultimoNome_func" type="text" class="form-control" value="<?= $objFunc->getLastName() ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="ultimoNome_func">Título</label>
                        <input id="ultimoNome_func" name="titulo_func" type="text" class="form-control" value="<?= $objFunc->getTitle() ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="aniversario_func">Data de Aniversário</label>
                        <input id="aniversario_func" name="aniversario_func" type="text" maxlength="8" class="form-control dateMask" value="<?= date('d/m/Y', strtotime($objFunc->getBirthDate())) ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="endereco_func">Endereço</label>
                        <input id="endereco_func" name="endereco_func" type="text" class="form-control" value="<?= $objFunc->getAddress() ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="cidade_func">Cidade</label>
                        <input id="cidade_func" name="cidade_func" type="text" class="form-control" value="<?= $objFunc->getCity() ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="pais_func">País</label>
                        <input id="pais_func" name="pais_func" type="text" class="form-control" value="<?= $objFunc->getCountry() ?>">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="salario_func">Salário</label>
                        <input id="salario_func" name="salario_func" type="number" maxlength="10" class="form-control" value="<?= $objFunc->getSalary() ?>">
                    </div>
                </div>       
    
                <hr>
                
                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: left">
                        <input type="hidden" name="acao" value="2">
                        <input type="hidden" name="id" value="<?= $idFunc ?>">
                        <button class="btn btn-info" type="submit">
                            Alterar Funcionário
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dateMask').mask("00/00/0000");
        });
    
    </script>
</html>

<?php 

    } 
?>

