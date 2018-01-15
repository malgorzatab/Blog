<?php
/**
 * Created by PhpStorm.
 * User: Gosia
 * Date: 2017-11-25
 * Time: 19:51
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class NewPostType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title',TextType::class,  array('label' => 'Title', 'attr' => array('placeholder' => 'Enter title')))

            ->add('content',TextareaType::class,  array('label' => 'Content', 'attr' => array('placeholder' => 'Enter content')))
            ->add('dataPosted',DateTimeType::class, array('label' => 'Date', 'attr' => array('placeholder' => 'Enter date')))
            ->add('image',TextType::class, array('label' => 'Image', 'attr' => array('placeholder' => 'Upload image ')))
            ->add('path',TextType::class, array('label' => 'Image Path', 'attr' => array('placeholder' => 'Enter image path ')))
            ->add('tags',TextType::class, array('label' => 'Tag', 'attr' => array('placeholder' => 'Enter tag')));

    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Post',
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_post';
    }





}


