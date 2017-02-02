<?php

namespace Store\CoreBundle\Document;

use FOS\UserBundle\Document\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Store\CoreBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Cart",cascade={"persist"})
     */
    private $cart;

    public function __construct()
    {
        parent::__construct();
        $cart=new Cart();
        $this.$this->setCart($cart);
    }


    /**
     * Set cart
     *
     * @param Store\CoreBundle\Document\Cart $cart
     * @return self
     */
    public function setCart(\Store\CoreBundle\Document\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * Get cart
     *
     * @return Store\CoreBundle\Document\Cart $cart
     */
    public function getCart()
    {
        return $this->cart;
    }
}
