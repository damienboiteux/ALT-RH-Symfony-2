<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label'         =>  'Objet du message',
                // 'required'      =>  false,
                // 'disabled'   =>  true,
                'data'          =>  'Titre',
                'empty_data'    =>  'Valeur par défaut',
                'help'          =>  'Message d\'aide',
                'attr'          =>  [
                    'class'         =>  'classe1',
                    'placeholder'   =>  'Titre du message',
                ]
            ])
            ->add('pseudo', TextType::class, [
                'required'  => false,
                'data' => 'Pseudo'
            ])
            ->add('email', EmailType::class, [
                'data' => 'mail@mail.fr',
            ])
            ->add('message', TextareaType::class, [
                'data' => 'bla bla',
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
