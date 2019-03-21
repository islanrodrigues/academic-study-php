<?php

/**
 * Description of CategoriasDAO
 *
 * @author Islan
 */

require_once 'model/Categorias.php';
require_once 'dao/ConexaoDAO.php';

class CategoriasDAO {
    
    public function listarCategorias() {
        $objCon = new ConexaoDAO();
        $vCon = $objCon->abrirConexao();
        
        $categorias = new ArrayObject();
        
        $sqlCategorias = "SELECT * FROM categories";
        
        $rsCategorias = mysqli_query($vCon, $sqlCategorias) or die(mysqli_error($vCon));
        
        while ($tbLista = mysql_fetch_array($rsCategorias)) {
            
            $categoria = new Categorias();
            
            $categoria->setCategoryID($tbLista['CategoryID']);
            $categoria->setCategoryName($tbLista['CategoryName']);
            $categoria->setDescription($tbLista['Description']);
            
            $categorias->append($categoria);        
        }
    
    $objCon->fecharConexao();
    
    return $categorias;    
    }

}

?>
