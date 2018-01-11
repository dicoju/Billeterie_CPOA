<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 10:54
 */
class Court{

    private $_numCourt;
    private $_nomCourt;
    private $_nbPlaces;

    /**
     * Court constructor.
     * @param $_numCourt
     * @param $_nomCourt
     * @param $_nbPlaces
     */
    public function __construct($_numCourt, $_nomCourt, $_nbPlaces)
    {
        $this->_numCourt = $_numCourt;
        $this->_nomCourt = $_nomCourt;
        $this->_nbPlaces = $_nbPlaces;
    }

    /**
     * @return mixed
     */
    public function getNumCourt()
    {
        return $this->_numCourt;
    }

    /**
     * @param mixed $numCourt
     */
    public function setNumCourt($numCourt)
    {
        $this->_numCourt = $numCourt;
    }

    /**
     * @return mixed
     */
    public function getNomCourt()
    {
        return $this->_nomCourt;
    }

    /**
     * @param mixed $nomCourt
     */
    public function setNomCourt($nomCourt)
    {
        $this->_nomCourt = $nomCourt;
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


}