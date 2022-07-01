<?php

namespace App\Form;

use App\Entity\Ticket;
use App\Entity\Panneaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre',TextType::class, [
                'label' => False,
                ])
            ->add('Adresse',TextType::class, [
                'label' => False,
                ])
            ->add('Type',TextType::class, [
                'label' => False,
                ])
            ->add('Remplacement',TextType::class, [
                'label' => False,                ])
            ->add('Priorite', ChoiceType::class, [
                'label' => False,
                'choices'  => [
                    'Faible' => "faible",
                    'Moyen' => "moyen",
                    'Fort' => "fort",
                ],
            ])
            ->add('Etat', ChoiceType::class, 
            [
                'label' => False,
                'choices'  => [
                    'Ouvert' => "Ouvert",
                    'Encours' => "Encours",
                    'Fermé' => "Fermé",
                    
                ],
            ])
            ->add('Assigne',TextType::class, [
                'label' => False,
                ])
            ->add('Description',TextType::class, [
                'label' => False,
                ])
            ->add('Temps', DateIntervalType::class, [
                'label' => False,
                'with_years'  => false,
                'with_months' => false,
                'with_days'   => true,
                'with_hours'  => true,
                
            ])
            
            ->add('Distance',TextType::class, [
                'label' => False,
                ])
            ->add('photo', FileType::class,array('data_class' => null), 
                [
                    'label' => False,
            ])
            ->add('IdPanneaux', EntityType::class, [
                'class' => Panneaux::class,
                'choice_label' => 'NomPa',
                'placeholder' => 'Panneaux',
                'label' => False,
                'attr' => [
                    'class' => 'select-tag'
                ],
            
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
