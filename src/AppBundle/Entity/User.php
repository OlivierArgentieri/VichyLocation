<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as FosUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * FosUser
 */
class User extends FosUser
{
    /**
     * @var int
     */
    protected $id;


    /**
     * @var string
     */
    protected $email;


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        parent::setUsername($username);

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return parent::getUsername();
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        parent::setEmail($email);

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return parent::getEmail();
    }






    public function __toString(){
        return $this->getUserName();
    }
}

