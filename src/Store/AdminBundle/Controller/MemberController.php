<?php

namespace Store\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Store\CoreBundle\Document\User;
use Store\AdminBundle\Form\UserType;

class MemberController extends Controller
{
    public function showAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $users = $dm->getRepository('StoreCoreBundle:User')->findAll();
        return $this->render('StoreAdminBundle:User:View.html.twig', array(
            'users' => $users
        ));
    }

    public function findOneAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $user = $dm->getRepository('StoreCoreBundle:User')->find($id);
        return $this->render('StoreAdminBundle:User:detail.html.twig', array(
            'user' => $user
        ));
    }
    public function deleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $user = $dm->getRepository('StoreCoreBundle:User')->find($id);
        $dm->remove($user);
        $dm->flush();
        return $this->redirectToRoute('store_user');
    }

    public function updateAction(Request $request,$id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $user = $dm->getRepository('StoreCoreBundle:User')->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->flush();

            return $this->redirectToRoute('store_user');
        }

        return $this->render('StoreAdminBundle:User:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
