<?php

namespace Models\Entity;

use \Blog\Entity;

class Comment extends Entity
{
    private $id;
    private $title;
    private $content;
    private $valid;
    private $dateCreation;
    private $dateUpdate;
    private $userId;
    private $postId;

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getContent() { return $this->content; }
    public function getValid() { return $this->valid; }
    public function getDateCreation() { return $this->dateCreation; }
    public function getDateupdate() { return $this->dateUpdate; }
    public function getUserId() { return $this->userId; }
    public function getPostId() { return $this->postId; }

    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    public function setContent($content) { $this->content = $content; }
    public function setValid($valid) { $this->valid = $valid; }
    public function setDateCreation($dateCreation) { $this->dateCreation = $dateCreation; }
    public function setDateUpdate($dateUpdate) { $this->dateUpdate = $dateUpdate; }
    public function setUserId($userId) { $this->userId = $userId; }
    public function setPostId($postId) { $this->postId = $postId; }
}
