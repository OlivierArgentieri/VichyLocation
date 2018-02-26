<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Flat
 */
class Flat
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
    private $address;

    /**
     * @var int
     */
    private $floor;

    /**
     * @var string
     */
    private $orientation;

    /**
     * @var string
     */
    private $area;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $rent;

    /**
     * @var float
     */
    private $charges;

    /**
     * @var string
     */
    private $energyClass;

    /**
     * @var string
     */
    private $greenHouseGasEmission;

    /**
     * @var bool
     */
    private $furnished;

    /**
     * @var int
     */
    private $numberOfRooms;

    /**
     * @var bool
     */
    private $hasTv;

    /**
     * @var bool
     */
    private $hasWashingMachine;

    /**
     * @var bool
     */
    private $isPetsAllowed;

    /**
     * @var bool
     */
    private $hasInternet;

    /**
     * @var bool
     */
    private $hasParking;

    /**
     * @var ArrayCollection<Renting>
     */
    private $locations;

    /**
     * @var Image
     * @Assert\NotBlank(message="entrer au moins 1 photo")
     * @Assert\Image()
     */
    private $images;


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
     * @return Flat
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
     * Set address
     *
     * @param string $address
     *
     * @return Flat
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     *
     * @return Flat
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return int
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set orientation
     *
     * @param string $orientation
     *
     * @return Flat
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set area
     *
     * @param string $area
     *
     * @return Flat
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Flat
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set rent
     *
     * @param float $rent
     *
     * @return Flat
     */
    public function setRent($rent)
    {
        $this->rent = $rent;

        return $this;
    }

    /**
     * Get rent
     *
     * @return float
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * Set charges
     *
     * @param float $charges
     *
     * @return Flat
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get charges
     *
     * @return float
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Set energyClass
     *
     * @param string $energyClass
     *
     * @return Flat
     */
    public function setEnergyClass($energyClass)
    {
        $this->energyClass = $energyClass;

        return $this;
    }

    /**
     * Get energyClass
     *
     * @return string
     */
    public function getEnergyClass()
    {
        return $this->energyClass;
    }

    /**
     * Set greenHouseGasEmission
     *
     * @param string $greenHouseGasEmission
     *
     * @return Flat
     */
    public function setGreenhouseGasEmission($greenHouseGasEmission)
    {
        $this->greenHouseGasEmission = $greenHouseGasEmission;

        return $this;
    }

    /**
     * Get greenhouseGasEmission
     *
     * @return string
     */
    public function getGreenhouseGasEmission()
    {
        return $this->greenHouseGasEmission;
    }

    /**
     * Set furnished
     *
     * @param boolean $furnished
     *
     * @return Flat
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;

        return $this;
    }

    /**
     * Get furnished
     *
     * @return bool
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * Set numberOfRooms
     *
     * @param integer $numberOfRooms
     *
     * @return Flat
     */
    public function setNumberOfRooms($numberOfRooms)
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    /**
     * Get numberOfRooms
     *
     * @return int
     */
    public function getNumberOfRooms()
    {
        return $this->numberOfRooms;
    }

    /**
     * Set tv
     *
     * @param boolean $hasTv
     *
     * @return Flat
     */
    public function setHasTv($hasTv)
    {
        $this->hasTv = $hasTv;

        return $this;
    }

    /**
     * Get hasTv
     *
     * @return bool
     */
    public function getHasTv()
    {
        return $this->hasTv;
    }

    /**
     * Set hasWashingMachine
     *
     * @param boolean $hasWashingMachine
     *
     * @return Flat
     */
    public function setHasWashingMachine($hasWashingMachine)
    {
        $this->hasWashingMachine = $hasWashingMachine;

        return $this;
    }

    /**
     * Get hasWashingMachine
     *
     * @return bool
     */
    public function getHasWashingMachine()
    {
        return $this->hasWashingMachine;
    }

    /**
     * Set isPetsAllowed
     *
     * @param boolean $isPetsAllowed
     *
     * @return Flat
     */
    public function setIsPetsAllowed($isPetsAllowed)
    {
        $this->isPetsAllowed = $isPetsAllowed;

        return $this;
    }

    /**
     * Get pets
     *
     * @return bool
     */
    public function getIsPetsAllowed()
    {
        return $this->isPetsAllowed;
    }

    /**
     * Set hasInternet
     *
     * @param boolean $hasInternet
     *
     * @return Flat
     */
    public function setHasInternet($hasInternet)
    {
        $this->hasInternet = $hasInternet;

        return $this;
    }

    /**
     * Get hasInternet
     *
     * @return bool
     */
    public function getHasInternet()
    {
        return $this->hasInternet;
    }

    /**
     * Set hasParking
     *
     * @param boolean $hasParking
     *
     * @return Flat
     */
    public function setHasParking($hasParking)
    {
        $this->hasParking = $hasParking;

        return $this;
    }

    /**
     * Get hasParking
     *
     * @return bool
     */
    public function getHasParking()
    {
        return $this->hasParking;
    }

    /**
     * Set locations
     *
     * @param array $locations
     *
     * @return Flat
     */
    public function setRents($locations)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Get locations
     *
     * @return ArrayCollection|Renting[]
     */
    public function getRents()
    {
        return $this->locations;
    }

    /**
     * Set images
     *
     * @param  ArrayCollection<Image> $images
     *
     * @return Flat
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }
    /**
     * Get images
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    public function __toString(){
        return $this->name;
    }

}

