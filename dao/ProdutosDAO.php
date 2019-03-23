<?php

/**
 * Description of ProdutosDAO
 *
 * @author Galvão
 */

require_once '../model/Produtos.php';
require_once 'ConexaoDAO.php';

class ProdutosDAO {
    
     public function listarProdutos() {       
        $objCon = new ConexaoDAO();
        $vConn = $objCon->abrirConexao();
        
        $itens = new ArrayObject();
        
        $sqlLista = "SELECT p.*, c.CategoryName, s.CompanyName FROM products p, categories c, suppliers s "
                . "WHERE p.CategoryID = c.CategoryID AND p.SupplierID = s.SupplierID ORDER BY p.ProductID";
        
        $rsLista = mysqli_query($vConn, $sqlLista) or die (mysqli_error($vConn));
        
        while ($tblLista = mysqli_fetch_array($rsLista)) {
            
            $produto = new Produtos();
            $produto->setProductID($tblLista['ProductID']);
            $produto->setCategoryID($tblLista['CategoryID']);
            $produto->setProductName($tblLista['ProductName']);
            $produto->setQuantityPerUnit($tblLista['QuantityPerUnit']);
            $produto->setSupplierID($tblLista['SupplierID']);
            $produto->setUnitPrice($tblLista['UnitPrice']);
            $produto->setCategoria($tblLista['CategoryName']);
            $produto->setFornecedor($tblLista['CompanyName']);
            
            $itens->append($produto);
        }        
        $objCon->fecharConexao();
        
        return $itens;
     }
     
     public function visualizarProduto($produtoID) {
          $objCon = new ConexaoDAO();
          $vConn = $objCon->abrirConexao();
          
          $produto = new Produtos();
          
          $sqlProduto = "SELECT * FROM products WHERE ProductID = '$produtoID'";
          $rsProduto = mysqli_query($vConn, $sqlProduto) or die (mysqli_error($vConn));
          
          if (mysqli_num_rows($rsProduto) == 0) {
              
              $objCon->fecharConexao();              
              return null;
          
          } else {
                           
              $tblProduto = mysqli_fetch_array($rsProduto);         
              $produto->setProductID($tblLista['ProductID']);
              $produto->setCategoryID($tblLista['CategoryID']);
              $produto->setProductName($tblLista['ProductName']);
              $produto->setQuantityPerUnit($tblLista['QuantityPerUnit']);
              $produto->setSupplierID($tblLista['SupplierID']);
              $produto->setUnitPrice($tblLista['UnitPrice']);
              
              $objCon->fecharConexao();
              return $produto;
          }          
     } 
     
     
     public function cadastarProduto($produto) {
         $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlCadastro = "INSERT INTO products (ProductID, ProductName, SupplierID, CategoryID, "
                 . "QuantityPerUnit, UnitPrice, Discontinued) VALUES ('" . $produto->getProductID() .
                 "' , '" . $produto->getProductName() . "' , '" . $produto->getSupplierID() . 
                 "' , " . $produto->getCategoryID() . "' , '" . $produto->getQuantityPerUnit() . 
                 "' , '" . $produto->getUnitPrice() . "', 0)";  
         
         mysqli_query($vCon, $sqlCadastro) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();
         
     }
}

?>
