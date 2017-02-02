<?php

namespace Store\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Store\CoreBundle\Document\ProductCart;

class CartController extends Controller
{
    public function showCartAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $productCart=new ProductCart();
        $productCart = $dm->getRepository('StoreCoreBundle:ProductCart')->findAll();
        $users = $dm->getRepository('StoreCoreBundle:User')->findAll();
        return $this->render('StoreAdminBundle:Cart:verifCart.html.twig', array(
            'productCart' => $productCart,
            'users'=>$users
        ));
    }
    public function productCartAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $productCart=new ProductCart();
        $productCart = $dm->getRepository('StoreCoreBundle:ProductCart')->find($id);
        return $this->render('StoreAdminBundle:Cart:detailCart.html.twig', array(
            'productCart' => $productCart
        ));
    }
    public function acceptCartAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $productCart=new ProductCart();
        $productCart = $dm->getRepository('StoreCoreBundle:ProductCart')->find($id);
        $productCart->setStatus('accepted');
        $dm->flush();
        return $this->redirectToRoute('store_cart');
    }
}
