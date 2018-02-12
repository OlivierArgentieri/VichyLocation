<?php

namespace AppBundle\Entity;

/**
 * Image
 */
class Image
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    /**
     * @var Flat
     */
    private $flat;


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
     * Set name
     *
     * @param string $name
     *
     * @return Image
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set flat
     *
     * @param Flat $flat
     *
     * @return Image
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;

        return $this;
    }

    /**
     * Get Flat
     *
     * @return flat
     */
    public function getFlat()
    {
        return $this->flat;
    }
}

