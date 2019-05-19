<?php

/**
 * Description of Funcionarios
 *
 * @author Islan
 */
class Funcionarios {
    
    private $employeeID, $lastName, $firstName, $title, $birthDate, $address, $city, $country, $salary;
    
    
    // GETTTERS E SETTERS
    public function getEmployeeID() {
        return $this->employeeID;
    }
    
    public function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }
    
    public function getLastName() {
        return $this->lastName;
    }
    
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }
    
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getBirthDate() {
        return $this->birthDate;
    }
    
    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }
    
    public function getCity() {
        return $this->city;
    }
    
    public function setCity($city) {
        $this->city = $city;
    }
    
    public function getCountry() {
        return $this->country;
    }
    
    public function setCountry($country) {
        $this->country = $country;
    }
    
    public function getSalary() {
        return $this->salary;
    }
    
    public function setSalaray($salary) {
        $this->salary = $salary;
    }
    
}
