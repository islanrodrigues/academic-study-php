<?php

/**
 * Description of CategoriasDAO
 *
 * @author Islan
 */

require_once '../model/Categorias.php';
require_once 'ConexaoDAO.php';

class CategoriasDAO {
    
    public function listarCategorias($tipo, $nomeFiltro) {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $categorias = new ArrayObject();
        
        //LISTAR TODAS AS CATEGORIAS
        if ($tipo == 0) {
            $sqlCategorias = "SELECT * FROM categories ORDER BY CategoryID";        
            $rsCategorias = mysqli_query($vCon, $sqlCategorias) or die(mysqli_error($vCon));
            
        // LISTAR CATEGORIAS POR UM FILTRO DE NOME
        } else if ($tipo == 1) {
           $sqlCategorias = "SELECT * FROM categories WHERE CategoryName LIKE '%$nomeFiltro%' ORDER BY CategoryID";        
            $rsCategorias = mysqli_query($vCon, $sqlCategorias) or die(mysqli_error($vCon)); 
        }
        
        
        while ($tbLista = mysqli_fetch_array($rsCategorias)) {
            
            $categoria = new Categorias();
            
            $categoria->setCategoryID($tbLista['CategoryID']);
            $categoria->setCategoryName($tbLista['CategoryName']);
            $categoria->setDescription($tbLista['Description']);
            $categoria->setPicture($tbLista['Picture']);
            
            $categorias->append($categoria);        
        }
    
    $objCon->fecharConexao();
    
    return $categorias;    
    }
    
    
    public function cadastrarCategoria($categoria) {
        $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlCadastro = "INSERT INTO categories (CategoryID, CategoryName, Description, Picture) "
                 . " VALUES ('" . $categoria->getCategoryID() . "' , '" . 
                 $categoria->getCategoryName() . "' , '" . 
                 $categoria->getDescription() . "' , 'NULL')";  
         
         mysqli_query($vCon, $sqlCadastro) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();         
    }
    
    
    public function deletarCategoria($categoriaID) {
         $objCon = new ConexaoDAO();
         $vCon = $objCon->abrirConexao();
         
         $sqlDelete = "DELETE FROM categories WHERE CategoryID = '$categoriaID'";
         mysqli_query($vCon, $sqlDelete) or die(mysqli_error($vCon));
         
         $objCon->fecharConexao();
     }

     
    public function visualizarProduto($categoriaID) {
          $objCon = new ConexaoDAO();
          $vConn = $objCon->abrirConexao();
          
          $categoria = new Categorias();
          
          $sqlCategoria = "SELECT * FROM categories WHERE CategoryID = '$categoriaID'";
          $rsCategoria = mysqli_query($vConn, $sqlCategoria) or die (mysqli_error($vConn));
          
          if (mysqli_num_rows($rsCategoria) == 0) {              
              $objCon->fecharConexao();              
              return null;
          
          } else {                           
              $tblCategoria= mysqli_fetch_array($rsCategoria); 
              
              $categoria->setCategoryID($tblCategoria['CategoryID']);
              $categoria->setCategoryName($tblCategoria['CategoryName']);
              $categoria->setDescription($tblCategoria['Description']);
              $categoria->setPicture($tblCategoria['Picture']);
              
              $objCon->fecharConexao();
              return $categoria;
          }          
     } 
}

?>
