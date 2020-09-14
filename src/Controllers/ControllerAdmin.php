<?php

use \P5_Blog\src\Models\Manager\PostsManager;
use \P5_Blog\src\Models\Entity\Post;
use \P5_Blog\src\Blog\Configuration;

require_once 'ControllerSecured.php';

/** Controleur des actions d'administration. Hérite de ControllerSecured afin de vérifier l'authentification */
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
