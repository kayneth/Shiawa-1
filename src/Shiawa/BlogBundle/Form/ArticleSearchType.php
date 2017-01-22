<?php

namespace Shiawa\BlogBundle\Form;

use Doctrine\ORM\EntityRepository;
use Shiawa\FileBundle\Form\FileUploadType;
use Shiawa\UserBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'required' => false
            ))
            ->add('category', EntityType::class, array(
                'class'        => 'ShiawaBlogBundle:Category',
                'choice_label' => 'name',
                'multiple'     => true,
                'required' => false
            ))
            ->add('tags', CollectionType::class, array(
                'entry_type'   => TagType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'required' => false
            ))
        ;
    }

    public function getBlockPrefix() {
        return null;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Shiawa\BlogBundle\Entity\ArticleSearch',
            'method' => 'GET',
            'csrf_protection' => false
        ));
    }
}
