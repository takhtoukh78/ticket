<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
    ->add('email',TextType::class, [
        'label' => false,
        ])
    ->add('nom',TextType::class, [
        'label' => false,
        ])
    ->add('prenom',TextType::class, [
        'label' => false,
        ])
    ->add('role_utilisateur', ChoiceType::class, [
        'label' => false,
        'choices' => [
            'Technicien' => "Technicien",
            'Collaborateur' => "Collaborateur",
            'Client' => "Client",
            'Admin' => "Admin",
        ]

    ])
    ->add('date_embauche', DateType::class, [
        'label' => false,
        ])
    ->add('adresse',TextType::class, [
        'label' => false,
        ])
    ->add('ville',TextType::class, [
        'label' => false,
        ])
    ->add('telephone',TextType::class, [
        'label' => false,
        ])
    ->add('password',
     PasswordType::class, [
        // instead of being set onto the object directly,
        // this is read and encoded in the controller

        'label' => false,
        'attr' => ['autocomplete' => 'new-password'],
        'constraints' => [
            new NotBlank([
                'message' => 'Please enter a password',
            ]),
            new Length([
                'min' => 6,
                'minMessage' => 'Your password should be at least {{ limit }} characters',
                // max length allowed by Symfony for security reasons
                'max' => 4096,
            ]),
        ],
    ])
;
}

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => User::class,
    ]);
}

}