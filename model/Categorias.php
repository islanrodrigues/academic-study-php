<?php

/**
 * Description of Categorias
 *
 * @author Islan
 */

class Categorias {
 
    private $categoryID, $categoryName, $description;
    
    //GETTERS E SETTERS
    function getCategoryID() {
        return $this->categoryID;
    }
    
    function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }
    
    function getCategoryame() {
        return $this->categoryName;
    }
    
    function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }
    
    function getDescription() {
        return $this->description;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }
}

?>