<?php

namespace Store\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Store\CoreBundle\Repository\ProductCartRepository")
 */
class ProductCart
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    private $id;

    /**
     * @MongoDB\Field(type="float")
     */
    private $quantity;
    /**
     * @MongoDB\ReferenceMany(targetDocument="Product", cascade="all")
     */
    private $product = array();

    /**
     * @MongoDB\ReferenceMany(targetDocument="Cart", cascade="all")
     */
    private $cart = array();

    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cart = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set quantity
     *
     * @param float $quantity
     * @return self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get quantity
     *
     * @return float $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Add product
     *
     * @param Store\CoreBundle\Document\Product $product
     */
    public function addProduct(\Store\CoreBundle\Document\Product $product)
    {
        $this->product[] = $product;
    }

    /**
     * Remove product
     *
     * @param Store\CoreBundle\Document\Product $product
     */
    public function removeProduct(\Store\CoreBundle\Document\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection $product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add cart
     *
     * @param Store\CoreBundle\Document\Cart $cart
     */
    public function addCart(\Store\CoreBundle\Document\Cart $cart)
    {
        $this->cart[] = $cart;
    }

    /**
     * Remove cart
     *
     * @param Store\CoreBundle\Document\Cart $cart
     */
    public function removeCart(\Store\CoreBundle\Document\Cart $cart)
    {
        $this->cart->removeElement($cart);
    }

    /**
     * Get cart
     *
     * @return \Doctrine\Common\Collections\Collection $cart
     */
    public function getCart()
    {
        return $this->cart;
    }
}
