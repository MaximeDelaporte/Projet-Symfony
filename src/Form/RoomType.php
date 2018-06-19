<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/06/2018
 * Time: 17:11
 */

namespace App\Form;

use App\Entity\Rooms;
use App\Entity\Option;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('city', TextType::class)
            ->add('postal_code', NumberType::class)
            ->add('adress', TextType::class)
            ->add('description', TextType::class)
            ->add('capacity', NumberType::class)
            ->add('options', EntityType::class, array(
                'class' => Options::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Rooms::class,
        ));
    }
}