<?php

namespace Ulb\Clbase\BrowseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UlbClbaseBrowseBundle:Default:index.html.twig', array('name' => $name));
    }

	/*
     * @Route("/Ulybkino", name="_ulybkino")
     *
     * @Template()
     */

	public function gotoUlybkinoAction()
	{
		# code...
		//$this->get('router')->getContext()->setHost('www.ulybkino.ru');
		//$url=$this->get('router')->generate('/hello',array(),true);//'http://www.ulybkino.ru/',array(),self::ABSOLUTE_URL);
	    $url='http://www.ulybkino.ru/';
	return $this->redirect($url);
	}
}