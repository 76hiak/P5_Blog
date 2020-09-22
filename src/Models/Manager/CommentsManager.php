<?php

namespace Manager;

use \Blog\Model;
use \Models\Entity\Comment;

class CommentsManager extends Model
{
    public function getList($idPost)
    {
        $sql = 'SELECT comment.id, comment.title, comment.content, valid, comment.date_creation, comment.date_update, user_id, post_id FROM comment WHERE post_id = ? AND valid = 1 ORDER BY comment.date_creation DESC';
        $comments = $this->executeRequest($sql, array($idPost));

        $commentsTab = [];
        while ($data = $comments->fetch(\PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent être fetch, les placer dans $data.
        {
            $commentsTab[] = new Comment($data); // Ajouter un nouvel objet Comment crée à partir des données dans le tableau $commentsTab
        }

        return $commentsTab; // Renvoie un tableau d'objet Comment
    }
    
    public function getDisabledList()
    {
        $sql = 'SELECT comment.id, comment.title, comment.content, valid, comment.date_creation, comment.date_update, user_id, post_id FROM comment WHERE valid = 0 ORDER BY comment.date_creation DESC';
        $comments = $this->executeRequest($sql, array());
        
        $commentsTab = [];
        while ($data = $comments->fetch(\PDO::FETCH_ASSOC)) // Tant qu'il y'a des lignes qui doivent être fetch, les placer dans $data.
        {
            $commentsTab[] = new Comment($data); // Ajouter un nouvel objet Comment crée à partir des données dans le tableau $commentsTab
        }
        
        return $commentsTab; // Renvoie un tableau d'objet Comment
    }

    public function get($id)
    {
        $sql = 'SELECT comment.id, comment.title, comment.content, valid, comment.date_creation, comment.date_update, user_id, post_id FROM comment WHERE comment.id = ?';
        $comment = $this->executeRequest($sql, array($id));

        if ($comment->rowCount() > 0)
        {
            $data = $comment->fetch(\PDO::FETCH_ASSOC);
            return new Comment($data);
        }
        else
        {
            throw new \Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
        }
    }

    public function add(Comment $comment)
    {
        $sql = 'INSERT INTO comment(title, content, valid, date_creation, date_update, user_id, post_id) VALUES(?, ?, ?, ?, ?, ?, ?)';
        $this->executeRequest($sql, array($comment->getTitle(), $comment->getContent(), $comment->getValid(), $comment->getDateCreation(), $comment->getDateUpdate(), $comment->getUserId(), $comment->getPostId() ));
    }

    public function delete(Comment $comment)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->executeRequest($sql, array($comment->getId() ));
    }

    public function update(Comment $comment)
    {
        $sql = 'UPDATE comment SET title = ?, content = ?, valid = ?, date_creation = ?, date_update = ?, user_id = ?, post_id = ? WHERE id = ?';
        $this->executeRequest($sql, array($comment->getTitle(), $comment->getContent(), $comment->getValid(), $comment->getDateCreation(), $comment->getDateUpdate(), $comment->getUserId(), $comment->getPostId(), $comment->getId() ));
    }
}