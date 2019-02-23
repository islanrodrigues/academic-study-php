<?php

/**
 * Description of Usuarios
 *
 * @author Galvão
 */
class Usuarios {
    
    private $username, $password, $permission;
    
    
    // GETTERS E SETTERS
    function getUsername() {
        return $this->username;
    }
    
    function setUsername($username) {
        $this->username = $username;
    }

    function getPassword() {
        return $this->password;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }

    function getPermission() {
        return $this->permission;
    }
    

    function setPermission($permission) {
        $this->permission = $permission;
    }

}

?>
