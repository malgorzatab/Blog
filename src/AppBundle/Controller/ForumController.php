<?php
/**
 * Created by PhpStorm.
 * User: Gosia
 * Date: 2018-01-15
 * Time: 15:30
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Forum;
use AppBundle\Form\ForumComments;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\NewPostType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;


/**
 * Forum controller.
 *
 */
class ForumController extends Controller
{
   /* /**
     * Lists all posts entities.
    /**
     * @Route("/forum", name="forum")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Method("GET","POST")


    public function showPostsAction(Request $request)
    {
        $comm = new Forum();
        $form = $this->createForm( 'AppBundle\Form\ForumComments', $comm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($comm);
            $em->flush();
        }


        $comms= $this->getDoctrine()->getRepository(Forum::class)->findAll();

        return $this->render('forum.html.twig', array(
            'comms' => $comms,
            'form' => $form->createView(),
        ));



    }*/

    /**
     * Creates a new post entity.
     *@Route("/forum", name="forum")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $comm = new Forum();
        $form = $this->createForm( 'AppBundle\Form\ForumComments', $comm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($comm);
            $em->flush();
            return $this->redirectToRoute('forum', array('id' => $comm->getId()));
        }



        $comms= $this->getDoctrine()->getRepository(Forum::class)->findAll();

        return $this->render('forum.html.twig', array(
            'comm' => $comm,
            'form' => $form->createView(),
            'comms'=>$comms,
        ));



    }



}