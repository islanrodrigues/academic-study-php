<?php

/**
 * Description of ProdutosDAO
 *
 * @author Galvão
 */

require_once 'Produtos.php';
require_once 'ConexaoDAO.php';

class ProdutosDAO {
    
     public function listarProdutos() {       
        $objCon = new ConexaoDAO();
        $vConn = $objCon->abrirConexao();
        
        // implementar método de listagem de produtos             
     }
    
}

?>
