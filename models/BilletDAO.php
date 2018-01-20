<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 11:02
 */
require_once(PATH_MODELS.'DAO.php');
class BilletDAO extends DAO {
    public function getById($numBillet){
        require_once (PATH_ENTITY.'Billet.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($numBillet);
        // requete préparée
        $res = $this->queryRow('select * from billet where numBillet = ?', $param);

        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            $billet = new Billet(
                $res['numBillet'],
                $res['montant'],
                $res['codePromo'],
                $res['jourBillet'],
                $res['mailUser'],
                $res['numEmplacement']
            );

            return $billet;
        }
        return null;
    }

    public function getByDate($date){
        require_once (PATH_ENTITY.'Billet.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($date);
        // requete préparée
        $res = $this->queryAll('select * from billet where jourBillet = ?', $param);

        $tabBillets = array();
        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            for ($i=0; $i<count($res); $i++){
                $tabBillets[$i] = new Billet(
                    $res['numBillet'],
                    $res['montant'],
                    $res['codePromo'],
                    $res['jourBillet'],
                    $res['mailUser'],
                    $res['numEmplacement']);
            }
            return $tabBillets;
        }
        return null;
    }
    // méthode utile pour savoir si pour un emplacement à une date donnée il reste des places
    public function getByDateAndEmplacement($date, $emplacement){
        require_once (PATH_ENTITY.'Billet.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($date, $emplacement);
        // requete préparée
        $res = $this->queryAll('select * from billet where jourBillet = ? and numEmplacement = ?', $param);

        $tabBillets = array();
        // Si la requete est valide
        if ($res){
            // On crée une un objet Billet puis on le retourne
            for ($i=0; $i<count($res); $i++){
                $tabBillets[$i] = new Billet(
                    $res['numBillet'],
                    $res['montant'],
                    $res['codePromo'],
                    $res['jourBillet'],
                    $res['mailUser'],
                    $res['numEmplacement']);
            }
            return $tabBillets;
        }
        return null;
    }

    public function create($prix, $codepromo, $date, $mail, $numEmplacement){
        $param = array($prix, $codepromo, $date, $mail, $numEmplacement);
        $res = $this->addSupprRow('insert into billet (montant, codePromo, jourBillet, mailUser, numEmplacement) 
              VALUES (?, ?, ?, ?, ?)', $param);
        return $res;
    }

    public function delete($numBillet){
        $param = array($numBillet);
        $res = $this->addSupprRow('delete from billet WHERE numBillet = ?', $param);
        return $res;
    }
}