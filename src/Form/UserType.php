<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email')
            ->add('roles', EntityType::class, [
                'class' => User::class,
            ])
            ->add('password')
            ->add('firstname')
            ->add('lastname')
            ->add('dateDeNaissance')
            ->add('telephone')
            ->add('numeroPE')
            ->add('commentaire')
            ->add('infosCos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
