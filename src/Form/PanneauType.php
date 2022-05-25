<?php

namespace App\Form;

use App\Entity\Panneau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PanneauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('nom')
            ->add('Etat', ChoiceType::class, [
                'choices'  => [
                    '' => '',
                    'Fonctionnel' => "Fonctionnel",
                    'Défaut' => "Défaut",
                    'Coupé' => "Coupé",
                ],
            ])
            ->add('secteur', ChoiceType::class, [
                'choices'  => [
                    '' => '',
                    'Public' => "Privé",
                    'Privé' => "Privé",
                    
                ],
            ])
            ->add('date_creation', DateType::class)
            ->add('diffusion', ChoiceType::class, [
                'choices'  => [
                    '' => '',
                    'Vlc' => "Fonctionnel",
                    'Web' => "Web",
                    
                ],
            ])
            ->add('flus',TextType::class,['label'=> 'Flux'])
            ->add('garantie')
            ->add('commande')
            ->add('Specs', FileType::class, [
                'mapped' => 'false',
            ])
            ->add('Emplacementbox', FileType::class, [
                'mapped' => 'false',
            ])
            ->add('pc', FileType::class, [
                'mapped' => 'false',
            ])
            ->add('commentaires')
            ->add('pitch')
            ->add('resolution')
            ->add('resolutionvid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panneau::class,
        ]);
    }
}
