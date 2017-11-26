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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


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
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('AppBundle:Post')->findAll();

        return $this->render('posts/post_index.html.twig', array(
            'posts' => $posts,
        ));
    }


    /**
     * Creates a new post entity.
     *
     * @Route("/new", name="post_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $post = new Post();
     /*   $post->setTitle('Czy to zacznie dzialac?');
        $post->setContent('juz mnie to wkurza strasznie');
        $post->setDataPosted(new \DateTime('now'));
        $post->setImage('yhym tak');
        $post->setTags('tag');

        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class)
        ->add('content',TextType::class)
            ->add('dataPosted',DateType::class)
            ->add('image', TextType::class)
            ->add('tags',TextType::class)
            ->getForm();

        return $this->render('posts/post_new.html.twig', array(
            'form' => $form->createView(),
        ));*/

       $form = $this->createForm(new NewPostType(), $post);
       $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_index');//, array('id' => $post->getId()));
        }

        return $this->render('posts/post_new.html.twig', array(
          //  'post' => $post,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {

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