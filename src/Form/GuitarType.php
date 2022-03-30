<?php

namespace App\Form;

use App\Entity\Guitar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuitarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model')
            ->add('year')
            ->add('acquisitionAt')
            ->add('wear')
            ->add('finition')
            ->add('pickups')
            ->add('neckMaterial')
            ->add('bodyMaterial')
            ->add('bodyForm')
            ->add('dominationHand')
            ->add('nbFrets')
            ->add('fixation')
            ->add('image')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('user')
            ->add('brand')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Guitar::class,
        ]);
    }
}
