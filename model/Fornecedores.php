<?php

/**
 * Description of Fornecedores
 *
 * @author Islan
 */

class Fornecedores {
    
    private $supplierID, $companyName, $contactName, $contactTitle, $address, $city, $region, $postalCode, $country, $phone, $fax, $homePage;
    
    
    //GETTERS E SETTERS
    function getSupplierID() {
        return $this->supplierID;
    }
    
    function setSupplierID($supplierID) {
        $this->supplierID = $supplierID;
    }
    
    function getCompanyName() {
        return $this->companyName;
    }
    
    function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }
    
    function getContactName() {
        return $this->contactName;
    }
    
    function setContactName($contactName) {
        $this->contactName = $contactName;
    }
    
    function getContactTitle() {
        return $this->contactTitle;
    }
    
    function setContactTitle($contactTitle) {
        $this->contactTitle = $contactTitle;
    }
    
    function getAddress() {
        return $this->address;
    }
    
    function setAddress($address) {
        $this->address = $address;
    }
    
    function getCity() {
        return $this->city;
    }
    
    function setCity($city) {
        $this->city = $city;
    }
    
    function getRegion() {
        return $this->region;
    }
    
    function setRegion($region) {
        $this->region = $region;
    }
    
    function getPostalCode() {
        return $this->postalCode;
    }
    
    function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    function getCountry() {
        return $this->country;
    }
    
    function setCountry($country) {
        $this->country = $country;
    }
    
    function getPhone() {
        return $this->phone;
    }
    
    function setPhone($phone) {
        $this->phone = $phone;
    }
    
    function getFax() {
        return $this->fax;
    }
    
    function setFax($fax) {
        $this->fax = $fax;
    }
    
    function getHomePage() {
        return $this->homePage;
    }
    
    function setHomePage($homePge) {
        $this->homePage = $homePge;
    }
    
}


?>
