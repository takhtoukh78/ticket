<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre',TextType::class, [
                'label' => false,
                ])
            ->add('Adresse',TextType::class, [
                'label' => false,
                ])
            ->add('Type',TextType::class, [
                'label' => false,
                ])
            ->add('Remplacement',TextType::class, [
                'label' => false,
                ])
            ->add('Priorite', ChoiceType::class, [
                'choices'  => [
                    'Faible' => "faible",
                    'Moyen' => "moyen",
                    'Fort' => "fort",
                ],
            ])
            ->add('Etat', ChoiceType::class, [
                'choices'  => [
                    'Ouvert' => "Ouvert",
                    'Encours' => "Encours",
                    'Fermé' => "Fermé",
                ],
            ])
            ->add('Assigne',TextType::class, [
                'label' => false,
                ])
            ->add('Description',TextType::class, [
                'label' => false,
                ])
            ->add('Temps', DateIntervalType::class, [
                'with_years'  => false,
                'with_months' => false,
                'with_days'   => true,
                'with_hours'  => true,
            ])
            
            ->add('Distance',TextType::class, [
                'label' => false,
                ])
            ->add('photo', FileType::class,array('data_class' => null), [
                'mapped' => 'false',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
