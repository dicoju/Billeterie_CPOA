<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 11:27
 */
require_once(PATH_MODELS.'DAO.php');
class CourtDAO extends DAO{

    public function get($numCourt){
        require_once (PATH_ENTITY.'Court.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($numCourt);
        // requete préparée
        $res = $this->queryRow('select * from court where numCourt = ?', $param);

        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            $court = new Court(
                $res['numCourt'],
                $res['nomCourt'],
                $res['nbPlaces']
            );
            return $court;
        }
        return null;
    }

    public function getAll(){
        require_once (PATH_ENTITY.'Court.php');

        $res = $this->queryAll('select * from court');
        $tabCourt = array();
        if ($res){
            for ($i = 0; $i < count($res); $i++){
                $tabCourt[$i] = new Court(
                    $res[$i]['numCourt'],
                    $res[$i]['nomCourt'],
                    $res[$i]['nbPlaces']);
            }
            return $tabCourt;
        }
        return null;
    }

    public function create($nomCourt, $nbPlaces){
        $param = array($nomCourt, $nbPlaces);
        $res = $this->addSupprRow('insert into court (nomCourt, nbPlaces) VALUES (?, ?)', $param);
        return $res;
    }

    public function delete($numCourt){
        $param = array($numCourt);
        $res = $this->addSupprRow('delete from court WHERE numCourt = ?', $param);
        return $res;
    }


}