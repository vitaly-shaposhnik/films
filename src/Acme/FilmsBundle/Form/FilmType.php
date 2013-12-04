<?php

namespace Acme\FilmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FilmType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
//            ->add('date_country', 'date_country')
//            ->add('actors')
//            ->add('categories')
//            ->add('genres')
//            ->add('actors', 'entity', array(
//                'class'     => 'Acme\FilmsBundle\Entity\Actor',
//                'property'  => 'name',
//                'multiple'  => true,
//            ))
            ->add('categories', 'entity', array(
                'class'     => 'Acme\FilmsBundle\Entity\Category',
                'property'  => 'name',
                'multiple'  => true,
                'expanded'  => true,
            ))
            ->add('genres', 'entity', array(
                'class'     => 'Acme\FilmsBundle\Entity\Genre',
                'property'  => 'name',
                'multiple'  => true,
                'expanded'  => true,
            ))
            ->add('actors', 'collection', array(
                'type'          => new ActorType(),
//                'options'       => array(
//                    'required'  => false,
//                    'attr'      => array('class' => 'email-box')
//                ),
                'allow_add'     => true,
                'allow_delete'  => true,
                'prototype'     => true,
            ))
            ->add('file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\FilmsBundle\Entity\Film'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_filmsbundle_film';
    }
}
