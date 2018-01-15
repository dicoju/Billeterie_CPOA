<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 08/01/2018
 * Time: 10:50
 */
class Billet{
    private $_numBillet;
    private $_prixBilletInitial;
    private $_codePromo;
    private $_dateBillet;
    private $_numUser;
    private $_numEmplacement;

    /**
     * Billet constructor.
     * @param $_numBillet
     * @param $_prixBilletInitial
     * @param $_codePromo
     * @param $_dateBillet
     * @param $_numUser
     * @param $_numEmplacement
     */
    public function __construct($_numBillet, $_prixBilletInitial, $_codePromo, $_dateBillet, $_numUser, $_numEmplacement)
    {
        $this->_numBillet = $_numBillet;
        $this->_prixBilletInitial = $_prixBilletInitial;
        $this->_codePromo = $_codePromo;
        $this->_dateBillet = $_dateBillet;
        $this->_numUser = $_numUser;
        $this->_numEmplacement = $_numEmplacement;
    }

    /**
     * @return mixed
     */
    public function getNumBillet()
    {
        return $this->_numBillet;
    }

    /**
     * @param mixed $numBillet
     */
    public function setNumBillet($numBillet)
    {
        $this->_numBillet = $numBillet;
    }

    /**
     * @return mixed
     */
    public function getPrixBilletInitial()
    {
        return $this->_prixBilletInitial;
    }

    /**
     * @param mixed $prixBilletInitial
     */
    public function setPrixBilletInitial($prixBilletInitial)
    {
        $this->_prixBilletInitial = $prixBilletInitial;
    }

    /**
     * @return mixed
     */
    public function getCodePromo()
    {
        return $this->_codePromo;
    }

    /**
     * @param mixed $codePromo
     */
    public function setCodePromo($codePromo)
    {
        $this->_codePromo = $codePromo;
    }

    /**
     * @return mixed
     */
    public function getDateBillet()
    {
        return $this->_dateBillet;
    }

    /**
     * @param mixed $dateBillet
     */
    public function setDateBillet($dateBillet)
    {
        $this->_dateBillet = $dateBillet;
    }

    /**
     * @return mixed
     */
    public function getNumUser()
    {
        return $this->_numUser;
    }

    /**
     * @param mixed $numUser
     */
    public function setNumUser($numUser)
    {
        $this->_numUser = $numUser;
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

}