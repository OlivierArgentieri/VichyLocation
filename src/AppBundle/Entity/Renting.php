<?php

namespace AppBundle\Entity;

/**
 * Renting
 */
class Renting
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $begginDate;

    /**
     * @var \DateTime
     */
    private $endDate;

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
     * Set begginDate
     *
     * @param \DateTime $begginDate
     *
     * @return Renting
     */
    public function setBegginDate($begginDate)
    {
        $this->begginDate = $begginDate;

        return $this;
    }

    /**
     * Get begginDate
     *
     * @return \DateTime
     */
    public function getBegginDate()
    {
        return $this->begginDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Renting
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set flat
     *
     * @param Flat $flat
     *
     * @return Renting
     */
    public function setFlat($flat)
    {
        $this->endDate = $flat;

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

