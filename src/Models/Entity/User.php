<?php

namespace P5_Blog\src\Models\Entity;

use \P5_Blog\src\Blog\Entity;

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
    private $dateCreation;
    private $dateUpdate;
    private $userRole;

    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getActivated() { return $this->activated; }
	public function getUserRole() { return $this->userRole; }
	public function getUserTypeString(): string
	{
	    return self::USERROLE[$this->userRole];
	}
	public function getDateCreation() { return $this->dateCreation; }
	
	public function getFormattedDateCreation() { return $this->getFormattedDateTime($this->dateCreation); }
	
    public function setId($id) { $this->id = $id; }
    public function setUsername($username) { $this->username = $username; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setActivated($activated) { $this->activated = $activated; }
    public function setUserRole($userRole) { $this->userRole = $userRole; }
    public function setDateCreation($dateCreation) { $this->dateCreation = $dateCreation; }
    public function setDateUpdate($dateUpdate) { $this->dateUpdate = $dateUpdate; }
}
