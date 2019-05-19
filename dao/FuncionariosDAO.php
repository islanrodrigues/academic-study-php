<?php

/**
 * Description of FuncionariosDAO
 *
 * @author Islan
 */

require_once 'ConexaoDAO.php';
require_once '../model/Funcionarios.php';

class FuncionariosDAO {
    
    public function listarFuncionarios($tipo, $nomeFiltro) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();

        $funcionarios = new ArrayObject();
        
        //LISTAR TODOS OS FUNCIONARIOS
        if ($tipo == 0) {
            $sqlCategorias = "SELECT * FROM employees ORDER BY EmployeeID";
            $rsCategorias = mysqli_query($vCon, $sqlCategorias);
        
        //LISTAR FUNCIONARIOS POR UM FILTRO DE NOME
        } else if($tipo == 1) {
            $sqlCategorias = "SELECT * FROM employees WHERE FirstName LIKE '%$nomeFiltro%' OR LastName LIKE '%$nomeFiltro%' ORDER BY EmployeeID";
            $rsCategorias = mysqli_query($vCon, $sqlCategorias) or die(mysqli_error($vCon));
        } 
        
        while ($tblLista = mysqli_fetch_array($rsCategorias)) {
            
            $funcionario = new Funcionarios();
            
            $funcionario->setEmployeeID($tblLista['EmployeeID']);
            $funcionario->setLastName($tblLista['LastName']);
            $funcionario->setFirstName($tblLista['FirstName']);
            $funcionario->setTitle($tblLista['Title']);
            $funcionario->setBirthDate($tblLista['BirthDate']);
            $funcionario->setAddress($tblLista['Address']);
            $funcionario->setCity($tblLista['City']);
            $funcionario->setCountry($tblLista['Country']);
            $funcionario->setSalaray($tblLista['Salary']);
            
            $funcionarios->append($funcionario);            
        }
        
        $objCon->fecharConexao();
        
        return $funcionarios;
    }
    
    
    public function alterarFuncionario($idFuncionario, $objFuncionario) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $ultimoNome = $objFuncionario->getLastName();
        $primerioNome = $objFuncionario->getFirstName();
        $titulo = $objFuncionario->getTitle();
        
        $data = $objFuncionario->getBirthDate();
        $dataP = explode('/', $data);
        $aniversario = $dataP[2] . '-' . $dataP[1] . '-' . $dataP[0];
        
        $endereco = $objFuncionario->getAddress();
        $cidade = $objFuncionario->getCity();
        $pais = $objFuncionario->getCountry();
        $salario = $objFuncionario->getSalary();
        
        
       $sqlUpdate = "UPDATE employees SET LastName = '$ultimoNome', FirstName = '$primerioNome',"
               . " Title = '$titulo', BirthDate = '$aniversario', Address = '$endereco',"
               . " City = '$cidade', Country = '$pais', Salary = '$salario'"
               . " WHERE EmployeeID = '$idFuncionario'";
       
       mysqli_query($vCon, $sqlUpdate) or die(mysqli_error($vCon));
        
        $objCon->fecharConexao();
        
    }
    
    
    public function visualizarFuncionario($idFuncionario) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $funcionario = new Funcionarios();
        
        $sqlFuncionario = "SELECT * FROM employees WHERE EmployeeID = '$idFuncionario'";
        $rsFuncionario = mysqli_query($vCon, $sqlFuncionario) or die(mysqli_error($vCon));
        
        if (mysqli_num_rows($rsFuncionario) == 0) {
            $objCon->fecharConexao();
            return null;
            
        } else {
            
            while ($tblLista = mysqli_fetch_array($rsFuncionario)) {
                
                $funcionario->setEmployeeID($tblLista['EmployeeID']);
                $funcionario->setLastName($tblLista['LastName']);
                $funcionario->setFirstName($tblLista['FirstName']);
                $funcionario->setTitle($tblLista['Title']);
                $funcionario->setBirthDate($tblLista['BirthDate']);
                $funcionario->setAddress($tblLista['Address']);
                $funcionario->setCity($tblLista['City']);
                $funcionario->setCountry($tblLista['Country']);
                $funcionario->setSalaray($tblLista['Salary']);
                
                $objCon->fecharConexao();                
                return $funcionario;
            }            
        }
        
        
        
    }
    
    
    public function deletarFuncionario($idFuncionario) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $sqlDelete = "DELETE FROM employees WHERE EmployeeID = '$idFuncionario'";        
        mysqli_query($vCon, $sqlDelete) or die (mysqli_error($vCon));
        
        $objCon->fecharConexao();
        
    }
    
    public function cadastrarFuncionario($objFuncionario) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $id = $objFuncionario->getEmployeeID();
        $ultimoNome = $objFuncionario->getLastName();
        $primerioNome = $objFuncionario->getFirstName();
        $titulo = $objFuncionario->getTitle();
        
        $data = $objFuncionario->getBirthDate();
        $dataP = explode('/', $data);
        $aniversario = $dataP[2] . '-' . $dataP[1] . '-' . $dataP[0];
        
        $endereco = $objFuncionario->getAddress();
        $cidade = $objFuncionario->getCity();
        $pais = $objFuncionario->getCountry();
        $salario = $objFuncionario->getSalary();
        
        $sqlCadastro = "INSERT INTO employees (EmployeeID, LastName, FirstName, Title, BirthDate, Address, City, Country, Salary, Notes)"
                . " VALUES ('$id', '$ultimoNome', '$primerioNome', '$titulo', '$aniversario', '$endereco', '$cidade', '$pais', '$salario', 'IS NULL')";
        
        mysqli_query($vCon, $sqlCadastro) or die (mysqli_error($vCon));
        
        $objCon->fecharConexao();
    }
    
}
