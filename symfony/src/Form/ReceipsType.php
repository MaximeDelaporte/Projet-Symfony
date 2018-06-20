<?php

namespace App\Form;

use App\Entity\Receips;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceipsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('rooms', EntityType::class, array(
            'class' => Rooms::class,
            'choice_label' => 'name',
            'multiple' => true,
            'expanded' => true,
        ))
        ->add('options', EntityType::class, array(
            'class' => Options::class,
            'choice_label' => 'name',
            'multiple' => true,
            'expanded' => true,
        ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Receips::class,
        ]);
    }
}