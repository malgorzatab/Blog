<?php
/**
 * Created by PhpStorm.
 * User: Gosia
 * Date: 2017-11-05
 * Time: 20:48
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\NewPostType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


/**
 * Posts controller.
 *
 * @Route("posts")
 */

class PostController extends Controller
{

    /**
     * Lists all posts entities.
     *
     * @Route("/", name="post_index")
     * @Method("GET")
     */
    public function indexAction()
    {


        return $this->render('posts/post_index.html.twig');
    }


    /**
     * Creates a new post entity.
     *
     * @Route("/new", name="post_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm( 'AppBundle\Form\NewPostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getId(), 'status' => true));
        }

        return $this->render('posts/post_new.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));



    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="post_show")
     * @Method("GET")

     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction( $id, $status=true)
    {
        if($status == null){
            $status = false;
        }

        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        return $this->render('posts/post_index.html.twig', array(
            'post' => $post,
            'status' => $status
        ));
     //   return $this->render('posts/post_index.html.twig');

    }


    /**
     * Displays a form to edit an existing post entity.
     *
     * @Route("/{id}/edit", name="post_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Post $post)
    {

    }

    /**
     * Deletes a post entity.
     *
     * @Route("/{id}", name="post_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Post $post)
    {

    }
}