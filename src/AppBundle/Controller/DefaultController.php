<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $test = $request->query->get('test');
        $method = $request->getMethod();
        return $this->render('AppBundle:Default:index.html.twig',array("test"=>$test,"method"=>$method));


    }

    public function notFoundAction(){
        throw $this->createNotFoundException();
    }

    public function paramAction($name){

        return $this->render('AppBundle:Default:index.html.twig',array("name"=>$name));



    }


    public function menu(){
        return $this->render('AppBundle:includes:menu.html.twig');
    }

    public function mailAction(){


        $test = 'tet';
        $method = 'get';

        return $this->render('AppBundle:Default:index.html.twig',array("test"=>$test,"method"=>$method));

    }
}
