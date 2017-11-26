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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class NewPostType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title',TextType::class, [
        'label' => "title",
    ])
            ->add('content',TextType::class, [
                'label' => "content",
            ])
            ->add('dataPosted',DateTimeType::class, [
                'label' => "date",
            ])
            ->add('image',TextType::class, [
                'label' => "image xD",
            ])
            ->add('tags',TextType::class, [
                'label' => "tags",
            ]);

    }


   /* public function getParent()
    {
        return 'AppBundle\Form\NewPostType';
    }*/

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Post::class,
        ));
    }

}


