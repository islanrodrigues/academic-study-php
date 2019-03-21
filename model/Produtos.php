<?php

/**
 * Description of Produtos
 *
 * @author Galvão
 */
class Produtos {
    
    private $productID, $productName, $supplierID, $categoryID, $quantityPerUnit, $uniPrice, $categoria, $fornecedor;
    
    
      // GETTERS E SETTERS
    function getProductID() {
        return $this->productID;
    }
    
    function setProductID($productID) {
        $this->productID = $productID;
    }
    

    function getProductName() {
        return $this->productName;
    }
    
    function setProductName($productName) {
        $this->productName = $productName;
    }
    

    function getSupplierID() {
        return $this->supplierID;
    }
    
    function setSupplierID($supplierID) {
        $this->supplierID = $supplierID;
    }
    

    function getCategoryID() {
        return $this->categoryID;
    }
    
    function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }
    

    function getQuantityPerUnit() {
        return $this->quantityPerUnit;
    }
    
    function setQuantityPerUnit($quantityPerUnit) {
        $this->quantityPerUnit = $quantityPerUnit;
    }
    

    function getUniPrice() {
        return $this->uniPrice;
    }    

    function setUniPrice($uniPrice) {
        $this->uniPrice = $uniPrice;
    }
    
    function getCategoria() {
        return $this->categoria;
    }    

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    function getFornecedor() {
        return $this->fornecedor;
    }    

    function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }
}

?>
