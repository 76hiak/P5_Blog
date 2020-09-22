<?php

use \Manager\PostsManager;
use \Manager\UsersManager;
use \Manager\CommentsManager;
use \Models\Entity\Post;
use \Models\Entity\User;
use \Models\Entity\Comment;
use \Blog\Configuration;

require_once 'ControllerSecured.php';

/** Contrôleur des actions d'administration. Hérite de ControllerSecured afin de vérifier l'authentification */
class ControllerAdmin
{
    private $postsManager;
    
    private $errorMessage = "";
    private $successMessage = "";
    
    public function __construct()
    {
        $this->postsManager = new PostsManager();
    }
    
    
    public function addPost()
    {
        $title = $this->request->getParameter("title");
        $chapo = $this->request->getParameter("chapo");
        $userId = $this->request->getSession()->getAttribute("userId");
        $content = $this->request->getParameter("content");
        
        // Création d'un nouvel objet Post
        $post = new Post(array(
            'title' => $title, 
            'chapo' => $chapo, 
            'content' => $content, 
            'dateCreation' => date('Y-m-d H:i:s'), 
            'userId' => $userId
        ));
        // Ajout de l'objet Post dans la base de données
        $this->postsManager->add($post);
        
        // Exécution de l'action par défaut pour réafficher le menu d'administration
        $this->successMessage = "Post publié avec succès !";
        
    }
    
 
}
