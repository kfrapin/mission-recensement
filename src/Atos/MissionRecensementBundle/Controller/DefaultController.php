<?php

namespace Atos\MissionRecensementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AtosMissionRecensementBundle:Default:index.html.twig');
    }
}
