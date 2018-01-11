<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 11:12
 */
require_once(PATH_MODELS.'DAO.php');
class CodePromoDAO extends DAO{

    public function get($valCode){
        require_once (PATH_ENTITY.'CodePromo.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($valCode);
        // requete préparée
        $res = $this->queryRow('select * from codePromo where valeurCode = ?', $param);

        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            $code = new CodePromo(
                $res['valeurCode'],
                $res['variationPrix']
            );

            return $code;
        }
        return null;
    }

    public function getAll(){
        require_once (PATH_ENTITY.'CodePromo.php');

        $res = $this->queryAll('select * from codePromo');

        $tabCodePromo = array();
        if ($res){
            for ($i = 0; $i < count($res); $i++){
                $tabCodePromo[$i] = new CodePromo(
                    $res[$i]['valeurCode'],
                    $res[$i]['variationPrix']);
            }
            return $tabCodePromo;
        }
        return null;
    }

    public function create($valeurCode, $variationPrix){
        $param = array($valeurCode, $variationPrix);
        $res = $this->addSupprRow('insert into codePromo (valeurCode, variationPrix) VALUES (?, ?)', $param);
        return $res;
    }

    public function delete($valeurCode){
        $param = array($valeurCode);
        $res = $this->addSupprRow('delete from codePromo WHERE valeurCode = ?', $param);
        return $res;
    }

}