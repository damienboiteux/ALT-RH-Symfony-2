<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Regex;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Ce champ est obligatoire']),
                    new Length([
                        'min' => 3,
                        'max' => 32,
                        'minMessage' => '{{ limit }} caractères minimum',
                        'maxMessage' => '{{ limit }} caractères maximum',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z][a-zA-Z -]*[a-zA-Z]$/',
                        'message' => 'Nom incorrect',
                    ])
                ]
            ])
            ->add('batiment', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Ce champ est obligatoire']),
                    new Length([
                        'max' => 3,
                        'maxMessage' => '{{ limit }} caractères maximum',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9]{1,3}$/',
                        'message' => 'Nom incorrect',
                    ])
                ]
            ])
            // ->add('etage', IntegerType::class)
            ->add('etage', NumberType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Ce champ est obligatoire']),
                    new PositiveOrZero([
                        'message' => 'Valeur incorrecte',
                    ])
                ],
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
