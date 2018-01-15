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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;


/**
 * Posts controller.
 *
 * @Route("posts")
 */

class PostController extends Controller
{

    /**
     * Lists all posts entities.
    /**
     * @Route("/homepage", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Method("GET")

     */
    public function indexAction(Request $request)
    {
        $posts= $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('default/index.html.twig', array(
            'posts' => $posts,
        ));



    }

    /**
     * Lists all posts entities.
    /**
     * @Route("/adminPosts", name="adminPosts")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Method("GET")

     */
    public function showPostsAction(Request $request)
    {

        $posts= $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('posts/adminPosts.html.twig', array(
            'posts' => $posts,
        ));



    }


    /**
     * Creates a new post entity.
     *
     * @Route("/new", name="post_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm( 'AppBundle\Form\NewPostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             */
          //  $file = $post->getImage();
            // Generate a unique name for the file before saving it
          //  $fileName = md5(uniqid()).'.'.$file->guessExtension();
           // $orginal_name = $file->getClientOriginalName();


            // Move the file to the directory where brochures are stored
          //  $file->move(
          //      $this->getParameter('images_directory'),
          //      $fileName
          //  );

           // $file_entity = new UploadedFile();
            //$file_entity->setFileName($orginal_name);
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
           // $post->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            //$post->setImage(
            //    new File($this->getParameter('images_directory').'/'.$post->getImage())
          //  );
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Post $post)
    {
        $editform = $this->createForm( 'AppBundle\Form\NewPostType', $post);
        $editform->handleRequest($request);

        if ($editform->isSubmitted() && $editform->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getId(), 'status' => true));
        }

        return $this->render('posts/post_edit.html.twig', array(
            'post' => $post,
            'form' => $editform->createView(),
        ));
    }


    /**
     * @Route("/{id}/post_delete_confirm", name="post_delete_confirm")
     * @Method("GET")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirmDeleteAction($id){
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);
        $deleteForm = $this->createDeleteForm($post);
        return $this->render('posts/post_delete.html.twig', array(
            'post' => $post,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a post entity.
     *
     * @Route("/{id}post_delete", name="post_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Post $post
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();

            return $this->redirectToRoute('adminPosts');
        }

    }

    /**
     * Creates a form to delete a project entity.
     *
     * @param Post $post
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }





}