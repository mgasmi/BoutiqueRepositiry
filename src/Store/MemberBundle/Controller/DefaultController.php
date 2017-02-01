<?php

namespace Store\MemberBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StoreMemberBundle:Default:index.html.twig');
    }
}
