<?php

/**
 * Description of FornecedoresDAO
 *
 * @author Islan
 */

require_once '../model/Fornecedores.php';
require_once 'ConexaoDAO.php';

class FornecedoresDAO {
    
    public function listarFornecedores() {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $fornecedores = new ArrayObject();
        
        $sqlFornecedores = "SELECT * FROM suplliers";
        
        $rsFornecedores = mysqli_query($vCon, $sqlFornecedores) or die(mysqli_error($vCon));
        
        while ($tbLista = mysql_fetch_array($sqlFornecedores)) {
            
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
    
}

?>
