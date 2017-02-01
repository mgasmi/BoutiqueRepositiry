<?php

namespace Store\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Store\CoreBundle\Repository\CategoryRepository")
 */
class Category
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
    public function __toString()
    {
        return (string) $this->getName();
    }
}
