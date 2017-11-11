<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{

    /**
     * @Route("/",name="startPage")
     */

    public function startAction(Request $request)
    {
        return $this->render('startPage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/homepage", name="homepage")
     */

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
            //[
           // 'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
      //  ]);
    }


    /**
     * @Route("/firtspost", name="firstPost")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('samplePost.html.twig');
    }

    /**
     * @Route("/adminArea", name="adminArea")
     * @Method("POST")
     */
    public function logInAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('adminArea.html.twig');
    }




}

