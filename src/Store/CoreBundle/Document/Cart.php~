<?php

namespace Store\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Store\CoreBundle\Repository\CartRepository")
 */
class Cart
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }
}
