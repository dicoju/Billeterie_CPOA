<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 20/10/2017
 * Time: 14:19
 */
class User
{
    private $_num;
    private $_prenom;
    private $_nom;
    private $_mail;
    private $_adresse;

    /**
     * User constructor.
     * @param $_num
     * @param $_prenom
     * @param $_nom
     * @param $_mail
     * @param $_adresse
     */
    public function __construct($_num, $_prenom, $_nom, $_mail, $_adresse)
    {
        $this->_num = $_num;
        $this->_prenom = $_prenom;
        $this->_nom = $_nom;
        $this->_mail = $_mail;
        $this->_adresse = $_adresse;
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->_num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->_num = $num;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->_mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->_mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->_adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->_adresse = $adresse;
    }



}