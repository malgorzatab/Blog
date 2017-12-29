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
     * @Route("/page", name="page")
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
    public function firstPostAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('samplePost.html.twig');
    }

    /**
 * @Route("/adminArea", name="adminArea")
 *
 */
    public function AdminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('adminArea.html.twig');
    }

    /**
     * @Route("/addpost", name="addpost")
     *
     */
    public function AddPost(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('posts/post_new.html.twig');
    }

    /**
     * @Route("/aboutMe", name="aboutMe")
     *
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('aboutMe.html.twig');
    }

    /**
     * @Route("/photoGallery", name="photoGallery")
     *
     */
    public function photoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('photoGallery.html.twig');
    }
    /**
     * @Route("/forum", name="forum")
     *
     */
    public function forumAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('forum.html.twig');
    }
    /**
     * @Route("/slideshow", name="slideshow")
     *
     */
    public function slideshowAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('slideshow.html.twig');
    }

    /**
     * @Route("/post_index", name="post_index")
     *
     */
    public function postindexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('posts/post_index.html.twig');
    }









}

