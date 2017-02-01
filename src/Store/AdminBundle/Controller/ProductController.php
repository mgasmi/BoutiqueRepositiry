<?php

namespace Store\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Store\CoreBundle\Document\Product;
use Store\AdminBundle\Form\ProductType;

class ProductController extends Controller
{
    public function showAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $products = $dm->getRepository('StoreCoreBundle:Product')->findAll();
        return $this->render('StoreAdminBundle:Product:View.html.twig', array(
            'products' => $products
        ));
    }

    public function findOneAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $product = $dm->getRepository('StoreCoreBundle:Product')->find($id);
        return $this->render('StoreAdminBundle:Product:detail.html.twig', array(
            'product' => $product
        ));
    }
    public function deleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $product = $dm->getRepository('StoreCoreBundle:Product')->find($id);
        $dm->remove($product);
        $dm->flush();
        return $this->redirectToRoute('store_product');
    }
    public function updateAction(Request $request,$id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $product = $dm->getRepository('StoreCoreBundle:Product')->find($id);
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->flush();

            return $this->redirectToRoute('store_product');
        }

        return $this->render('StoreAdminBundle:Product:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function createAction(Request $request)
    {
        $product = new Product();
         $form = $this->createForm(ProductType::class, $product);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $product = $form->getData();
             $dm = $this->get('doctrine_mongodb')->getManager();
             $dm->persist($product);
             $dm->flush();
             return $this->redirectToRoute('store_product');
         }

         return $this->render('StoreAdminBundle:Product:new.html.twig', array(
             'form' => $form->createView(),
         ));
    }
}
