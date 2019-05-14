<?php

/**
 * Description of ProdutosDAO
 *
 * @author Galvão
 */

require_once '../model/Produtos.php';
require_once 'ConexaoDAO.php';

class ProdutosDAO {
    
     public function listarProdutos($tipo, $nomeFiltro) {       
        $objCon = new ConexaoDAO();
        $vConn = $objCon->abrirConexao();
        
        $itens = new ArrayObject();

        // LISTA TODOS OS PRODUTOS
        if ($tipo == 0) {
            $sqlLista = "SELECT p.*, c.CategoryName, s.CompanyName FROM products p, categories c, suppliers s "
                . "WHERE p.CategoryID = c.CategoryID AND p.SupplierID = s.SupplierID ORDER BY p.ProductID";
        
            $rsLista = mysqli_query($vConn, $sqlLista) or die (mysqli_error($vConn));            
            
        // LISTA PRODUTOS POR UM FILTRO DE NOME
        } else if ($tipo == 1) {
            $sqlLista = "SELECT p.*, c.CategoryName, s.CompanyName FROM products p, categories c, suppliers s "
                    . "WHERE p.productName LIKE '%$nomeFiltro%' AND p.CategoryID = c.CategoryID AND p.SupplierID = s.SupplierID ORDER BY p.productID";
            
            $rsLista = mysqli_query($vConn, $sqlLista) or die (mysqli_error($vConn));
        }
                
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
              
              $produto->setProductID($tblProduto['ProductID']);
              $produto->setCategoryID($tblProduto['CategoryID']);
              $produto->setProductName($tblProduto['ProductName']);
              $produto->setQuantityPerUnit($tblProduto['QuantityPerUnit']);
              $produto->setSupplierID($tblProduto['SupplierID']);
              $produto->setUnitPrice($tblProduto['UnitPrice']);
              
              $objCon->fecharConexao();
              return $produto;
          }          
     } 
     
     
     public function cadastrarProduto($produto) {
         $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlCadastro = "INSERT INTO products (ProductID, ProductName, SupplierID, CategoryID, "
                 . "QuantityPerUnit, UnitPrice, Discontinued) VALUES ('" . $produto->getProductID() .
                 "' , '" . $produto->getProductName() . "' , '" . $produto->getSupplierID() . 
                 "' , '" . $produto->getCategoryID() . "' , '" . $produto->getQuantityPerUnit() . 
                 "' , '" . $produto->getUnitPrice() . "', 0)";  
         
         mysqli_query($vCon, $sqlCadastro) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();
         
     }
     
     
     public function deletarProduto($produtoID) {
         $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlDelete = "DELETE FROM products WHERE ProductID = '$produtoID'";
         mysqli_query($vCon, $sqlDelete) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();
     }
     
     
     public function alterarProduto($idProduto, $objProduto) {
         $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $nome = $objProduto->getProductName();
         $catID = $objProduto->getCategoryID();
         $fornID = $objProduto->getSupplierID();
         $quant = $objProduto->getQuantityPerUnit();
         $preco = $objProduto->getUnitPrice();
         
         $sqlUpdate = "UPDATE products set ProductName = '$nome', CategoryID = '$catID', SupplierID = '$fornID', "
                 . "QuantityPerUnit = '$quant', UnitPrice = '$preco' WHERE ProductID = '$idProduto'";
         
         mysqli_query($vCon, $sqlUpdate) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();
     }
}

?>
