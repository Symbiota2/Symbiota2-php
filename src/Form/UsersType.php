<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('username')
            ->add('password')
            ->add('title')
            ->add('institution')
            ->add('department')
            ->add('address')
            ->add('city')
            ->add('state')
            ->add('zip')
            ->add('country')
            ->add('phone')
            ->add('email')
            ->add('url')
            ->add('biography')
            ->add('ispublic')
            ->add('guid')
            ->add('lastlogindate')
            ->add('initialtimestamp')
            ->add('middleinitial')
            ->add('rememberToken')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('verified')
            ->add('verificationToken')
            ->add('collid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
