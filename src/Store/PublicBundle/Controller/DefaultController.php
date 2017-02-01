<?php

namespace Store\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StorePublicBundle:Default:index.html.twig');
    }
}
