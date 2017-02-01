<?php

namespace Store\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Store\CoreBundle\Document\Category;
use Store\AdminBundle\Form\CategoryType;

class CategoryController extends Controller
{
    public function showAction(Request $request)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $categories = $dm->getRepository('StoreCoreBundle:Category')->findAll();
        return $this->render('StoreAdminBundle:Category:View.html.twig', array(
            'categories' => $categories
        ));
    }

    public function findOneAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $category = $dm->getRepository('StoreCoreBundle:Category')->find($id);
        return $this->render('StoreAdminBundle:Category:detail.html.twig', array(
            'category' => $category
        ));
    }
    public function deleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $category = $dm->getRepository('StoreCoreBundle:Category')->find($id);
        $dm->remove($category);
        $dm->flush();
        return $this->redirectToRoute('store_category');
    }
    public function updateAction(Request $request,$id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $category = $dm->getRepository('StoreCoreBundle:Category')->find($id);
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->flush();

            return $this->redirectToRoute('store_category');
        }

        return $this->render('StoreAdminBundle:Category:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function createAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($category);
            $dm->flush();

            return $this->redirectToRoute('store_category');
        }

        return $this->render('StoreAdminBundle:Category:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
