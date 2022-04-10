<?php

namespace App\Form;

use App\Entity\Guitar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuitarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model', null, [
                'label' => 'Model de guitar',
            ])
            ->add('year', null, [
                'label' => 'Année de fabrication',
            ])
            ->add('acquisitionAt', null, [
                'label' => 'Date d\'acquisition',
            ])
            ->add('wear', null, [
                'label' => 'Usure',
            ])
            ->add('finition', null, [
                'label' => 'Finition',
            ])
            ->add('pickups', null, [
                'label' => 'Micros',
            ])
            ->add('neckMaterial', null, [
                'label' => 'Matériau du manche',
            ])
            ->add('bodyMaterial', null, [
                'label' => 'Matériau du corps',
            ])
            ->add('bodyForm', null, [
                'label' => 'Forme du corps',
            ])
            ->add('dominationHand', ChoiceType::class, [
                'label' => 'Sens du manche',
                'choices' => [
                    'Droitier' => '1',
                    'Gaucher' => '2',
                ],
            ])
            ->add('nbFrets', null, [
                'label' => 'Nombre de frets',
            ])
            ->add('fixation', ChoiceType::class, [
                'label' => 'Fixation du manche',
                'choices' => [
                    'Collé' => '1',
                    'Vissé' => '2',
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Photo de votre instrument',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'accept' => 'image/*',
                ],

            ])
            
            ->add('user', null, [
                'label' => 'Utilisateur',
            ])
            ->add('brand', null, [
                'label' => 'Marque',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Guitar::class,
        ]);
    }
}
