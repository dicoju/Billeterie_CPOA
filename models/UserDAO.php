<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 20/10/2017
 * Time: 14:23
 */

require_once(PATH_MODELS.'DAO.php');

class UserDAO extends DAO
{
    public function get($userName){
        require_once (PATH_ENTITY.'User.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($userName);
        // requete préparée
        $res = $this->queryRow('select * from user where numUser = ?', $param);

        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            $user = new User(
                $res['numUser'],
                $res['prenom'],
                $res['nom'],
                $res['mail'],
                $res['adresse']
            );

            return $user;
        }
        return null;
    }

    public function create($prenom, $nom, $mail, $adresse){
        $param = array($prenom, $nom, $mail, $adresse);
        $res = $this->addSupprRow('insert into user (prenom, nom, mail, adresse) VALUES (?, ?, ?, ?)', $param);
        return $res;
    }

    public function delete($numUser){
        $param = array($numUser);
        $res = $this->addSupprRow('delete from user WHERE numUser = ?', $param);
        return $res;
    }
}