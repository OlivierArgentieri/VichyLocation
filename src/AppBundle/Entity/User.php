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


}

