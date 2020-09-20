<?php

namespace Models\Entity;

use \P5_Blog\src\Blog\Entity;

class Post extends Entity
{
    private $id;
    private $title;
    private $chapo;
    private $content;
    private $dateCreation;
    private $dateUpdate;
    private $userId;

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getChapo() { return $this->chapo; }
    public function getContent() { return $this->content; }    
    public function getDateCreation() { return $this->dateCreation; }
    public function getDateUpdate() { return $this->dateUpdate; }
	public function getUserId() { return $this->userId; }	

    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    public function setChapo($chapo) { $this->chapo = $chapo; }
    public function setContent($content) { $this->content = $content; }
    public function setDateCreation($dateCreation) { $this->dateCreation = $dateCreation; }
    public function setDateUpdate($dateUpdate) { $this->dateUpdate = $dateUpdate; }
    public function setUserId($userId) { $this->userId = $userId; }
}
