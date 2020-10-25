<?php

namespace Entity;

use \Blog\Entity;

class User extends Entity
{
    const USERROLE = [
        1 => 'Membre',
        2 => 'Admin'
    ];

    private $id;
    private $username;
    private $email;
    private $password;
    private $activated;
    private $validationKey;
    private $dateCreation;
    private $dateUpdate;
    private $userRole;

    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getActivated() { return $this->activated; }
    public function getValidationKey() { return $this->validationKey; }
    public function getUserRole() { return $this->userRole; }
	public function getDateCreation() { return $this->dateCreation; }
	public function getFormattedDateCreation() { return $this->getFormattedDateTime($this->dateCreation); }
    public function getDateUpdate() { return $this->dateUpdate; }
    public function getFormattedDateUpdate() { return $this->getFormattedDateTime($this->dateUpdate); }
	
    public function setId($id) { $this->id = $id; }
    public function setUsername($username) { $this->username = $username; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setActivated($activated) { $this->activated = $activated; }
    public function setValidationKey($validationKey) { $this->validationKey = $validationKey; }
    public function setUserRole($userRole) { $this->userRole = $userRole; }
    public function setDateCreation($dateCreation) { $this->dateCreation = $dateCreation; }
    public function setDateUpdate($dateUpdate) { $this->dateUpdate = $dateUpdate; }
}
