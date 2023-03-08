<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label'         =>  'Objet du message',
                'required'      =>  false,
                // 'disabled'   =>  true,
                // 'data'          =>  'Titre',
                // 'empty_data'    =>  'Valeur par défaut',
                'help'          =>  'Message d\'aide',
                'attr'          =>  [
                    'class'         =>  'classe1',
                    'placeholder'   =>  'Titre du message',
                ],
                'constraints'  => [
                    new NotBlank([
                        'message' => 'L\'objet est obligatoire',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => '{{ limit }} caractères minimum',
                        'max' => 64,
                        'maxMessage' => '{{ limit }} caractères maximum',
                    ]),
                ]
            ])
            ->add('pseudo', TextType::class, [
                'required'  => false,
                'data' => 'Pseudo',
                'constraints' => [
                    new Length([
                        'max' => 16,
                        'maxMessage' => '{{ limit }} caractères maximum',
                    ]),
                    new Regex([
                        'pattern'   =>  '/^[a-z][a-z-]*$/',
                        'message'   =>  'Pseudo non valide'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'data' => 'mail@mail.fr',
                'required'      =>  false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'L\'objet est obligatoire',
                    ]),
                    new Email([
                        'message' => '{{ value }} nèst pas une adresse mail valide',
                    ])
                ]
            ])
            ->add('message', TextareaType::class, [
                'data' => 'bla bla',
                'required'      =>  false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le message est obligatoire',
                    ]),
                    new Length([
                        'min' => 20,
                        'minMessage' => '{{ limit }} caractères minimum',
                        'max' => 500,
                        'maxMessage' => '{{ limit }} caractères maximum',
                    ])
                ]
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
