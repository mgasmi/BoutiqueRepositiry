<?php

namespace Store\MemberBundle\Controller;

use Store\CoreBundle\Document\ProductCart;
use Store\CoreBundle\Document\Cart;
use Store\CoreBundle\Document\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function showAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $products = $dm->getRepository('StoreCoreBundle:Product')->findAll();
        return $this->render('StoreMemberBundle:Cart:View.html.twig', array(
            'products' => $products
        ));
    }
    public function addToCartAction($productId,$cartId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $product = $dm->getRepository('StoreCoreBundle:Product')->find($productId);
        $cart = $dm->getRepository('StoreCoreBundle:Cart')->find($cartId);
        $productCart= new ProductCart();
        $productCart->addProduct($product);
        $productCart->addCart($cart);
        $productCart->setStatus('not yet');
        $dm->persist($productCart);
        $dm->flush();
        return $this->redirectToRoute('store_member_product');
    }
    public function showCartAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $cartId = $this->container->get('security.context')->getToken()->getUser()->getCart();
        $productCart=new ProductCart();
        $productCart = $dm->getRepository('StoreCoreBundle:ProductCart')->findAll();
        return $this->render('StoreMemberBundle:Cart:cart.html.twig', array(
            'productCart' => $productCart
        ));
    }
    public function boxCartAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $cartId = $this->container->get('security.context')->getToken()->getUser()->getCart();
        $productCart=new ProductCart();
        $productCart = $dm->getRepository('StoreCoreBundle:ProductCart')->findAll();
        return $this->render('StoreMemberBundle:Cart:box.html.twig', array(
            'productCart' => $productCart
        ));
    }
}
