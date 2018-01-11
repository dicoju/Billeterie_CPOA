<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 10:52
 */
class CategoriePlace{

    private $_numEmplacement;
    private $_nomEmplacement;
    private $_variationPrixEmplacement;
    private $_nbPlaces;
    private $prixCalc;

    /**
     * CategoriePlace constructor.
     * @param $_numEmplacement
     * @param $_nomEmplacement
     * @param $_variationPrixEmplacement
     * @param $_nbPlaces
     */
    public function __construct($_numEmplacement, $_nomEmplacement, $_variationPrixEmplacement, $_nbPlaces)
    {
        $this->_numEmplacement = $_numEmplacement;
        $this->_nomEmplacement = $_nomEmplacement;
        $this->_variationPrixEmplacement = $_variationPrixEmplacement;
        $this->_nbPlaces = $_nbPlaces;
    }

    /**
     * @return mixed
     */
    public function getNumEmplacement()
    {
        return $this->_numEmplacement;
    }

    /**
     * @param mixed $numEmplacement
     */
    public function setNumEmplacement($numEmplacement)
    {
        $this->_numEmplacement = $numEmplacement;
    }

    /**
     * @return mixed
     */
    public function getNomEmplacement()
    {
        return $this->_nomEmplacement;
    }

    /**
     * @param mixed $nomEmplacement
     */
    public function setNomEmplacement($nomEmplacement)
    {
        $this->_nomEmplacement = $nomEmplacement;
    }

    /**
     * @return mixed
     */
    public function getVariationPrixEmplacement()
    {
        return $this->_variationPrixEmplacement;
    }

    /**
     * @param mixed $variationPrixEmplacement
     */
    public function setVariationPrixEmplacement($variationPrixEmplacement)
    {
        $this->_variationPrixEmplacement = $variationPrixEmplacement;
    }

    /**
     * @return mixed
     */
    public function getNbPlaces()
    {
        return $this->_nbPlaces;
    }

    /**
     * @param mixed $nbPlaces
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->_nbPlaces = $nbPlaces;
    }

    /**
     * @return mixed
     */
    public function getPrixCalc()
    {
        return $this->prixCalc;
    }

    /**
     * @param mixed $prixCalc
     */
    public function setPrixCalc($prixCalc)
    {
        $this->prixCalc = $prixCalc;
    }





}