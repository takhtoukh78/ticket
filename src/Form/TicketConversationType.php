<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Resources;
use App\Entity\Panneaux;
use App\Entity\Ticket;
use App\Entity\TicketConversation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketConversationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title')
            ->add('state')
            ->add('priority')
            ->add('description')
            ->add('Date_creation')
            
            ->add('Id_ticket', EntityType::class, [
                'class' => Ticket::class,
                'choice_label' => 'Id',
                'placeholder' => 'Ticket',
                'label' => 'Ticket',
                'required' => false
            ])
            ->add('Id_contact', EntityType::class, [
                'class' => Contact::class,
                'choice_label' => 'Id',
                'placeholder' => 'Contact',
                'label' => 'Contact',
                'required' => false
            ])
            ->add('Id_ressource', EntityType::class, [
                'class' => Resources::class,
                'choice_label' => 'Id',
                'placeholder' => 'Resources',
                'label' => 'Resources',
                'required' => false
            ])
            ->add('IdPanel', EntityType::class, [
                'class' => Panneaux::class,
                'choice_label' => 'NomPa',
                'placeholder' => 'Panneaux',
                'label' => 'Panneaux',
                'attr' => [
                    'class' => 'select-tags'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TicketConversation::class,
        ]);
    }
}
