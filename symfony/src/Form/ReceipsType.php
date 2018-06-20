<?php

namespace App\Form;

use App\Entity\Receips;
use App\Entity\Rooms;
use App\Entity\Options;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceipsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
        $builder
        
        ->add('rooms', EntityType::class, array(
            'class' => Rooms::class,
            'choice_label' => 'name',
            'multiple' => false,
            'expanded' => true,
        ));
        */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Receips::class,
        ]);
    }
}