<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('service', EntityType::class, [
                'class'         =>  Service::class,
                'choice_label'  =>  'nom',
                'placeholder'   =>  'Choisir un service',
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr'  =>  [
                    'placeholder' => 'Votre nom d\'usage',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Champ obligatoire']),
                    new Length([
                        'max'           => 64,
                        'maxMessage'    => '{{limit}} caractères maximum',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z][a-zA-Z -]*[a-zA-Z]$/',
                        'message' => 'Valeur incorrecte'
                    ]),
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr'  =>  [
                    'placeholder' => 'Votre prénom usuel',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Champ obligatoire']),
                    new Length([
                        'max'           => 32,
                        'maxMessage'    => '{{limit}} caractères maximum',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z][a-zA-Z -]*[a-zA-Z]$/',
                        'message' => 'Valeur incorrecte'
                    ]),
                ]
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
