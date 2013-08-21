<?php
/**
 * User: darius
 * Date: 8/21/13
 * Time: 7:55 PM
 */

namespace Evispa\PostCodeBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class PostCode
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $code;

    /**
     * @MongoDB\String
     */
    protected $street;

    /**
     * @MongoDB\String
     */
    protected $number;

    /**
     * @MongoDB\String
     */
    protected $city;

    /**
     * @MongoDB\String
     */
    protected $municipality;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return self
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Get street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get number
     *
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set municipality
     *
     * @param string $municipality
     * @return self
     */
    public function setMunicipality($municipality)
    {
        $this->municipality = $municipality;
        return $this;
    }

    /**
     * Get municipality
     *
     * @return string $municipality
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }
}
