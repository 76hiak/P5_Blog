<?php

namespace Manager;

use \Blog\Model;
use \Models\Entity\User;

class UsersManager extends Model
{
    public function login($username, $password)
    {
        $sql = "SELECT id, password FROM user WHERE username = ?";
        $user = $this->executeRequest($sql, array($username));
        if($user->rowCount() == 1)
        {
            $user = $user->fetch(\PDO::FETCH_ASSOC);
            // Renvoie vrai si le mdp correspond
            return (password_verify($password, $user['password']));
        }
    }
    
    public function getList()
    {
        $sql = 'SELECT id, username, email, password, activated, user_role, date_creation FROM user ORDER BY date_creation DESC';
        $users = $this->executeRequest($sql);

        $usersTab = [];
        while ($data = $users->fetch(\PDO::FETCH_ASSOC)) // Tant qu'il y a des lignes qui doivent être fetch, les placer dans $data.
        {
            $usersTab[] = new User($data); // Ajouter un nouvel objet User crée à partir des données dans le tableau $usersTab
        }

        return $usersTab; // Renvoie un tableau d'objet User
    }
    
    /**
     * Renvoie un objet User qui existe dans la base de données.
     * 
     * @param int $id
     * @throws \Exception Si aucune identifiant ne correspond un utilisateur dans la base de données
     * @return User
     */
    public function get($id)
    {
        $sql = 'SELECT id, username, email, password, activated, user_role, date_creation FROM user WHERE id = ?';
        $user = $this->executeRequest($sql, array($id));
        
        if ($user->rowCount() == 1)
        {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond à l'identifiant '$id'");
        }
    }
    
    public function getByUsername($username)
    {
        $sql = 'SELECT id, username, email, password, activated, user_role, date_creation FROM user WHERE username = ?';
        $user = $this->executeRequest($sql, array($username));

        if ($user->rowCount() == 1)
        {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond au username '$username'");
        }
    }
    
    public function getByEmail($email)
    {
        $sql = 'SELECT id, username, email, password, activated, user_role, date_creation FROM user WHERE email = ?';
        $user = $this->executeRequest($sql, array($email));
        
        if ($user->rowCount() == 1)
        {
            $data = $user->fetch(\PDO::FETCH_ASSOC);
            return new User($data);
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond à l'email '$email'");
        }
    }

    public function add(User $user)
    {
        $sql = 'INSERT INTO user(username, email, password, activated, user_role, date_creation) VALUES(?, ?, ?, ?, ?, ?)';
        $this->executeRequest($sql, array($user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getActivated(), $user->getUserRole(), $user->getDateCreation() ));
    }

    public function delete(User $user)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->executeRequest($sql, array($user->getId() ));
    }

    public function update(User $user)
    {
        $sql = 'UPDATE user SET username = ?, email = ?, password = ?, activated = ?, user_role = ?, date_creation = ? WHERE id = ?';
        $this->executeRequest($sql, array($user->getUsername(), $user->getEmail(), $user->getPassword(), $user->getActivated(), $user->getUserRole(), $user->getDateCreation(), $user->getId() ));
    }
}
