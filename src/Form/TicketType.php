<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Adresse')
            ->add('Type')
            ->add('Remplacement')
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
            ->add('Assigne')
            ->add('Description')
            ->add('Temps', DateIntervalType::class, [
                'with_years'  => false,
                'with_months' => false,
                'with_days'   => true,
                'with_hours'  => true,
            ])
            
            ->add('Distance')
            ->add('photo', FileType::class, [
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
