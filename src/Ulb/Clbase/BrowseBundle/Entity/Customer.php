<?php

namespace Ulb\Clbase\BrowseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="MainCity", type="string", length=255)
     */
    private $mainCity;

    /**
     * @var string
     *
     * @ORM\Column(name="Town", type="string", length=255)
     */
    private $town;

    /**
     * @var string
     *
     * @ORM\Column(name="Street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="HouseNum", type="string", length=50)
     */
    private $houseNum;

    /**
     * @var string
     *
     * @ORM\Column(name="BlockNum", type="string", length=50)
     */
    private $blockNum;

    /**
     * @var string
     *
     * @ORM\Column(name="BuildNum", type="string", length=50)
     */
    private $buildNum;

    /**
     * @var string
     *
     * @ORM\Column(name="Porch", type="string", length=50)
     */
    private $porch;

    /**
     * @var integer
     *
     * @ORM\Column(name="Floor", type="integer")
     */
    private $floor;

    /**
     * @var string
     *
     * @ORM\Column(name="Flat", type="string", length=50)
     */
    private $flat;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Customer
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mainCity
     *
     * @param string $mainCity
     * @return Customer
     */
    public function setMainCity($mainCity)
    {
        $this->mainCity = $mainCity;

        return $this;
    }

    /**
     * Get mainCity
     *
     * @return string 
     */
    public function getMainCity()
    {
        return $this->mainCity;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return Customer
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Customer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNum
     *
     * @param string $houseNum
     * @return Customer
     */
    public function setHouseNum($houseNum)
    {
        $this->houseNum = $houseNum;

        return $this;
    }

    /**
     * Get houseNum
     *
     * @return string 
     */
    public function getHouseNum()
    {
        return $this->houseNum;
    }

    /**
     * Set blockNum
     *
     * @param string $blockNum
     * @return Customer
     */
    public function setBlockNum($blockNum)
    {
        $this->blockNum = $blockNum;

        return $this;
    }

    /**
     * Get blockNum
     *
     * @return string 
     */
    public function getBlockNum()
    {
        return $this->blockNum;
    }

    /**
     * Set buildNum
     *
     * @param string $buildNum
     * @return Customer
     */
    public function setBuildNum($buildNum)
    {
        $this->buildNum = $buildNum;

        return $this;
    }

    /**
     * Get buildNum
     *
     * @return string 
     */
    public function getBuildNum()
    {
        return $this->buildNum;
    }

    /**
     * Set porch
     *
     * @param string $porch
     * @return Customer
     */
    public function setPorch($porch)
    {
        $this->porch = $porch;

        return $this;
    }

    /**
     * Get porch
     *
     * @return string 
     */
    public function getPorch()
    {
        return $this->porch;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     * @return Customer
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return integer 
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set flat
     *
     * @param string $flat
     * @return Customer
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;

        return $this;
    }

    /**
     * Get flat
     *
     * @return string 
     */
    public function getFlat()
    {
        return $this->flat;
    }
}
