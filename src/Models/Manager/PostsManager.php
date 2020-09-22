<?php

namespace Manager;

use \Blog\Model;
use \Models\Entity\Post;

class PostsManager extends Model
{
    /**
     * 
     * @return array|Post
     */
    public function getList()
    {
        $sql = 'SELECT post.id, title, chapo, content, post.date_creation, post.date_update, user_id FROM post ORDER BY date_creation DESC';
        $posts = $this->executeRequest($sql);
        $postsTab = [];
        while ($data = $posts->fetch(\PDO::FETCH_ASSOC))
        {
            array_push($postsTab, new Post($data));
        }
        return $postsTab;
    }
    
    public function get($idPost)
    {
        $sql = 'SELECT post.id, title, chapo, content, post.date_creation, post.date_update, user_id FROM post WHERE post.id = ?';
        $post = $this->executeRequest($sql, array($idPost));

        if ($post->rowCount() == 1)
        {
            $data = $post->fetch(\PDO::FETCH_ASSOC); // Récupération du résultat de la requête dans un tableau associatif.
            return new Post($data); // Renvoie un objet Post créé à partir des données.
        }
        else
        {
            throw new \Exception("Aucun post ne correspond à l'identifiant '$idPost'");
        }
    }

    public function add(Post $post)
    {
        $sql = 'INSERT INTO post(title, chapo, content, date_creation, user_id) VALUES(?, ?, ?, ?, ?)';
        $this->executeRequest($sql, array($post->getTitle(), $post->getChapo(), $post->getContent(), $post->getDateCreation(), $post->getUserId() ));
    }

    public function delete(Post $post)
    {
        $sql = 'DELETE FROM post WHERE id = ?';
        $this->executeRequest($sql, array($post->getId() ));
    }

    public function update(Post $post)
    {
        $sql = 'UPDATE post SET title = ?, chapo = ?, content = ? WHERE id = ?';
        $this->executeRequest($sql, array($post->getTitle(), $post->getChapo(), $post->getContent(), $post->getId() ));
    }
    
    /** Renvoie le nombre de posts du site */
    public function count()
    {
        $sql = 'SELECT COUNT(*) as numberPosts FROM post';
        $result = $this->executeRequest($sql);
        $line = $result->fetch(); // Résultat comporte toujours une ligne
        
        return $line['numberPosts'];
    }
}
