<?php

namespace Store\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
* @MongoDB\Document(repositoryClass="Store\CoreBundle\Repository\ProductRepository")
*/
class Product
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $price;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Category", cascade={"persist"})
     */
    private $category;


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
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set category
     *
     * @param Store\CoreBundle\Document\Category $category
     * @return self
     */
    public function setCategory(\Store\CoreBundle\Document\Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Store\CoreBundle\Document\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
