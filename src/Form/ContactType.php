<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vosNomEtPrenom')
            ->add('votreAdresseMail', EmailType::class)
            ->add('numeroTelephone')
            ->add('entrezVotreMessage', TextareaType::class)
            ->add('villeDeFormation', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Lyon' => 'Lyon',
                    'Clermont-Ferrand' => 'Clermont-Ferrand',
                    'Grenoble' => 'Grenoble',
                    'Saint-Etienne' => 'Saint-Etienne',
                ]
            ])
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
