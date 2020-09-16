<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email')
            ->add('role', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'candidat' => 'ROLE_USER',
                    'Compte administrateur' => 'ROLE_ADMIN',
                    'Compte chef de projet' => 'ROLE_CHEFPROJET',
                ]
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
