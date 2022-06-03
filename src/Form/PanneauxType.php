<?php

namespace App\Form;

use App\Entity\Panneaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PanneauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_pa')
            ->add('nom_pa')
            ->add('groupe_id')
            ->add('ip')
            ->add('url')
            ->add('adresse_pa')
            ->add('gps')
            ->add('photo')
            ->add('resolution')
            ->add('resolution_video')
            ->add('x_y')
            ->add('pitch')
            ->add('type')
            ->add('cropping')
            ->add('pa_pt_id')
            ->add('nb_resa_max')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Panneaux::class,
        ]);
    }
}
