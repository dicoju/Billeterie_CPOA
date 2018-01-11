<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 11:23
 */
require_once(PATH_MODELS.'DAO.php');

class CategoriePlaceDAO extends DAO {

    public function get($numEmplacement){
        require_once (PATH_ENTITY.'CategoriePlace.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($numEmplacement);
        // requete préparée
        $res = $this->queryRow('select * from categoriePlace where numEmplacement = ?', $param);

        // Si la requete est valide
        if ($res){
            $emplacement = new CategoriePlace(
                $res['numEmplacement'],
                $res['nomEmplacement'],
                $res['variationPrixEmplacement'],
                $res['nbPlaces']
            );

            return $emplacement;
        }
        return null;
    }



    public function getAll(){
        require_once (PATH_ENTITY.'CategoriePlace.php');

        $res = $this->queryAll('select * from categoriePlace');

        $tabEmplacement = array();
        if ($res){
            for ($i = 0; $i < count($res); $i++){
                $tabEmplacement[$i] = new CategoriePlace(
                    $res[$i]['numEmplacement'],
                    $res[$i]['nomEmplacement'],
                    $res[$i]['variationPrixEmplacement'],
                    $res[$i]['nbPlaces']);
            }
            return $tabEmplacement;
        }
        return null;
    }




    public function create($nomEmplacement, $varPrixEmplacement, $nbPlaces){
        $param = array($nomEmplacement, $varPrixEmplacement, $nbPlaces);
        $res = $this->addSupprRow('insert into categoriePlace (nomEmplacement, variationPrixEmplacement, nbPlaces) VALUES (?, ?, ?)', $param);
        return $res;
    }

    public function delete($numEmplacement){
        $param = array($numEmplacement);
        $res = $this->addSupprRow('delete from categoriePlace WHERE numEmplacement = ?', $param);
        return $res;
    }

}