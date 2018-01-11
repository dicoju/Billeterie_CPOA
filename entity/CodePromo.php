<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 10:53
 */
class CodePromo{

    private $_valeurCode;
    private $_variationPrix;

    /**
     * CodePromo constructor.
     * @param $_valeurCode
     * @param $_variationPrix
     */
    public function __construct($_valeurCode, $_variationPrix)
    {
        $this->_valeurCode = $_valeurCode;
        $this->_variationPrix = $_variationPrix;
    }

    /**
     * @return mixed
     */
    public function getValeurCode()
    {
        return $this->_valeurCode;
    }

    /**
     * @param mixed $valeurCode
     */
    public function setValeurCode($valeurCode)
    {
        $this->_valeurCode = $valeurCode;
    }

    /**
     * @return mixed
     */
    public function getVariationPrix()
    {
        return $this->_variationPrix;
    }

    /**
     * @param mixed $variationPrix
     */
    public function setVariationPrix($variationPrix)
    {
        $this->_variationPrix = $variationPrix;
    }




}