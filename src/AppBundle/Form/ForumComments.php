<?php
/**
 * Created by PhpStorm.
 * User: Gosia
 * Date: 2018-01-15
 * Time: 15:29
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

class ForumComments extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('person',TextType::class,  array('label' => 'Name', 'attr' => array('placeholder' => 'Your Name')))

            ->add('comment',TextareaType::class,  array('label' => 'Comment', 'attr' => array('placeholder' => 'Your Comment')))
            ->add('dataComm',DateTimeType::class, array('label' => 'Date', 'attr' => array('placeholder' => 'Enter date')));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Forum',
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_forum';
    }





}


