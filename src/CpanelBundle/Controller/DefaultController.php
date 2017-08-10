<?php

namespace CpanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CpanelBundle:Default:index.html.twig');
    }
}
