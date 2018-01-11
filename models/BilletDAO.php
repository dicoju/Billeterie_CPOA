<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 11:02
 */
require_once(PATH_MODELS.'DAO.php');
class BilletDAO extends DAO {
    public function get($numBillet){
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
                $res['prixBilletInitial'],
                $res['codePromo'],
                $res['dateBillet'],
                $res['numUser'],
                $res['numEmplacement']
            );

            return $billet;
        }
        return null;
    }

    public function create($prixInitial, $codepromo, $date, $numUser, $numEmplacement){
        $param = array($prixInitial, $codepromo, $date, $numUser, $numEmplacement);
        $res = $this->addSupprRow('insert into billet (prixBilletInitial, codePromo, dateBillet, numUser, numEmplacement) VALUES (?, ?, ?, ?, ?)', $param);
        return $res;
    }

    public function delete($numBillet){
        $param = array($numBillet);
        $res = $this->addSupprRow('delete from billet WHERE numBillet = ?', $param);
        return $res;
    }
}