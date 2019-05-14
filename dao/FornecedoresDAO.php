<?php

/**
 * Description of FornecedoresDAO
 *
 * @author Islan
 */

require_once '../model/Fornecedores.php';
require_once 'ConexaoDAO.php';

class FornecedoresDAO {
    
    public function listarFornecedores($tipo, $nomeFiltro) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $fornecedores = new ArrayObject();
        
        //LISTAR TODOS OS FORNECEDORES
        if ($tipo == 0) {
            $sqlFornecedores = "SELECT * FROM suppliers ORDER BY SupplierID";        
            $rsFornecedores = mysqli_query($vCon, $sqlFornecedores) or die(mysqli_error($vCon));
            
            
        //LISTAR FORNECEDORES POR UM FILTRO DE NOME    
        } else if ($tipo == 1) {
            $sqlFornecedores = "SELECT * FROM suppliers WHERE CompanyName LIKE '%$nomeFiltro%' ORDER BY SupplierID";        
            $rsFornecedores = mysqli_query($vCon, $sqlFornecedores) or die(mysqli_error($vCon));
        }      
        
        while ($tbLista = mysqli_fetch_array($rsFornecedores)) {
            
            $fornecedor = new Fornecedores();
            
            $fornecedor->setSupplierID($tbLista['SupplierID']);
            $fornecedor->setCompanyName($tbLista['CompanyName']);
            $fornecedor->setContactName($tbLista['ContactName']);
            $fornecedor->setContactTitle($tbLista['ContactTitle']);
            $fornecedor->setAddress($tbLista['Address']);
            $fornecedor->setCity($tbLista['City']);
            $fornecedor->setRegion($tbLista['Region']);
            $fornecedor->setPostalCode($tbLista['PostalCode']);
            $fornecedor->setCountry($tbLista['Country']);
            $fornecedor->setPhone($tbLista['Phone']);
            $fornecedor->setFax($tbLista['Fax']);
            $fornecedor->setHomePage($tbLista['HomePage']);
            
            $fornecedores->append($fornecedor);
        }
        
        $objCon->fecharConexao();
        
        return $fornecedores;        
        
    }
    
    
    public function cadastrarFornecedor($fornecedor) {
        $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlCadastro = "INSERT INTO suppliers (SupplierID, CompanyName, ContactName, ContactTitle, Address, City, "
                 . "Region, PostalCode, Country, Phone, Fax, HomePage) "
                 . " VALUES ('" . $fornecedor->getSupplierID() . "' , '" . 
                 $fornecedor->getCompanyName() . "' , '" . 
                 $fornecedor->getContactName() . "' , '" . 
                 $fornecedor->getContactTitle() . "' , '" . 
                 $fornecedor->getAddress() . "' , '" . 
                 $fornecedor->getCity() . "' , '" . 
                 $fornecedor->getRegion() . "' , '" . 
                 $fornecedor->getPostalCode() . "' , '" . 
                 $fornecedor->getCountry() . "' , '" . 
                 $fornecedor->getPhone() . "' , 'NULL', 'NULL')";  
         
         mysqli_query($vCon, $sqlCadastro) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();      
        
    }
    
    
    public function deletarFornecedor($fornecedorID) {
        $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlDelete = "DELETE FROM suppliers WHERE CategoryID = '$fornecedorID'";
         mysqli_query($vCon, $sqlDelete) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();
    }
    
    
    public function visualizarFornecedor($fornecedorID) {
        $objCon = new ConexaoDAO();
        $vConn = $objCon->abrirConexao();
          
        $fornecedor = new Fornecedores();
          
        $sqlFornecedor = "SELECT * FROM suppliers WHERE SupplierID = '$fornecedorID'";
        $rsFornecedor = mysqli_query($vConn, $sqlFornecedor) or die (mysqli_error($vConn));
          
        if (mysqli_num_rows($rsFornecedor) == 0) {              
            $objCon->fecharConexao();              
            return null;
          
        } else {                           
            $tblFornecedor = mysqli_fetch_array($rsFornecedor); 
              
            $fornecedor->setSupplierID($tblFornecedor['SupplierID']);
            $fornecedor->setCompanyName($tblFornecedor['CompanyName']);
            $fornecedor->setContactName($tblFornecedor['ContactName']);
            $fornecedor->setContactTitle($tblFornecedor['ContactTitle']);
            $fornecedor->setAddress($tblFornecedor['Address']);
            $fornecedor->setCity($tblFornecedor['City']);
            $fornecedor->setRegion($tblFornecedor['Region']);
            $fornecedor->setPostalCode($tblFornecedor['PostalCode']);
            $fornecedor->setCountry($tblFornecedor['Country']);
            $fornecedor->setPhone($tblFornecedor['Phone']);
            $fornecedor->setFax($tblFornecedor['Fax']);
            $fornecedor->setHomePage($tblFornecedor['HomePage']);
              
            $objCon->fecharConexao();
            return $fornecedor;
        }       
    }
}

?>
